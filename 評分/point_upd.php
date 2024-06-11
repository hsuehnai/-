<?php
require_once dirname(__FILE__)."/db_check.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $order_id = intval($_GET['order_id']);
    $rating = intval($_GET['rating']);

    $conn = db_check();
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }

    $update = "UPDATE orders SET point_flag = '1', order_point = $rating WHERE order_id = $order_id";
    if ($conn->query($update) === TRUE) {//若成功則不作為
    } 
    else {
        echo "更新失敗: " . $conn->error;
    }
    $conn->close();
}
?>
