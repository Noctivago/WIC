<?php

include_once './db/conn.inc.php';
include_once './forms/session.php';


$arg = (filter_var($_POST ['arg']));

if ($arg === 'addOrganization') {
    try {
        $userid = (filter_var($_POST ['userid']));
        $name = (filter_var($_POST ['name']));
        $phone = (filter_var($_POST ['phone']));
        $mobile = (filter_var($_POST ['mobile']));
        //     $logotype = (filter_var($_POST['logotype'],FILTER_SANITIZE_STRING));
        $address = (filter_var($_POST ['address']));
        $facebook = (filter_var($_POST ['facebook']));
        $twitter = (filter_var($_POST ['twitter']));
        $linkdin = (filter_var($_POST ['linkdin']));
        $orgEmail = (filter_var($_POST ['orgEmail']));
        $website = (filter_var($_POST ['website']));
        sql($pdo, "INSERT INTO [dbo].[Organization] ([Name],[Phone_Number],[Mobile_Number],[Validate],[Address],[Enabled],[User_Boss],[Facebook],[Twitter],[Linkdin],[Abusive_Organization],[Good_Organization],[Organization_Email],[Website]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($name, $phone, $mobile, 0, $address, 0, $userid, $facebook, $twitter, $linkdin, 0, 0, $orgEmail, $website));
        echo 'Organization added!';
    } catch (Exception $ex) {
        echo 'ERRO';
    }
} else if ($arg === 'viewOrganization') {
    try {
        $id = $_SESSION['Id'];
        $rows = $sql($pdo, "SELECT * FROM [Organization] where [User_Boss] = ? and [Enabled] = 1", array($id), "rows");
        echo "<table><tr><th>ID</th><th>Name</th><th>Boss</th><th>Date Created</th><th>Addres</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['User_Boss'] . "</td>";
            echo "<td>" . $row['Date_Created'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $e) {
        echo 'erros';
    }
} else if ($arg === 'viewOrganizationInformation') {
    try {
        $orgId = $_POST['org'];
        $userId = $_POST['userId'];
        $response = sql($pdo, "SELECT * FROM [Organization] where [User_Boss] = ? and [Id] = ?", array($orgId, $userId), "row");
        echo $response['Id'];
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'viewAllOrganization') {
    try {
        $cont = 0;
        $userid = $_POST['idUser'];
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [User_Boss] = ? and [Enabled] = 1 and [Validate]=1", array($userid), "rows");
        echo '<input type="hidden" name="UserId" value="' . $_POST['User_Boss'] . '"> ';
        //echo '<input type="hidden" name="orgId" value="'.$row['Id'].'"> ';
        echo "<table class='table table-striped' id='mytable'><tr><th> Id </th><th> Name </th><th> Phone Number </th><th> Mobile </th><th> Address </th><th> Facebook </th><th> Twitter </th><th> Linkdin </th> <th>Email</th><th>Website</th><th>Delete</th><th>Edit</th></tr>";
        foreach ($rows as $row) {
            echo "<tr id=" . $cont . ">";
            //echo '<input type="hidden" name="UserId" value="'.$row['User_Boss'].'"> ';
            echo "<td id='OOrg'>" . $row['Id'] . "</td>";
            echo "<td id='OName'>" . $row['Name'] . "</td>";
            echo "<td id='OPhone'>" . $row['Phone_Number'] . "</td>";
            echo "<td id='OMobile'>" . $row['Mobile_Number'] . "</td>";
            echo "<td id='OAddress'>" . $row['Address'] . "</td>";
            echo "<td id='OFacebook'>" . $row['Facebook'] . "</td>";
            echo "<td id='OTwitter'>" . $row['Twitter'] . "</td>";
            echo "<td id='OLinkdin'>" . $row['Linkdin'] . "</td>";
            echo "<td id='OO_Email'>" . $row['Organization_Email'] . "</td>";
            echo "<td id='OWebsite'>" . $row['Website'] . "</td>";
            echo "<td> <input type='button' value='Delete' onClick='removeOrganization(" . $row['Id'] . "," . $userid . ")'> </td>";
            echo "<td> <input type='button' value='Edit' onClick='editOrganizationInformation($cont)'> </td>";
            echo "<tr>";
            $cont += 1;
        }
        echo "</table>";
    } catch (Exception $ex) {
        echo 'erro';
    }
} else if ($arg === 'updateOrganizationInform') {
    try {
        $userid = (filter_var($_POST ['userid']));
        $name = (filter_var($_POST ['name']));
        $phone = (filter_var($_POST ['phone']));
        $mobile = (filter_var($_POST ['mobile']));
        //     $logotype = (filter_var($_POST['logotype'],FILTER_SANITIZE_STRING));
        $address = (filter_var($_POST ['address']));
        $facebook = (filter_var($_POST ['facebook']));
        $twitter = (filter_var($_POST ['twitter']));
        $linkdin = (filter_var($_POST ['linkdin']));
        $orgEmail = (filter_var($_POST ['orgEmail']));
        $website = (filter_var($_POST ['website']));
        $orgId = (filter_var($_POST ['orgId']));
        sql($pdo, "UPDATE [dbo].[Organization]SET [Name] =?, [Phone_Number] = ?, [Mobile_Number] = ?, [Address] = ?,[Facebook] = ? ,[Twitter] = ? ,[Linkdin] = ? , [Organization_Email] = ? ,[Website] = ? WHERE [Organization].[Id] = ?", array($name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $orgId));
        echo 'Organization information as been updated!';
    } catch (Exception $ex) {
        echo 'ERRO';
    }
} else if ($arg === 'readAllUserNewsletter') {
    try {
        $userId = $_SESSION['Id'];
        DB_readAllUserNewsletter($pdo, $userId);
    } catch (Exception $ex) {
        
    }
} else if ($arg === 'removeOrganization') {
    try {
        $id = (filter_var($_POST ['org']));
        //parametro para receber user id
        $userid = $_SESSION['id'];
        if (DB_checkIfOrganizationExistsWithBossId($pdo, $id, $userid)) {
            sql($pdo, "UPDATE [dbo].[Organization] SET [Enabled] = ? where [Id]= ? and [User_Boss] = ?", array(0, $id, $userid));
            echo 'Organization Deleted';
        } else {
            echo 'Erro';
        }
    } catch (Exception $ex) {
        echo 'ERROR REMOVING THE ORGANIZATION!';
    }
} else if ($arg === 'editOrganizationInformation') {
    
} else if ($arg === 'validateOrganization') {
    try {
        $orgId = (filter_var($_POST ['org'], FILTER_SANITIZE_STRING));
        //Falta verificar se é admin.
        sql($pdo, "UPDATE [dbo].[Organization] SET [Validate] = ? , [Enabled] = ? where [Id]=?", array(1, 1, $orgId));
        echo 'Organization In';
    } catch (Exception $ex) {
        echo 'Error';
    }
} else if ($arg === 'orgInformation') {
    $userid = $_SESSION['id'];
    $orgId = (filter_var($_POST ['org'], FILTER_SANITIZE_STRING));
    $row = sql($pdo,"SELECT * FROM [dbo].[Organization] WHERE [Enabled] = 1 and [Validate]=1", array($orgId), "row");
    echo $row['Name'];
    
} else if ($arg === 'assignUserInOrganization') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_STRING));
        if (DB_checkIfOrganizationExists($pdo, $orgId)) {
            if (DB_checkIfUserExists($pdo, $email)) {
                //get id do user pelo email
                $userId = DB_checkUserByEmail($pdo, $email);
                //insere user na organizacao com enabled 0 e user validation 0
                sql($pdo, "INSERT INTO [dbo].[User_In_Organization] ([Organization_Id],[User_Id],[User_Validation],[Enabled],[Responded])VALUES(?,?,?,?,?)", array($orgId, $userId, 0, 0,0));
                echo 'Success';
            } else {
                $to=$email;
                $subject="Invite to join organization";
                $body = "Hi, please resgist on www.wic.club";
                sendEmail($to, $subject, $body);
                //envia convite para o email para se registar.
                echo 'GRRRR';
            }
        } else {
            echo 'Organization ERROR';
        }
    } catch (Exception $ex) {
        
    }
} else if ($arg === 'removeUserInOrganization') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        if (DB_checkIfOrganizationExists($pdo, $orgId)) {
            sql($pdo, "UPDATE [dbo].[User_In_Organization] SET [Enabled] = ? where [Organization_Id] = ? and [User_Id] = ?", array(0, $orgId, $userId));
            echo 'User removed';
        } else {
            echo 'Organization ERROR';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'viewAllUsersInOrganization') {
    try {
        $cont =0;
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $rows = sql($pdo, "SELECT [dbo].[User_In_Organization].[Id] as id ,[Organization].[Name] as orgName
	  ,[User].[Email] as email
      ,[Responded]
  FROM [dbo].[User_In_Organization]
  join [User]
  on [User].[Id] = [User_In_Organization].[User_Id]
  join [Organization]
  on [dbo].[Organization].[Id] = [dbo].[User_In_Organization].[Organization_Id] where [Organization_Id]=? and [dbo].[User_In_Organization].[Enabled] = 1", array($orgId), "rows");
        echo "<table class='table table-striped' id='table'><tr><th>Id org</th><th>Organization Name</th><th>email</th><th>Remove</th></tr>";
        foreach ($rows as $row) {
            $cont += 1;
            echo "<tr id=" . $cont . ">";
            echo "<td >" . $row['id'] . "</td>";
            echo "<td>" . $row['orgName'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td><input type='button' value='Delete' onClick='removeUserInOrganization(" . $row['id'] . ")'></td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $ex) {
        echo 'erro';
    }
} else if ($arg === 'UserValidateInvite') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        $response = (filter_var($_POST ['response'], FILTER_SANITIZE_NUMBER_INT));
        if ($response === "1") {
            $enabled = 1;
        } else {
            $enabled = 0;
        }
        sql($pdo, "UPDATE [dbo].[User_In_Organization] SET [User_Validation]=?,[Enabled]=? Where [User_Id]=? and [Organization_Id]=?", array($response, $enabled, $userId, $orgId));
        echo 'Validate Success';
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'assignOrganizationCategoryOwner') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        //falta adicionar as categorias para inserir o id da categoria[Category_Id]
        if (DB_User_In_Organization($pdo, $userId, $orgId)) {
            //falta a categoria
            if (DB_chekIfUserExistCategoryOwner($pdo, $userId, $orgId)) {
                sql($pdo, "UPDATE [dbo].[Category_Owner] SET [Enabled] = ? where [User_Id] = ? and [Organization_Id] = ? ", array(1, $userId, $orgId));
                echo 'Category owner updated';
            } else {
                sql($pdo, "INSERT INTO [dbo].[Category_Owner]([User_Id],[Enabled],[Organization_Id])VALUES(?,?,?)", array($userId, 1, $orgId));
                echo 'Add Category Owner Success ';
            }
        } else {
            echo 'User not in Organization';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'assignOrganizationSubCategoryOwner') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        //falta adicionar as categorias para inserir o id da categoria[Category_Id]
        if (DB_User_In_Organization($pdo, $userId, $orgId)) {
            //falta a sub categoria
            if (DB_chekIfUserExistSubCategoryOwner($pdo, $userId, $orgId)) {
                sql($pdo, "UPDATE [dbo].[Sub_Category_Owner] SET [Enabled] = ? where [User_Id] = ? and [Organization_Id] = ? ", array(1, $userId, $orgId));
                echo 'Sub Category owner updated';
            } else {
                sql($pdo, "INSERT INTO [dbo].[Sub_Category_Owner]([User_Id],[Organization_Id],[Enabled])VALUES(?,?,?)", array($userId, $orgId, 1));
                echo 'Add Sub Category Owner Success ';
            }
        } else {
            echo 'User not in Organization';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'removeOrganizationCategoryOwner') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        //falta adicionar as categorias para inserir o id da categoria[Category_Id]
        if (DB_User_In_Organization($pdo, $userId, $orgId)) {
            sql($pdo, "UPDATE [dbo].[Category_Owner] SET [Enabled] = ? where [User_Id] = ? and [Organization_Id] = ? ", array(0, $userId, $orgId));
            echo 'Removed Category Owner Success ';
        } else {
            echo 'User not in Organization';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'removeOrganizationSubCategoryOwner') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_STRING));
        //falta adicionar as categorias para inserir o id da categoria[Category_Id]
        if (DB_User_In_Organization($pdo, $userId, $orgId)) {
            sql($pdo, "UPDATE [dbo].[Sub_Category_Owner] SET [Enabled] = ? where [User_Id] = ? and [Organization_Id] = ? ", array(0, $userId, $orgId));
            echo 'Removed Sub Category Owner Success ';
        } else {
            echo 'User not in Organization';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
} else if ($arg === 'editPermissionUserInOrganization') {
    
} else if ($arg === 'removeUserNewsletter') {
    try {
        $idNewsLetter = (filter_var($_POST ['idNews']));
        $userid = $_SESSION['id'];
        $msg = sql($pdo, "UPDATE [dbo].[User_Newsletter] SET [Enabled] = 0 WHERE [User_Id] = ? and [Id]=?", array($userid, $idNewsLetter));
        //DB_readAllUserNewsletter($pdo, $userId);
        echo 'Newsletter removed';
    } catch (Exception $ex) {
        echo 'erro';
    }
} else {
    echo 'lol';
}