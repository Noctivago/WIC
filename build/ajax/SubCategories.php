<?php

include_once '../db/dbconn.php';
include_once '../db/session.php';
include_once '../db/functions.php';

$idCat = (filter_var($_POST['value']));
$idSubCat = (filter_var($_POST['idSub']));
DB_getSubCategoryAsSelect($pdo, $idCat, $idSubCat);