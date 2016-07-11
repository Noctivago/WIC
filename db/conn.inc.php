<?php

#include_once './functions.php';

$dbserver = "wicsqlserver.database.windows.net";
$dbport = "1433";
$dbpass = '#$youcandoit2017$#';
$dbuser = "wic";
$db = "wicdb";

try {
    $pdo = new PDO("sqlsrv:server=$dbserver; Database=$db", "$dbuser", "$dbpass");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    if ($pdo == false) {
        echo "Redirect to 404!";
    } else {
#echo "Connected!";
    }
} catch (Exception $e) {
    echo("Error -> IP NOT ALLOWED!");
}

// Simple function to handle PDO prepared statements
function sql($pdo, $q, $params, $return) {

    try {

// Prepare statement
        $stmt = $pdo->prepare($q);
// Execute statement
        $stmt->execute($params);
// Decide whether to return the rows themselves, or just count the rows
        if ($return == "rows") {
            return $stmt->fetchAll();
        } elseif ($return == "row") {
            return $stmt->featch();
        } elseif ($return == "count") {
            return $stmt->rowCount();
        }
    } catch (Exception $exc) {
        return '';
    }
}

function DB_checkIfUserExists($pdo, $email) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? ", array($email), "count");
//IF EXISTS -1
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_checkIfUserPasswordIsCorrect($pdo, $password, $userId) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Password] = ? AND [Id] = ?", array($password, $userId), "count");
//IF EXISTS -1
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_checkIfUserEnabled($pdo, $email) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? AND [Account_Enabled] = ?", array($email, 1), "count");
//IF EXISTS -1
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

//sql($db, "UPDATE table SET name = ? WHERE id = ?", array($name, $id));

function DB_activateUserAccount($pdo, $email) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? ", array('1', $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

function DB_compareActivationCode($pdo, $email, $code) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? AND [User_Code_Activation] = ?", array($email, $code), "count");
//IF EXISTS -1
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_setLoginFailed($pdo, $email, $value = '0') {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Login_Failed] = ? WHERE [Email] = ? ", array($value, $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

function DB_setUserPasword($pdo, $email, $password) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Password] = ? WHERE [Email] = ? ", array($password, $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

function DB_getLoginFailedValue($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['Login_Failed'];
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_setBlockAccount($pdo, $email) {
    try {
//GERA NOVO CODIGO PARA ATIVAR CONTA -> ENVIA EMAIL
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? ", array('0', $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

function DB_checkIfOrganizationExistsWithBossId($pdo, $id, $userId) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[Organization] Where [Id]=? and [User_Boss]=?", array($id, $userId), "count");
        if ($count < 0) {
            return true;
        } else
            return false;
    } catch (Exception $ex) {
        
    }
}

function DB_checkIfOrganizationExists($pdo, $id) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[Organization] Where [Id]=?", array($id), "count");
        if ($count < 0) {
            return true;
        } else
            return false;
    } catch (Exception $ex) {
        
    }
}

