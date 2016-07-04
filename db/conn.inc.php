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
        echo '';
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

function DB_User_In_Organization($pdo, $userId, $orgId) {
    try {
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

function DB_updateUserProfile($pdo, $userId, $fname, $lname, $picture, $picturePath, $cityId, $languageId) {
    try {
        //UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? 
        $count = sql($pdo, "UPDATE [dbo].[Profile] SET"
                . " [First_Name] = ?"
                . " [Last_Name] = ? "
                . " [Picture] = ? "
                . " [Picture_Path] = ? "
                . " [City_Id] = ? "
                . " [Language_Id] = ? "
                . " Where [User_Id] = ?", array($fname, $lname, $picture, $picturePath, $cityId, $languageId, $userId));
        return true;
    } catch (Exception $ex) {
        return false;
    }
}

function DB_addUserProfile($pdo, $userId, $fname, $lname, $picture, $picturePath, $cityId, $languageId) {
    //sql($pdo, "INSERT INTO [dbo].[User] ([Username], [Password], [Email], [Account_Enabled], [User_Code_Activation], [Login_Failed]) VALUES (?, ?, ?, ?, ?, ?)", array($username, $hashPassword, $email, '0', $code, '0'));
    try {
        sql($pdo, "INSERT INTO [dbo].[Profile] ([First_Name], [Last_Name], [Picture], [Picture_Path], [User_Id], [City_Id], [Language_Id]) "
                . "VALUES (?, ?, ?, ?, ?, ?, ?)", array($fname, $lname, $picture, $picturePath, $userId, $cityId, $languageId));
        return true;
    } catch (Exception $exc) {
        return false;
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
        echo '<select>';
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
        echo '</select>';
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

function DB_addOrganization($pdo, $userid, $name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $orgEmail, $website, $d) {
    try {
        #$d = getDateToDB();
        #sql($pdo, "INSERT INTO [dbo].[Organization] ([Name],[Phone_Number],[Mobile_Number],[Validate],[Address],[Enabled],[User_Boss],[Facebook],[Twitter],[Linkdin],[Abusive_Organization],[Good_Organization],[Organization_Email],[Website], [Date_Created]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($name, $phone, $mobile, 0, $address, 0, $userid, $facebook, $twitter, $linkdin, 0, 0, $orgEmail, $website, $d));
        sql($pdo, "INSERT INTO [dbo].[Organization] ([Name],[Phone_Number],[Mobile_Number],[Validate],[Address],[Enabled],[User_Boss],[Facebook],[Twitter],[Linkdin],[Abusive_Organization],[Good_Organization],[Organization_Email],[Website], [Date_Created]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($name, $phone, $mobile, 0, $address, 0, $userid, $facebook, $twitter, $linkdin, 0, 0, $orgEmail, $website, $d));
        echo 'Organization added!';
    } catch (Exception $exc) {
        echo 'ERROR INSERTING ORGANIZATION';
    }
}

function DB_readOrganizationAsTable($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [Id] > ? and [Enabled] = 1 and [Validate]= 1 and [User_Boss] = ?", array($id, $userId), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Date Created</th><th>Address</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            #echo "<td>" . $row['User_Boss'] . "</td>";
            echo "<td>" . $row['Date_Created'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION TABLE';
    }
}

function DB_readOrganizationAsSelect($pdo, $userId) {
    try {
        $id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization] WHERE [Id] > ? and [Enabled] = 1 and [Validate]= 1 and [User_Boss] = ?", array($id, $userId), "rows");
        foreach ($rows as $row) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
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
                . " VALUES(?,?,?,?,?,?,?,?)", array($name, $description, $org, $d, 0, 0, $subCategory, $city));
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
    where [Organization].[User_Boss] = ? and [Organization_Service].[Enabled] = 1", array($userId), "rows");
        foreach ($rows as $row) {
            echo "<option value='" . htmlspecialchars($row['OSI']) . "'>" . htmlspecialchars($row['OSNAME']) . "</option>";
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ORGANIZATION SERVICE TABLE';
    }
}

function DB_addOrganizationServiceBook($pdo, $name, $description, $d, $orgSerId) {
    try {
        sql($pdo, "INSERT INTO [dbo].[Organization_Service_Book] ([Name], [Description], [Organization_Service_Id], [Date_Created], [Enabled]"
                . "VALUES(?,?,?,?,?)", array($name, $description, $orgSerId, $d, 1));
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
  where [Organization].[User_Boss] = ?", array($userId), "rows");
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
