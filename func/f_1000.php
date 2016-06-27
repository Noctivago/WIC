<?php

include_once '../db/conn.inc.php';

try {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $mail = $_POST['email'];
    $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
    $stmt->bindParam(':u', $user);
    $stmt->bindParam(':p', $pass);
    $stmt->bindParam(':m', $mail);
    $stmt->execute();
    //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
    echo "USER " . $user . " ADDED! w/Password " . $pass;
} catch (Exception $ex) {
    //retorna 0 para no sucesso do ajax saber que foi um erro
    echo "ERROR!";
}