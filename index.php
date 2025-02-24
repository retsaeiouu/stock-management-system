<?php
session_start();
// if logged in mapupunta sa homepage, pag hindi, sa login
if (isset($_SESSION['username'])) {
    header('Location: http://localhost/stock-management-system/home.php');
    exit();
} else {
    header('Location: http://localhost/stock-management-system/login.php');
    exit();
}
?>
