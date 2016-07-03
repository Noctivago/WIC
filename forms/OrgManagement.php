<?php

include_once '../db/conn.inc.php';
/*
 * SE BOSS PODE FAZER TUDO
 */
echo 'CATEGORY';
DB_getCategoryAsTable($pdo);
DB_getCategoryAsSelect($pdo);
echo '<br>SUBCATEGORY';
DB_getSubCategoryAsTable($pdo);
DB_getSubCategoryAsSelect($pdo);
echo '<br>SERVICE';
DB_getServiceAsTable($pdo);
DB_getServiceAsSelect($pdo);

