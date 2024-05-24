<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <title>主頁 - HOMEPAGE</title>
	</head>

	<h1><?php echo "Hello,  " . $_SESSION['employee_name'] . "! " . "😄"?></h1>
    <body>
		<button type="button" id="B1" onclick="window.location ='./custreg.php'">新增會員（顧客）資料 <br> Add New Customer</button>
		<button type="button" id="B2" onclick="window.location ='./order.php'">輸入訂單 <br> Place order</button>
		<button type="button" id="B3" onclick="window.location ='/DBfinal/getestore.php'">查看分店訂單 <br> Check order for particular branch</button>
		<button type="button" id="B4" onclick="window.location ='./checkrev.php'">查看分店績效 <br> Performance for particular branch</button>
	</body>
</html>