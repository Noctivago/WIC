<?php

include_once './model/User.php';

$arg = (filter_var($_POST['arg'], FILTER_SANITIZE_STRING));

switch ($arg) {
    case 'addUser':
        try {
            $USER = new User();
            $USER->setUsername(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
            $USER->setPassword(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
            $USER->setEmail(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            echo $USER->addUserIntoDB();
        } catch (Exception $ex) {
            echo "ERROR!";
        }
        break;
    case 'login':

        break;
    default :
        echo 'Ups! ERROR!';
        break;
}
