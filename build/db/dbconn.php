<?php

include_once './functions.php';

$dbserver = "wicsqlserver.database.windows.net";
$dbport = "1433";
$dbpass = '#$youcandoit2017$#';
$dbuser = "wic";
$db = "WIC";

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

//LOCATIONS
//
//
//
//
//
//DEVOLVE OS COUNTRY PARA SER USADO NA SELECT
function DB_getCountryAsSelect($pdo) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM [dbo].[Country]");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (PDOException $e) {
        echo 'ERROR READING COUNTRY TABLE';
        die();
    }
}

//DEVOLVE OS STATE PARA SEREM USADOS NUMA SELECT <- A PARTIR DO COUNTRY ID
function DB_getStateAsSelectByCountrySelected($pdo, $Country_Id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM State WHERE Country_Id = :countryID ORDER BY Name ASC");
        $stmt->bindParam(':countryID', $Country_Id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (PDOException $e) {
        echo 'ERROR READING STATE TABLE';
        die();
    }
}

//DEVOLVE AS CITIES PARA SEREM USADAS NUMA SELECT <- A PARTIR DO STATE ID
function DB_getCityAsSelectByStateSelected($pdo, $State_Id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM City WHERE State_Id = :stateID ORDER BY Name ASC");
        $stmt->bindParam(':stateID', $State_Id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
    } catch (PDOException $e) {
        echo 'ERROR READING CITY TABLE';
        die();
    }
}

//USER
//
//
//
//
//
//VERIFICA SE O USER JA SE ENCONTRA REGISTADO
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
        echo 'ERROR VALIDATING USER!';
    }
}

//ADICIONA UM USER À BD
function DB_addUser($pdo, $hashPassword, $email, $code) {
    try {
        sql($pdo, "INSERT INTO [dbo].[User] ([Password], [Email], [Account_Enabled],"
                . " [User_Code_Activation], [Login_Failed]) VALUES (?, ?, ?, ?, ?)", array($hashPassword, $email, '0', $code, '0'));
        DB_createProfileOnRegistration($pdo, $email);
        DB_addUserInRole($pdo, $email);
        DB_checkIfInvitationExists($pdo, $email);
        echo 'ACCOUNT CREATED!';
    } catch (PDOException $e) {
        print "ERROR CREATING ACCOUNT!";
        die();
    }
}

//DEVOLVE O ID DO USER ATRAVES DO EMAIL
function DB_getUserId($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['Id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING USER!';
    }
}

//NO REGISTO DO USER CRIA O SEU PERFIL
function DB_createProfileOnRegistration($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    try {
        sql($pdo, "INSERT INTO [dbo].[Profile] ([User_Id], [Enabled], [Picture_Path]) VALUES(?,?, 'http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png')"
                . "", array($userId, 1));
    } catch (PDOException $e) {
        print "ERROR CREATING USER PROFILE!";
        die();
    }
}

//ADICIONA UM ROLE AO USER
function DB_addUserInRole($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    $role = DB_getRoleByName($pdo, 'user');
    try {
        sql($pdo, "INSERT INTO [dbo].[User_In_Role] ([User_Id], [Role_Id], [Enabled]) VALUES(?,?,?)"
                . "", array($userId, $role, 1));
    } catch (PDOException $e) {
        print "ERROR CREATING USER USER IN ROLE!";
        die();
    }
}

//DEVOLVE UM ROLE ATRAVES DO NOME
function DB_getRoleByName($pdo, $name) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[Role] WHERE [Name] = ? AND [Enabled] = 1", array($email), "rows");
        foreach ($rows as $row) {
            return $row['Id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ROLE!';
    }
}

//VERIFICA SE O USER TEM CONVITES
function DB_checkIfInvitationExists($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[Organization_Invites] WHERE [Email] = ? AND [Enabled] = 1", array($email), "rows");
        foreach ($rows as $row) {
            $service = $row['Service_Id'];
            DB_addUserInService($pdo, $email, $service);
        }
    } catch (Exception $exc) {
        echo 'ERROR READING INVITATION!';
    }
}

//VINCULA UM USER A UM SERVIÇO
function DB_addUserInService($pdo, $email, $service) {
    $userId = DB_getUserId($pdo, $email);
    $d = getDateToDB();
    $role = DB_getRoleByName($pdo, 'user');
    try {
        sql($pdo, "INSERT INTO [dbo].[User_Service] ([Service_Id], [User_Id], [Enabled],"
                . "[Data_Assigned], [Validate], [Role_Id]) VALUES(?,?,?,?,?,?)"
                . "", array($service, $userId, 1, $d, 1, $role));
    } catch (PDOException $e) {
        print "ERROR CREATING USER USER IN ROLE!";
        die();
    }
}
