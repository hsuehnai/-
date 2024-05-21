/*
檢查是否有連接到資料庫
*/
<?php
function db_check() {// 確認有沒有連接到資料庫
    $servername = "localhost"; // MySQL 伺服器名稱或 IP 地址
    $username = "root"; // MySQL 用戶名
    $password = ""; // MySQL 用戶密碼
    $dbname = "term_project"; // 資料庫名稱
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else return $conn;
}
?>
