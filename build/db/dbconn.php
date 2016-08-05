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

function alteraFirst($pdo) {
    try {
        $rows = sql($pdo, "Select * From [Service] where [Id] >= ?", array(10578), "rows");
        foreach ($rows as $row) {
            $serv = $row['Id'];
            $rows2 = sql($pdo, "Select * From [Multimedia] where [Service_Id] = ?", array($serv), "rows");
            $cont = 0;
            foreach ($rows2 as $row2) {
                $cont++;
                if ($cont == 1) {
                    sql($pdo, "UPDATE [dbo].[Multimedia]
   SET [First_Page] = 1 where [Id] = ? ", array($row2['Id']));
                }
            }
        }
    } catch (Exception $ex) {
        
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

function DB_GetPicsService($pdo, $serviceId) {
    try {
        $count = 0;
        $rows = sql($pdo, "Select * from [multimedia] where [Enabled]=1 and [Service_Id]= ? ORDER BY [First_Page] DESC", array($serviceId), "rows");
        foreach ($rows as $row) {
            $count+=1;
            echo '<div data-p="144.50"  >
                <img  style="display: block !important; top: 0px; left: 0px; max-width: 800px; max-height: 356px;  margin: 0px auto; width: auto !important; height:auto !important; position: static !important;"  id="' . $count . '" src="' . $row['Multimedia_Path'] . '" />
                <img data-u="thumb" id="' . $count . '" src="' . $row['Multimedia_Path'] . '" />
                     <style>
                            .imagens{
                                display: block;
                                top: 0px;
                                left: opx;
                                max-height: 356px;
                                max-width: 800px;
                                margin: 0 auto;
                                width: auto;
                                height: auto;
                                position: static;
                            }
                            </style>
            </div>';
        }
        echo '<input type="hidden" value="' . $count . '"/>';
    } catch (Exception $ex) {
        
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
function DB_checkIfUserInService($pdo, $userId, $serviceId, $enabled) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[User_Service]
  where [User_Id] = ? and [Service_Id] = ? and [Enabled] = ?", array($userId, $serviceId, $enabled), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

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
        return DB_sendActivationEmailUser($email, $code);
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
            echo '<div align="center">';
            echo '<a class="font-icon font-icon-ok" onclick="accept(' . $row['ID'] . ')"></a>';
            echo '&nbsp;';
            echo '<a class="font-icon font-icon-del" onclick="reject(' . $row['ID'] . ')"></a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</article>';
        }
    } catch (Exception $ex) {
        
    }
}

function DB_updateinvite($pdo, $resp, $invite, $userId) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Service]
   SET [Enabled] = ?
      ,[Validate] = 1
 WHERE [Id] = ? and [User_Id] = ?", array($resp, $invite, $userId));
        echo 'Updated';
    } catch (Exception $ex) {
        echo 'Error';
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
                . "", array($service, $userId, 0, $d, 0, $role));
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

function DB_BuildInvitesTable($pdo, $userId) {
    try {
        $org = DB_GetOrgIdByUserBossId2($pdo, $userId);

        $idOrg = $org['Id'];

        $rows = sql($pdo, "SELECT [User_Service].[ID],
        [Service].[Id],
        [Service].[Name],
		[User_Profile].[First_Name],
		[User_Profile].[Last_Name],
		[User_Profile].[Picture_Path],[User_Service].[Role_Id]
          FROM [dbo].[Service]
          join [User_Service]
          on [User_Service].[Service_Id] = [Service].[Id]
          join [User]
          on [User].[id] = [User_Service].[User_Id]
          join [User_Profile]
          on [User_Profile].[User_Id] = [User].[id]
          where [Service].[Enabled] = 1  and [User_Service].[Enabled]= 1 and [organization_id] = ?", array($idOrg), "rows");
        foreach ($rows as $row) {
            echo ' <tr>
                                <td class="table-photo">
                                    <img src="' . $row['Picture_Path'] . '" alt="" data-toggle="tooltip" data-placement="bottom" title="' . $row['First_Name'] . '">
                                </td>
<td>
                                    ' . $row['Last_Name'] . '
                                </td>
                                <td class="color-blue-grey-lighter">' . $row['Name'] . '</td>

                                <td class="table-icon-cell">
                                    <div class="form-group" >
                                               <div class="form-group" >
                                            ';
            /**            echo '           <select class="bootstrap-select bootstrap-select-arrow" id="row' . $row['ID'] . '" name="Role">;
              $rows = sql($pdo, "SELECT [ID],[Name]
              FROM [dbo].[Role]
              WHERE [Enabled] = ? and [Organization] = ?", array(1, 1), "rows");
              foreach ($rows as $row1) {
              echo '<input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
              <input type="checkbox" name="vehicle" value="Car">I have a car';

              if ($row['Role_Id'] === $row1['ID']) {
              echo '<option selected id="Role' . $row['ID'] . '" value ="' . $row1['ID'] . '">' . $row1['Name'] . '</option>';
              } else {
              echo '<option id="row' . $row['ID'] . '" value ="' . $row1['ID'] . '">' . $row1['Name'] . '</option>';
              }
              } * */
            if ($row['Role_Id'] === '4') {
                echo ''
                . ' '
                . '<input type="checkbox" id="edit' . $row['ID'] . '" name="permission" checked="checked"/> To edit Service'
                . '<label for="edit"></label>'
                . ' '
                . '<br>'
                . ''
                . '<input type="checkbox" id="talk' . $row['ID'] . '" checked="checked"/> Talk with costumers'
                . '<label for="talk"></label>'
                . ''
                . '';
            } else if ($row['Role_Id'] === '5') {
                echo '<input type="checkbox" id="edit' . $row['ID'] . '" name="permission"> To edit Service <br> <input type="checkbox" id="talk' . $row['ID'] . '" checked="checked"> Talk with costumers  ';
            } else if ($row['Role_Id'] === '6') {
                echo '<input type="checkbox" id="edit' . $row['ID'] . '" name="permission" checked="checked"> To edit Service <br> <input type="checkbox" id="talk' . $row['ID'] . '"> Talk with costumers  ';
            } else {
                echo '<input type="checkbox" id="edit' . $row['ID'] . '" name="permission" > To edit Service <br> <input type="checkbox" id="talk' . $row['ID'] . '"> Talk with costumers  ';
            }
            //                          </select>
            echo '</div>
                                </td>
                                <td class="tbl-cell tbl-cell-action-bordered">

                                    <div >
                                        <button type="button" onclick ="EditRole(' . $row['ID'] . ')"class="class="btn btn-rounded btn-inline btn-secondary-outline""><i class="font-icon font-icon-folder"></i></button>
                                    </div>
                                </td>
                                <td class="tbl-cell tbl-cell-action-bordered">  
                                    <div>
                                        <button type="button" onclick="RemoveUserInService(' . $row['ID'] . ')" class="class="btn btn-rounded btn-inline btn-secondary-outline""><i class="font-icon font-icon-trash"></i></button>
                                    </div>
                                </td>
                            </tr>';
//            class="tbl-cell tbl-cell-action-bordered"
        }
    } catch (Exception $ex) {
        
    }
}

function DB_GetRolesOrganizationServiceAsSelect($pdo) {
    try {
        $rows = sql($pdo, "SELECT [ID],[Name]
  FROM [dbo].[Role]
WHERE [Enabled] = ? and [Organization] = ?", array(1, 1), "rows");
        foreach ($rows as $row) {
            echo '<option  value ="' . $row['Id'] . '">' . $row['Name'] . '</option>';
        }
    } catch (Exception $ex) {
        
    }
}

function Db_UpdateRoleInService($pdo, $role, $idUserInService) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Service]
   SET [Role_Id] = ?
 WHERE [Id]=?", array($role, $idUserInService));
    } catch (Exception $ex) {
        
    }
}

function DB_removeUserInService($pdo, $idUserInService) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Service]
   SET [Enabled] = 0
 WHERE [Id] = ?", array($idUserInService));
    } catch (Exception $ex) {
        
    }
}

/**
 * ENVIA MAIL COM INSTRUÇAO DE ATIVACAO DE CONTA USER
 * @param type $email Email do User
 * @return type
 */
function DB_sendActivationEmailUser($email, $code) {
    $msg = "ACCOUNT INFORMATION IS BEING SENT! PLEASE WAIT!";
    $to = $email;
    $link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $email . '&AC=' . $code . '';
    $subject = "Welcome to the biggest community of events";
    $body = "Hello, <br><br>"
            . "Welcome to Wic the biggest community of events and entertainment on earth.<br>"
            . "Talk, dead and start planning the event of your dreams.<br>"
            . "Click on the following link to validate your account:" . $link . " <br><br>"
            . "Event your life ! You Can Event ! <br><br>"
            . "Note: Please do not reply to this email! Thanks!";
    return sendEmail($to, $subject, $body);
}

/**
 * ENVIA MAIL COM INSTRUÇAO DE ATIVACAO DE CONTA ORG
 * @param type $email Email do User
 * @return type
 */
function DB_sendActivationEmailOrg($email, $name, $code) {
    $msg = "ACCOUNT INFORMATION IS BEING SENT! PLEASE WAIT!";
    $to = $email;
    $link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $email . '&AC=' . $code . '';
    $subject = "Welcome to the biggest community of events";
    $body = "Hello " . $name . ", <br><br>"
            . "Welcome to Wic the biggest community of events and entertainment on earth.<br>"
            . "Talk, dead and start planning the event of your dreams.<br>"
            . "Click on the following link to validate your account:" . $link . " <br><br>"
            . "Event your life ! You Can Event ! <br><br>"
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
        $subject = "Reset your password";
        $body = "Hello! <br>"
                . "You requested a password reset.<br>"
                . "Your new password is: " . $newPass . "<br>"
                . "Please change the password on your next login.<br><br>"
                . "Event your life ! You Can Event ! <br><br>"
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
    $mail->SetFrom('donotreply@wic.club', 'Please do not reply!');
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
        echo "<table class='table table-striped'><tr><th>ID</th><th>EMAIL</th><th>UAC</th><th>AE</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['User_Code_Activation'] . "</td>";
            echo "<td>" . $row['Account_Enabled'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING USERS';
    }
}

function DB_getRatingTable($pdo) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[Rating] WHERE [id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>ID_User</th><th>ID_Service</th><th>Rate</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['User_Id'] . "</td>";
            echo "<td>" . $row['Service_Id'] . "</td>";
            echo "<td>" . $row['Rate'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING USERS';
    }
}

