<?php

//FUNÇÕES SEM ACESSO A BD

function generateActivationCode($length = 16) {
    $key = '';

    for ($i = 0; $i < $length; $i ++) {
        $key .= chr(mt_rand(33, 126));
    }

    return $key;
}

function getLength($str) {
    return strlen($str);
}
