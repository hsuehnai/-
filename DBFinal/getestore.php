<?php
require_once dirname(__FILE__)."/db_check.php";
error_reporting(E_ALL); ini_set('display_errors', 1);
$conn = db_check();

getEstore($conn);

function getEstore($conn) {
  $e_id = $_SESSION['employee_id']; //2;
  $estore = "SELECT employee_store FROM employee WHERE employee_id = '$e_id'";
  $result = mysqli_query($conn, $estore);

  if(mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $estore = $row["employee_store"];
    header("Location: ./lookord1.php?store=$estore");
    exit();
  }
}

$conn->close();
?>