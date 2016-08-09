<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
//DB_activateUserAccount($pdo, "prcunha.383@gmail.com");
//$email = "paulo.cunha@esprominho.pt";
//print 'SESSION INFO <br>';
//print 'ID > ' . $_SESSION['id'] . '<br>';
//var_dump($_SESSION);
//echo DB_getRatingTable($pdo);
//echo '<br>';
//DB_getUsersTable($pdo);
//echo '<br>';
//DB_getMultimediaTable($pdo);
//echo '<br>';
//DB_getUserProfileTable($pdo);
//echo '<br>';
//echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '&City=3';
//echo $_SERVER['HTTP_HOST'] . '/build/my_wicplanner.php';
//echo $_SERVER['PHP_SELF'] . $_SERVER['REQUEST_URI'];
//echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo DB_getServicesForIndexCount($pdo, $CategoryId, $name, $city, $SubCategory);

$msg = '<head></head>';
$msg .= '<body>';
$msg .= '<p>Hello!</p><br>';
$msg .= '<p>Welcome to Wic the biggest community of events and entertainment on earth.</p><br>';
$msg .= '<p>Talk, deal and start planning the event of your dreams.</p><br>';
$msg .= '<p><a href="http://google.com>LINK</a></p><br>';
$msg .= '</body>';
$email = 'prcunha.383@gmail.com';
$code = 'qeqwedwqdqwe';
$to = 'prcunha.383@gmail.com';
$subject = 'TESTE';
return sendEmail($to, $subject, $msg);
//$msg = "ACCOUNT INFORMATION IS BEING SENT! PLEASE WAIT!";
//$email = 'prcunha.383@gmail.com';
//$code = 'qeqwedwqdqwe';
//$to = 'prcunha.383@gmail.com';
//$link = 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $email . '&AC=' . $code . '';
//$subject = "Welcome to the biggest community of events";
//$body = "Hello " . $name . ", <br><br>"
//        . "Welcome to Wic the biggest community of events and entertainment on earth.<br>"
//        . "Talk, deal and start planning the event of your dreams.<br>"
//        . "Click on the following link to validate your account: <a href=\"" . $link . ">Click to validate your account</a><br><br>"
//        . "Event your life ! You Can Event ! <br><br>"
//        . "Note: Please do not reply to this email! Thanks!";
//return sendEmail($to, $subject, $body);


//echo '<br>http://' . $_SERVER['HTTP_HOST'];
//echo '<br>';
//$EM = "paulo.cunha@esprominho.com";
//$AC = '14551ASDF';
//echo 'http://' . $_SERVER['HTTP_HOST'] . '/build/account_confirmation_link.php?EM=' . $EM . '&AC=' . $AC . '';
