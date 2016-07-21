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
        return DB_sendActivationEmail($email);
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
            echo '<a href="#">' . $row['WPN'] . '</a>';
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


        $id = 2;
        $Services = sql($pdo, "SELECT *
  FROM [Service]
  where [Organization_Id] = ? and [Enabled] = 1", array($id), "rows");
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
        $id = 2;
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Organization]
  where [Id] = ?", array($id), "rows");
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
        if ($Count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

function DB_getPeopleViewServicesOrg($pdo, $org) {
    try {
        $idUser = 9;
        $OrgId = 2;
        //check boss 
        if (DB_CheckIfBossOrg($pdo, $OrgId, $idUser)) {
            //falta dar o id da org
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
  order by [Service_View].[Date_View] DESC", array($OrgId), "rows");
            echo ' <header class="box-typical-header-sm">People also viewed' . $idUser . '</header>';
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
        } else {
//            echo ' <header class="box-typical-header-sm">People also viewed' . $idUser . '</header>';
        }
    } catch (Exception $ex) {
        
    }
}

//preencher seccao services no profile org
//falta passar o id da org
function DB_GetOrganizationServices($pdo, $org) {
    try {
        //falta buscar o id da org
        $orgId = 2;
        $services = getAllOrganizationServices($pdo, $orgId);
        //  $idService = 2;
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
        AND [WIC_Planner].[User_Id] = ?", array($userId), "rows");
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
            echo '<a href="#" class="font-icon font-icon-del">';
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
      
      ,[Event_Date] AS WPED
	  ,[User_Profile].[First_Name] AS UFN
	  ,[User_Profile].[Last_Name]  AS ULN 
	  ,[User_Profile].[Picture_Path] AS UPP
        FROM [dbo].[WIC_Planner]
        join [User]
        on [User].[id] = [WIC_Planner].[User_Id]
        
        join [User_Profile]
        on [WIC_Planner].[User_Id] = [User_Profile].[User_Id]
        join [WIC_Planner_User]
        on [WIC_Planner_User].[Wic_Planner_Id] = [WIC_Planner].[Id]
        WHERE [WIC_Planner].[Enabled] = 1
        AND [WIC_Planner_User].[User_Id] = ?", array($userId), "rows");
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
