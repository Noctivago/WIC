<?php
require_once('./db/conn.inc.php'); 
   
/*
$consulta = $pdo->prepare("SELECT nome, senha FROM login where usuario = :usuario;");
$consulta->bindParam(':usuario', $_GET['usuario'], PDO::PARAM_STR);
$consulta->execute();
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
*/

#INSERT **************************************************
/*
$stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password]) VALUES (:name, :value)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);

// insert one row
$name = 'Builder';
$value = 'Builder';
$stmt->execute();

// insert another row with different values
#$name = 'two';
#$value = 2;
#$stmt->execute();
*/
#DELETE **************************************************
$stmt = $pdo->prepare("DELETE FROM [dbo].[User] WHERE [Id] = :id");
$id = '36';
$stmt->bindParam(':id', $id);
$stmt->execute();

#UPDATE **************************************************
/*
$sql= "UPDATE [dbo].[User]
   SET [Username] = <Username, nvarchar(100),>
      ,[Password] = <Password, nvarchar(100),>
      ,[Email] = <Email, nvarchar(100),>
      ,[Account_Enabled] = <Account_Enabled, tinyint,>
      ,[Date_Created] = <Date_Created, datetime,>
      ,[Login_Failed] = <Login_Failed, int,>
      ,[Abusive_User] = <Abusive_User, int,>
      ,[Good_User] = <Good_User, int,>
      ,[Status] = <Status, tinyint,>
      ,[Last_Status_online] = <Last_Status_online, datetime,>
 WHERE <Search Conditions,,>";
$stmt = $pdo->prepare($sql);
$username = '24';
#ACRESCENTAR BINDPARAM
$stmt->bindParam(':username', $id);
$stmt->bindParam(':passwordd', $id);
$stmt->bindParam(':email', $id);
$stmt->bindParam(':account_enabled', $id);
$stmt->bindParam(':date_created', $id);
$stmt->bindParam(':login_failed', $id);
$stmt->bindParam(':abusive_user', $id);
$stmt->bindParam(':good_user', $id);
$stmt->bindParam(':status', $id);
$stmt->bindParam(':last_status_online', $id);

'asdasdasdad
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
    echo "<li>{$row["Id"]}</li>";
	echo "<li>{$row["Username"]}</li>";
	echo "<li>{$row["Password"]}</li>";
}
*/
#SELECT **************************************************
$sql= "SELECT [Id]
      ,[Username]
      ,[Password]
      ,[Email]
      ,[Account_Enabled]
      ,[Date_Created]
      ,[Login_Failed]
      ,[Last_Login]
      ,[Abusive_User]
      ,[Good_User]
      ,[Status]
      ,[Last_Status_online]
	FROM [dbo].[User]";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $row){
    echo "<li>{$row["Id"]}</li>";
	echo "<li>{$row["Username"]}</li>";
	echo "<li>{$row["Password"]}</li>";
}

?>
<a href="ola.php">LINK 100-LINK 100</a> 
