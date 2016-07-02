<?php

//
include_once ('session.php');
include_once '../db/conn.inc.php';

$arg = (filter_var($_POST ['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'readUserProfile') {
    
} else if ($arg === 'updateUserProfile') {

    $fname = (filter_var($_POST ['firstname'], FILTER_SANITIZE_STRING));
    $lname = (filter_var($_POST ['lastname'], FILTER_SANITIZE_STRING));
    $picture = (filter_var($_POST ['picture'], FILTER_SANITIZE_STRING));
    $picturePath = (filter_var($_POST ['picturepath'], FILTER_SANITIZE_STRING));
    //$userId = (filter_var($_POST ['userId'], FILTER_SANITIZE_NUMBER_INT));
    //$_SESSION['username']
    $userId = $_SESSION['id'];
    $cityId = (filter_var($_POST ['cityId'], FILTER_SANITIZE_NUMBER_INT));
    $languageId = (filter_var($_POST ['languageId'], FILTER_SANITIZE_NUMBER_INT));
    //se UserProfileExits
    if (DB_chekIfUserProfileExist($pdo, $userId)) {
        //UPDATE
        DB_updateUserProfile($pdo, $userId, $fname, $lname, $picture, $picturePath, $cityId, $languageId);
    } else {
        //INSERT
        DB_addUserProfile($userId, $fname, $lname, $picture, $picturePath, $cityId, $languageId);
    }
} else if ($arg === 'deleteUserProfile') {
    
} 
