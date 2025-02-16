<?php
include '../../config.php';
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ' . BASEPATH . '/features/home/home.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register</title>
  </head>
  <body>
    <form action="register.php" method="POST">
      <label>username</label>
      <input name="username" />
      <label>password</label>
      <input name="password" />
      <button type="submit">register</button>
    </form>
<?php
include '../../shared/db.php';

if (isset($_POST['username'])) {
    $db = initdb();
    $stmt = $db->prepare('SELECT username FROM users WHERE users.username = ?');
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    if (isset($rows['username'])) {
        echo 'username is taken.';
        exit();
    }
    $stmt = $db->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
    $stmt->execute();
    $_SESSION['username'] = $_POST['username'];
    header('Location: ' . BASEPATH . '/features/home/home.php');
    exit();
}
?>
  </body>
</html>
