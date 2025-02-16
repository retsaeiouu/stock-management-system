<?php
function initdb()
{
    $host = 'localhost';
    $user = 'root';
    $password = 'password';
    $db = 'db';

    $conn = new mysqli($host, $user, $password, $db);
    if ($conn->connect_error) {
        die('db connection error');
    }

    return $conn;
}
?>
