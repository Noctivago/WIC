<?php
include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$output = "";
$idUser = $_SESSION['id'];
if (is_array($_FILES)) {
    foreach ($_FILES['files']['name'] as $name => $value) {
        $file_name = explode(".", $_FILES['files']['name'][$name]);
        $allowed_ext = array("jpg", "jpeg", "png");
        if (in_array($file_name[1], $allowed_ext)) {
            $new_name = md5(rand()) . ".".$file_name[1];
            $sourcePath = $_FILES['files']['tmp_name'][$name];
            $targetPath = "upload/".$idUser."/".$new_name;
        if(move_uploaded_file($sourcePath, $targetPath)){
            $output .= '<img src="'.$targetPath.'/>'; 
        }
            
        }
    }
}
echo $output;