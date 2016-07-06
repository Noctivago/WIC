<?php

include_once './db/conn.inc.php';

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
} else if ($arg === 'viewAllOrganization') {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [Id] > ? and [Enabled] = 1 and [Validate]=1", array($id), "rows");
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
    } catch (Exception $ex) {
        echo 'fuck';
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
} else if ($arg === 'assignUserInOrganization') {
    try {
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST ['email'], FILTER_SANITIZE_STRING));
        if (DB_checkIfOrganizationExists($pdo, $orgId)) {
            if (DB_checkIfUserExists($pdo, $email)) {
                //get id do user pelo email
                $userId = DB_checkUserByEmail($pdo, $email);
                //insere user na organizacao com enabled 0 e user validation 0
                sql($pdo, "INSERT INTO [dbo].[User_In_Organization] ([Organization_Id],[User_Id],[User_Validation],[Enabled])VALUES(?,?,?,?)", array($orgId, $userId, 0, 0));
                echo 'Success';
            } else {
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
        $orgId = (filter_var($_POST ['orgId'], FILTER_SANITIZE_STRING));
        $rows = sql($pdo, "SELECT * FROM [User_In_Organization] Where [Organization_ID]=? and [Enabled]=1", array($orgId), "rows");
        echo "<table><tr><th>ID</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['User_Id'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $ex) {
        echo 'erro sdadasdasdas';
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
    
} else {
    echo 'lol';
}