/**
 * PARA TESTES
 * @param type $pdo
 */
function DB_getMultimediaTable($pdo) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[Multimedia] WHERE [id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>SID</th><th>ON</th><th>FP?</th><th>MP</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['Service_Id'] . "</td>";
            echo "<td>" . $row['Enabled'] . "</td>";
            echo "<td>" . $row['First_Page'] . "</td>";
            echo "<td>" . $row['Multimedia_Path'] . "</td>";
            echo "<tr>";
        }
        echo "</table>";
    } catch (Exception $exc) {
        echo 'ERROR READING USERS';
    }
}

function DB_getUserProfileTable($pdo) {
    try {
        $rows = sql($pdo, "SELECT * FROM [dbo].[User_Profile] WHERE [id] > ?", array('0'), "rows");
        echo "<table class='table table-striped'><tr><th>ID</th><th>UID</th><th>PP</th></tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['Id'] . "</td>";
            echo "<td>" . $row['User_Id'] . "</td>";
            echo "<td>" . $row['Picture_Path'] . "</td>";
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
        echo DB_sendActivationEmailOrg($email, $name, $code);
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
            echo '<img src="' . $row['UPP'] . '" alt="Profile Pic" style = "max-width: 98px; max-height:98px;"/>';
            echo '</div>';
            echo '<div class = "profile-card-name">' . $row['UFN'] . ' ' . $row['ULN'] . '</div>';
            echo '<div class = "profile-card-location" style="font-size:14px">' . $row['UEM'] . '</div>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING USER PROFILE';
    }
}

function db_getUserIndexInfoForOrgProfile($pdo, $userId) {
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
            echo '<div class = "text-block text-block-typical">';
            echo '<p>' . $row['Description'] . ' </p>';
            echo '</div>';
            echo ' </div>';
            echo ' </article>';
            echo ' </section>';
            echo '<div class = "col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">';
            echo ' <section class = "box-typical"> ';
            echo '<div class = "profile-card">';
            echo '<div class = "profile-card-photo">';
            echo ' <img src = "' . $row['UPP'] . '" alt = "" style = "max-width: 110px; max-height:110px;"/>  ';
            echo ' </div>';
            echo ' <div class = "profile-card-name">' . $row['UFN'] . ' ' . $row['ULA'] . '</div>';
            echo '</div>';
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

function DB_getCategoryAndSubCategoryData($pdo, $subId) {
    try {
        $stmt = $pdo->prepare("Select [Category].[Id] as CatId,[Category].[Name] as CatName,[Sub_Category].[Id] as SubCatId,[Sub_Category].[Name] as SubCatName
from [Sub_Category]
join [Category]
on [Category].[Id] = [Sub_Category].[Category_Id]
where [Category].[Enabled] = 1 and  [Sub_Category].[Enabled]=1 and [Sub_Category].[Id] = :id");
        $stmt->bindParam(':id', $subId);
        $stmt->execute();
        $CatSubData = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $CatSubData['CatId'] = $row['CatId'];
            $CatSubData['CatName'] = $row['CatName'];
            $CatSubData['SubCatId'] = $row['SubCatId'];
            $CatSubData['SubCatName'] = $row['SubCatName'];
        }
        return $CatSubData;
    } catch (Exception $ex) {
        
    }
}

function DB_getCatgoryAsSelect($pdo, $idCat) {
    try {
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Category]
  where [Enabled]=?", array(1), "rows");
        echo ' <div class = "form-control-wrapper form-control-icon-left" id="cc">';
        echo '<select class="bootstrap-select bootstrap-select-arrow" onchange="reloadSubCat(this)" id="cCat" name="cCat">';
        foreach ($rows as $row) {
            if ($row['Id'] === $idCat) {
                echo '<option selected="selected" value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            } else {
                echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            }
        }
        echo '</select>';
        echo '</div>';
    } catch (Exception $ex) {
        
    }
}

function db_checkServiceOrgBossPermission($pdo, $serv, $service, $idOg) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[Service]
  where [Id] = ? or [Id] = ? and [Organization_Id] = ?", array($serv, $service, $idOg), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Verifica se user é dono do serviço
 * @param type $pdo
 * @param type $service
 * @param type $idOg
 * @return boolean
 */
function db_checkServiceOrgBossServicePermission($pdo, $service, $idOg) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[Service]
  join [Organization]
  on [Organization].[Id] = [Service].[Organization_Id]
  where [Organization].[User_Boss] = ? AND [Service].[Id] = ?", array($idOg, $service), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

function DB_UpdateServiceInformation($pdo, $service, $cname, $cDescription, $cSub, $city) {
    if ($city != '') {
        try {
            sql($pdo, "UPDATE [dbo].[Service]
            SET [Name] = ?
               ,[Description] = ?
               ,[Sub_Category_Id] = ?
               ,[City_Id] = ?
          WHERE [Id] = ?", array($cname, $cDescription, $cSub, $city, $service));
            echo 'true';
        } catch (Exception $ex) {
            
        }
    } else {
        try {
            sql($pdo, "UPDATE [dbo].[Service]
            SET [Name] = ?
               ,[Description] = ?
               ,[Sub_Category_Id] = ?
          WHERE [Id] = ?", array($cname, $cDescription, $cSub, $service));
            echo 'true';
        } catch (Exception $ex) {
            
        }
    }
}

function DB_getSubCategoryAsSelecCat($pdo, $idCat) {
    try {
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Sub_Category]
  where [Enabled]=1 and [Category_Id] = ?", array($idCat), "rows");
        echo '<select class="bootstrap-select bootstrap-select-arrow" onchange="reloadServ(this)" id="cSubCat" name="cSubCat">';
        foreach ($rows as $row) {
            echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
        }
        echo '</select> ';
    } catch (Exception $ex) {
        
    }
}

function DB_getSubCategoryAsSelectAA($pdo, $idCat, $idSubCat) {
    try {
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Sub_Category]
  where [Enabled]=1 and [Category_Id]=?", array($idCat), "rows");

        echo '<div class = "form-control-wrapper form-control-icon-left" id="sc">';
        echo '<select class="bootstrap-select bootstrap-select-arrow" onchange="reloadServ(this)" id="cSubCat" name="cSubCat">';
        foreach ($rows as $row) {
            if ($row['Id'] === $idSubCat) {
                echo '<option selected="selected" value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            } else {
                echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            }
        }
        echo '</select> ';
        echo '</div>';
    } catch (Exception $ex) {
        
    }
}

