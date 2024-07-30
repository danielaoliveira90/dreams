<?php
require 'inc/header.php';
require 'inc/database.php';
?>

<div id="body">
  <h1>Last night I had a dream...</h1>

  <form method="POST" action="view.php">
    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" id="country" name="country" placeholder="Enter your country">
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" id="age" name="age" min="1" max="120" placeholder="Enter your age">
    </div>
    <div class="form-group">
      <label>Gender:</label>
      <div class="radio-group">
        <input type="radio" id="Female" name="gender" value="Female">
        <label for="Female">Female</label>
        <input type="radio" id="Male" name="gender" value="Male">
        <label for="Male">Male</label>
        <input type="radio" id="Other" name="gender" value="Other">
        <label for="Other">Other</label>
      </div>
    </div>
    <div class="form-group">
      <label>Dream type:</label>
      <div class="radio-group">
        <input type="radio" id="Good" name="dream_type" value="Good">
        <label for="Good">Good dream</label>
        <input type="radio" id="Bad" name="dream_type" value="Bad">
        <label for="Bad">Bad dream</label>
      </div>
    </div>
    <div class="form-group">
      <label for="dream_description">Dream description:</label>
      <textarea id="dream_description" name="dream_description" rows="5" cols="10" placeholder="Describe your dream"></textarea>
    </div>
    <div class="form-files">
      <input type='file' name='files[]' multiple /> 
      <input type='submit' value='Upload' name='submit'/>
    </div>
    <input type="submit" value="Save dream">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $country = $_POST['country'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $dream_type = $_POST['dream_type'];
    $dream_description = $_POST['dream_description'];

    // Insert Record in dreams table
    $dreamObj->insertData($country, $age, $gender, $dream_type, $dream_description);
  }
  ?>

  <?php require 'inc/footer.php'; ?>
</div>
