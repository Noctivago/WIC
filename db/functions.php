<?php

//FUNÇÕES SEM ACESSO A BD

function generateActivationCode() {
//    $key = '';
//
//    for ($i = 0; $i < $length; $i ++) {
//        $key .= chr(mt_rand(33, 126));
//    }
//
//    return $key;
    $hash1 = md5(uniqid(mt_rand(), true)); // Ex.: 6c382d5c48f9027624b49b6e00fa9a44
    return $hash1;
}

function getLength($str) {
    return strlen($str);
}
