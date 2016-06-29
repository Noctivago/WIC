<?php

session_start();
unset($_SESSION["Username"]);
//unset($_SESSION["password"]);
unset($_SESSION["Id"]);

echo 'You have cleaned session';
header('Refresh: 2; URL = login.php');
