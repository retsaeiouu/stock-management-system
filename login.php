<?php
include 'index.php';
session_start();
// FIX:
// if logged in, mapupunta sa home, if hindi, sa login page naman
/* if (isset($_SESSION['username'])) { */
/* header('Location: http://localhost/stock-management-system/home.php'); */
/* } else { */
/* header('Location: http://localhost/stock-management-system/login.php'); */
/* } */
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="login.css">
    <title>login</title>
  </head>
  <body>
    <form action="login.php" method="POST" class="form-body">
      <input name="username" class="form-input-field" />
      <label class="form-input-label">username</label>
      <input name="password" class="form-input-field"/>
      <label class="form-input-label">password</label>
      <button type="submit">login</button>
    </form>
<?php
if (isset($_POST['username'])) {
    $db = dbinit();
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
    $_SESSION['username'] = $rows['username'];
    header('Location: http://localhost/stock-management-system/home.php');
    exit();
}
?>
  </body>
</html>
