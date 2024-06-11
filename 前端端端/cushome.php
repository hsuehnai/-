<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>顧客主頁 - CHOMEPAGE</title>
</head>
<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();
?>

<body> 
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;"> <!-- 添加 margin-bottom -->
            <button type="button" id="B5" onclick="window.location ='./login.php'" style="background-color: pink; width: 150px; padding: 8px; border: none;">登出 <br> Logout</button>
            <div style="font-size: 20px; font-weight: bold;"><?php echo "Hello, " . $_SESSION['cust_name'] . "! 😄"; ?></div> <!-- 设置字体大小和粗体 -->
        </div>
        <div style="display: flex; justify-content: center;">
            <img src="餐盒們.jpg" alt="Your Image" style="width: 500px; height: auto; margin-top: 20px; border-radius: 10px;"> <!-- 添加 border-radius 屬性 -->
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 20px;"> <!-- 添加 margin-top -->
            <button type="button" id="B6" onclick="window.location ='./menu.php'" style="width: 250px; padding: 12px; border: 2px solid #ccc; background-color: white; font-weight: bold;">輸入訂單 <br> Place Order</button>
            <button type="button" id="B7" onclick="window.location ='./getcustomer.php'" style="width: 250px; padding: 12px; border: 2px solid #ccc; background-color: white; font-weight: bold;">確認訂單狀態 <br> Track Order</button> <!--檔案名稱改成確認訂單網頁-->
        </div>
    </div>
</body>
<style>
    body {
        background-color: #FFFFE0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        text-align: center;
    }

    button {
        display: block;
        margin: 10px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #ddd;
    }
</style>
</html>
