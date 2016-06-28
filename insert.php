<?php

include_once './config/conn.inc.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$User = new User();
$User->setUsername($_POST['username']);
$User->setPassword($_POST['password']);
$User->setEmail($_POST['email']);
$User->createUser($User);
