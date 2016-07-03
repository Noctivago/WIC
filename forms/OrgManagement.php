<?php

include_once '../db/conn.inc.php';
/*
 * SE BOSS PODE FAZER TUDO
 */

DB_getCategoryAsTable($pdo);
DB_getCategoryAsSelect($pdo);
DB_getSubCategoryAsTable($pdo);
DB_getSubCategoryAsSelect($pdo);

