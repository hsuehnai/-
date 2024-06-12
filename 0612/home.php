<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>員工主頁 - EHOMEPAGE</title>
</head>
<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();
$e_store = $_SESSION['employee_store'];
$sname = "SELECT store_name FROM store WHERE store_id = '$e_store'";
$sresult = mysqli_query($conn, $sname);
if(mysqli_num_rows($sresult) > 0) {
    $row = $sresult->fetch_assoc();
    $sname = $row["store_name"];
}
$conn->close();
?>

<body>
<div class="container">
    <div class="content">
        <h2 style="margin-top: -170px;"><strong>Hello, <?php echo $_SESSION['employee_name']; ?>! 😄</strong></h2>
        <br><br>
        <h2 style="font-size: 24px; margin-top: -20px; margin-right: 50px;"><strong>您的分店：<?php echo $sname; ?></strong></h2>
    </div>
    
    <div class="side-content">
        <img src="雞胸餐盒.jpg" alt="Logo">
        
        <div class="buttons">
            <button type="button" id="B5" onclick="window.location ='./login.php'" style="background-color: pink; width: 150px; padding: 8px; border: none; color: black;">登出 <br> Logout</button>
            <!--<button type="button" id="B1" onclick="window.location ='./custreg.php'">新增會員（顧客）資料 <br> Add New Customer</button>-->
            <!--<button type="button" id="B2" onclick="window.location ='./order.php'">輸入訂單 <br> Place order</button>-->
            <button type="button" id="B3" onclick="window.location ='./getestore.php'">查看分店訂單 <br> Check store's order</button>
            <button type="button" id="B4" onclick="window.location ='./checkrev.php'">查看分店營業額 <br> Store's Revenue</button>
        </div>
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
        display: flex;
        flex-direction: row; /* 將內容水平排列 */
        align-items: center;
        justify-content: center; /* 將內容垂直置中 */
    }

    .content {
        text-align: center;
    }

    .side-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    button {
        display: block;
        width: 200px;
        margin: 10px auto;
        padding: 10px;
        font-size: 16px;
        font-weight: bold; /* 將文字設置為粗體 */
        cursor: pointer;
        border-radius: 5px;
        background-color: #FFFFFF; /* 將按鈕顏色改為白色 */
        color: black; /* 將文字顏色改為黑色 */
        border: 1px solid #CCCCCC; /* 添加邊框 */
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #ddd;
    }

    img {
        width: 300px;
        height: auto;
        margin: 20px 0;
        border-radius: 50%;
    }
</style>
</html>
