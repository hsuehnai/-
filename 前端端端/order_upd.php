<?php
require_once dirname(__FILE__)."/db_check.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $order_id = intval($_GET['order_id']); //取得該訂單編號
    
    $conn = db_check();
    if ($conn->connect_error) {
        die("連接失敗: " . $conn->connect_error);
    }
    
    // 更新訂單狀態
    $update = "UPDATE orders SET order_finish='1' WHERE order_id=$order_id";
    if ($conn->query($update) === TRUE) {//若成功則不作為
    } 
    else {
        echo "更新失敗: " . $conn->error;
    }
    $conn->close();
}
?>