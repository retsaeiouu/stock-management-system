<?php
include 'db.php';
session_start();
// if hindi logged in mapupunta sa login page
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/stock-management-system/login.php');
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
    <!-- GREET -->
  <?php echo "<p>Hello, {$_SESSION['username']}</p>"; ?>
    <!-- GREET END -->
    <!-- UNIFORM -->
    <?php
    $db = dbinit();
    $query = '
      SELECT *
      FROM stocks INNER JOIN uniforms
      ON stocks.id = uniforms.stock_id
    ';
    $result = $db->query('SELECT * FROM stocks INNER JOIN uniforms ON stocks.id = uniforms.stock_id');
    while ($row = $result->fetch_assoc()) {
        echo "<div>{$row['stock_quantity']} {$row['uniform_type']} {$row['stock_type']} {$row['uniform_size']} {$row['uniform_sex']}</div>";
    }
    ?>
    <!-- UNIFORM END -->
    <!-- LOGOUT -->
    <form action="home.php" method="POST">
      <input type="submit" name="logout" value="logout">
    </form>
    <?php
    if (isset($_POST['logout']) && $_POST['logout'] === 'logout') {
        session_destroy();
        header('Location: http://localhost/stock-management-system/login.php');
        exit();
    }
    ?>
    <!-- LOGOUT END -->
  </body>
</html>
