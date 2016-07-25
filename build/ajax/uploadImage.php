<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$output = "";
//$idUser = $_SESSION['id'];
//if (is_array($_FILES)) {
//    foreach ($_FILES['files']['name'] as $name => $value) {
//        $file_name = explode(".", $_FILES['files']['name'][$name]);
//        $allowed_ext = array("jpg", "jpeg", "png");
//        if (in_array($file_name[1], $allowed_ext)) {
//            $new_name = md5(rand()) . "." . $file_name[1];
//            $sourcePath = $_FILES['files']['tmp_name'][$name];
//            $targetPath = "upload/" . $idUser . "/" . $new_name;
//            if (move_uploaded_file($sourcePath, $targetPath)) {
//                $output .= '<img src="' . $targetPath . '/>';
//                DB_UpdateUserInformation($pdo, $sId, $first, $last, $targetPath);
//            }
//        }
//    }
//}
//echo $output;
//
//

$userId = $_SESSION['id'];
//pasta do user para guardar a foto de perfil
$uploadDir = 'uploadsPP/'; //Image Upload Folder
$fileName = $_FILES['Photo']['name'];
$tmpName = $_FILES['Photo']['tmp_name'];
$fileSize = $_FILES['Photo']['size'];
//FALTA VALIDAR FILE TIPE E FILE SIZE
$fileType = $_FILES['Photo']['type'];
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = generateActivationCode() . '_' . $userId . '.jpg';
#$filePath = $uploadDir . $fileName;
$filePath = $uploadDir . $newfilename;
#$result = move_uploaded_file($tmpName, $filePath);
$result = move_uploaded_file($tmpName, $filePath);
$pic = $filePath;
if (!$result) {
    $msg = "Error uploading file";
    exit;
} else {
    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
        $filePath = addslashes($filePath);
    }
    //REMOVE ATUAL
    #$msg = DB_addUserProfilePicture($pdo, $filePath, $userId);
    $msg = $pic . 'loooool';
}
