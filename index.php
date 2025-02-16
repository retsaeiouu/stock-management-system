<?php
include './config.php';
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ' . BASEPATH . '/features/home/home.php');
} else {
    header('Location: ' . BASEPATH . '/features/auth/login.php');
}
?>