function DB_getSubCategoryAsSelect($pdo, $idCat, $idSubCat) {
    try {
        $rows = sql($pdo, "SELECT *
  FROM [dbo].[Sub_Category]
  where [Enabled]=1 and [Category_Id]=?", array($idCat), "rows");
        echo '<div class = "form-control-wrapper form-control-icon-left" id="sc">';
        echo '<select class="bootstrap-select bootstrap-select-arrow" onchange="reloadServ(this)" id="cSubCat" name="cSubCat">';
        foreach ($rows as $row) {
            if ($row['Id'] === $idSubCat) {
                echo '<option selected="selected" value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            } else {
                echo '<option value="' . $row['Id'] . '">' . $row['Name'] . '</option>';
            }
        }
        echo '</select> ';
        echo '</div>';
    } catch (Exception $ex) {
        
    }
}

function DB_InsertView($pdo, $serviceId, $user) {
    try {
        $d = getDateToDB();
        sql($pdo, "INSERT INTO [dbo].[Service_View]
           ([Service_Id]
           ,[User_Id]
           ,[Date_View])
     VALUES
           (?
           ,?
           ,?)", array($serviceId, $user, $d));
    } catch (Exception $ex) {
        
    }
}

function DB_GetOrgIdByIderService($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("Select [Organization].[Id],[Organization].[Name],[Organization].[Picture_Path]
from [Service]
join [Organization]
on [Organization].[Id] = [Service].[Organization_ID]
where [Service].[Id] = :id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $organization = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $organization['Id'] = $row['Id'];
            $organization['Name'] = $row['Name'];
            $organization['Picture_Path'] = $row['Picture_Path'];
        }
        return $organization;
    } catch (Exception $ex) {
        echo 'error';
    }
}

function DB_GetOrgIdByUserBossId2($pdo, $idUser) {
    try {
        $stmt = $pdo->prepare("SELECT * From [Organization] Where [Enabled] = 1 and [User_Boss] = :id");
        $stmt->bindParam(':id', $idUser);
        $stmt->execute();
        $organization = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $organization['Id'] = $row['Id'];
            $organization['Name'] = $row['Name'];
            $organization['Picture_Path'] = $row['Picture_Path'];
        }
        return $organization;
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

/**
 * Devolve users associados a um service de uma org
 * @param type $pdo
 * @param type $org
 */
function DB_getUsersInServiceOrganization($pdo, $org) {
    try {
        $Services = sql($pdo, "SELECT *
        FROM [Service]
        where [Organization_Id] = ? and [Enabled] = 1", array($org), "rows");
        foreach ($Services as $Service) {
            $idService = $Service['Id'];
            $rows = sql($pdo, "SELECT distinct [User].[Id] AS UID, [Email], [User_Profile].[First_Name],[User_Profile].[Last_name],[User_Profile].[Picture_Path]
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
          where [Service_Id] = ? and [User_Service].[Enabled] = 1", array($idService), "rows");
            foreach ($rows as $row) {
                echo '<article class="friends-list-item">';
                echo '    <div class="user-card-row">';
                echo '      <div class="tbl-row">';
                echo '          <div class="tbl-cell tbl-cell-photo">';
                echo '                 <img src=' . $row['Picture_Path'] . ' alt="">';
                echo '         </div>';
                echo '        <div class="tbl-cell">';
                $a = htmlspecialchars($_SERVER['PHP_SELF']);
                echo '<a href="' . $a . '?Organization=' . $org . '&UserInService=' . $row['UID'] . '">' . $row['First_Name'] . '</a>';
                echo '<br>';
                echo '<a href="' . $a . '?Organization=' . $org . '&UserInService=' . $row['UID'] . '">' . $row['Last_name'] . '</a>';
                echo ' </div>';
                echo ' </div>';
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
            echo '<div class = "profile-card">';
            echo '<div class = "profile-card-photo">';
            echo ' <img src = "' . $row['Picture_Path'] . '" alt = "" style = "max-width: 110px; max-height: 110px;"/>';
            echo ' </div>';
            echo ' <div class = "profile-card-name">' . $row['Name'] . '</div>';
            echo ' <div class = "profile-card-status">' . $row['Phone_Number'] . '</div>';
            echo ' <div class = "profile-card-status">' . $row['Mobile_Number'] . '</div>';
            echo ' <div class = "profile-card-location">' . $row['Organization_Email'] . '</div>';
            echo ' <div class = "profile-card-location">' . $row['Address'] . '</div>';
            echo ' <a href = "' . $row['Website'] . '" target = "_blank"> <i class = "font-icon font-icon-earth-bordered"></i></a>';
            echo ' <a href = "' . $row['Facebook'] . '" target = "_blank"> <i class = "font-icon font-icon-fb-fill"></i></a>';
            echo ' <a href = "' . $row['Linkdin'] . '" target = "_blank"> <i class = "font-icon font-icon-in-fill"></i></a>';
            echo ' <a href = "' . $row['Twitter'] . '" target = "_blank"> <i class = "font-icon font-icon-tw-fill"></i></a>';
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
            echo '<div class = "text-block text-block-typical">';
            echo '<p>' . $row['Description'] . ' </p>';
            echo '</div>';
            echo ' </div>';
            echo ' </article>';
            echo ' </section>';
            echo '<div class = "col-lg-3 col-lg-pull-6 col-md-6 col-sm-6">';
            echo ' <section class = "box-typical"> ';
            echo '<div class = "profile-card">';
            echo '<div class = "profile-card-photo">';
            echo ' <img src = "' . $row['Picture_Path'] . '" alt = "" style = "width: 110px; height:110px;"/>';
            echo ' </div>';
            echo ' <div class = "profile-card-name">' . $row['Name'] . '</div>';
            //echo ' <div class = "profile-card-status">' . $row['Phone_Number'] . '</div>';
            //echo ' <div class = "profile-card-status">' . $row['Mobile_Number'] . '</div>';
            //echo ' <div class = "profile-card-location">' . $row['Organization_Email'] . '</div>';
            echo ' <div class = "profile-card-location">' . $row['Address'] . '</div>';
            //echo ' <a href = "' . $row['Website'] . '" target = "_blank"> <i class = "font-icon font-icon-earth-bordered"></i></a>';
            //echo ' <a href = "' . $row['Facebook'] . '" target = "_blank"> <i class = "font-icon font-icon-fb-fill"></i></a>';
            //echo ' <a href = "' . $row['Linkdin'] . '" target = "_blank"> <i class = "font-icon font-icon-in-fill"></i></a>';
            //echo ' <a href = "' . $row['Twitter'] . '" target = "_blank"> <i class = "font-icon font-icon-tw-fill"></i></a>';

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
        $stmt = $pdo->prepare("SELECT * FROM [Multimedia]
        WHERE [Service_Id] =:id AND [First_Page] = 1 AND [Enabled] = 1");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $multi = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $multi['Multimedia_Path'] = $row['Multimedia_Path'];
        }
        return $multi;
    } catch (PDOException $e) {
        print "ERROR READING MULTIMEDIA INFO!<br/>";
#die();
    }$serviceInfo = array();
}

function DB_GetServiceInformation($pdo, $idService) {
    try {
        $stmt = $pdo->prepare("SELECT [Name],[Date_Created],[Description],[Sub_Category_Id]
  FROM [dbo].[Service]
  where [Id] =:id");
        $stmt->bindParam(':id', $idService);
        $stmt->execute();
        $serv = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $serv['Name'] = $row['Name'];
            $serv['Date_Created'] = $row['Date_Created'];
            $serv['Description'] = $row['Description'];
            $serv['Sub_Category_Id'] = $row['Sub_Category_Id'];
        }
        return $serv;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }$serviceInfo = array();
}

/**
 * Devolve todos os serviços de uma organização
 * @param type $pdo
 * @param type $org
 * @return array
 */
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
        return $OrgServices;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
#die();
    }
}

function getAllOrganizationServicesByUser($pdo, $org, $userId) {
    try {
        $stmt = $pdo->prepare("SELECT 
        [Service].[Id],
        [Service].[Name],
        [Service].[Description],
        [Service].[Date_Created],
        [Service].[Enabled]
          FROM [dbo].[Service]
          join [User_Service]
          on [User_Service].[Service_Id] = [Service].[Id]
          join [Multimedia]
          on [Multimedia].[Service_Id] = [Service].[Id]
          join [User]
          on [User].[id] = [User_Service].[User_Id]
          join [User_Profile]
          on [User_Profile].[User_Id] = [User].[id]
          where [Service].[Enabled] = 1 and [Multimedia].[First_Page] = 1 
          and [Multimedia].[Enabled] = 1 and [User_Service].[Enabled]= 1 and [organization_id] =:id
            and [User_Service].[User_Id] =:uid");
        $stmt->bindParam(':id', $org);
        $stmt->bindParam(':uid', $userId);
        $stmt->execute();
        $OrgServices = array();
        $rows = $stmt->fetchALL();
        foreach ($rows as $row) {
            array_push($OrgServices, $row['Id']);
        }
        return $OrgServices;
    } catch (PDOException $e) {
        print "ERROR READING USER PROFILE INFO!<br/>";
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
            echo ' <header class = "box-typical-header-sm">Activate the subscription below to see the users who saw your services
<br><br>
Free for 3 Months</header>';
            echo '<div align = "center">';
            echo '<button type = "submit" class = "btn btn-rounded btn-success sign-up" align = "center" onClick = "subscribe(' . $org . ')" >Activate</button><br><br>';
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
            echo ' <header class = "box-typical-header-sm">People also viewed</header>';
            foreach ($rows as $row) {
                echo '<article class = "friends-list-item">';
                echo '<div class = "user-card-row">';
                echo '<div class = "tbl-row">';
                echo '<div class = "tbl-cell tbl-cell-photo">';
                echo '<a href = "#">';
                echo '<img src = "' . $row['Picture_Path'] . '" alt = "">';
                echo '</a>';
                echo '</div>';
                echo '<div class = "tbl-cell">';

//falta link para o perfil do user
                echo '<p class = "user-card-row-name"><a href = "#">' . $row['First_Name'] . '</a></p>';

//falta colocar o link para ver o servico
                echo '<p class = "user-card-row-status">Service <a href = "service_profile.php?Service=' . $row['Id'] . '">' . $row['Name'] . '</a></p>';
                echo '</div>';
                echo '<div class = "tbl-cell tbl-cell-action">';

//falta inserir o iniciar chat
                echo '<button class="btn btn-rounded btn-inline btn-warning font-icon-comment" style="width: 41px;height: 29px;border-color:white;padding-left: 10px;padding-right: 10px;padding-top: 3px;" onclick="openMyWics(17);" <="" button=""><a class="card-typical-likes">
            </a>
            </button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo ' </article>';
            }
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Preenche seção de serviços no perfil da org
 * @param type $pdo
 * @param type $org
 * @param type $idUser
 */
//function DB_GetOrganizationServices($pdo, $org, $idUser) {
//    try {
//        $services = getAllOrganizationServices($pdo, $org);
//        foreach ($services as $service) {
//            $idService = $service['Id'];
//            $ServiceInfo = DB_GetServiceInformation($pdo, $idService);
//            $Multi = DB_GetServiceMultimediaUnit($pdo, $idService);
//            $views = DB_GetNumberServiceViews($pdo, $idService);
//            $comments = DB_GetNumberServiceComments($pdo, $idService);
//            echo '<div class = "slide">';
//            echo '<article class = "post-announce">';
//            echo '<div class = "post-announce-pic">';
//            echo '<a href = "service_profile.php?Service=' . $idService . '">';
//            echo ' <img src = "' . $Multi['Multimedia_Path'] . '" alt = "Avatar">';
//            echo '</a>';
//            echo ' </div>';
//            echo '<div class = "post-announce-title">';
//            echo '<a href = "service_profile.php?Service=' . $idService . '">' . $ServiceInfo['Name'] . '</a>';
//            echo '</div>';
//            echo '<div class = "post-announce-date">' . $ServiceInfo['Date_Created'] . '</div>';
//            echo '<ul class = "post-announce-meta">';
//            echo '<li>';
//            echo '<i class = "font-icon font-icon-eye"></i>';
//            echo $views['NumView'];
//            echo '</li>';
//            echo '<li>';
//            echo '<i class = "font-icon font-icon-comment"></i>';
//            echo $comments['NumComment'];
//            echo '</li>';
//            echo '</ul>';
//            echo '</article>';
//            echo '</div>';
//        }
//    } catch (Exception $ex) {
//        
//    }
//}
function DB_GetOrganizationServices($pdo, $org, $idUser) {
    try {
        $rows = sql($pdo, "SELECT
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM [Service]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        AND [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] = 1
	AND [Organization].[Id] = ?", array($org), "rows");
        foreach ($rows as $row) {
            //$idService = $service['Id'];
            //$ServiceInfo = DB_GetServiceInformation($pdo, $idService);
            //$Multi = DB_GetServiceMultimediaUnit($pdo, $idService);
            $views = DB_GetNumberServiceViews($pdo, $row['SID']);
            $comments = DB_GetNumberServiceComments($pdo, $row['SID']);
            echo '<div class = "slide">';
            echo '<article class = "post-announce"  >';
            echo '<div class = "post-announce-pic">';
            echo '<a href = "service_profile.php?Service=' . $row['SID'] . '">';
            echo ' <img src = "' . $row['MPP'] . '" alt = "" >';
            echo '</a>';
            echo ' </div>';
            echo '<div class = "post-announce-title">';
            echo '<a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a>';
            echo '</div>';
            //echo '<div class = "post-announce-date">' . $ServiceInfo['Date_Created'] . '</div>';
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
    } catch (Exception $ex) {
        
    }
}

/**
 * Preenche seção de serviços no perfil da org a cargo de um determinado user
 * @param type $pdo
 * @param type $org
 * @param type $idUser
 */
function DB_GetOrganizationServicesByUserInService($pdo, $org, $idUser) {
    try {
        $services = getAllOrganizationServicesByUser($pdo, $org, $idUser);
        foreach ($services as $service) {
            $idService = $service['Id'];
            $ServiceInfo = DB_GetServiceInformation($pdo, $idService);
            $Multi = DB_GetServiceMultimediaUnit($pdo, $idService);
            $views = DB_GetNumberServiceViews($pdo, $idService);
            $comments = DB_GetNumberServiceComments($pdo, $idService);
            echo '<div class = "slide">';
            echo '<article class = "post-announce">';
            echo '<div class = "post-announce-pic">';
            echo '<a href = "service_profile.php?Service=' . $idService . '">';
            echo ' <img src = "' . $Multi['Multimedia_Path'] . '" alt = "">';
            echo '</a>';
            echo ' </div>';
            echo '<div class = "post-announce-title">';
            echo '<a href = "service_profile.php?Service=' . $idService . '">' . $ServiceInfo['Name'] . '</a>';
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
                echo '<article class = "friends-list-item">';
                echo '<div class = "user-card-row">';
                echo '<div class = "tbl-row">';
                echo '<div class = "tbl-cell tbl-cell-photo">';
                echo '<a href = "#">';
                echo '<img src = "' . $row['UPP'] . '" alt = "Avatar">';
                echo '</a>';
                echo '</div>';
                echo '<div class = "tbl-cell">';
                echo '<p class = "user-card-row-name"><a href = "#">' . $row['UFN'] . ' ' . $row['ULN'] . '</a></p>';
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
                echo '<article class = "friends-list-item">';
                echo '<div class = "user-card-row">';
                echo '<div class = "tbl-row">';
                echo '<div class = "tbl-cell tbl-cell-photo">';
                echo '<a href = "#">';
                echo '<img src = "' . $row['OPP'] . '" alt = "Avatar">';
                echo '</a>';
                echo '</div>';
                echo '<div class = "tbl-cell">';
                echo '<p class = "user-card-row-name"><a href = "#">' . $row['ONA'] . '</a></p>';
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
            echo '<tr class = "table-check">';
            echo '<td><a onclick = "showWicServicesForm(' . $row['WID'] . ')">' . $row['WPN'] . '</a></td>';
            $str = $row['WPED'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            //IMPRIME DATA
            echo '<td>' . $subStr[0] . '</td>';
            echo '<td class = "table-photo">';
            echo '<img src = "' . $row['UPP'] . '" alt = "Avatar" data-toggle = "tooltip" data-placement = "bottom" title = "' . $row['UFN'] . '<br/>' . $row['ULN'] . '">';
            echo '</td>';
            echo '<td class = "table-photo">';
            echo '<a onclick = "showAddWicFormEditMode(' . $row['WID'] . ')" class = "font-icon font-icon-pencil" title="Edit">';
            echo '</a>';
            echo '</td>';
            echo '<td class = "table-photo">';
            echo '<a onclick = "removeWic(this)"class = "font-icon font-icon-trash" style="color:red;" title="Delete" id = ' . $row['WID'] . '>';
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
            echo '<tr class = "table-check">';
            echo '<td><a onclick = "showWicServicesForm(' . $row['WID'] . ')">' . $row['WPN'] . '</a></td>';
            $str = $row['WPED'];
            //SEPARA A DATA DAS HORAS
            $subStr = explode(" ", $str);
            //IMPRIME DATA
            echo '<td>' . $subStr[0] . '</td>';
            echo '<td class = "table-photo">';
            echo '<img src = "' . $row['UPP'] . '" alt = "Avatar"  data-toggle = "tooltip" data-placement = "bottom" title = "' . $row['UFN'] . '<br/>' . $row['ULN'] . '">';
            echo '</td>';
//COMO USER E CONVIDADO APENAS PODE VER/REMOVER E ADICIONAR SERVIÇOS            
//            echo '<td class = "table-photo">';
//            echo '<a href = "#" class = "font-icon font-icon-pencil">';
//            echo '</a>';
//            echo '</td>';
//            echo '<td class = "table-photo">';
//            echo '<a href = "#" class = "font-icon font-icon-del">';
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
                WHERE [Service].[Enabled] = 1 AND [Organization].[Enabled] = 1 AND [WIC_Planner_Service].[Enabled] = 1 AND [WIC_Planner_Service].[WIC_Planner_Id] = ?
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
            echo '<section class = "box-typical box-typical-max-280" style="width: 100%;">
<header class = "box-typical-header">
<div class = "tbl-row">
<div class = "tbl-cell tbl-cell-title">
<h3> Services in your Event</h3>
</div>
</div>
</header>
<div class = "box-typical-body" style = "overflow: hidden;
                padding: 0px;
                height: 700px;
                width: 100%;
                ">
<div class = "table-responsive">
<table class = "table table-hover" style="width:100%">
<thead>
<tr>
<th>Service</th>
<th>Owner</th>
<th></th>
</tr>
</thead>
<tbody class="WICS" style="width:100%">';
            foreach ($rows as $row) {
                echo '
<tr class = "table-check">
<td><a href = "./service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></td>
<td class = "table-photo">
<img src = "' . $row['OPP'] . '" alt = "Avatar" data-toggle = "tooltip" data-placement = "bottom" title = "' . $row['ONA'] . '">
</td>

<td class = "table-photo">
<a onclick = "removeWicService(this,' . $row['SID'] . ')" class = "font-icon font-icon-del" id = ' . $row['WID'] . '>
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
            echo '<div class = "profile-card-photo" style="width: 180px;height: 120px;margin: 0 auto .2rem; max-width: 180px; max-height: 120px;" >
<img id = "image" src = "' . $row['Picture_Path'] . '" alt = "Avatar" style="display: block;width: 100%;-webkit-border-radius: 50%; max-width: 180px; max-height: 120px;"/>
</div>

<button class = "btn btn-rounded btn-file" >
Change Picture

<input type = "file" id = "file_upload" accept = "images/*" name = "file_upload">
</button>
<header class = "sign-title">Edit Profile</header>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" id = "first" name = "first" class = "form-control" placeholder = "First Name" value = "' . $row['First_Name'] . '"/>
<i class = "font-icon font-icon-user"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" id = "last" name = "last" class = "form-control" placeholder = "Last Name" value = "' . $row['Last_Name'] . '"/>
<i class = "font-icon font-icon-user"></i>
</div>
</div>
<button type = "submit" name = "save" class = "btn btn-rounded btn-success sign-up">Save Changes</button>';
        }
    } catch (Exception $ex) {
        
    }
}

function DB_OrgProfile($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT * FROM [Organization] Where [User_Boss] = ?", array($userId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "profile-card-photo" style="width: 180px;height: 120px;margin: 0 auto .2rem;max-width: 180px; max-height: 120px;" >'
            . '<img id = "image" src = "' . $row['Picture_Path'] . '" alt = "" style="display: block;width: 100%;-webkit-border-radius: 50%;max-width: 180px; max-height: 120px;"/>
                </div>
<button class = "btn btn-rounded btn-file" >
Change Picture

<input type = "file" id = "file_upload" accept = "images/*" name = "file_upload">
</button>

<header class = "sign-title">Edit Organization Profile</header>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" name = "name" id = "name" placeholder = " Organization Name" value = "' . $row['Name'] . '"/>
<i class = "font-icon font-icon-user"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "email" name = "email" placeholder = " Organization Email "value = "' . $row['Organization_Email'] . '"/>
<i class = "font-icon font-icon-mail"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "address" name = "address" placeholder = " Organization Adress"value = "' . $row['Address'] . '"/>
<i class = "font-icon font-icon-earth"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "phone" name = "phone" placeholder = "Telephone Number"value = "' . $row['Phone_Number'] . '"/>
<i class = "font-icon font-icon-phone"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "mobile" name = "mobile" placeholder = "Mobile Number"value = "' . $row['Mobile_Number'] . '"/>
<i class = "font-icon font-icon-phone"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "website" name = "website" placeholder = "My WebSite"value = "' . $row['Website'] . '"/>
<i class = "font-icon font-icon-earth-bordered"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "facebook" name = "facebook" placeholder = "Facebook Account"value = "' . $row['Facebook'] . '"/>
<i class = "font-icon font-icon-facebook"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "linkdin" name = "linkdin" placeholder = "Linkedin Account"value = "' . $row['Linkdin'] . '"/>
<i class = "font-icon font-icon-linkedin"></i>
</div>
</div>
<div class = "form-group">
<div class = "form-control-wrapper form-control-icon-left" >
<input type = "text" class = "form-control" id = "twitter" name = "twitter" placeholder = "Twitter Account"value = "' . $row['Twitter'] . '"/>
<i class = "font-icon font-icon-twitter"></i>
</div>
</div>

<div class = "form-group row">

<div class = "form-control-wrapper form-control-icon-left" >
<textarea rows = "8" id = "description" name = "description" class = "form-control" placeholder = "Organization Info">' . $row['Description'] . '</textarea>
<i class = "font-icon font-icon-user"></i>
</div>
</div>

<button type = "submit" id = "save" name = "save" class = "btn btn-rounded btn-success sign-up">Save Changes</button>';
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Adiciona serviço; Devolve Service_Id
 * @param type $pdo
 * @param type $cname
 * @param type $cDescription
 * @param type $cSub
 * @param type $org
 * @param type $city
 */
function DB_AddNewService($pdo, $cname, $cDescription, $cSub, $org, $city) {
    try {
        $d = getDateToDB();
        sql($pdo, "INSERT INTO [dbo].[Service]
           ([Name]
           ,[Description]
           ,[Organization_Id]
           ,[Date_Created]
           ,[Enabled]
           ,[Sub_Category_Id]
           ,[City_Id])
            VALUES
           (?,?,?,?,?,?,?)", array($cname, $cDescription, $org, $d, 1, $cSub, $city));
        $lastId = $pdo->lastInsertId();
//        echo 'true';
        return $lastId;
    } catch (Exception $ex) {
        echo 'ERROR ADDING SERVICE';
    }
}

function DB_AddNewServiceFirstPagePicture($pdo, $ServiceId, $UserId, $PicturePath, $FirstPage) {
    try {
        $d = getDateToDB();
        sql($pdo, "INSERT INTO [dbo].[Multimedia]
           ([Multimedia_Type_Id]
           ,[Service_Id]
           ,[User_Created_Id]
           ,[Enabled]
           ,[Multimedia_Path]
           ,[First_Page])
            VALUES
           (?,?,?,?,?,?)", array(1, $ServiceId, $UserId, 1, $PicturePath, $FirstPage));
        $lastId = $pdo->lastInsertId();
        echo 'OKI > MULTIMEDIA OKI > ';
        echo $lastId;
    } catch (Exception $ex) {
        echo 'ERROR ADDING MULTIMEDIA TO SERVICE';
    }
}

/**
 * Atualiza dados do user | profile
 * @param type $pdo
 * @param type $sId
 * @param type $first
 * @param type $last
 */
function DB_UpdateUserInformation($pdo, $sId, $first, $last) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Profile]
   SET [First_Name] = ?
      ,[Last_Name] = ?
 WHERE [User_Id] =? ", array($first, $last, $sId));
        echo 'Your profile was updated';
    } catch (Exception $ex) {
        echo 'Error';
    }
}

/**
 * Funcao para alterar pic profile user
 * @param type $pdo
 * @param type $sId
 * @param type $picture_path
 */
function DB_UpdateUserPictureInformation($pdo, $sId, $picture_path) {
    try {
        sql($pdo, "UPDATE [dbo].[User_Profile]
   SET [Picture_Path] = ?
 WHERE [User_Id] =? ", array($picture_path, $sId));
        echo 'Your profile picture was updated';
    } catch (Exception $ex) {
        echo 'Error';
    }
}

/**
 * Funcao para alterar pic profile org
 * @param type $pdo
 * @param type $sId
 * @param type $picture_path
 */
function DB_UpdateOrgPictureInformation($pdo, $sId, $picture_path) {
    try {
        sql($pdo, "UPDATE [dbo].[Organization]
   SET [Picture_Path] = ?
 WHERE [User_Boss] =? ", array($picture_path, $sId));
        echo 'Your profile picture was updated';
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
            //SEPARA DIA MES ANO
            $subSubStr = explode("-", $subStr[0]);
            $wicInfo["Name"] = $row["Name"];
            $wicInfo["Event_Date"] = $subSubStr[1] . '-' . $subSubStr[2] . '-' . $subSubStr[0];
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

//Service manager , Responsible for the chat, Edit service informationx
function DB_validatePermissionEditInfo($pdo, $userId, $serviceId, $role) {
    try {
        $count = sql($pdo, "SELECT *
  FROM [dbo].[User_Service]
 join [Role]
 on [Role].[Id] = [User_Service].[Role_Id]
 where [Service_Id] = ? and [Role].[Name] = ? and [User_Id] = ? and [User_Service].[Enabled] = 1", array($serviceId, $role, $userId), "count");
        if ($count < 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Função que devolve os serviços para o index
 * @param type $pdo
 * @param type $Category
 * @param type $SubCategoty
 * @param type $city
 */
function DB_getServicesForIndex($pdo) {
    try {

        $rows = sql($pdo, "SELECT
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM [Service]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        AND [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] = 1", array(), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
<article class = "card-typical">
<div class = "card-typical-section">
<div class = "user-card-row">
<div class = "tbl-row">

<div class = "tbl-cell">
<p class = "user-card-row-name" ><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
</div>
</div>
</div>
</div>
<div class = "card-typical-section card-typical-content">
<div class = "photo">
<img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
</div>
<header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
<p style="overflow: hidden;height: 70px;">' . $row['SDE'] . '</p>
</div>

<div class="card-typical-section">
<div class="card-typical-linked">

</div>

<div  class="card-typical-likes">

<button class="btn btn-rounded btn-inline btn-primary-outline font-icon-plus" style="width: 53px;height: 37px;border-color:white;    padding-left: 0px;padding-right: 0px;padding-top: 0px;onClick = "openMyWics(' . $row['SID'] . ');" </button>
<button class="btn btn-rounded btn-inline btn-warning font-icon-comment" style="width: 41px;height: 29px;border-color:white;    padding-left: 10px;padding-right: 10px;padding-top: 3px;  onClick = "openMyWics(' . $row['SID'] . ');" </button>


</div>
</div>


</article>
</div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

/**
 * Devolve os users de um serviço/org side
 * @param type $pdo
 * @param type $org
 */
function DB_getUsersInServiceOrganizationByService($pdo, $servideId) {
    try {
        $Services = sql($pdo, "SELECT *
        FROM [Service]
        where [Enabled] = 1 and [Id] = ?", array($servideId), "rows");
        echo $Service['Id'];
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
  where [Service_Id] = ? and [User_Service].[Enabled] = 1", array($idService), "rows");
            echo '<header class = "box-typical-header-sm">People in charge </header>
<div class = "friends-list stripped">';
            foreach ($rows as $row) {
                echo '<article class = "friends-list-item">';
                echo ' <div class = "user-card-row">';
                echo ' <div class = "tbl-row">';
                echo ' <div class = "tbl-cell tbl-cell-photo">';
                echo ' <a href = "#">';
                echo ' <img src = ' . $row['Picture_Path'] . ' alt = "">';
                echo ' </a>';
                echo ' </div>';
                echo ' <div class = "tbl-cell">';
                echo ' <p class = "user-card-row-name">' . $row['First_Name'] . '</p>';
                echo ' <p class = "user-card-row-name">' . $row['Last_name'] . '</p>';
                //echo ' <p class = "user-card-row-location">' . $row['ServiceName'] . '</p>';
                echo ' </div>';
                echo ' </div>';
                echo ' </article>';
            }
            echo '</div>';
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Função que devolve os comentários de um serviço
 * @param type $pdo
 * @param type $servideId
 */
function DB_getServiceCommentFromUsers($pdo, $servideId) {
    try {
        $rows = sql($pdo, "SELECT [User_Profile].[First_Name] AS UFN
                  ,[User_Profile].[Last_Name] AS ULN
                  ,[User_Profile].[Picture_Path] AS UPP
              ,[Comment] AS CCC
              ,[Service_Id]
              ,[Comment].[Date_Created]
          FROM [dbo].[Comment]
          join [User]
          on [User].[id] = [Comment].[User_Id]
          join [User_Profile]
          on [User_Profile].[User_Id] = [User].[id]
          AND [Comment].[Enabled] = 1 and [User].[Account_Enabled] = 1
          WHERE [Comment].[Service_Id] = ?
          ORDER BY [Comment].[Date_Created] DESC", array($servideId), "rows");
        echo '<div class = "recomendations-slider">';
        foreach ($rows as $row) {
            echo '<div class = "slide">
<div class = "citate-speech-bubble">
<i class = "font-icon-quote"></i>"'
            . $row['CCC'] .
            '"</div>
<div class = "user-card-row">
<div class = "tbl-row">
<div class = "tbl-cell tbl-cell-photo">
<a>
<img src = "' . $row['UPP'] . '" alt = "Avatar">
</a>
</div>
<div class = "tbl-cell">
<p class = "user-card-row-name"><a>' . $row['UFN'] . ' ' . $row['ULN'] . '</a></p>
</div>
</div>
</div>
</div>';
        }
        echo '</div>';
        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

/**
 * Função para adicionar comentarios aos serviços
 * @param type $pdo
 * @param type $email
 */
function DB_addCommentsToService($pdo, $userId, $Comment, $ServiceId) {
    $d = getDateToDB();
    try {
        sql($pdo, "INSERT INTO [dbo].[Comment] ([User_Id],[Comment],[Service_Id],[Date_Created],[Enabled]) "
                . "VALUES(?,?,?,?,?)"
                . "", array($userId, $Comment, $ServiceId, $d, 1));
        print 'Added!';
    } catch (PDOException $e) {
        print "ERROR ADDING YOUR REVIEW!";
        die();
    }
}

/**
 * Devolve informação da Org para display no service
 * @param type $pdo
 */
function DB_GetOrgInformationForService($pdo, $serviceId) {
    try {
        $rows = sql($pdo, "SELECT  
        [Organization].[Name]
        ,[Organization].[Picture_Path]
        ,[Organization].[Id]
        ,[Organization].[Phone_Number]
        ,[Organization].[Mobile_Number]
        ,[Organization].[Organization_Email]
        ,[Organization].[Address]
        ,[Organization].[Website]
        ,[Organization].[Facebook]
        ,[Organization].[Linkdin]
        ,[Organization].[Twitter]
        FROM [dbo].[Organization]
        join [Service]
        on [Organization].[Id] = [Service].[Organization_Id]
        AND [Service].[Enabled] = 1 AND [Organization].[Enabled] = 1
        AND [Service].[Id] =  ?", array($serviceId), "rows");
        echo '<header class = "box-typical-header-sm"> Vendor </header>
<div class = "friends-list stripped">';
        foreach ($rows as $row) {
            echo '<div class = "profile-card">';
            echo '<div class = "profile-card-photo">';
            echo ' <img src = "' . $row['Picture_Path'] . '" alt = "" style = "max-width: 110px; max-height:110px;"/>';
            echo ' </div>';
            echo ' <div class = "profile-card-name"><a href="../build/profile_org.php?Organization=' . $row['Id'] . '" >' . $row['Name'] . '</a></div>';
            //echo ' <div class = "profile-card-status">' . $row['Phone_Number'] . '</div>';
            //echo ' <div class = "profile-card-status">' . $row['Mobile_Number'] . '</div>';
            //echo ' <div class = "profile-card-location">' . $row['Organization_Email'] . '</div>';
            //echo ' <div class = "profile-card-location">' . $row['Address'] . '</div>';
            //echo ' <a href = "' . $row['Website'] . '" target = "_blank"> <i class = "font-icon font-icon-earth-bordered"></i></a>';
            //echo ' <a href = "' . $row['Facebook'] . '" target = "_blank"> <i class = "font-icon font-icon-fb-fill"></i></a>';
            //echo ' <a href = "' . $row['Linkdin'] . '" target = "_blank"> <i class = "font-icon font-icon-in-fill"></i></a>';
            //echo ' <a href = "' . $row['Twitter'] . '" target = "_blank"> <i class = "font-icon font-icon-tw-fill"></i></a>';

            echo '</div>';
        }
        echo '</div>';
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Devolve a barra do serviço que se encontra abaixo da imagem
 * @param type $pdo
 */
function DB_GetServiceInfoBar($pdo, $serviceId, $user_Id) {
    try {
        $rows = sql($pdo, "SELECT  [Service].[Name] AS SNA
        ,[Organization].[Picture_Path] AS OPP
        ,[Organization].[Name] AS ONA
        ,[Organization].[Id] AS OID
        FROM [dbo].[Organization]
        join [Service]
        on [Organization].[Id] = [Service].[Organization_Id]
        AND [Service].[Enabled] = 1 AND [Organization].[Enabled] = 1
        AND [Service].[Id] = ?", array($serviceId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "new">
            <div class = "user-card-row">
            <div class = "tbl-row">
            <div class = "tbl-cell tbl-cell-photo">
            <a href = "profile_org.php?Organization=' . $row['OID'] . '">
            <img src = "' . $row['OPP'] . '" alt = "Avatar">
            </a>
            </div>
            <div class = "tbl-cell">
            <p class = "user-card-row-name"><a>   ' . $row['SNA'] . '</a></p>';
            if (DB_checkIfUserMadeRate($pdo, $user_Id, $serviceId)) {
                //SE JA FEZ RATE -> MOSTRAR RATING SERVIÇO
            } else {
                //INICIO RATING
                echo '<p class = "user-card-row-status">
            <fieldset id = "demo1" class = "rating">
            <input class = "stars" type = "radio" id = "star5" name = "rating" value = "5" />
            <label class = "full" for = "star5" title = "Awesome - 5 stars"></label>
            <input class = "stars" type = "radio" id = "star4" name = "rating" value = "4" />
            <label class = "full" for = "star4" title = "Pretty good - 4 stars"></label>
            <input class = "stars" type = "radio" id = "star3" name = "rating" value = "3" />
            <label class = "full" for = "star3" title = "Meh - 3 stars"></label>
            <input class = "stars" type = "radio" id = "star2" name = "rating" value = "2" />
            <label class = "full" for = "star2" title = "Kinda bad - 2 stars"></label>
            <input class = "stars" type = "radio" id = "star1" name = "rating" value = "1" />
            <label class = "full" for = "star1" title = "Sucks big time - 1 star"></label>
            </fieldset></p > ';
            }
            //FIM RATING
            echo '</div>
            </div>
            </div>
            </div>
            <div class = "slide">
            <div class = "user-card-row">
            <div class = "tbl-cell">
            <p class = "user-card-row-status"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>';
            echo '</div>
            </div>
            </div>';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Devolve a barra do serviço que se encontra abaixo da imagem
 * @param type $pdo
 */
function DB_GetServiceLocAndDescription($pdo, $serviceId) {
    try {
        $rows = sql($pdo, "SELECT  
        [Service].[Name] AS SNA 
        ,[Service].[Description] AS SDE
        ,[Organization].[Address] AS OAD
        ,[City].[Name] AS CNA
        FROM [dbo].[Organization]
        join [Service]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [City]
        on [City].[Id] = [Organization].[City_Id]
        WHERE [Service].[Enabled] = 1 AND [Organization].[Enabled] = 1
        AND [Service].[Id] = ?", array($serviceId), "rows");
        foreach ($rows as $row) {
            echo '<section class = "box-typical">
            <article class = "profile-info-item">
            <header class = "profile-info-item-header">
            <i class = "font-icon font-icon-notebook-bird"></i>
            Description
            </header>
            <div class = "text-block text-block-typical">
            <p>' . $row['SDE'] . '</p>
            </div>
            </article>
            </section>';
        }
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Verifica se o user tem wp criados
 * @param type $pdo
 * @param type $userId
 * @return boolean
 */
Function DB_checkIfUserHaveWicPlanner($pdo, $userId) {
    try {
        $count = sql($pdo, "SELECT * FROM
        [WIC_Planner]
        WHERE [User_Id] = ? AND [Enabled] = 1", array($userId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * retorna os wicplanners do user para um select utilizado no popup
 * @param type $pdo
 * @param type $userId
 */
Function DB_getMyWicsAsPopup($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT * FROM
        [WIC_Planner]
        WHERE [Enabled] = 1
        AND [User_Id] = ?", array($userId), "rows");
        if (DB_checkIfUserHaveWicPlanner($pdo, $userId)) {
            echo '<div class="title-label" style="align:center;"> <button class="btn btn-rounded btn-inline btn-primary" href ><i class="font-icon font-icon-plus "></i>&ensp;New Event</button></div>
                <h6>WiC Planner - The notepad for event planners</h6>
                <header class="sign-title">Address to an existent one</header>';
            echo '<div class="form-group">';
            echo '<select class = "bootstrap-select bootstrap-select-arrow" id = "myWics" name = "myWics">';
            foreach ($rows as $row) {
                echo '<option value = "' . $row['Id'] . '">' . $row['Name'] . '</option>';
            }
            echo '</select> ';
            echo '</div>
                <p class="form-group">  <?= $msg; ?> </p>
                <button type="submit" name="add2WiC" id="add2WiC" class="btn btn-rounded btn-success sign-up">Save</button>
                <input type=button class="btn btn-rounded btn-success sign-up" onClick="self.close();" value="Close">';
        } else {
            $linkAWP = 'http://' . $_SERVER['HTTP_HOST'] . '/build/my_wicplanner.php';
            echo '<div class="sign-avatar no-photo">&plus;</div>
                <header class="sign-title">#You don\'t have a WiC Planner?</header>';
//            echo '<a href="' . $linkAWP . '" class="btn btn-rounded btn-success sign-up" role="button">Create</a>';
            echo '<input type=button class="btn btn-rounded btn-success sign-up" onClick="self.close();" value="Close">';
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Adiciona um serviço ao Wic Planner do User
 * @param type $pdo
 * @param type $wicId
 * @param type $serviceId
 */
function DB_addServiceToWicPlanner($pdo, $wicId, $serviceId) {
    try {
        if (DB_checkIfServiceExistsOnWicPlanner($pdo, $wicId, $serviceId)) {
            echo 'Service already exists in that WiC planner';
        } else {
            sql($pdo, "INSERT INTO [dbo].[WIC_Planner_Service] ([Service_Id], [WIC_Planner_Id], [Enabled]) "
                    . "VALUES (?, ?, ?)", array($serviceId, $wicId, 1));
            echo "Service added to your WiC planner!";
        }
    } catch (PDOException $e) {
        echo "ERROR ADDDING SERVIVE TO WIC PLANNER!";
    }
}

/**
 * Verifica se o serviço ja existe, ou nao, num determinado wic planner
 * @param type $pdo
 * @param type $wicId
 * @param type $serviceId
 * @return boolean
 */
Function DB_checkIfServiceExistsOnWicPlanner($pdo, $wicId, $serviceId) {
    try {
        $count = sql($pdo, "SELECT * FROM
        [WIC_Planner_Service]
        WHERE [Enabled] = 1
        AND [Service_Id] = ? 
        AND WIC_Planner_Id = ? ", array($serviceId, $wicId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Função que devolve os serviços para o index selecionado categoria
 * @param type $pdo
 * @param type $Category
 * @param type $SubCategoty
 * @param type $city
 */
function DB_getServicesForIndexByCategory($pdo, $CategoryId) {
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Category].[Id] = [Sub_Category].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Sub_Category].[Category_Id] =   ?", array($CategoryId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
            <article class = "card-typical">
            <div class = "card-typical-section">
            <div class = "user-card-row">
            <div class = "tbl-row">
            <div class = "tbl-cell tbl-cell-photo">
            <a href = "profile_org.php?Organization=' . $row['OID'] . '">
            <img src = "' . $row['OPP'] . '" alt = "Avatar">
            </a>
            </div>
            <div class = "tbl-cell">
            <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
            </div>
            </div>
            </div>
            </div>
            <div class = "card-typical-section card-typical-content">
            <div class = "photo">
            <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
            </div>
            <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
            <p>' . $row['SDE'] . '</p>
            </div>
            <div class="card-typical-section">
            <div class="card-typical-linked">

            </div>
            <a  class="card-typical-likes">
            <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
            <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
            </a>
            </div>

            </article>
            </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function DB_getServicesForIndexByDescriptionAndCategory($pdo, $qParam, $categoryId) {
    $s = '%' . $qParam . '%';
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Category].[Id] = [Sub_Category].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Description] Like '%" . $qParam . "%' "
                . "AND [Sub_Category].[Category_Id] = ? ", array($categoryId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
        <article class = "card-typical">
        <div class = "card-typical-section">
        <div class = "user-card-row">
        <div class = "tbl-row">
        <div class = "tbl-cell tbl-cell-photo">
        <a href = "profile_org.php?Organization=' . $row['OID'] . '">
        <img src = "' . $row['OPP'] . '" alt = "Avatar">
        </a>
        </div>
        <div class = "tbl-cell">
        <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
        </div>
        </div>
        </div>
        </div>
        <div class = "card-typical-section card-typical-content">
        <div class = "photo">
        <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
        </div>
        <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
        <p>' . $row['SDE'] . '</p>
        </div>
        <div class="card-typical-section">
        <div class="card-typical-linked">

        </div>
        <a  class="card-typical-likes">
        <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        </a>
        </div>

        </article>
        </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function DB_getServicesForIndexByNameAndCategory($pdo, $qParam, $categoryId) {
    $s = '%' . $qParam . '%';
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Category].[Id] = [Sub_Category].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Name] Like '%" . $qParam . "%' "
                . "AND [Sub_Category].[Category_Id] = ? ", array($categoryId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
        <article class = "card-typical">
        <div class = "card-typical-section">
        <div class = "user-card-row">
        <div class = "tbl-row">
        <div class = "tbl-cell tbl-cell-photo">
        <a href = "profile_org.php?Organization=' . $row['OID'] . '">
        <img src = "' . $row['OPP'] . '" alt = "Avatar">
        </a>
        </div>
        <div class = "tbl-cell">
        <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
        </div>
        </div>
        </div>
        </div>
        <div class = "card-typical-section card-typical-content">
        <div class = "photo">
        <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
        </div>
        <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
        <p>' . $row['SDE'] . '</p>
        </div>
        <div class="card-typical-section">
        <div class="card-typical-linked">

        </div>
        <a  class="card-typical-likes">
        <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        </a>
        </div>

        </article>
        </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function DB_getServicesForIndexByDescription($pdo, $description) {
    $s = '%' . $description . '%';
    try {
        $rows = sql($pdo, "SELECT
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
		[Service].[Enabled],
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM [Service]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        AND [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Description] Like '%" . $s . "%' ", array(), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
        <article class = "card-typical">
        <div class = "card-typical-section">
        <div class = "user-card-row">
        <div class = "tbl-row">
        <div class = "tbl-cell tbl-cell-photo">
        <a href = "profile_org.php?Organization=' . $row['OID'] . '">
        <img src = "' . $row['OPP'] . '" alt = "Avatar">
        </a>
        </div>
        <div class = "tbl-cell">
        <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
        </div>
        </div>
        </div>
        </div>
        <div class = "card-typical-section card-typical-content">
        <div class = "photo">
        <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
        </div>
        <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
        <p>' . $row['SDE'] . '</p>
        </div>
        <div class="card-typical-section">
        <div class="card-typical-linked">

        </div>
        <a  class="card-typical-likes">
        <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        </a>
        </div>

        </article>
        </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function DB_getServicesForIndexByName($pdo, $qParam) {
    $s = '%' . $qParam . '%';
    try {
        $rows = sql($pdo, "SELECT
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
		[Service].[Enabled],
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM [Service]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        AND [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Name] Like '%" . $qParam . "%' ", array(), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
        <article class = "card-typical">
        <div class = "card-typical-section">
        <div class = "user-card-row">
        <div class = "tbl-row">
        <div class = "tbl-cell tbl-cell-photo">
        <a href = "profile_org.php?Organization=' . $row['OID'] . '">
        <img src = "' . $row['OPP'] . '" alt = "Avatar">
        </a>
        </div>
        <div class = "tbl-cell">
        <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
        </div>
        </div>
        </div>
        </div>
        <div class = "card-typical-section card-typical-content">
        <div class = "photo">
        <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
        </div>
        <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
        <p>' . $row['SDE'] . '</p>
        </div>
        <div class="card-typical-section">
        <div class="card-typical-linked">

        </div>
        <a  class="card-typical-likes">
        <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        </a>
        </div>

        </article>
        </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

Function DB_checkIfUserMadeRate($pdo, $userId, $serviceId) {
    try {
        $count = sql($pdo, "SELECT * FROM
        [dbo].[Rating]
        WHERE [User_Id] = ? AND [Service_Id] = ?", array($userId, $serviceId), "count");
        if ($count < 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $ex) {
        echo 'ERROR READING RATING TABLE!';
    }
}

function DB_addUserRateService($pdo, $userId, $serviceId, $rate, $d) {
    if (DB_checkIfUserMadeRate($pdo, $userId, $serviceId)) {
        echo 1;
    } else {
        try {
            sql($pdo, "INSERT INTO [dbo].[Rating] ([User_Id], [Service_Id], [Rate], [Date_Created]) VALUES(?,?,?,?)"
                    . "", array($userId, $serviceId, $rate, $d));
        } catch (PDOException $e) {
            print "ERROR CREATING RATE IN SERVICE!";
            die();
        }
    }
}

/**
 * Devolve o Id do Boss da Org atraves do serviço
 * @param type $pdo
 * @param type $service_Id
 * @return type
 */
function DB_GetUserBossIdByService($pdo, $service_Id) {
    try {
        $stmt = $pdo->prepare("SELECT [Organization].[User_Boss]
        FROM [dbo].[Organization]
        join Service
        on [Organization].[Id] = [Service].[Organization_Id]
        WHERE [Service].[Id] =:id");
        $stmt->bindParam(':id', $service_Id);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $orgBossId = $row['User_Boss'];
        }
        return $orgBossId;
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Remove um serviço de uma determinada Org
 * @param type $pdo
 * @param type $serviceId
 * @return boolean
 */
function DB_removeService($pdo, $serviceId) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[Service] SET [Enabled] = ? WHERE [Id] = ? ", array('0', $serviceId));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * Devolve o Id de uma City pelo seu nome
 * @param type $pdo
 * @param type $cityName
 * @return type
 */
function DB_getCityId($pdo, $cityName) {
    try {
        $rows = sql($pdo, "SELECT [Id]
        FROM [dbo].[City]
        WHERE [Name] LIKE '%" . $cityName . "'", array(), "rows");
        foreach ($rows as $row) {
            return $row['Id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING CITY!';
    }
}

/**
 * Devolve o nome da Cidade atraves do seu ID
 * @param type $pdo
 * @param type $cityId
 * @return type
 */
function DB_getCityById($pdo, $cityId) {
    try {
        $rows = sql($pdo, "SELECT [Name] FROM [dbo].[City] WHERE [Id] = ?", array($cityId), "rows");
        foreach ($rows as $row) {
            return $row['Name'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING CITY!';
    }
}

/**
 * Devolve os serviços de uma determinada cidade
 * @param type $pdo
 * @param type $CityId
 */
function DB_getServicesForIndexByCity($pdo, $CityId) {
    try {

        $rows = sql($pdo, "SELECT
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP,
		[Service].[City_id]
        FROM [Service]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
		join [City]
		on [Service].[City_Id] = [City].[Id]
        AND [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] = 1
		AND [City].[Id] = ?", array($CityId), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
<article class = "card-typical">
<div class = "card-typical-section">
<div class = "user-card-row">
<div class = "tbl-row">
<div class = "tbl-cell tbl-cell-photo">
<a href = "profile_org.php?Organization=' . $row['OID'] . '">
<img src = "' . $row['OPP'] . '" alt = "Avatar">
</a>
</div>
<div class = "tbl-cell">
<p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
</div>
</div>
</div>
</div>
<div class = "card-typical-section card-typical-content">
<div class = "photo">
<img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
</div>
<header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
<p>' . $row['SDE'] . '</p>
</div>

<div class="card-typical-section">
<div class="card-typical-linked">

</div>

<div  class="card-typical-likes">

<button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
<button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>


</div>
</div>


</article>
</div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function DB_getServicesForIndexByCityAndCategory($pdo, $Category, $CityId) {
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP, 
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Category].[Id] = [Sub_Category].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1"
                . "AND [Sub_Category].[Category_Id] = ? "
                . "AND [Service].[City_Id] = ?", array($Category, $CityId), "rows");

        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
        <article class = "card-typical">
        <div class = "card-typical-section">
        <div class = "user-card-row">
        <div class = "tbl-row">
        <div class = "tbl-cell tbl-cell-photo">
        <a href = "profile_org.php?Organization=' . $row['OID'] . '">
        <img src = "' . $row['OPP'] . '" alt = "Avatar">
        </a>
        </div>
        <div class = "tbl-cell">
        <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
        </div>
        </div>
        </div>
        </div>
        <div class = "card-typical-section card-typical-content">
        <div class = "photo">
        <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
        </div>
        <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
        <p>' . $row['SDE'] . '</p>
        </div>
        <div class="card-typical-section">
        <div class="card-typical-linked">

        </div>
        <a  class="card-typical-likes">
        <button class="btn btn-inline btn-warning-outline font-icon-plus-1" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        <button class="btn btn-inline btn-warning-outline font-icon-comment" style="width: 41px;height: 29px;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>
        </a>
        </div>

        </article>
        </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

function db_getWicsForHeader($pdo, $userId) {
    try {
        $rows = sql($pdo, "SELECT [Name]
        ,[Event_Date]
        FROM [dbo].[WIC_Planner]
        WHERE [Enabled]=1
        AND [User_Id] = ?
        ORDER BY [Event_Date] DESC", array($userId), "rows");
        foreach ($rows as $row) {
            $subStr = explode(" ", $row['Event_Date']);
            echo '<a href="/build/my_wicplanner.php" class="mess-item" padding-left: 15px; style="padding-left: 5px;">';
            echo '<span class="mess-item-name" ><i class="fa fa-calendar" style="padding-right:5px;"></i>' . $row['Name'] . ' <i class="font-icon font-icon-arrow-right"></i> ' . $subStr[0] . '</span>';
            //echo '<span class="mess-item-txt">' . $subStr[0] . '</span>';
            echo '</a>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING WIC PLANNER';
    }
}

/**
 * Retorna ID da imagem de perfil
 * @param type $pdo
 * @param type $serviceId
 * @return type
 */
function DB_getServiceCurrentFirstPagePic($pdo, $serviceId) {
    try {
        $rows = sql($pdo, "SELECT [Id] FROM [dbo].[Multimedia] "
                . "WHERE [Service_Id] = ? AND [Enabled] = 1 AND [First_Page] = 1", array($serviceId), "rows");
        foreach ($rows as $row) {
            return $row['Id'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING MULTIMEDIA!';
    }
}

/**
 * Elimina imagem de perfil
 * @param type $pdo
 * @param type $email
 * @return boolean
 */
function DB_deleteServiceFirstPagePic($pdo, $MultimediaId) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[Multimedia] SET [Enabled] = 0 WHERE [Id] = ? ", array($MultimediaId));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * Mostra as pics para remoção à exceção da de perfil
 * @param type $pdo
 * @param type $serviceId
 */
function DB_DisplyPicuresToRemove($pdo, $serviceId) {
    try {
        $rows = sql($pdo, "SELECT [Multimedia_Path], [Id] FROM [dbo].[Multimedia] "
                . "WHERE [Service_Id] = ? AND [Enabled] = 1 AND [First_Page] = 0", array($serviceId), "rows");

        echo '<section class="box-typical" style="width:auto">
                    <header class="box-typical-header-sm">
                        Secondary Pictures
                    </header>';
        foreach ($rows as $row) {
            $image = $row['Multimedia_Path'];
            echo '<img src="' . $image . '" style="width:50px;height:50px">';
            echo '<button type="button" onclick = "removePic(this)" id="' . $row['Id'] . '" name ="' . $row['Id'] . '" class = "font-icon font-icon-trash" style="color:red;height: 54px;background-color: transparent;border: 0px;"></button>';
        }
        echo '</section>';
    } catch (Exception $exc) {
        echo 'ERROR READING MULTIMEDIA!';
    }
}

/**
 * Remove fotos secundarias
 * @param type $pdo
 * @param type $MultimediaId
 * @return boolean
 */
function DB_deleteServiceSecondaryPagePic($pdo, $MultimediaId) {
    try {
        $count = sql($pdo, "UPDATE [dbo].[Multimedia] SET [Enabled] = 0 WHERE [Id] = ? ", array($MultimediaId));
        return true;
    } catch (Exception $exc) {
        return false;
    }
}

/**
 * Devolve as SubCats de um Cat
 * @param type $pdo
 * @param type $service_Id
 * @return type
 */
function DB_GetSubCategories($pdo, $Category) {
    try {
        $stmt = $pdo->prepare("SELECT [Sub_Category].[Id] AS SCID, [Sub_Category].[Name] AS SCNA, [Sub_Category].[Category_id] 
            FROM [Sub_Category]
            WHERE [Sub_Category].[Category_Id] =:id");
        $stmt->bindParam(':id', $Category);
        $stmt->execute();
        echo '<div class="row" style="padding-left: 35px;">
            <div class="">';
            
//        echo '<div class="form-group-checkbox">'; '<div class="col-md-3 col-sm-6">';
        echo '<div class="radio">';
        $x = DB_countSubCategories($pdo, $Category);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($x === 1) {
                
                echo '<label for="' . $row['SCID'] . '" title="' . $row['SCID'] . '"></label>';
                echo '<input type="radio" onclick="getSubCategoryValue()" class = "SubCat" name="SubCat" id="' . $row['SCID'] . '" value = "' . $row['SCID'] . '" checked>' . $row['SCNA'] . ' ';
                
               
                
            } else {
                
                
                

                echo '<input type="checkbox" onclick="getSubCategoryValue()" class = "SubCat"  name="SubCat" id="' . $row['SCID'] . '" value = "' . $row['SCID'] . '">  ';
                echo '<label style="margin-left:20px;" class="btn btn-default" title="' . $row['SCNA'] . '"  for="' . $row['SCID'] . '" >' . $row['SCNA'] . '</label>';
                
            }
        }
//        codigo inalterado abaixo comentado
//        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//            if ($x === 1) {
//                echo '<div class="checkbox">';
//
//                echo '<input type="radio" onclick="getSubCategoryValue()" class = "SubCat" name="SubCat" id="' . $row['SCID'] . '" value = "' . $row['SCID'] . '" checked>' . $row['SCNA'] . ' ';
//                echo '<label for="' . $row['SCID'] . '" title="' . $row['SCID'] . '">';
//                echo '<img/>';
//                echo '</label>';
//                echo '</div>';
//            } else {
//                echo '<label title="' . $row['SCID'] . '">';
//                echo '<input type="radio" onclick="getSubCategoryValue()" class = "SubCat" name="SubCat" id="' . $row['SCID'] . '" value = "' . $row['SCID'] . '">' . $row['SCNA'] . ' ';
//                echo '<img/>';
//                echo '</label>';
//            }
//        }
        echo ' </div>
                </div>
                </div>
        <br>';
    } catch (Exception $ex) {
        echo 'error';
    }
}

/**
 * Index Queries
 * @param type $pdo
 * @param type $CategoryId
 */
function DB_getServicesForIndexByQuery($pdo, $CategoryId, $name, $city, $SubCategory, $page) {
    $pageNum = $page * 50;
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Sub_Category].[Category_Id] = [Category].[Id]
        join [City]
        on [Service].[City_Id] = [City].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Name] Like '%" . $name . "%'
        AND [Sub_Category].[Category_Id] Like '%" . $CategoryId . "'
        AND [City].[Name] Like '%" . $city . "'
        AND [Sub_Category].[Id] Like '%" . $SubCategory . "'"
                . " ORDER BY [Service].[Id]
                OFFSET " . $pageNum . " ROWS
                FETCH NEXT 50 ROWS ONLY", array(), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
            <article class = "card-typical">
            <div class = "card-typical-section">
            <div class = "user-card-row">
            <div class = "tbl-row">
            
            <div class = "tbl-cell">
            <p class = "user-card-row-name"><a href = "profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
            </div>
            </div>
            </div>
            </div>
            <div class = "card-typical-section card-typical-content">
            <div class = "photo">
            <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
            </div>
            <header class = "title"><a href = "service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
            <p style="overflow:hidden; max-height:75px; ">' . $row['SDE'] . '</p>
            </div>

<div class="card-typical-section">
<div class="card-typical-linked">

</div>

<div  class="card-typical-likes">

<button class="btn btn-rounded btn-inline btn-primary font-icon-plus" style="width: 41px;height: 29px;border-color:white;padding-left: 0px;padding-right: 0px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>



<button class="btn btn-rounded btn-inline btn-warning font-icon-comment" style="width: 41px;height: 29px;border-color:white;padding-left: 10px;padding-right: 10px;padding-top: 3px;"  onClick = "openMyWics(' . $row['SID'] . ');" </button>


</div>
</div>            

            

            </article>
            </div>';
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

// REPOR QUANDO CONSEGUIRMOS COLOCAR FOTOS DE PERFIL DE ORG!!! NO ESPAÇO EM BRANCO 
//<div class = "tbl-cell tbl-cell-photo">
//   <a href = "profile_org.php?Organization=' . $row['OID'] . '">
//   <img src = "' . $row['OPP'] . '" alt = "Avatar">
//   </a>
//   </div>

function DB_countSubCategories($pdo, $CategoryId) {
    try {
        $rows = sql($pdo, "SELECT COUNT(*) AS C FROM [Sub_Category]
            WHERE [Sub_Category].[Category_Id] = ?", array($CategoryId), "rows");
        foreach ($rows as $row) {
            return $row['C'];
        }
    } catch (Exception $ex) {
        
    }
}

/**
 * Devolve Nome da Categoria atraves do seu ID
 * @param type $pdo
 * @param type $Category
 * @return type
 */
function DB_getCategoryName($pdo, $Category) {
    try {
        $rows = sql($pdo, "SELECT [Name] AS CNA FROM [Category]
        WHERE [Id] = ?", array($Category), "rows");
        foreach ($rows as $row) {
            return $row['CNA'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING CATEGORY!';
    }
}

/**
 * Devolve Nome da SubCategoria atraves do seu ID
 * @param type $pdo
 * @param type $SubCategory
 * @return type
 */
function DB_getSubCategoryName($pdo, $SubCategory) {
    try {
        $rows = sql($pdo, "SELECT [Name] AS CNA FROM [Sub_Category]
        WHERE [Id] = ?", array($SubCategory), "rows");
        foreach ($rows as $row) {
            return $row['CNA'];
        }
    } catch (Exception $exc) {
        echo 'ERROR READING SUBCATEGORY!';
    }
}

/**
 * Index Queries
 * @param type $pdo
 * @param type $CategoryId
 */
function DB_getServicesForIndexCount($pdo, $CategoryId, $name, $city, $SubCategory, $page) {
    $pageNum = $page * 50;
    try {
        $rows = sql($pdo, "SELECT COUNT(*)
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Sub_Category].[Category_Id] = [Category].[Id]
        join [City]
        on [Service].[City_Id] = [City].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Name] Like '%" . $name . "%'
        AND [Sub_Category].[Category_Id] Like '%" . $CategoryId . "'
        AND [City].[Name] Like '%" . $city . "'
        AND [Sub_Category].[Id] Like '%" . $SubCategory . "'", array(), "rows");
        foreach ($rows as $row) {
            return $row['COUNTER'];
        }

        //<a href="service_profile.php?service=' . $row['SID'] . '" class="card-typical-likes">
        //<i class="font-icon font-icon-eye">' . DB_GetNumberServiceViews($pdo, $row['SID']) . '</i> 
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}

/**
 * Get Services Public Profile
 * @param type $pdo
 * @param type $CategoryId
 * @param type $name
 * @param type $city
 * @param type $SubCategory
 * @param type $page
 */
function DB_getServicesForPublicIndexByQuery($pdo, $CategoryId, $name, $city, $SubCategory, $page) {
    $pageNum = $page * 50;
    try {
        $rows = sql($pdo, "SELECT 
        [Service].[Name] AS SNA,
        [Service].[Id] AS SID,
        [Service].[Description] AS SDE,
        [Organization].[Name] AS ONA,
        [Organization].[Id] AS OID,
        [Organization].[Picture_Path] AS OPP,
        [Multimedia].[Multimedia_Path] AS MPP
        FROM SERVICE
        join [Multimedia]
        on [Multimedia].[Service_Id] = [Service].[Id]
        join [Organization]
        on [Organization].[Id] = [Service].[Organization_Id]
        join [Sub_Category]
        on [Service].[Sub_Category_Id] = [Sub_Category].[Id]
        join [Category]
        on [Sub_Category].[Category_Id] = [Category].[Id]
        join [City]
        on [Service].[City_Id] = [City].[Id]
        WHERE
        [Organization].[Enabled] = 1 
        AND [Service].[Enabled] = 1 
        AND [Multimedia].[Enabled] = 1  
        AND [Multimedia].[First_Page] =  1
        AND [Service].[Name] Like '%" . $name . "%'
        AND [Sub_Category].[Category_Id] Like '%" . $CategoryId . "'
        AND [City].[Name] Like '%" . $city . "'
        AND [Sub_Category].[Id] Like '%" . $SubCategory . "'"
                . " ORDER BY [Service].[Id]
                OFFSET " . $pageNum . " ROWS
                FETCH NEXT 50 ROWS ONLY", array(), "rows");
        foreach ($rows as $row) {
            echo '<div class = "card-grid-col">
            <article class = "card-typical">
            <div class = "card-typical-section">
            <div class = "user-card-row">
            <div class = "tbl-row">
            <div class = "tbl-cell">
            <p class = "user-card-row-name"><a href = "../build/sign_in.php?redUrl=/build/profile_org.php?Organization=' . $row['OID'] . '">' . $row['ONA'] . '</a></p>
            </div>
            </div>
            </div>
            </div>
            <div class = "card-typical-section card-typical-content">
            <div class = "photo">
            <img src = "' . $row['MPP'] . '" alt = "Service Pic" height = "185" width = "110">
            </div>
            <header class = "title"><a href = "../build/sign_in.php?redUrl=/build/service_profile.php?Service=' . $row['SID'] . '">' . $row['SNA'] . '</a></header>
            <p style="overflow:hidden; max-height:75px; ">' . $row['SDE'] . '</p>
            </div>
            <div class="card-typical-section">
            <div class="card-typical-linked">
            </div>
            <div  class="card-typical-likes">
            <a class="btn btn-rounded btn-inline btn-primary-outline font-icon-plus" style="width: 53px;height: 37px;border-color:white;padding-left: 0px;padding-right: 0px;padding-top: 6px;" href = "../build/sign_in.php?redUrl=/build/service_profile.php?Service=' . $row['SID'] . '"></a>
            <a class="btn btn-rounded btn-inline btn-warning font-icon-comment" style="width: 41px;height: 29px;border-color:white;padding-left: 10px;padding-right: 10px;padding-top: 3px;" href = "../build/sign_in.php?redUrl=/build/service_profile.php?Service=' . $row['SID'] . '"></a>
            </div>
            </div>     
            </article>
            </div>';
        }
    } catch (Exception $exc) {
        echo 'ERROR READING SERVICE TABLE!';
    }
}
