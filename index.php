<?php
// DATABASE
function dbinit()
{
    $db = new mysqli('localhost', 'root', 'password', 'db');
    if ($db->connect_error) {
        die('db connection error');
    }
    return $db;
}

// DATABASE END
?>
