<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();

getcust($conn);

function getcust($conn) {
  $c_name = $_SESSION['cust_name']; //2;
  $c_id = "SELECT cust_id FROM customer WHERE cust_name = '$c_name'";
  $result = mysqli_query($conn, $c_id);

  if(mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $c_id = $row["cust_id"];
    header("Location: ./checkfood.php?cid=$c_id");
    exit();
  }
}

$conn->close();
?>