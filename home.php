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
    <form action="home.php" method="POST">
      <input type="submit" name="logout" value="logout">
    </form>
    <!-- LOGOUT END -->
<?php
if ($_POST['logout'] === 'logout') {
    session_destroy();
    header('Location: http://localhost/stock-management-system/login.php');
    exit();
}
?>
  </body>
</html>
