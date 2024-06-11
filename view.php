<?php
session_start();
include_once("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Last night I had a dream...</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="logo">
      <img src="dreams.webp" alt="LOGO">
    </div>
    <div class="nav">
      <a href="index.php">Home</a>
      <a href="view.php">View</a>
    </div>
  </header>
  <div id="body">
    <h1>Last night I had a dream...</h1>
    <table>
      <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
      <tr>
        <th>Country</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Dream type</th>
        <th>Dream description</th>
        <th>Dream date</th>
      </tr>
      <?php
      $view = "SELECT * FROM dreams";
      $view_dreams = mysqli_query($conn, $view);
      while($row_user = mysqli_fetch_assoc($view_dreams)){
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row_user['country']) . "</td>";
        echo "<td>" . htmlspecialchars($row_user['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row_user['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row_user['dream_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row_user['dream_description']) . "</td>";
        echo "<td>" . htmlspecialchars($row_user['created']) . "</td>";
        echo "</tr>";
      }
      ?>
    </table>
  </div>
  <footer>
    <h4>&copy; All rights reserved.</h4>
  </footer>
</body>
</html>
