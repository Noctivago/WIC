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
        $stmt = $pdo->prepare("SELECT * FROM [dbo].[Country] ORDER BY NAME ASC");
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
        echo '</select>';
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
        echo '<select id = "citySelect" class="bootstrap-select bootstrap-select-arrow cities" placeholder="City" required>';
        echo '<option value="0">City</option>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
        echo '</select>';
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
    $d = getDateToDB();
    try {
        sql($pdo, "INSERT INTO [dbo].[User] ([Password], [Email], [Account_Enabled],"
                . " [User_Code_Activation], [Login_Failed], [Date_Created]) VALUES (?, ?, ?, ?, ?, ?)", array($hashPassword, $email, '0', $code, '0', $d));
        DB_createProfileOnRegistration($pdo, $email);
        DB_addUserInRole($pdo, $email);
        DB_checkIfInvitationExists($pdo, $email);
        //SE ENVIADO EXIBIR MENSAGEM
        echo DB_sendActivationEmail($email);
    } catch (PDOException $e) {
        print "ERROR CREATING ACCOUNT!";
        die();
    }
}

//DEVOLVE O ID DO USER ATRAVES DO EMAIL
function DB_getUserId($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT [id] FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING USER!';
    }
}

//NO REGISTO DO USER CRIA O SEU PERFIL
function DB_createProfileOnRegistration($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    try {
        sql($pdo, "INSERT INTO [dbo].[User_Profile] ([User_Id], [Enabled], [Picture_Path]) VALUES(?,?, 'http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png')"
                . "", array($userId, 1));
    } catch (PDOException $e) {
        print "ERROR CREATING USER PROFILE!";
        die();
    }
}

//ADICIONA UM ROLE AO USER
function DB_addUserInRole($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    $role = DB_getRoleByName($pdo, "user");
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
        $rows = sql($pdo, "SELECT * FROM [dbo].[Role] WHERE [Name] = ? AND [Enabled] = 1", array($name), "rows");
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
    $role = DB_getRoleByName($pdo, "user");
    try {
        sql($pdo, "INSERT INTO [dbo].[User_Service] ([Service_Id], [User_Id], [Enabled],"
                . "[Data_Assigned], [Validate], [Role_Id]) VALUES(?,?,?,?,?,?)"
                . "", array($service, $userId, 1, $d, 0, $role));
    } catch (PDOException $e) {
        print "ERROR CREATING USER USER IN ROLE!";
        die();
    }
}

//ENVIA MAIL COM INSTRUÇAO DE ATIVACAO DE CONTA
function DB_sendActivationEmail($email) {
    include_once './mailSend.php';
    $msg = "ACCOUNT INFORMATION IS BEING SENT! PLEASE WAIT!";
    $to = $email;
    $subject = "WIC #ACCOUNT CONFIRMATION";
    $body = "Hi! <br>"
            . "To start using our services you need to validate your email.<br>"
            . "Please use the following code to do that: " . $code . "<br>"
            . "You can activate your account in the following address: http://www.wic.club/<br>"
            . "Best regards,<br>"
            . "WIC<br><br>"
            . "Note: Please do not reply to this email! Thanks!";
    return sendEmail($to, $subject, $body);
}

//RECOVERY PASSWORD
function DB_resetPassword($pdo, $email) {
    //include_once './functions.php';
    $newPass = md5(uniqid(mt_rand(), true));
    $hashPassword = hash('whirlpool', $newPass);
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Password] = ? WHERE [Email] = ? ", array($hashPassword, $email));
        $to = $email;
        $subject = "WIC #ACCOUNT CONFIRMATION";
        $body = "Hi! <br>"
                . "PEDISTE PASSWOD.<br>"
                . "NEW PASSWORD: " . $newPass . "<br>"
                . "Best regards,<br>"
                . "WIC<br><br>"
                . "Note: Please do not reply to this email! Thanks!";
        sendEmail($to, $subject, $body);
        return "AN EMAIL AS SENT WITH A NEW PASSWORD!";
    } catch (Exception $exc) {
        return false;
    }
}

//EMAIL SEND
function sendEmail($to, $subject, $body) {
    #error_reporting(E_STRICT);
    #configura o fuso horario
    date_default_timezone_set('Europe/Lisbon');
    #faz os includes necessarios das bibliotecas
    include_once './class.phpmailer.php';
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

//ADICIONA UMA ORG À BD
function DB_addOrg($pdo, $hashPassword, $email, $code, $city) {
    $d = getDateToDB();
    try {
        sql($pdo, "INSERT INTO [dbo].[User] ([Password], [Email], [Account_Enabled],"
                . " [User_Code_Activation], [Login_Failed], [Date_Created]) VALUES (?, ?, ?, ?, ?, ?)", array($hashPassword, $email, '0', $code, '0', $d));
        //DB_createORG <- MISSING;

        DB_addOrgInRole($pdo, $email);
        //SE ENVIADO EXIBIR MENSAGEM
        echo DB_sendActivationEmail($email);
    } catch (PDOException $e) {
        print "ERROR CREATING ACCOUNT!";
        die();
    }
}

//ADICIONA UM ROLE A ORG
function DB_addOrgInRole($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    $role = DB_getRoleByName($pdo, "organization");
    try {
        sql($pdo, "INSERT INTO [dbo].[User_In_Role] ([User_Id], [Role_Id], [Enabled]) VALUES(?,?,?)"
                . "", array($userId, $role, 1));
    } catch (PDOException $e) {
        print "ERROR CREATING ORG USER IN ROLE!";
        die();
    }
}
