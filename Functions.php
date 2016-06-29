<?php

include_once './db/conn.inc.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function readAl(){
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

}
?>