<?php

include_once './db/conn.inc.php';
include 'Functions.php';

$arg = (filter_var($_POST['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addUser') {
    try {
        $username = (filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));
        $email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
        $stmt->bindParam(':u', $username);
        $stmt->bindParam(':p', $password);
        $stmt->bindParam(':m', $email);
        $stmt->execute();
        echo "USER " . $username . " ADDED! w/Password " . $password;
    } catch (Exception $ex) {
        echo "ERROR!";
    }
} else if ($arg === 'readUser') {
    
} else if ($arg === 'readAllUsers') {
    $sql = "SELECT [Id]
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
    echo "<table><tr><th>ID</th><th>Username</th><th>Password</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Username'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "<tr>";
    }
    echo "</table>";
} else if ($arg === 'updateUser') {
    
} else if ($arg === 'deleteUser') {
    
} else if ($arg === 'loginUser') {
    $username = (filter_var($_POST['user'], FILTER_SANITIZE_STRING));
    $password = (filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
    $sql ="SELECT [Id]
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
       FROM [dbo].[User]
       where [dbo].[User].[Username]='$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $count = $stmt->rowCount();
    $oi = helloworld();
  //  echo login($username);
    $db_pass = $result['Password'];
    if($db_pass ===$password){
        $db_id = $result['Id'];
        $sql2 =("SELECT [dbo].[User].[Id] as u
	  ,[Username]
	  ,[Email]
	  ,[Account_Enabled]
	  ,[Date_Created]
	  ,[Login_Failed],[First_Name],[Last_Name]
	  ,[dbo].[Role].[Name]
	  ,[dbo].[Role].[Id]
  FROM [dbo].[User_In_Role] 
  INNER JOIN [dbo].[Role]
  ON  [dbo].[User_In_Role].[Role_Id] = [dbo].[Role].[Id]
  INNER JOIN [dbo].[User]
  ON [dbo].[User_In_Role].[User_Id] = [dbo].[User].[Id]
  INNER Join [dbo].[Profile]
  ON [dbo].[User_In_Role].[User_ID] = [dbo].[Profile].[User_ID]
  where [dbo].[User_In_Role].[Enabled] != 0 and [User_In_Role].[User_Id] = $db_id");
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $result2 = $stmt2->fetch();
    echo "<table><tr><th>ID User</th><th>Username</th><th>Email</th><th>Account</th><th>Date Created</th><th>Login Failed</th><th>First Name</th><th>Last Name</th><th> Role </th><th>Role ID</th></tr>";
        echo "<td>" . $result2[0] . "</td>";
         echo "<td>" . $result2['Username'] . "</td>";
        echo "<td>" . $result2['Email'] . "</td>";
        echo "<td>" . $result2['Account_Enabled'] . "</td>";
        echo "<td>" . $result2['Date_Created'] . "</td>";
        echo "<td>" . $result2['Login_Failed'] . "</td>";
        echo "<td>" . $result2['First_Name'] . "</td>";
        echo "<td>" . $result2['Last_Name'] . "</td>";
        echo "<td>" . $result2['Name'] . "</td>";
        echo "<td>" . $result2['Id'] . "</td>";
        echo "<tr>";
    }else {
        //$db_update_login = $result['Login_Failed'];
        //echo $db_update_login ;
        $query_update_Login_Failed = "UPDATE [dbo].[User]
        SET [Login_Failed] = 3
        WHERE [dbo].[User].[Username] ='$username'";
        $stmt2 = $pdo->prepare($db_update_login);
        $stmt2->execute();
        echo 'Password Error';}
    
} else if ($arg === 'blockUser') {
        
} else {
    echo "IF -> ELSE -> ERROR!";
}

