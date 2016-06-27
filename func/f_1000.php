<?php

include_once '../db/conn.inc.php';
include_once '../poo/User.php';

try {
    $utilizador = new User();
    $utilizador->setUsername($user = filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $utilizador->setPassword(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $utilizador->setEmail(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
    $stmt->bindParam(':u', $utilizador->getUsername());
    #$stmt->bindParam(':p', $utilizador->getPassword());
    $stmt->bindParam(':p', $_POST['password']);
    $stmt->bindParam(':m', $utilizador->getEmail());
    $stmt->execute();
    //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
    echo "USER " . $user . " ADDED! w/Password " . $pass;
} catch (Exception $ex) {
    //retorna 0 para no sucesso do ajax saber que foi um erro
    echo "ERROR!";
}