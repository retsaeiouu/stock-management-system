<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/stock-management-system/features/auth/login.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
  </head>
  <body>
<?php echo 'hello, ' . $_SESSION['username'] . '<br>'; ?>
    <form action="home.php" method="POST">
      <input type="submit" name="logout" value="logout">
    </form>
<?php
if ($_POST['logout'] === 'logout') {
    session_destroy();
    header('Location: http://localhost/stock-management-system/features/auth/login.php');
    exit();
}
?>
  </body>
</html>
