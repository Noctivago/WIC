<?php

require_once '../config/conn.inc.php';
require_once '../poo/User.php';


$op = filter_var($_POST['op'], FILTER_SANITIZE_STRING);
if ($op === 'new') {
    $utilizador = new User();
    $utilizador->setUsername($user = filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $utilizador->setPassword(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $utilizador->setEmail(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $utilizador->createUser($utilizador);
}

