<!-- 
// $server = "localhost";
// $user = "root";
// $password = "";
// $dbname = "dream_db";

// $conn = mysqli_connect($server, $user, $password, $dbname); -->

<?php

class database{
  private $servername = "localhost";
  private $username   = "root";
  private $password   = "";
  private $database   = "dream_db";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

  // Insert customer data into customer table
  public function insertData($country, $age, $gender, $dream_type, $dream_description)
  {
    $query="INSERT INTO dreams(country, age, gender, dream_type, dream_description) VALUES('$country', '$age', '$gender', '$dream_type', '$dream_description')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }
  }

  // Fetch customer records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM dreams";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
    else{
      return null;
    }
  }

  // Fetch single data for edit from customer table
  public function displayRecordById($id)
  {
    $query = "SELECT * FROM dreams WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }
  }

  // Update customer data into customer table
  public function updateRecord($ucountry, $uage, $ugender, $udream_type, $udream_description, $id)
  {
      $query = "UPDATE dreams SET country = '$ucountry', age = '$uage', gender = '$ugender', dream_type = '$udream_type', dream_description = '$udream_description' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }
  }

  // Delete customer data from customer table
  public function deleteRecord($id)
{
  $query = "DELETE FROM dreams WHERE id = '$id'";
  $sql = $this->con->query($query);
  if ($sql == true) {
    return true;
  } else {
    return false;
  }
}


  
}
$dreamObj = new database();
