<?php
session_start();
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
    <?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="add.php">
      <label for="country">Country:</label>
      <input type="text" id="country" name="country" placeholder="Enter your country">

      <label for="age">Age:</label>
      <input type="number" id="age" name="age" min="1" max="120" placeholder="Enter your age">

      <label>Gender:</label>
      <div class="radio-group">
        <input type="radio" id="Female" name="gender" value="Female">
        <label for="Female">Female</label>
        <input type="radio" id="Male" name="gender" value="Male">
        <label for="Male">Male</label>
        <input type="radio" id="Other" name="gender" value="Other">
        <label for="Other">Other</label>
      </div>

      <label>Dream type:</label>
      <div class="radio-group">
        <input type="radio" id="Good" name="dream_type" value="Good">
        <label for="Good">Good dream</label>
        <input type="radio" id="Bad" name="dream_type" value="Bad">
        <label for="Bad">Bad dream</label>
      </div>

      <label for="dream_description">Dream description:</label>
      <textarea id="dream_description" name="dream_description" rows="5" cols="10" placeholder="Describe your dream"></textarea>

      <input type="submit" value="Save dream">
    </form>
  </div>
  <footer>
    <h4>&copy; All rights reserved.</h4>
  </footer>
</body>
</html>
