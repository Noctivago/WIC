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
            #echo 'Email already registed!';
            return true;
        } else {
            #echo 'Email Registed';
            #echo $count;
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

//sql($db, "UPDATE table SET name = ? WHERE id = ?", array($name, $id));

function DB_activateUserAccount($pdo, $email) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? ", array('1', $email), "count");
        //IF EXISTS -1
        if ($count < 0) {
            #echo 'Email already registed!';
            return true;
        } else {
            #echo 'Email Registed';
            #echo $count;
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_getActivationCode($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['User_Code_Activation'];
        }
    } catch (Exception $exc) {
        echo '';
    }
}
