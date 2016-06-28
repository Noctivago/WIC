<?php

include_once './db/conn.inc.php';

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
       where [dbo].[User].[Username]='jesualdocunha'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $db_Password = $result['Password'];
    if($password === $db_Password){
    echo "<table><tr><th>ID</th><th>Username</th><th>Password</th><th>Email</th><th>Account</th><th>Date_Created</th><th>Last Login</th><th>Status</th><th>Last Status Online</th></tr>";
        echo "<td>" . $result['Id'] . "</td>";
        echo "<td>" . $result['Username'] . "</td>";
        echo "<td>" . $result['Password'] . "</td>";
        echo "<td>" . $result['Email'] . "</td>";
        echo "<td>" . $result['Account_Enabled'] . "</td>";
        echo "<td>" . $result['Date_Created'] . "</td>";
        echo "<td>" . $result['Last_Login'] . "</td>";
        echo "<td>" . $result['Status'] . "</td>";
        echo "<td>" . $result['Last_Status_online'] . "</td>";
        echo "<tr>";
    }else {
        
        echo 'Erro';}
    
} else if ($arg === 'blockUser') {
    
} else {
    echo "IF -> ELSE -> ERROR!";
}

