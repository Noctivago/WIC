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
        return DB_sendActivationEmail($email, $code);
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

function DB_checkInvitesWaiting($pdo, $idUser) {
    try {
        $rows = sql($pdo, "SELECT [Service].[Name] as ServName,[Service].[Id] as ServId,[Organization].[Name] as OrgName,[Organization].[Picture_Path],[User_Service].[ID]
  FROM [dbo].[User_Service]
  join [Service]
  on [Service].[Id] = [User_Service].[Service_Id]
  join [Organization]
  on [Organization].[Id] = [Service].[Organization_Id]
  where [validate] = 0 and [User_ID] = ?", array($idUser), "rows");
        foreach ($rows as $row) {
            echo '<article class="friends-list-item">';
            echo '<div class="user-card-row">';
            echo '<div class="tbl-row">';
            echo '<div class="tbl-cell tbl-cell-photo">';
            echo '<a href="#">';
            echo '<img src="' . $row['Picture_Path'] . '" alt="Avatar">';
            echo '</a>';
            echo '</div>';
            echo '<div class="tbl-cell">';
            echo '<p class="user-card-row-name"><a href="#">' . $row['OrgName'] . ' invited you to the service ' . $row['ServName'] . '</a></p>';
            echo '<div>';
            echo '<a class="chevron-circle-down" onclick="accept(' . $row['ID'] . ')"></a>';
            echo '<a class="font-icon font-icon-del" onclick="reject(' . $row['ID'] . ')"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</article>';
        }
    } catch (Exception $ex) {
        
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
function DB_sendActivationEmail($email, $code) {
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
        return "Message sent!";
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
                . "[Date_Created], [Picture_Path])"
                . " VALUES(?,?,?,?,?,?, 'http://lyco.com.br/site/empresa/images/icone_grande_empresa-2.png')"
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

/**
 * RETORNA A INFO DO PROFILE DO USER PARA O SEU PERFIL (SMALL INFO)
 * @param type $pdo
 * @param type $userId
 */
function db_getUserIndexInfo($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT 
        [User_Profile].[First_Name] AS UFN
        ,[User_Profile].[Last_Name] AS ULN
        ,[User_Profile].[Picture_Path] AS UPP
        ,[User].[Email] AS UEM
        FROM [dbo].[User] 
        join [User_Profile]
        on [User_Profile].[User_Id] = [User].[id]
        WHERE [User].[id] = ?", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<div class="profile-card-photo">';
            echo '<img src="' . $row['UPP'] . '" alt="Profile Pic"/>';
            echo '</div>';
            echo '<div class = "profile-card-name">' . $row['UFN'] . ' ' . $row['ULN'] . '</div>';
            echo '<div class = "profile-card-location">' . $row['UEM'] . '</div>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING USER PROFILE';
    }
}

/**
 * FUNÇAO QUE DEVOLVE WICs PLANNER PARA PERFIL USER
 * @param type $pdo
 * @param type $userId
 */
function DB_getMyWICs($pdo, $userId) {

    try {
        $rows = sql($pdo, "SELECT [WIC_Planner].[Id]
        ,[WIC_Planner].[Name] AS WPN        
        ,[WIC_Planner].[Event_Date] AS WPD
        FROM [dbo].[WIC_Planner]
        WHERE [WIC_Planner].[Enabled]= 1 
        AND [WIC_Planner].[User_Id] = ? ORDER BY WPD DESC", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<div class="col">';
            echo '<article class="follow-group">';
            //echo '<div class="follow-group-logo">';
            //FALTA ID/LINK PARA REMETER ON CLICK PARA VER SERVIÇOS DESTE WIC PLANNER
            //echo '<a href="#" class="follow-group-logo-in"><img src="img/wic_logo.png" alt="WIC Logo"></a>';
            //echo '</div>';
            echo '<div class="follow-group-name">';
            echo '<a href="my_wicplanner.php">' . $row['WPN'] . '</a>';
            $str = $row['WPD'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            //IMPRIME DATA
            echo '<p>#' . $subStr[0] . '</p>';
            echo '</div>';
            echo '</article>';
            echo '</div>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING WIC PLANNER!';
    }
}

//get id org by userbossid

function DB_GetOrgIdByUserBossId($pdo, $idUser) {
    try {
        $row = sql($pdo, "SELECT * From [Organization] Where [User_Boss] = ?", array($idUser), "row");
        echo $row['id'];
    } catch (Exception $ex) {
        echo 'error';
    }
}

//falta dar o orgid
// Dá o numero de pessoas em todos os servicos
//esta a dar algum erro por isso não conta
function DB_CountPeopleInOrg($pdo) {
    try {
        $count = 1;
        $Services = sql($pdo, "SELECT *
  FROM [Service]
  where [Organization_Id] = ? and [Enabled] = 1", array(2), "rows");
        foreach ($Services as $Service) {
            $idService = $Service['Id'];
            $query = sql($pdo, "SELECT count([User_Service].[Id]) as contador
  FROM [dbo].[User_Service]
  join [User]
  on [User].[Id] = [User_Service].[User_Id]
  join [User_Profile]
  on [User_Profile].[User_Id] = [User].[Id]
  join [Service]
  on [Service].[Id] = [User_Service].[Service_Id]
  join [Role]
  on [Role].[Id] = [User_Service].[Role_Id]
  where [Service_Id] = ?", array($idService), "rows");
            $cont = $query['contador'];
            $count += $cont;
        }
        echo $count;
    } catch (Exception $ex) {
        
    }
}

//Todos os utilizadores que estão associados a um servico 
//Falta colocar o id da org
function DB_getUsersInServiceOrganization($pdo, $org) {
    try {
        $Services = sql($pdo, "SELECT *
  FROM [Service]
  where [Organization_Id] = ? and [Enabled] = 1", array($org), "rows");
        foreach ($Services as $Service) {
            $idService = $Service['Id'];
            $rows = sql($pdo, "SELECT [Email],[UseR_Profile].[First_Name],[User_Profile].[Last_name],[User_Profile].[Picture_Path]
,[Service].[Name] as ServiceName,[Role].[Name]
  FROM [dbo].[User_Service]
  join [User]
  on [User].[Id] = [User_Service].[User_Id]
  join [User_Profile]
  on [User_Profile].[User_Id] = [User].[Id]
  join [Service]
  on [Service].[Id] = [User_Service].[Service_Id]
  join [Role]
  on [Role].[Id] = [User_Service].[Role_Id]
  where [Service_Id] = ?", array($idService), "rows");

            foreach ($rows as $row) {
                echo '<article class="friends-list-item">';
                echo '    <div class="user-card-row">';
                echo '      <div class="tbl-row">';
                echo '          <div class="tbl-cell tbl-cell-photo">';
                echo '              <a href="#">';
                echo '                 <img src=' . $row['Picture_Path'] . ' alt="">';
                echo '             </a>';
                echo '         </div>';
                echo '        <div class="tbl-cell">';
                echo '            <p class="user-card-row-name">' . $row['First_Name'] . '</p>';
                echo '            <p class="user-card-row-name">' . $row['Last_name'] . '</p>';
                echo '            <p class="user-card-row-location">' . $row['ServiceName'] . '</p>';
                echo '         </div>';
                echo '  </div>';
                echo ' </article>';
            }
        }
    } catch (Exception $ex) {
        
    }
}

//<!--            <header class="box-typical-header-sm">
//                        People in our organization
//                        &nbsp;
//                    </header>
//                    <div class="friends-list">-->
//                        
//                    <!--/div-->

function DB_GetOrgInformation($pdo) {
    try {
        $id = 2;
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Organization]
  where [Id] = ?", array($id), "rows");
        foreach ($rows as $row) {
            echo '<div class="profile-card">';
            echo '<div class="profile-card-photo">';
            echo '                      <img src="' . $row['Picture_Path'] . '" alt=""/>';
            echo '                  </div>';
            echo '                <div class="profile-card-name">' . $row['Name'] . '</div>';
            echo '                <div class="profile-card-status">' . $row['Phone_Number'] . '</div>';
            echo '                <div class="profile-card-status">' . $row['Mobile_Number'] . '</div>';
            echo '                <div class="profile-card-location">' . $row['Organization_Email'] . '</div>';
            echo '                <div class="profile-card-location">' . $row['Address'] . '</div>';
            echo '            <a  href="' . $row['Website'] . '" target="_blank"> <i class="font-icon font-icon-earth-bordered"></i></a>';
            echo '           <a  href="' . $row['Facebook'] . '" target="_blank">  <i class="font-icon font-icon-fb-fill"></i></a>';
            echo '        <a  href="' . $row['Linkdin'] . '" target="_blank">  <i class="font-icon font-icon-in-fill"></i></a>';
            echo '         <a  href="' . $row['Twitter'] . '" target="_blank"> <i class="font-icon font-icon-tw-fill"></i></a>';

            echo '</div>';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
}

function DB_GetOrgInformation2($pdo, $org) {
    try {
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Organization]
  where [Id] = ?", array($org), "rows");
        foreach ($rows as $row) {
            echo '<div class="text-block text-block-typical">';
            echo '<p>' . $row['Description'] . ' </p>';
            echo '</div>';
            echo ' </div>';
            echo '       </article>';
            echo '      </section>';
            echo '<div class="col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">';
            echo '        <section class="box-typical">  ';
            echo '<div class="profile-card">';
            echo '<div class="profile-card-photo">';
            echo '                      <img src="' . $row['Picture_Path'] . '" alt=""/>';
            echo '                  </div>';
            echo '                <div class="profile-card-name">' . $row['Name'] . '</div>';
            echo '                <div class="profile-card-status">' . $row['Phone_Number'] . '</div>';
            echo '                <div class="profile-card-status">' . $row['Mobile_Number'] . '</div>';
            echo '                <div class="profile-card-location">' . $row['Organization_Email'] . '</div>';
            echo '                <div class="profile-card-location">' . $row['Address'] . '</div>';
            echo '            <a  href="' . $row['Website'] . '" target="_blank"> <i class="font-icon font-icon-earth-bordered"></i></a>';
            echo '           <a  href="' . $row['Facebook'] . '" target="_blank">  <i class="font-icon font-icon-fb-fill"></i></a>';
            echo '        <a  href="' . $row['Linkdin'] . '" target="_blank">  <i class="font-icon font-icon-in-fill"></i></a>';
            echo '         <a  href="' . $row['Twitter'] . '" target="_blank"> <i class="font-icon font-icon-tw-fill"></i></a>';

            echo '</div>';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * VERIFICA SE CODIGO INTRODUZIDO CONFERE COM O DA BD
 * @param type $pdo
 * @param type $email
 * @param type $code
 * @return boolean
 */
function DB_compareActivationCode($pdo, $email, $code) {
    try {
        $count = sql($pdo, "SELECT * FROM [dbo].[User] WHERE [Email] = ? AND [User_Code_Activation] = ?", array($email, $code), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $exc) {
        echo '';
    }
}

function DB_GetNumberServiceComments($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("SELECT count([Comment].[Id]) as NumComment
  FROM [dbo].[Comment]
  where [Service_Id] =:id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $comm = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $comm['NumComment'] = $row['NumComment'];
        }
        return $comm;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }$serviceInfo = array();
}

function DB_GetNumberServiceViews($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("Select count([Service_View].[Id])as NumView
From [Service_View]
where [Service_Id] =:id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $views = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $views['NumView'] = $row['NumView'];
        }
        return $views;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }$serviceInfo = array();
}

function DB_GetServiceMultimediaUnit($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("Select top(1) *
From [Multimedia]
where [Service_Id] =:id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $multi = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $multi['Multimedia_Path'] = $row['Multimedia_Path'];
        }
        return $multi;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }$serviceInfo = array();
}

function DB_GetServiceInformation($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("SELECT [Name],[Date_Created]
  FROM [dbo].[Service]
  where [Id] =:id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $serv = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $serv['Name'] = $row['Name'];
            $serv['Date_Created'] = $row['Date_Created'];
        }
        return $serv;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }$serviceInfo = array();
}

function getAllOrganizationServices($pdo, $org) {
    try {
        $stmt = $pdo->prepare("SELECT *
  FROM [dbo].[Service]
  where [Enabled]=1 and [organization_id] =:id");
        $stmt->bindParam(':id', $org);
        $stmt->execute();
        $OrgServices = array();
        $rows = $stmt->fetchALL();
        foreach ($rows as $row) {
            array_push($OrgServices, $row['Id']);
        }
        //while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            $service['Name'] = $row['Name'];
//            $service['Id'] = $row['Id'];
        //   array_push($OrgServices, $row['Id']);
        // }
        return $OrgServices;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }
}

function DB_CheckIfBossOrg($pdo, $org, $idUser) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[Organization]
  where [Id] =? and [User_Boss] = ?", array($org, $idUser), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

function DB_ValidateSubscription($pdo, $org) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[Organization_Subscription]
  where [Organization_Id] = ? and [Date_Finish] > GETDATE()", array($org), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

function DB_getPeopleViewServicesOrg($pdo, $org) {
    try {
        if (!DB_ValidateSubscription($pdo, $org)) {
            echo ' <header class="box-typical-header-sm">Activate the subscription below to see the users who saw your services
                    <br><br>
Free for 3 Months</header>';
            echo '<div align="center">';
            echo '<button type="submit" class="btn btn-rounded btn-success sign-up" align="center" onClick="subscribe(' . $org . ')" >Activate</button><br><br>';
            echo '</div>';
        } else {
            $rows = sql($pdo, "SELECT TOP 5 [Service_View].[Date_View],[User_Profile].[First_Name],[Service].[Id],[Service].[Name],[User_Profile].[Picture_Path]
  FROM [dbo].[Service_View]
  join [User]
  on [User].[Id] = [Service_View].[User_Id]
  join [User_Profile]
  on [User_Profile].[User_Id] = [User].[Id]
  join [Service]
  on [Service].[Id] = [Service_View].[Service_Id]
  join [Organization]
  on [Organization].[Id] = [Service].[Organization_Id]
  Where [Organization_Id] = ?
  order by [Service_View].[Date_View] DESC", array($org), "rows");
            echo ' <header class="box-typical-header-sm">People also viewed</header>';
            foreach ($rows as $row) {
                echo '<article class="friends-list-item">';
                echo '<div class="user-card-row">';
                echo '<div class="tbl-row">';
                echo '<div class="tbl-cell tbl-cell-photo">';
                echo '<a href = "#">';
                echo '<img src="' . $row['Picture_Path'] . '" alt="">';
                echo '</a>';
                echo '</div>';
                echo '<div class = "tbl-cell">';

//falta link para o perfil do user
                echo '<p class="user-card-row-name"><a href="#">' . $row['First_Name'] . '</a></p>';

//falta colocar o link para ver o servico
                echo '<p class="user-card-row-status">Service <a href="#">' . $row['Name'] . '</a></p>';
                echo '</div>';
                echo '<div class="tbl-cell tbl-cell-action">';

//falta inserir o iniciar chat
                echo '<a href = "#" class = "plus-link-circle"><span>&plus;
            </span></a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo ' </article>';
            }
        }
    } catch (Exception $ex) {
        
    }
}

//preencher seccao services no profile org
//falta passar o id da org
function DB_GetOrganizationServices($pdo, $org) {
    try {
        $services = getAllOrganizationServices($pdo, $org);
        foreach ($services as $service) {
            $idService = $service['Id'];
            $ServiceInfo = DB_GetServiceInformation($pdo, $idService);
            $Multi = DB_GetServiceMultimediaUnit($pdo, $idService);
            $views = DB_GetNumberServiceViews($pdo, $idService);
            $comments = DB_GetNumberServiceComments($pdo, $idService);
            echo '<div class = "slide">';
            echo '<article class = "post-announce">';
            echo '<div class = "post-announce-pic">';
            echo '<a href = "#">';
            echo ' <img src = "' . $Multi['Multimedia_Path'] . '" alt = "">';
            echo '</a>';
            echo ' </div>';
            echo '<div class = "post-announce-title">';
            echo '<a href = "#">' . $ServiceInfo['Name'] . '</a>';
            echo '</div>';
            echo '<div class = "post-announce-date">' . $ServiceInfo['Date_Created'] . '</div>';
            echo '<ul class = "post-announce-meta">';
            echo '<li>';
            echo '<i class = "font-icon font-icon-eye"></i>';
            echo $views['NumView'];
            echo '</li>';
            echo '<li>';
            echo '<i class = "font-icon font-icon-comment"></i>';
            echo $comments['NumComment'];
            echo '</li>';
            echo '</ul>';
            echo '</article>';
            echo '</div>';
        }
//        echo $ServiceInfo["Name"] . " ". $ServiceInfo["Description"] ." " .$Multi['Multimedia_Path']." " .$comments['NumComment'];
//        echo $ServiceInfo["Description"];
//        echo $Multi['Multimedia_Path'];
//        echo $comments['NumComment'];
    } catch (Exception $ex) {
        
    }
}

/**
 * DEVOLVE CONVERSAS COM OUTROS USERS
 * @param type $pdo
 * @param type $userId
 */
function db_getUserMessengerWithUsers($pdo, $userId) {
    try {
        $rows = sql($pdo, "Select 
        [User_Profile].[Picture_Path] AS UPP
        ,[User_Profile].[First_Name] AS UFN
        ,[User_Profile].[Last_Name] AS ULN
        ,[User].[id] AS UID
        From [Conversation]
        join [User]
        on [Conversation].[User_Id1] = [User].[id] or [Conversation].[User_Id2] = [User].[id]
        join [User_Profile]
        on [User_Profile].[User_Id] = [User].[id]
        Where [Conversation].[User_Id1] = ? or [Conversation].[User_Id2] = ?", array($userId, $userId), "rows");
        foreach ($rows as $row) {
            if ($row['UID'] === $userId) {
                
            } else {
                echo '<article class="friends-list-item">';
                echo '<div class="user-card-row">';
                echo '<div class="tbl-row">';
                echo '<div class="tbl-cell tbl-cell-photo">';
                echo '<a href="#">';
                echo '<img src="' . $row['UPP'] . '" alt="Avatar">';
                echo '</a>';
                echo '</div>';
                echo '<div class="tbl-cell">';
                echo '<p class="user-card-row-name"><a href="#">' . $row['UFN'] . ' ' . $row['ULN'] . '</a></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</article>';
            }
        }
    } catch (Exception $exc) {
        echo 'ERROR READING CONVERSATIONS';
    }
}

/**
 * DEVOLVE CONVERSAS COM ORGS 
 * @param type $pdo
 * @param type $userId
 */
function db_getUserMessengerWithOrgs($pdo, $userId) {
    try {
        $rows = sql($pdo, "Select 
        [Organization].[Picture_Path] OPP
        ,[Organization].[Name] AS ONA
        From [Conversation]
        join [User]
        on [Conversation].[User_Id1] = [User].[id] or [Conversation].[User_Id2] = [User].[id]
        join Organization
        on [Organization].[User_Boss] = [User].[id]
        Where [Conversation].[User_Id1] = ? or [Conversation].[User_Id2] = ?", array($userId, $userId), "rows");
        foreach ($rows as $row) {
            if ($row['UID'] === $userId) {
                
            } else {
                echo '<article class="friends-list-item">';
                echo '<div class="user-card-row">';
                echo '<div class="tbl-row">';
                echo '<div class="tbl-cell tbl-cell-photo">';
                echo '<a href="#">';
                echo '<img src="' . $row['OPP'] . '" alt="Avatar">';
                echo '</a>';
                echo '</div>';
                echo '<div class="tbl-cell">';
                echo '<p class="user-card-row-name"><a href="#">' . $row['ONA'] . '</a></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</article>';
            }
        }
    } catch (Exception $exc) {
        echo 'ERROR READING CONVERSATIONS';
    }
}

/**
 * FUNCAO QUE DEVOLVE OS MEUS WICPLANNERS
 * @param type $pdo
 * @param type $userId
 */
function db_getMyWicPlannerToWICCrud($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT [WIC_Planner].[Id] AS WID
        ,[WIC_Planner].[Name] AS WPN
        ,[WIC_Planner].[Event_Date] AS WPED        
            ,[User_Profile].[First_Name] AS UFN
            ,[User_Profile].[Last_Name] AS ULN
            ,[User_Profile].[Picture_Path] AS UPP
        FROM [dbo].[WIC_Planner]
        join [User]
        on [User].[id] = [WIC_Planner].[User_Id]
        join [User_Profile]
        on [WIC_Planner].[User_Id] = [User_Profile].[User_Id]
        WHERE [WIC_Planner].[Enabled] = 1
        AND [User].[id] = ? ORDER BY WPED DESC", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<tr class="table-check">';
            echo '<td><a onclick="showWicServicesForm(' . $row['WID'] . ')">' . $row['WPN'] . '</a></td>';
            $str = $row['WPED'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            //IMPRIME DATA
            echo '<td>' . $subStr[0] . '</td>';
            echo '<td class="table-photo">';
            echo '<img src="' . $row['UPP'] . '" alt="Avatar" data-toggle="tooltip" data-placement="bottom" title="' . $row['UFN'] . '<br/>' . $row['ULN'] . '">';
            echo '</td>';
            echo '<td class="table-photo">';
            echo '<a onclick="showAddWicFormEditMode(' . $row['WID'] . ')" class="font-icon font-icon-pencil">';
            echo '</a>';
            echo '</td>';
            echo '<td class="table-photo">';
            echo '<a onclick="removeWic(this)"class="font-icon font-icon-del" id=' . $row['WID'] . '>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING MY WIC PLANNERS';
    }
}

/**
 * FUNCAO QUE DEVOLVE WICS DE OUTROS SOBRE OS QUAIS TENHO ACESSO
 * @param type $pdo
 * @param type $userId
 */
function db_getThirdWicPlannerToWICCrud($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT [WIC_Planner].[Id] AS WID
        ,[WIC_Planner].[Name] AS WPN
        ,[WIC_Planner].[Event_Date] AS WPED        
            ,[User_Profile].[First_Name] AS UFN
            ,[User_Profile].[Last_Name] AS ULN
            ,[User_Profile].[Picture_Path] AS UPP
        FROM [dbo].[WIC_Planner]
        join [User]
        on [User].[id] = [WIC_Planner].[User_Id]
        join [User_Profile]
        on [WIC_Planner].[User_Id] = [User_Profile].[User_Id]
        join [WIC_Planner_User]
        on [WIC_Planner_User].[Wic_Planner_ID] = [Wic_Planner].[Id]
        WHERE [WIC_Planner].[Enabled] = 1 and [Wic_Planner_User].[User_Id] = ? and [WIC_Planner_User].[Enabled] = 1", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<tr class="table-check">';
            echo '<td><a onclick="showWicServicesForm(' . $row['WID'] . ')">' . $row['WPN'] . '</a></td>';
            $str = $row['WPED'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            //IMPRIME DATA
            echo '<td>' . $subStr[0] . '</td>';
            echo '<td class="table-photo">';
            echo '<img src="' . $row['UPP'] . '" alt="Avatar" data-toggle="tooltip" data-placement="bottom" title="' . $row['UFN'] . '<br/>' . $row['ULN'] . '">';
            echo '</td>';
//COMO USER E CONVIDADO APENAS PODE VER/REMOVER E ADICIONAR SERVIÇOS            
//            echo '<td class="table-photo">';
//            echo '<a href="#" class="font-icon font-icon-pencil">';
//            echo '</a>';
//            echo '</td>';
//            echo '<td class="table-photo">';
//            echo '<a href="#" class="font-icon font-icon-del">';
//            echo '</a>';
//            echo '</td>';
            echo '</tr>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING THIRD WIC PLANNERS';
    }
}

/**
 * DEVOLVE TODOS OS WIC ONDE SE ENCONTRA O USER
 * @param type $pdo
 * @param type $userId
 */
function DB_getMyWicsAjax($pdo, $userId) {
    echo db_getMyWicPlannerToWICCrud($pdo, $userId);
    echo db_getThirdWicPlannerToWICCrud($pdo, $userId);
}

function DB_removeWICPlanner($pdo, $userId, $wicId) {
    try {
        sql($pdo, "UPDATE [WIC_Planner]
            SET [WIC_Planner].[Enabled]=0
            WHERE [WIC_Planner].[Enabled]=1 
            AND [WIC_Planner].[Id]= ? 
            AND [WIC_Planner].[User_Id] = ?", array($wicId, $userId));
        echo "SUCCESSFULLY REMOVED!";
    } catch (PDOException $e) {
        print "ERROR REMOVING WIC PLANNER :(!";
        die();
    }
}

/**
 * Verifica se o Wic Planner tem serviços
 * @param type $pdo
 * @param type $email
 * @return boolean
 */
function DB_checkIfWicPlannerHaveServices($pdo, $wicPlannerId, $userId) {
    try {
        $count = sql($pdo, "SELECT [Service].[Id] AS SID
                , [Service].[Name] AS SNA
                , [Organization].[Name] AS ONA
                , [Organization].[Id] AS OID
                , [Organization].[Picture_Path] AS OPP
                , [WIC_Planner].[Name] AS WNA
                FROM [dbo].[WIC_Planner_Service]
                join [Service]
                on [Service].[Id] = [WIC_Planner_Service].[Service_Id]
                join [WIC_Planner]
                on [WIC_Planner].[Id] = [WIC_Planner_Service].[WIC_Planner_Id]
                join [Organization]
                on [Service].[Organization_Id] = [Organization].[Id]
                WHERE [Service].[Enabled] = 1 AND [Organization].[Enabled] = 1 AND [WIC_Planner_Service].[WIC_Planner_Id] = ?
                AND [WIC_Planner].[User_Id] = ?", array($wicPlannerId, $userId), "count");
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
 * Função que devolve os serviços do meu WIC Planner
 * @param type $pdo
 * @param type $wicPlannerId
 * @param type $userId
 */
function db_getServicesOfMyWicPlanner($pdo, $wicPlannerId, $userId) {
    try {
        if (DB_checkIfWicPlannerHaveServices($pdo, $wicPlannerId, $userId)) {
            $rows = sql($pdo, "SELECT [Service].[Id] AS SID
                , [Service].[Name] AS SNA
                , [Organization].[Name] AS ONA
                , [Organization].[Id] AS OID
                , [Organization].[Picture_Path] AS OPP
                , [WIC_Planner].[Name] AS WNA
                , [WIC_Planner].[Id] AS WID
                FROM [dbo].[WIC_Planner_Service]
                join [Service]
                on [Service].[Id] = [WIC_Planner_Service].[Service_Id]
                join [WIC_Planner]
                on [WIC_Planner].[Id] = [WIC_Planner_Service].[WIC_Planner_Id]
                join [Organization]
                on [Service].[Organization_Id] = [Organization].[Id]
                WHERE [Service].[Enabled] = 1 AND [WIC_Planner_Service].[Enabled] = 1 
                AND [Organization].[Enabled] = 1 AND [WIC_Planner_Service].[WIC_Planner_Id] = ?
                AND [WIC_Planner].[User_Id] = ?", array($wicPlannerId, $userId), "rows");
            echo '<section class="box-typical box-typical-max-280">
            <header class="box-typical-header">
            <div class="tbl-row">
            <div class="tbl-cell tbl-cell-title">
            <h3> Services in ' . $row['WNA'] . '</h3>
            </div>
            </div>
            </header>
            <div class="box-typical-body" style="overflow: hidden;
                padding: 0px;
                height: 700px;
                width: 504px;
                ">
            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
            <th>Service</th>
            <th>Owner</th><th></th><th></th>
            </tr>
            </thead>
            <tbody>';
            foreach ($rows as $row) {
                echo '
            <tr class="table-check">
            <td><a href="../service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></td>
            <td class="table-photo">
            <img src="' . $row['OPP'] . '" alt="Avatar" data-toggle="tooltip" data-placement="bottom" title="' . $row['ONA'] . '">
            </td>
            <td class="table-photo">
            </td>
            <td class="table-photo">
            <a onclick="removeWicService(this,' . $row['SID'] . ')" class="font-icon font-icon-del" id=' . $row['WID'] . '>
            </a>
            </td>
            </tr>';
            }
            echo '</tbody>
            </table>
            </div>
            </div>
            </section>
            </div>';
        } else {
            
        }
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICES OF WIC PLANNER!';
    }
}

function DB_UserProfile($pdo, $userId) {
    try {
        $rowss = sql($pdo, "SELECT *
  FROM [dbo].[User_Profile]
  where [User_Profile].[User_Id] = ?", array($userId), "rows");
        foreach ($rowss as $row) {
            echo '<div class="sign-avatar no-photo" >
                        <img id="image" src="' . $row['Picture_Path'] . '" alt="Avatar"/>
                    </div>
                    <input type="file" name="Photo" id="Photo">
                    <header class="sign-title">Edit Profile</header>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                            <input type="text" id="first" name="first" class="form-control" placeholder="First Name" value="' . $row['First_Name'] . '"/>
                            <i class="font-icon font-icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                            <input type="text" id="last" name="last" class="form-control" placeholder="Last Name" value="' . $row['Last_Name'] . '"/>
                            <i class="font-icon font-icon-user"></i>
                        </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-rounded btn-success sign-up">Save Changes</button>';
        }
    } catch (Exception $ex) {
        
    }
}

function DB_OrgProfile($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT * FROM [Organization] Where [User_Boss] = ?", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<div class="sign-avatar no-photo" ><img id="image" src="' . $row['Picture_Path'] . '" alt=""/> </div>
                    
                    <button type="submit" class="btn btn-rounded btn-file">Change Picture <input class="btn-file" type="file"/> </button>
                    
                    <header class="sign-title">Edit Organization Profile</header>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" name="name" id="name" placeholder=" Organization Name" value="' . $row['Name'] . '"/>
                        <i class="font-icon font-icon-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="email" name="email" placeholder=" Organization Email "value="' . $row['Organization_Email'] . '"/>
                        <i class="font-icon font-icon-mail"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="address" name="address" placeholder=" Organization Adress"value="' . $row['Address'] . '"/>
                        <i class="font-icon font-icon-earth"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telephone Number"value="' . $row['Phone_Number'] . '"/>
                        <i class="font-icon font-icon-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number"value="' . $row['Mobile_Number'] . '"/>
                        <i class="font-icon font-icon-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="website" name="website" placeholder="My WebSite"value="' . $row['Website'] . '"/>
                        <i class="font-icon font-icon-earth-bordered"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook Account"value="' . $row['Facebook'] . '"/>
                        <i class="font-icon font-icon-facebook"></i>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="linkdin" name="linkdin" placeholder="Linkedin Account"value="' . $row['Linkdin'] . '"/>
                        <i class="font-icon font-icon-linkedin"></i>
                        </div>
                    </div>
                    <div class="form-group">
                         <div class="form-control-wrapper form-control-icon-left" >
                        <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Twitter Account"value="' . $row['Twitter'] . '"/>
                        <i class="font-icon font-icon-twitter"></i>
                        </div>
                    </div>
                        
                   <div class="form-group row">
                        
						<div class="form-control-wrapper form-control-icon-left" >
							<textarea rows="8" id="description" name="description" class="form-control" placeholder="Organization Info">' . $row['Description'] . '</textarea>
                                                        <i class="font-icon font-icon-user"></i>
						</div>
                    </div>
                    
                    <button type="submit" id="save" name="save" class="btn btn-rounded btn-success sign-up">Save Changes</button>';
        }
    } catch (Exception $ex) {
        
    }
}

function DB_UpdateUserInformation($pdo, $sId, $first, $last) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Profile]
   SET [First_Name] = ?
      ,[Last_Name] = ?
 WHERE [User_Id] =? ", array($first, $last, $sId));
        echo 'Updated';
    } catch (Exception $ex) {
        echo 'Error';
    }
}

function DB_UpdateOrgInformation($pdo, $name, $email, $address, $phone, $mobile, $website, $facebook, $linkdin, $twitter, $description, $userId) {
    try {
        sql($pdo, "UPDATE [dbo].[Organization]
   SET [Name] = ?
      ,[Phone_Number] = ?
      ,[Mobile_Number] = ?
      ,[Address] = ?
      ,[Facebook] = ?
      ,[Twitter] = ?
      ,[Linkdin] = ?
      ,[Organization_Email] = ?
      ,[Website] = ?
	  ,[Picture_Path] = ?
      ,[Description] = ?
 WHERE [User_Boss] = ?", array($name, $phone, $mobile, $address, $facebook, $twitter, $linkdin, $email, $website, NULL, $description, $userId));
        echo 'Updated';
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Adiciona um WIC Planner
 * @param type $pdo
 * @param type $name
 * @param type $userId
 * @param type $d
 * @param type $eventDate
 */
function DB_addWicPlanner($pdo, $name, $userId, $d, $eventDate) {
    try {
        sql($pdo, "INSERT INTO [dbo].[WIC_Planner] ([Name], [User_Id], [Date_Created],"
                . " [Enabled], [Event_Date]) VALUES (?, ?, ?, ?, ?)", array($name, $userId, $d, 1, $eventDate));
        echo $name . " created!";
    } catch (PDOException $e) {
        echo "ERROR CREATING WIC PLANNER!";
    }
}

/**
 * Devolve informação sobre um Wic Planner
 * @param type $pdo
 * @param type $wicId
 * @param type $userId
 * @return type
 */
function DB_getWicPlannerInfo($pdo, $wicId, $userId) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[WIC_Planner] WHERE [Id] = ? and [User_Id] = ?", array($wicId, $userId), "rows");
        $wicInfo = array();
        foreach ($rows as $row) {
            $str = $row['Event_Date'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            $wicInfo["Name"] = $row["Name"];
            $wicInfo["Event_Date"] = $subStr[0];
            //$wicInfo["Event_Date"] = $row['Event_Date'];
        }
        return $wicInfo;
    } catch (Exception $exc) {
        echo 'ERROR READING WIC PLANNER!';
    }
}

/**
 * Funcção que atualiza o wicplanner
 * @param type $pdo
 * @param type $wicId
 * @param type $userId
 * @param type $name
 * @param type $eventDate
 */
function DB_updateWicPlanner($pdo, $wicId, $userId, $name, $eventDate) {
    if ($wicId != 0) {
        try {
            sql($pdo, "UPDATE [WIC_Planner]
            SET [WIC_Planner].[Name] = ?,
            [WIC_Planner].[Event_Date] = ?
            WHERE [WIC_Planner].[Id]= ? 
            AND [WIC_Planner].[User_Id] = ?", array($name, $eventDate, $wicId, $userId));
            echo "Event updated!";
        } catch (PDOException $e) {
            print "ERROR UPDATING WIC PLANNER :(!";
            die();
        }
    }
}

/**
 * Função que alterar a imagem de perfil do user
 * @param type $pdo
 * @param type $pic
 * @param type $userId
 */
function DB_addUserProfilePicture($pdo, $pic, $userId) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Profile] SET [Picture_Path] = ? WHERE [User_Id] = ?", array($pic, $userId));
        echo 'Picture sucessufully changed!';
    } catch (PDOException $e) {
        echo "ERROR UPDATING PROFILE PICTURE!";
    }
}

/**
 * Função para remover serviço do wic planner
 * @param type $pdo
 * @param type $serviceId
 * @param type $WicPlannerId
 * @return boolean
 */
function DB_removeServiceFromWicPlanner($pdo, $serviceId, $WicPlannerId) {
    //SE PASSARMOS O USERID PODEMOS VERIFICARA SE O USER ESTA NESTE WIC PLANNER
    try {
        $count = sql($pdo, "UPDATE [dbo].[WIC_Planner_Service] "
                . "SET [Enabled]=0 "
                . "WHERE [Service_Id] = ? "
                . "AND [WIC_Planner_Id] = ?", array($serviceId, $WicPlannerId));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}
