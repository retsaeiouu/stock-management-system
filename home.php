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
    <link rel="stylesheet" href="dashboard.css">
    <title>Home</title>
  </head>
  <body>
  
<?php echo 'hello, ' . $_SESSION['username'] . '<br>'; ?>
    <!-- UNIFORM -->
    <?php
    $db = dbinit();
    $result = $db->query('SELECT * FROM stocks INNER JOIN uniforms ON stocks.id = uniforms.stock_id');
    while ($row = $result->fetch_assoc()) {
        echo '<div>' . $row['uniform_type'] . ' ' . $row['course_name'] . '</div>';
    }
    ?>
    <!-- UNIFORM END -->
    <!-- LOGOUT -->
    <input type="submit" name="logout" value="logout">
    <form action="home.php" method="POST" class="form-body">
      <h1 class="form-title">Stocks Dashboard</h1>
    </form>
    <!-- LOGOUT END -->
<?php
if (isset($_POST['logout']) && $_POST['logout'] === 'logout') {
    session_destroy();
    header('Location: http://localhost/stock-management-system/login.php');
    exit();
}
?>
  </body>
</html>
