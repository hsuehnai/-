<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>員工主頁 - EHOMEPAGE</title>
        <script src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"
        ></script> <!--jQuery-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script><!--SweetAlart-->
	</head>
	<?php
        require_once dirname(__FILE__)."/db_check.php";
		session_start();
        $conn = db_check();
		echo "Hello,  " . $_SESSION['employee_name'] . "! 😄" . "<br>";
        
        $e_store = $_SESSION['employee_store'];
        $sname = "SELECT store_name FROM store WHERE store_id = '$e_store'";
        $sresult = mysqli_query($conn, $sname);
        if(mysqli_num_rows($sresult) > 0) {
            $row = $sresult->fetch_assoc();
            $sname = $row["store_name"];
        }
        echo "分店：" . $sname;

        $conn->close();
	    ?>

    <body> 
        <button type="button" id="B5" onclick="window.location ='./login.php'">登出 <br> Logout</button> <!--檔案名稱改成登入頁面-->
	<div class="container">
         
        <img src="雞胸餐盒.jpg" alt="Logo">
		
		<!--<button type="button" id="B1" onclick="window.location ='./custreg.php'">新增會員（顧客）資料 <br> Add New Customer</button>-->
		<!--<button type="button" id="B2" onclick="window.location ='./order.php'">輸入訂單 <br> Place order</button>-->
		<button type="button" id="B3" onclick="window.location ='./getestore.php'">查看分店訂單 <br> Check store's order</button>
		<button type="button" id="B4" onclick="window.location ='./checkrev.php'">查看分店營業額 <br> Store's Revenue</button>
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