<?php

include_once './db/conn.inc.php';

//addUser
try {
    $username = (filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = (filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
    $stmt->bindParam(':u', $username);
    #$stmt->bindParam(':p', $utilizador->getPassword());
    $stmt->bindParam(':p', $password);
    $stmt->bindParam(':m', $email);
    $stmt->execute();
    //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
    echo "USER " . $username . " ADDED! w/Password " . $password;
} catch (Exception $ex) {
    //retorna 0 para no sucesso do ajax saber que foi um erro
    echo "ERROR!";
}