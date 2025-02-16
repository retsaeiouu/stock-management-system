<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: http://localhost/stock-management-system/features/home/home.php');
} else {
    header('Location: http://localhost/stock-management-system/features/auth/login.php');
}
?>
