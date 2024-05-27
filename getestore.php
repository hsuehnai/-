<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();

getEstore($conn);

function getEstore($conn) {
  $e_name = $_SESSION['employee_name']; //2;
  $estore = "SELECT employee_store FROM employee WHERE employee_name = '$e_name'";
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