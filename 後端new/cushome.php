<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>顧客主頁 - CHOMEPAGE</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"
        ></script> <!--jQuery-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--SweetAlart-->
	</head>
	<?php
        require_once dirname(__FILE__)."/db_check.php";
		session_start();
		echo "Hello,  " . $_SESSION['cust_name'] . "! " . "😄"; /////////////確認顯示當前登入客戶名稱
        $conn = db_check();
    ?>

    <body> 
        <button type="button" id="B8" onclick="window.location ='./login.php'">登出 <br> Logout</button> <!--檔案名稱改成登入頁面-->
	<div class="container">
		<button type="button" id="B6" onclick="window.location ='./menu.php'">輸入訂單 <br> Place Order</button>
		<button type="button" id="B7" onclick="window.location ='./getcustomer.php'">確認訂單狀態 <br> Track Order</button> <!--檔案名稱改成確認訂單網頁-->
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
                width: 200px;
                margin: 10px auto;
                padding: 10px;
                font-size: 16px;
                cursor: pointer;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #f0f0f0;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #ddd;
            }
			img {
                width: 300px; /* Adjust the width as needed */
                height: auto; /* Maintain the aspect ratio */
                margin: 20px 0; /* Space between image and text/buttons */
				border-radius: 50%;
            }
			
	</style>
    <script>
        window.onload = function(){
            if(('<?=$_SERVER['QUERY_STRING']?>')==='login_success')
            {
                Swal.fire({
                    icon: 'success',
                    title: '歡迎！',
                    text: '登入成功',
                })
            }
        }
    </script>
</html>