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
/**
 * DEVOLVE OS COUNTRY PARA SER USADO NA SELECT
 * @param type $pdo
 */
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

/**
 * DEVOLVE OS STATE PARA SEREM USADOS NUMA SELECT <- A PARTIR DO COUNTRY ID
 * @param type $pdo
 * @param type $Country_Id Id do Country
 */
function DB_getStateAsSelectByCountrySelected($pdo, $Country_Id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM State WHERE Country_Id = :countryID ORDER BY Name ASC");
        $stmt->bindParam(':countryID', $Country_Id);
        $stmt->execute();
        echo '<select id = "stateSelect" name="stateSelect" class="states bootstrap-select bootstrap-select-arrow" placeholder="City" onchange="myFunctionC()" required>';
        echo '<option value="0">State</option>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . htmlspecialchars($row['Id']) . "'>" . htmlspecialchars($row['Name']) . "</option>";
        }
        echo '</select>';
    } catch (PDOException $e) {
        echo 'ERROR READING STATE TABLE';
        die();
    }
}

/**
 * DEVOLVE AS CITIES PARA SEREM USADAS NUMA SELECT
 * @param type $pdo
 * @param type $State_Id StateId
 */
function DB_getCityAsSelectByStateSelected($pdo, $State_Id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM City WHERE State_Id = :stateID ORDER BY Name ASC");
        $stmt->bindParam(':stateID', $State_Id);
        $stmt->execute();
        echo '<select id = "citySelect" name="citySelect" class="cities bootstrap-select bootstrap-select-arrow" placeholder="City" required>';
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
/**
 * Verifica se o User ja existe
 * @param type $pdo
 * @param type $email Email para verificação
 * @return boolean Devolve T or F
 */
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

/**
 * Adiciona um User à BD
 * @param type $pdo
 * @param type $hashPassword password
 * @param type $email Email do User
 * @param type $code Codigo para ativação
 */
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

/**
 * ATIVA A CONTA DE UM USER
 * @param type $pdo
 * @param type $email Ativa um user a partir do seu email
 * @return boolean
 */
function DB_activateUserAccount($pdo, $email) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? ", array('1', $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * DEVOLVE O ID DO USER ATRAVES DO EMAIL
 * @param type $pdo
 * @param type $email Email do User
 * @return type UserId
 */
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

/**
 * NO REGISTO DO USER CRIA O SEU PERFIL
 * @param type $pdo
 * @param type $email Utiliza o email para procurar o UserId
 */
function DB_createProfileOnRegistration($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    try {
        sql($pdo, "INSERT INTO [dbo].[User_Profile] ([User_Id], [Enabled], [Picture_Path], [First_Name], [Last_Name]) VALUES(?,?, 'http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png', 'FirstName', 'LastName')"
                . "", array($userId, 1));
    } catch (PDOException $e) {
        print "ERROR CREATING USER PROFILE!";
        die();
    }
}

/**
 * DEVOLVE USER ID FROM EMAIL
 * @param type $pdo
 * @param type $email Email para pesquisar User
 * @return type
 */
function DB_checkUserByEmail($pdo, $email) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ?", array($email), "rows");
        foreach ($rows as $row) {
            return $row['id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING USER';
    }
}

/**
 * ATRIBUI NOVO CODIGO DE VALIDACAO AO USER
 * @param type $pdo
 * @param type $email Email do user para obter UserId
 * @param type $code Novo codigo de ativação
 */
function DB_updateUserAccountActivationCode($pdo, $email, $code) {
    $userId = DB_checkUserByEmail($pdo, $email);
    try {
        sql($pdo, "UPDATE [dbo].[User] SET [User_Code_Activation] = ? WHERE [id] = ?", array($code, $userId));
    } catch (PDOException $e) {
        print "ERROR SETTING UP A NEW CODE!";
        die();
    }
}

/**
 * ADICIONA UM ROLE AO USER
 * @param type $pdo
 * @param type $email Usa o email para obter o UserId
 */
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

/**
 * DEVOLVE UM ROLE ATRAVES DO NOME
 * @param type $pdo
 * @param type $name Nome do Role
 * @return type Retorna RoleId
 */
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

/**
 * DEVOLVE O ROLE DE UM USER
 * @param type $pdo
 * @param type $email Email do User
 * @return type Retorna UserId
 */
function DB_getUserRole($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    try {
        $rows = sql($pdo, "SELECT [Role].[Name] AS RN FROM [User_In_Role]
        join [Role]
        on [User_In_Role].[Role_Id] = [Role].[Id]
        Where [User_In_Role].[User_Id] = ?", array($userId), "rows");
        foreach ($rows as $row) {
            return $row['RN'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ROLE!';
    }
}

/**
 * DEVOLVE O NOME DE UM ROLE DE UM USER ATRAVES DO SEU ID
 * @param type $pdo
 * @param type $email Email do User
 * @return type
 */
function DB_getRoleName($pdo, $email) {
    $Roleid = DB_getUserRole($pdo, $email);
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[Role] WHERE [Id] = ?", array($Roleid), "rows");
        foreach ($rows as $row) {
            return $row['Name'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING ROLE!';
    }
}

/**
 * VERIFICA SE O USER TEM CONVITES
 * @param type $pdo
 * @param type $email NO registo verifica se o user tem convites
 */
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

/**
 * VINCULA UM USER A UM SERVIÇO
 * @param type $pdo
 * @param type $email Email do User
 * @param type $service ServiceId
 */
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

/**
 * VERIFICA SE CONTA VALIDADA
 * @param type $pdo
 * @param type $email Email do User
 * @return boolean Retorna T or F
 */
function DB_checkIfUserEnabled($pdo, $email) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? AND [Account_Enabled] = ?", array($email, 1), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

/**
 * DEVOLVE NUMERO DE TENTATIVAS FALHADAS NO LOGIN
 * @param type $pdo
 * @param type $email Email do User
 * @return type Numero de falhas de login
 */
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

/**
 * ATRIBUI VALOR AO CAMPO LOGIN FAILED
 * @param type $pdo
 * @param type $email Email do User
 * @param type $value Valor a atribuir
 * @return boolean
 */
function DB_setLoginFailed($pdo, $email, $value = '0') {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Login_Failed] = ? WHERE [Email] = ? ", array($value, $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * BLOQUEIA CONTA DE UM USER
 * @param type $pdo
 * @param type $email Email do User
 * @return boolean
 */
function DB_setBlockAccount($pdo, $email) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Account_Enabled] = ? WHERE [Email] = ? ", array('0', $email));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * ENVIA MAIL COM INSTRUÇAO DE ATIVACAO DE CONTA
 * @param type $email Email do User
 * @return type
 */
function DB_sendActivationEmail($email) {
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

/**
 * RECOVERY PASSWORD > Envia nova pw ao user via Email
 * @param type $pdo
 * @param type $email Email do User
 * @return boolean|string
 */
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

/**
 * Função para envio de Email
 * @param type $to Destinatario
 * @param type $subject Assunto
 * @param type $body Mensagem
 */
function sendEmail($to, $subject, $body) {
    #error_reporting(E_STRICT);
    #configura o fuso horario
    date_default_timezone_set('Europe/Lisbon');
    #faz os includes necessarios das bibliotecas
    require("class.phpmailer.php");
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

/**
 * DEVOLVE UMA TABELA C/ TODOS OS USERS < PARA TESTES
 * @param type $pdo
 */
function DB_getUsersTable($pdo) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>EMAIL</th><th>PWD</th><th>AE</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['Account_Enabled'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING USERS';
    }
}

/**
 * ADICIONA UMA ORG À BD
 * @param type $pdo
 * @param type $hashPassword Pw
 * @param type $email Email da Org
 * @param type $code Codigo de Ativação
 * @param type $city Cidade
 */
function DB_addOrg($pdo, $hashPassword, $email, $name, $code, $city) {
    $d = getDateToDB();
    try {
        sql($pdo, "INSERT INTO [dbo].[User] ([Password], [Email], [Account_Enabled],"
                . " [User_Code_Activation], [Login_Failed], [Date_Created]) VALUES (?, ?, ?, ?, ?, ?)", array($hashPassword, $email, '1', $code, '0', $d));
        //ATRIBUI ROLE
        DB_addOrgInRole($pdo, $email);
        //CRIA PROFILE
        DB_addOrgProfile($pdo, $email, $name, $city);
        echo DB_sendActivationEmail($email);
    } catch (PDOException $e) {
        echo "ERROR CREATING ORGANIZATION ACCOUNT!";
        die();
    }
}

/**
 * ADICIONA UM ROLE A ORG
 * @param type $pdo
 * @param type $email Email da Org
 */
function DB_addOrgInRole($pdo, $email) {
    $userId = DB_getUserId($pdo, $email);
    $role = DB_getRoleByName($pdo, "organization");
    try {
        sql($pdo, "INSERT INTO [dbo].[User_In_Role] ([User_Id], [Role_Id], [Enabled]) VALUES(?,?,?)"
                . "", array($userId, $role, 1));
    } catch (PDOException $e) {
        echo "ERROR CREATING ORG USER IN ROLE!";
        die();
    }
}

/**
 * ADICIONA UM PROFILE A ORG AQUANDO DO SIGNUP
 * @param type $pdo
 * @param type $email Email da Org
 * @param type $name Nome da Org
 * @param type $city CityId
 */
function DB_addOrgProfile($pdo, $email, $name, $city) {
    $d = getDateToDB();
    $userId = DB_getUserId($pdo, $email);
    try {
        sql($pdo, "INSERT INTO [dbo].[Organization] ([Name], [Organization_Email], "
                . "[User_Boss], [City_id], [Enabled],"
                . "[Date_Created])"
                . " VALUES(?,?,?,?,?,?)"
                . "", array($name, $email, $userId, $city, 1, $d));
    } catch (PDOException $e) {
        echo "ERROR CREATING ORGANTIZATION PROFILE!";
        die();
    }
}

/**
 * FUNCAO AUXILLIAR QUE VALIDA SE OS VALORES DA SESSION ESTAO CORRETOS OU SE FORAM ALTERADOS
 * @param type $pdo
 * @param type $sId
 * @param type $sEmail
 * @param type $s_pw
 * @param type $s_role
 * @return boolean
 */
function DB_validateSession($pdo, $sId, $sEmail, $s_pw) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [id] = ? AND [Email] = ? AND "
                . "[Password] = ?", array($sId, $sEmail, $s_pw), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        print "ERROR VALIDATING YOUR SESSION!";
    }
}

/**
 * VALIDA SE OS VALORES DA SESSION ESTAO CORRETOS OU SE FORAM ALTERADOS
 * @param type $pdo
 * @param type $sId
 * @param type $sEmail
 * @param type $s_pw
 * @param type $s_role
 * @return boolean
 */
function DB_validateUserSession($pdo, $sId, $sEmail, $s_pw, $s_role) {
    try {
//        $role = DB_getUserRole($pdo, $sEmail);
        if (DB_validateSession($pdo, $sId, $sEmail, $s_pw)) {
            //FALTA VALIDAR SE USER TEM O ROLE < ESTA A DAR ERRO :S
//            if ($role == $s_role) {
//                return true;
//            } else {
//                return false;
//            }
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        print "ERROR VALIDATING YOUR SESSION!";
    }
}

/**
 * DEVOLVE A PASSWORD ATUAL DO USER
 * @param type $pdo
 * @param type $userId UserId
 * @param type $pw Password Atual do User
 * @return boolean Devolve T or F
 */
function DB_getUserPW($pdo, $userId, $pw) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [id] = ? AND [Password] = ?", array($userId, $pw), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo "ERROR READING USER TABLE!";
    }
}

/**
 * FUNCAO PARA ALTERAR A PW DO USER
 * @param type $pdo
 * @param type $pw NOVA PW
 * @param type $userId UserId
 */
function DB_changeUserPW($pdo, $pw, $userId) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[User] SET [Password] = ? WHERE [id] = ?", array($pw, $userId));
        return "PASSWORD CHANGED!";
    } catch (Exception $exc) {
        echo "ERROR CHANGING YOUR PASSWORD!";
    }
}
