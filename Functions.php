<?php

include_once './db/conn.inc.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function helloworld() {
    $ola = 'ola mundo';
    return $ola;
}

function addUserIntoDB($username, $password, $email) {
    $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
    $stmt->bindParam(':u', $username);
    $stmt->bindParam(':p', $password);
    $stmt->bindParam(':m', $email);
    $stmt->execute();
    echo "USER " . $username . " ADDED! w/Password " . $password;
}

function login($username) {
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
       FROM [dbo].[User]
       where [dbo].[User].[Username]='$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result['Password'];
}
