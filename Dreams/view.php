  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php
// session_start();

// include_once("inc/database.php");
require 'inc/header.php';

?>

  <div id="body">
    <h1>Last night I had a dream...</h1>
  </div>
  <main class="container">
    <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
    }
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
    }
    ?>
    <section>
    <h2>View Records</h2>

      <?php
      include_once 'inc/database.php';
      
      $dreams = $dreamObj->displayData(); ?>
      <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Country</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Dream type</th>
            <th>Dream description</th>
            <th>Dream date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($dreams != null) {
            foreach ($dreams as $dream) {
              ?>
              <tr>
                <td><?php echo $dream['id'] ?></td>
                <td><?php echo $dream['country'] ?></td>
                <td><?php echo $dream['age'] ?></td>
                <td><?php echo $dream['gender'] ?></td>
                <td><?php echo $dream['dream_type'] ?></td>
                <td><?php echo $dream['dream_description'] ?></td>
                <td><?php echo $dream['created'] ?></td>
                <td>
                  <button class="btn btn-danger"><a href="edit.php?editId=<?php echo $dream['id'] ?>">
                      <i class="fa fa-pencil text-white"></i></a></button>
                  <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $dream['id'] ?>"
                      onclick="return confirm('Are you sure?'); return false;">
                      <i class="fa fa-trash text-white"></i>
                    </a></button>
                </td>
              </tr>
            <?php }
          } else { ?>
            <tr>
              <td colspan=5 align="center">No Records Found</td>
            </tr>
            <?php }

            // Delete record from table
          if (!empty($_GET['deleteId'])) {
            $deleteId = $_GET['deleteId'];
            $dreamObj->deleteRecord($deleteId);
            // Redirect to view.php to refresh the list and avoid resubmission
            header("Location: view.php?msg3=delete");
            exit();
          }
          ?>
        </tbody>
    </table>
    </section>
  </main>
  

</body>
<?php 
  require 'inc/footer.php'; 
  ?>
</html>
