<?php

require_once '../db/conn.inc.php';

function hashPassword($password) {
    $hashpwd = hash('sha512', $password);
    return $hashpwd;
}
