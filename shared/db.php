<?php
include '../config.php';

function initdb()
{
    $conn = new mysqli(HOST, USER, PASS, DB);
    if ($conn->connect_error) {
        die('db connection error');
    }
    return $conn;
}
?>
