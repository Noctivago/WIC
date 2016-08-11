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


//Set your App ID and App Secret.
$appID = '231111773916943';
$appSecret = 'c7d95d5f1f2f0210462240a0d9c9bf0e';
 
//Create an access token using the APP ID and APP Secret.
$accessToken = $appID . '|' . $appSecret;
 
//The ID of the Facebook page in question.
$id = '231111773916943';
 
//Tie it all together to construct the URL
$url = "https://graph.facebook.com/$id/posts?access_token=$accessToken";
 
//Make the API call
$result = file_get_contents($url);
 
//Decode the JSON result.
$decoded = json_decode($result, true);
 
//Dump it out onto the page so that we can take a look at the structure of the data.
var_dump($decoded);

//$msg .= 'Hello!<br>';
//$msg .= 'Welcome to Wic the biggest community of events and entertainment on earth.<br>';
//$msg .= 'Talk, deal and start planning the event of your dreams.<br>';
//$msg .= 'http://google.com<br>';
//$msg .= '<img src="http://www.w3schools.com/tags/smiley.gif" alt="Smiley face" width="42" height="42"><br>';
//$email = 'prcunha.383@gmail.com';
//$code = 'qeqwedwqdqwe';
//$to = 'prcunha.383@gmail.com';
//$subject = 'TESTE';
//return sendEmail($to, $subject, $msg);
