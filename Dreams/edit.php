<?php
require 'inc/header.php';
include 'inc/database.php';

// Edit customer record
if (!empty($_GET['editId'])) {
  $editId = $_GET['editId'];
  $dream = $dreamObj->displayRecordById($editId);
}
?>

<div id="body">
  <h1>Edit Dream</h1>

  <form method="POST" action="">
    <div class="form-group">
      <label for="country">Country:</label>
      <input type="text" id="country" name="ucountry" value="<?php echo $dream['country']; ?>" placeholder="Enter your country" required>
    </div>
    <div class="form-group">
      <label for="age">Age:</label>
      <input type="number" id="age" name="uage" value="<?php echo $dream['age']; ?>" min="1" max="120" placeholder="Enter your age" required>
    </div>
    <div class="form-group">
      <label>Gender:</label>
      <div class="radio-group">
        <input type="radio" id="Female" name="ugender" value="Female" <?php echo ($dream['gender'] == 'Female') ? 'checked' : ''; ?>>
        <label for="Female">Female</label>
        <input type="radio" id="Male" name="ugender" value="Male" <?php echo ($dream['gender'] == 'Male') ? 'checked' : ''; ?>>
        <label for="Male">Male</label>
        <input type="radio" id="Other" name="ugender" value="Other" <?php echo ($dream['gender'] == 'Other') ? 'checked' : ''; ?>>
        <label for="Other">Other</label>
      </div>
    </div>
    <div class="form-group">
      <label>Dream type:</label>
      <div class="radio-group">
        <input type="radio" id="Good" name="udream_type" value="Good" <?php echo ($dream['dream_type'] == 'Good') ? 'checked' : ''; ?>>
        <label for="Good">Good dream</label>
        <input type="radio" id="Bad" name="udream_type" value="Bad" <?php echo ($dream['dream_type'] == 'Bad') ? 'checked' : ''; ?>>
        <label for="Bad">Bad dream</label>
      </div>
    </div>
    <div class="form-group">
      <label for="dream_description">Dream description:</label>
      <textarea id="dream_description" name="udream_description" rows="5" cols="10" placeholder="Describe your dream" required><?php echo $dream['dream_description']; ?></textarea>
    </div>
    <input type="submit" name="update" value="Update dream">
  </form>

  <?php
  if (isset($_POST['update'])) {
    $dreamObj->updateRecord($_POST['ucountry'], $_POST['uage'], $_POST['ugender'], $_POST['udream_type'], $_POST['udream_description'], $_GET['editId']);
  }
  ?>

  <?php require 'inc/footer.php'; ?>
</div>
