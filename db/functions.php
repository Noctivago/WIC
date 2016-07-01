<?php

//FUNÇÕES SEM ACESSO A BD

function generateActivationCode() {
    $hash1 = md5(uniqid(mt_rand(), true)); // Ex.: 6c382d5c48f9027624b49b6e00fa9a44
    return $hash1;
}

function generatePassword() {
    $hash1 = uniqid(mt_rand(), true);
    return $hash1;
}

function getLength($str) {
    return strlen($str);
}
