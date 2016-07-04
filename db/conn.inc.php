<?php

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

function DB_getCityOnSelect($pdo) {
    $id = 0;
    $rows = sql($pdo, "SELECT * FROM [dbo].[City] WHERE [Id] > ?", array($id), "rows");
    foreach ($rows as $row) {
        echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        //echo $row['Id'] . ">" . $row['Name'];
    }
}

function DB_getCityOnSelectByCityName($pdo, $cityName) {
    $rows = sql($pdo, "SELECT * FROM [dbo].[City] WHERE [Name] Like ?%", array($cityName), "rows");
    foreach ($rows as $row) {
        echo "<option value=" . $row['Name'] . "></option>";
    }
}

function DB_getPermissions($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT * FROM [dbo].[Permission] WHERE [Id] > ?", array('0'), "rows");
        echo "<table><tr><th>ID</th><th>Name</th><th>Enabled?</th><th>Organization?</th></tr>";
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
        echo "<table><tr><th>ID</th><th>Name</th><th>Enabled?</th></tr>";
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
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
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

function DB_getSubCategoryAsTable($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Category_Id]
      ,[Enabled]
        FROM [dbo].[Sub_Category] WHERE [Id] > ?", array('0'), "rows");
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY TABLE';
    }
}

function DB_getSubCategoryAsSelect($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Category_Id]
      ,[Enabled]
        FROM [dbo].[Sub_Category] WHERE [Id] > ?", array('0'), "rows");
        echo '<select>';
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
        echo '</select>';
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY TABLE';
    }
}

function DB_getServiceAsSelect($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Description]
      ,[Enabled]
      ,[Sub_Category_Id]
  FROM [dbo].[Service] WHERE [Id] > ?", array('0'), "rows");
        echo '<select>';
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
        echo '</select>';
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY TABLE';
    }
}

function DB_getServiceAsTable($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Description]
      ,[Enabled]
      ,[Sub_Category_Id]
  FROM [dbo].[Service] WHERE [Id] > ?", array('0'), "rows");
        echo "<table><tr><th>ID</th><th>Name</th><th>Description</th><th>SubCategory</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            echo "<td>" . $row['Sub_Category_Id'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY TABLE';
    }
}

function DB_getCountryAsSelect($pdo) {
    try {
        //$id = 0;
        $rows = sql($pdo, "SELECT [Id]
      ,[Name]
      ,[Enabled]
      FROM [dbo].[Country] WHERE [Id] > ? AND [Enabled] > ?", array('0', '0'), "rows");
        echo '<select>';
        foreach ($rows as $row) {
            echo "<option value=" . $row['Id'] . ">" . $row['Name'] . "</option>";
        }
        echo '</select>';
    } catch (Exception $exc) {
        echo 'ERROR READING COUNTRY TABLE';
    }
}
