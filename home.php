<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>主頁 - HOMEPAGE</title>
	</head>
	<?php
		session_start();
		echo "Hello,  " . $_SESSION['employee_name'] . "! " . "😄";
	    ?>

    <body>
	<div class="container">
         
        <img src="雞胸餐盒.jpg" alt="Logo">
		
		<button type="button" id="B1" onclick="window.location ='./custreg.php'">新增會員（顧客）資料 <br> Add New Customer</button>
		<button type="button" id="B2" onclick="window.location ='./order.php'">輸入訂單 <br> Place order</button>
		<button type="button" id="B3" onclick="window.location ='./getestore.php'">查看分店訂單 <br> Check order for particular branch</button>
		<button type="button" id="B4" onclick="window.location ='./checkrev.php'">查看分店績效 <br> Performance for particular branch</button>
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
</html>