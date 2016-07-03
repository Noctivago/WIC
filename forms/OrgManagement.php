<?php

include_once '../db/conn.inc.php';
/*
 * SE BOSS PODE FAZER TUDO
 */
echo 'CATEGORY';
DB_getCategoryAsTable($pdo);
DB_getCategoryAsSelect($pdo);
echo 'SUBCATEGORY';
DB_getSubCategoryAsTable($pdo);
DB_getSubCategoryAsSelect($pdo);