function DB_checkUserByEmail($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['Id'];
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_User_In_Organization($pdo, $orgId) {
    try {
        $userId = $_SESSION['id'];
        $count = sql($pdo, "SELECT * FROM [User_In_Organization] Where [User_Id] = ? and [Organization_Id] = ? and [Enabled] = 1", array($userId, $orgId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo 'Erro';
    }
}

function DB_chekIfUserExistCategoryOwner($pdo, $userId, $orgId) {
    try {
        $count = sql($pdo, "SELECT * FROM [Category_Owner] Where [User_Id] = ? and [Organization_Id] = ?", array($userId, $orgId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        echo 'Erro';
    }
}

function DB_chekIfUserExistSubCategoryOwner($pdo, $userId, $orgId) {
    try {
        $count = sql($pdo, "SELECT * FROM [Sub_Category_Owner] Where [User_Id] = ? and [Organization_Id] = ?", array($userId, $orgId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        echo 'Erro';
    }
}

function DB_chekIfUserProfileExist($pdo, $userId) {
    try {
        $count = sql($pdo, "SELECT * FROM [Profile] Where [User_Id] = ?", array($userId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        echo 'Erro';
    }
}

function DB_getCityAsSelect($pdo) {
    $rows = sql($pdo, "  SELECT [City].[Id] CID
      ,[City].[Name] AS CNAME
      ,[City].[Enabled]
      ,[City].[Number_of_Research]
      ,[Country_Id]
	  ,[Country].[Name] CONAME
  FROM [dbo].[City]
  join [Country]
  on [Country].[Id] = [City].[Country_Id]
  where [City].[Enabled]=1 and [Country].[Enabled] = ?", array('1'), "rows");
    foreach ($rows as $row) {
        echo "<option value=" . $row['CID'] . ">" . $row['CONAME'] . '-' . $row['CNAME'] . "</option>";
//echo $row['Id'] . ">" . $row['Name'];
    }
}

function DB_getCityAsSelectByCityName($pdo, $cityName) {
    $rows = sql($pdo, "SELECT * FROM [dbo].[City] WHERE [Name] Like ?%", array($cityName), "rows");
    foreach ($rows as $row) {
        echo "<option value=" . $row['Name'] . "></option>";
    }
}

function DB_getPermissions($pdo) {
    try {
//$id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Permission] WHERE [Id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Enabled?</th><th>Organization?</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Enabled'] . "</td>";
            echo "<td>" . $row['Organization'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING PERMISSIONS';
    }
}

function DB_getRoles($pdo) {
    try {
//$id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Role] WHERE [Id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Enabled?</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Enabled'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ROLES';
    }
}

function DB_getCategoryAsTable($pdo) {
    try {
//$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Image]
      ,[Image_Path]
      ,[Enabled]
        FROM [dbo].[Category] WHERE [Id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING CATEGORY TABLE';
    }
}

function DB_getCategoryAsSelect($pdo) {
    try {
//$id = 0;
        $rows = sql($pdo, "SELECT [Id]
        ,[Name]
        ,[Image]
        ,[Image_Path]
        ,[Enabled]
        FROM [dbo].[Category] WHERE [Id] > ?", array('0'), "rows");
#echo '<select>';
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
#echo '</select>';
    } catch (Exception $exc) {
        echo 'ERROR READING CATEGORY TABLE';
    }
}

function DB_getCountryAsSelect($pdo) {
    try {
//global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Country ORDER BY Name ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
#$dbh = null;
    } catch (PDOException $e) {
        echo 'ERROR READING COUNTRY TABLE';
        die();
    }
}

function DB_getStateAsSelect($pdo) {
    try {
//global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM State ORDER BY Name ASC");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
#$dbh = null;
    } catch (PDOException $e) {
        echo 'ERROR READING COUNTRY TABLE';
        die();
    }
}

function DB_getStateAsSelectByCountryId($pdo, $idCountry) {
    try {
//global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM State WHERE Country_Id = :countryID ORDER BY Name ASC");
        $stmt->bindParam(':countryID', $idCountry);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
#$dbh = null;
    } catch (PDOException $e) {
        echo 'ERROR READING CITY TABLE';
        die();
    }
}

function DB_getCityAsSelectByCountryId($pdo, $idState) {
    try {
//global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM City WHERE State_Id = :stateID ORDER BY Name ASC");
        $stmt->bindParam(':stateID', $idState);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
#$dbh = null;
    } catch (PDOException $e) {
        echo 'ERROR READING CITY TABLE';
        die();
    }
}

function DB_addOrganization($pdo, $userid, $orgId, $name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $d) {
    try {
        if ($orgId === '0') {
            sql($pdo, "INSERT INTO [dbo].[Organization] ([Name],[Phone_Number],[Mobile_Number],[Validate],[Address],[Enabled],[User_Boss],[Facebook],[Twitter],[Linkdin],[Abusive_Organization],[Good_Organization],[Organization_Email],[Website], [Date_Created]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($name, $phone, $mobile, 0, $address, 0, $userid, $facebook, $twitter, $linkdin, 0, 0, $orgEmail, $website, $d));
            // echo 'Organization added!';
        } else {
            sql($pdo, "UPDATE [dbo].[Organization]SET [Name] =?, [Phone_Number] = ?, [Mobile_Number] = ?, [Address] = ?,[Facebook] = ? ,[Twitter] = ? ,[Linkdin] = ? , [Organization_Email] = ? ,[Website] = ? WHERE [Organization].[Id] = ?", array($name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $orgId));
            // echo 'Organization information as been updated!' . $orgId;
        }
    } catch (Exception $exc) {
        echo 'ERROR INSERTING ORGANIZATION';
    }
}

function DB_readOrganizationAsTable($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [Id] > ? and [Enabled] = 1 and [Validate]= 1 and [User_Boss] = ?", array($id, $userId), "rows");
        echo "<table class='table table-striped' id='table-org'><tr><th>ID</th><th>Name</th><th>Date Created</th><th>Address</th></th><th>Delete</th></tr>";
        $cont = 1;
        foreach ($rows as $row) {
            $cont = +1;
            echo "<tr id='" . $cont . "'>";
            echo "<td id='Id" . $cont . "' type='text'>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
#echo "<td>" . $row['User_Boss'] . "</td>";
            echo "<td>" . $row['Date_Created'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td> <input type='button' value='Delete' onClick='removeOrganization(" . $row['Id'] . ")'> </td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION TABLE';
    }
}
function DB_addUserInOrganization($pdo,$email,$idOrg){
    try {
        if(DB_checkIfUserExists($pdo, $email)){
            $userId = DB_checkUserByEmail($pdo, $email);
            $msg = sql($pdo,"NSERT INTO [dbo].[User_In_Organization] ([Organization_Id],[User_Id],[Enabled],[Responded]) VALUES(?,?,?,?) ", array($idOrg,$userId,0,0));
            echo 'Invitation send';
        }  else {
            $to = $email;
            $subject = "WIC #INVITATION";
            $body = "Hi! <br>"
                    . "Please regist on www.Wic.club";
            sendEmail($to, $subject, $body);
            echo 'email send';
        }
    } catch (Exception $ex) {
        
    }
}
function DB_readOrganizationAsSelect($pdo, $userId) {
    try {
        $id = 0;
        $cont = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [Id] > ? and [Enabled] = 1 and [Validate]= 1 and [User_Boss] = ?", array($id, $userId), "rows");
        echo "<option id ='orgId' value='0'> Choose a organization</option>";
        foreach ($rows as $row) {
            echo "<option id ='orgId' value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION TABLE';
    }
}

function DB_readSubCategoryAsSelect($pdo) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Sub_Category]"
                . "WHERE [dbo].[Sub_Category].[Enabled] = ?", array('1'), "rows");
        foreach ($rows as $row) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY TABLE';
    }
}

function DB_addOrganizationService($pdo, $name, $description, $org, $subCategory, $city, $d) {
    try {
        sql($pdo, "INSERT INTO [dbo].[Organization_Service] ([Name],[Description],[Organization_Id],"
                . "[Date_Created],[Enabled],[Views],[Sub_Category_Id],[City_Id])"
                . " VALUES(?,?,?,?,?,?,?,?)", array($name, $description, $org, $d, 0, 1, $subCategory, $city));
        echo 'Organization Service added!';
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

//GET SERVICE AS TABLE WHERE ORGANIZATION BELONGS TO USER
function DB_readOrganizationServiceAsTable($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT [Organization_Service].[Id] AS OSI, [Organization_Service].[Name] AS OSNAME, [Organization_Service].[Description] AS OSDES  FROM [dbo].[Organization_Service]
    join [Organization]
    on [Organization_Id] = [Organization].[Id]
    where [Organization].[User_Boss] = ? and [Organization_Service].[Enabled] = 1", array($userId), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Description</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['OSI'] . "</td>";
            echo "<td>" . $row['OSNAME'] . "</td>";
            echo "<td>" . $row['OSDES'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION SERVICE TABLE';
    }
}

function DB_readOrganizationServiceAsSelect($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT [Organization_Service].[Id] AS OSI, [Organization_Service].[Name] AS OSNAME, [Organization_Service].[Description] AS OSDES  FROM [dbo].[Organization_Service]
    join [Organization]
    on [Organization_Id] = [Organization].[Id]
    where [Organization].[User_Boss] = ? and [Organization_Service].[Enabled] = 1 and [Organization].[Enabled] = 1", array($userId), "rows");
        foreach ($rows as $row) {
            echo "<option value='" . htmlspecialchars($row['OSI']) . "'>" . htmlspecialchars($row['OSNAME']) . "</option>";
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION SERVICE TABLE';
    }
}

function DB_addOrganizationServiceBook($pdo, $name, $description, $d, $orgSerId) {
    try {
        sql($pdo, "INSERT INTO [dbo].[Organization_Service_Book] ([Name], [Description], [Organization_Service_Id], [Date_Created], [Enabled]) VALUES(?,?,?,?,?)", array($name, $description, $orgSerId, $d, 1));
        echo 'Organization Service Book added!';
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

function DB_readOrganizationServiceBookAsTable($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT [Organization_Service_Book].[Id] AS OSBID
      ,[Organization_Service_Book].[Name] AS OSBNAME
      ,[Organization_Service_Book].[Description] AS OSBDES
      ,[Organization_Service_Book].[Enabled]
      ,[Organization_Service_Book].[Date_Created]
      ,[Organization_Service_Id]
  FROM [dbo].[Organization_Service_Book]
  join [Organization_Service]
  on [Organization_Service].[Id] = [Organization_Service_Book].[Organization_Service_Id]
  join [Organization]
  on [Organization].[Id] = [Organization_Service].[Organization_Id]
  where [Organization].[User_Boss] = ? and [Organization].[Enabled] = 1", array($userId), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Description</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['OSBID'] . "</td>";
            echo "<td>" . $row['OSBNAME'] . "</td>";
            echo "<td>" . $row['OSBDES'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION SERVICE BOOK TABLE';
    }
}

function addNewsLetterPlatform($pdo, $userId) {
//FALTA VERIFICAR SE JA EXISTE
    try {
        sql($pdo, "INSERT INTO [dbo].[Plataform_Newsletter] ([User_Id], [Newsletter_ID], [Enabled]) VALUES(?,?,?)"
                . "", array($userId, 1, 1));
        echo 'Sucessufuly added to Plataform Newsletter!';
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

function DB_checkIfUserNewsletterExists($pdo, $userId, $subcategoryId, $cityId) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User_Newsletter] WHERE [User_Id]=? and [Sub_Category_Id]=? and [City_Id]=? and [Enabled]=?", array($userId, $subcategoryId, $cityId, 1), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

function DB_readAllUserNewsletter($pdo, $userId) {
    $rows = sql($pdo, "SELECT [dbo].[User_Newsletter].[Id],[dbo].[Sub_Category].[Name] AS Sub_Name ,[dbo].[City].[Name] AS City_Name FROM [dbo].[User_Newsletter] join [dbo].[City] on [dbo].[City].[Id] = [dbo].[User_Newsletter].[City_Id] join [dbo].[Sub_Category] on [dbo].[Sub_Category].[Id] = [dbo].[User_Newsletter].[Sub_Category_ID] where [dbo].[User_Newsletter].[User_Id] = ? and [dbo].[User_Newsletter].[Enabled] = 1", array($userId), "rows");
    echo "<table class='table table-striped'><tr><<th>Sub Category</th><th>City</th><th>Delete</th></tr>";
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['Sub_Name'] . "</td>";
        echo "<td>" . $row['City_Name'] . "</td>";
        echo "<td> <input type='button' value='Delete' onClick='removeUserNewsletter(" . $row['Id'] . ")'> </td>";
        echo "<tr>";
    }
    echo "</table>";
}

function DB_addUserNewsletter($pdo, $subCategoryId, $cityId, $userId) {
    try {
        if (DB_checkIfUserNewsletterExists($pdo, $userId, $subCategoryId, $cityId)) {
            
        } else {
            sql($pdo, "INSERT INTO [dbo].[User_Newsletter] ([Sub_Category_Id], [City_Id], [User_Id], [Enabled], [Newsletter_Id]) VALUES(?,?,?,?,?)", array($subCategoryId, $cityId, $userId, 1, 1));
            echo 'Newsletter added';
        }
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

function DB_addWicPlanner($pdo, $name, $city, $userId, $d, $eventDate) {
    try {
        sql($pdo, "INSERT INTO [dbo].[WIC_Planner] ([Name], [City_Id], [User_Id], [Date_Created], [Enabled], [Event_Date]) VALUES(?,?,?,?,?,?)"
                . "", array($name, $city, $userId, $d, 1, $eventDate));
        echo 'WIC Planner added!';
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

//GET SERVICE AS TABLE WHERE ORGANIZATION BELONGS TO USER
function DB_readOrganizationServiceAsTableWithQuery($pdo, $name, $Sub_Category_Id, $City_id) {
    try {
//IF
//IF
//IF
        $rows = sql($pdo, "", array($name, $Sub_Category_Id, $City_id), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Description</th><th>Category</th><th>City</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['OSI'] . "</td>";
            echo "<td>" . $row['OSNAME'] . "</td>";
            echo "<td>" . $row['OSDES'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION SERVICE TABLE';
    }
}

#função que procede ao envio de um Email
#function sendEmail($address, $mail_subject, $mail_body) {

function sendEmail($to, $subject, $body) {
#error_reporting(E_STRICT);
#configura o fuso horario
    date_default_timezone_set('Europe/Lisbon');
#faz os includes necessarios das bibliotecas
    require_once('../mail/class.phpmailer.php');
#cria uma nova instancia do PHPMailer
    $mail = new PHPMailer();
    $mail->IsSMTP(); // telling the class to use SMTP
#$mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = "iberweb4a.ibername.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username = "donotreply@wic.club";  // GMAIL username
    $mail->Password = '#$youcandoit2017$#';            // GMAIL password
    $mail->SetFrom('donotreply@wic.club', 'WIC #Please do not reply!');
    $mail->AddReplyTo("donotreply@wic.club", "WIC");
    $mail->Subject = $subject;
#$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
    $mail->MsgHTML($body);
    $mail->AddAddress($to);
    if (!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}

function DB_changeUserPassword($pdo, $email, $password) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Password] = ? WHERE [Email] = ? ", array($password, $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

function DB_addUserProfilePicture($pdo, $pic, $userId) {
    try {
        sql($pdo, "UPDATE [dbo].[Profile] SET [Picture_Path] = ? WHERE [User_Id] = ?", array($pic, $userId));
        echo 'Picture sucessufully changed!';
    } catch (PDOException $e) {
        echo "ERROR UPDATING PROFILE PICTURE!";
#die();
    }
}

function DB_getUserProfilePicture($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT [Picture_Path] FROM [dbo].[Profile] WHERE [User_Id] = ?", array($userId), "rows");
        foreach ($rows as $row) {
            if ($row['Picture_Path'] == NULL) {
                #return '<img src="' . $row['Picture_Path'] . '" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">';
                return '<img src="http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">';
            } else {
                return '<img src="' . $row['Picture_Path'] . '" class="avatar img-circle img-thumbnail text-center center-block" alt="avatar">';
            }
        }
    } catch (Exception $exc) {
        echo 'ERROR READING PROFILE PICTURE!';
    }
}

function DB_createProfileOnRegistration($pdo, $email) {
    $userId = DB_checkUserByEmail($pdo, $email);
    try {
        sql($pdo, "INSERT INTO [dbo].[Profile] ([User_Id], [Enabled], [Picture_Path]) VALUES(?,?, 'http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png')"
                . "", array($userId, 1));
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

function DB_updateUserAccountActivationCode($pdo, $email, $code) {
    $userId = DB_checkUserByEmail($pdo, $email);
    try {
        sql($pdo, "UPDATE [dbo].[User] SET [User_Code_Activation] = ? WHERE [Id] = ?", array($code, $userId));
    } catch (PDOException $e) {
        print "Error!" . "<br/>";
        die();
    }
}

function DB_getUserProfileInfo($pdo, $UserId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM [dbo].[Profile] WHERE [User_Id]=:id");
        $stmt->bindParam(':id', $UserId);
        $stmt->execute();
        #$dbh = null;
        $userInfo = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $userInfo["Id"] = $row["Id"];
            $userInfo["First_Name"] = $row["First_Name"];
            $userInfo["Last_Name"] = $row["Last_Name"];
//            $userInfo["Country_Id"] = $row["Country_Id"];
        }
        return $userInfo;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
        #die();
    }
}

#function DB_updateUserProfile($pdo, $fname, $lname, $countryId, $userId) {

function DB_updateUserProfile($pdo, $fname, $lname, $userId) {
    try {
        #sql($pdo, "UPDATE [dbo].[Profile] SET [First_Name] = ? , [Last_Name] = ? , [Country_Id] = ? WHERE [User_Id] = ?", array($fname, $lname, $countryId, $userId));
        sql($pdo, "UPDATE [dbo].[Profile] SET [First_Name] = ? , [Last_Name] = ? WHERE [User_Id] = ?", array($fname, $lname, $userId));
        echo 'PROFILE UPDATED!';
    } catch (PDOException $e) {
        echo "ERROR UPDATING PROFILE!";
#die();
    }
}

//function DB_getCountryAsSelectWithSelected($pdo, $userId) {
//    try {
//        $CID;
//        $stmt = $pdo->prepare("SELECT * FROM [dbo].[Profile] WHERE [User_Id]=:id");
//        $stmt->bindParam(':id', $userId);
//        $stmt->execute();
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $CID = $row["Country_Id"];
//        }
//        //LE PAISES E IGNORA O QUE FOR IGUAL
//        //NO FIM FAZER APPEND AO SELECT
//        $stmt = $pdo->prepare("SELECT * FROM Country ORDER BY Name ASC");
//        $stmt->execute();
//        while ($row = $stmt->fetch(PDO::FETCH())) {
//            if ($CID == $row['Id']) {
//                // <option value="audi" selected>Audi</option>
//                echo "<option value='" . htmlspecialchars($row['Id']) . "' selected>" . htmlspecialchars($row['Name']) . "</option>";
//            } else {
//                echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
//            }
//        }
//    } catch (PDOException $e) {
//        echo "ERROR UPDATING PROFILE!";
//    }
//}

function DB_getWicPlannerAsSelect($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT [Id]
        ,[Name]
        FROM [dbo].[WIC_Planner] WHERE [Id] > ? AND [User_Id] = ? AND [Enabled] = ?", array(0, $userId, 1), "rows");
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
    } catch (Exception $exc) {
        echo 'ERROR READING WIC PLANNER TABLE';
    }
}
