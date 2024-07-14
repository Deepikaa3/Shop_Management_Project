<?php
session_start();
if (isset($_COOKIE['username']) && isset($_COOKIE['mobilenumber'])) {
    unset($_COOKIE['username']);
    unset($_COOKIE['umobilenumber']);
    setcookie('username', '', time() - 3600, '/');
    setcookie('umobilenumber', '', time() - 3600, '/'); // empty value and old timestamp
}
session_destroy();
    header('location:../index.php');
    die();
?>