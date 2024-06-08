<?php
require_once dirname(__FILE__)."/db_check.php";

$query = [
  'order_date' => htmlspecialchars($_GET["ord_date"]),
  'order_cust' => htmlspecialchars($_GET["ord_cust"]),
  'order_num' => htmlspecialchars($_GET["ord_num"]),
  'order_store' => htmlspecialchars($_GET["ord_store"])
];

$conn = db_check();

insertData($query['order_date'], $query['order_cust'], $query['order_num'], $query['order_store'], $conn);

function insertData($ord_date, $ord_cust, $ord_num, $ord_store, $conn) {
    $sql = "INSERT INTO orders (order_date, order_cust, order_num, order_store)
    VALUES ('$ord_date', '$ord_cust', '$ord_num', '$ord_store')";
    if (mysqli_query($conn, $sql)) {
      echo "已成功下單";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>