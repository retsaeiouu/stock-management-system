<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: http://localhost/stock-management-system/features/home/home.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login</title>
  </head>
  <body>
    <form action="login.php" method="POST">
      <label>username</label>
      <input name="username" />
      <label>password</label>
      <input name="password" />
      <button type="submit">login</button>
    </form>
<?php
if (isset($_POST['username'])) {
    include '../../shared/db.php';
    $db = initdb();
    $stmt = $db->prepare('SELECT username, password FROM users WHERE users.username = ?');
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();
    if (!isset($rows['username'])) {
        echo 'Account with username ' . $_POST['username'] . ' does not exist.';
        exit();
    }
    if ($_POST['password'] != $rows['password']) {
        echo 'password is incorrect';
        exit();
    }
    $_SESSION['username'] = $_POST['username'];
    header('Location: http://localhost/stock-management-system/features/home/home.php');
    exit();
}
?>
  </body>
</html>
