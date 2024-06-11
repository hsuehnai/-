<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$query = [
  'order_date' => htmlspecialchars($_GET["ord_date"]),
  'order_store' => htmlspecialchars($_GET["ord_store"]),
  'c_num' => htmlspecialchars($_GET["c_num"]),
  'f_num' => htmlspecialchars($_GET["f_num"]),
  'p_num' => htmlspecialchars($_GET["p_num"]),
  'b_num' => htmlspecialchars($_GET["b_num"]),
  'spoon' => htmlspecialchars($_GET["spoon"])
];

$conn = db_check();

$cust_id=$_SESSION['cust_id'];

insertData($cust_id,$query['order_date'], $query['order_store'], $query['c_num'], $query['f_num'], $query['p_num'], $query['b_num'], $query['spoon'],$conn);

function insertData($order_cust,$order_date, $order_store, $order_chic, $order_fish, $order_pork, $order_beef, $order_spoon, $conn) {
    $order_num=$order_chic+$order_fish+$order_pork+$order_beef;
    $order_total=$order_chic*80+$order_fish*100+$order_pork*110+$order_beef*130;
    $sql = "INSERT INTO orders (order_cust, order_date, order_store, order_chic, order_fish, order_pork, order_beef, order_num, order_total, order_spoon)
    VALUES ('$order_cust', '$order_date', '$order_store', '$order_chic', '$order_fish', '$order_pork', '$order_beef', '$order_num', '$order_total', '$order_spoon')";
    if (mysqli_query($conn, $sql)) {
      echo "已成功下單";
      $update_sql = "
            UPDATE store
            SET 
                store_chic = store_chic + '$order_chic',
                store_fish = store_fish + '$order_fish',
                store_pork = store_pork + '$order_pork',
                store_beef = store_beef + '$order_beef',
                store_num = store_num + '$order_num',
                store_revenue = store_revenue + '$order_total'
            WHERE store_id = '$order_store'
        ";
        if (mysqli_query($conn, $update_sql)) {//若成功則不作為
        } else {
          echo "Error updating store data: " . $conn->error;
        }
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>