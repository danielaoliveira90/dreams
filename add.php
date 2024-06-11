<?php
session_start();

include_once("database.php");

$country = filter_input(INPUT_POST, 'country');
$age = filter_input(INPUT_POST, 'age');
$gender = filter_input(INPUT_POST, 'gender');
$dream_type = filter_input(INPUT_POST, 'dream_type');
$dream_description = filter_input(INPUT_POST, 'dream_description');

$result_users = "Insert into dreams (country, age, gender, dream_type, dream_description, created) VALUES ('$country', '$age', '$gender', '$dream_type', '$dream_description', NOW())";
$all_dreams = mysqli_query($conn, $result_users);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style= 'color:green;'>Dream registered successfully!</p>";
    header("Location: index.php");
}else{
    $_SESSION['msg'] = "<p style= 'color:red;'>Error!</p>";
    header("Location: index.php");
}



