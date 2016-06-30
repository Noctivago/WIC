<?php

include_once './conn.inc.php';

function generateActivationCode($pdo, $l) {
    $s = random_string('abcdefghijklmnopqrstuvwxyz0123456789', $l);
    return $s;
}
