<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$edit = (filter_var($_POST['edit']));
$talk = (filter_var($_POST['talk']));
$idUserInService = (filter_var($_POST['id']));

if($edit==='true' and $talk === 'true'){
    $role = 4;
}else if($edit==='true' and $talk === 'false'){
    $role = 6;
} else if($edit === 'false' and $talk === 'true'){
    $role = 5;
}
else{
    $role = null;
}

Db_UpdateRoleInService($pdo,$role,$idUserInService);