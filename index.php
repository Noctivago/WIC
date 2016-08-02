<?php
//INDEX DO SERVER ROOT | NÃO MEXER EM NADA SFF.
ob_start();
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] === 'organization') {
        header("location: /build/profile_org.php");
    }
    if ($_SESSION['role'] === 'user') {
        header("location: /build/index.php");
    }
} else {
    header("location: /public/index.php");
}
?>