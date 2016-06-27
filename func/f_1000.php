<?php

include_once '../db/conn.inc.php';
include_once '../poo/User.php';

if (in_array($_POST['function'])) {
    //call the function
    if (filter_input(INPUT_GET, $_POST['function']) === 'add') {
        add();
    }
}

function add() {
    try {
        //cria objeto
        $userPOO = new User();
        $userPOO->setUsername(filter_input(INPUT_GET, $_POST['username']));
        $userPOO->setPassword(filter_input(INPUT_GET, $_POST['password']));
        $userPOO->setEmail(filter_input(INPUT_GET, $_POST['email']));
        #$user = $_POST['username'];
        #$pass = $_POST['password'];
        #$mail = $_POST['email'];
        $stmt = $pdo->prepare("INSERT INTO [dbo].[User] ([Username], [Password], [Email]) VALUES (:u, :p, :m)");
        $stmt->bindParam(':u', $userPOO->getUsername());
        $stmt->bindParam(':p', $userPOO->getPassword());
        $stmt->bindParam(':m', $userPOO->getEmail());
        $stmt->execute();
        //retorna 1 para no sucesso do ajax saber que foi com inserido sucesso
        echo "USER " . $userPOO->getUsername() . " ADDED!";
        unset($userPOO);
    } catch (Exception $ex) {
        //retorna 0 para no sucesso do ajax saber que foi um erro
        echo "ERROR!";
    }
}

function delete() {
    
}

function edit() {
    
}

function read() {
    
}
