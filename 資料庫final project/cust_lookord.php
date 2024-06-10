<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>客戶歷史訂單紀錄</title>
    <style>
        body {
            background-color: #add8e6; /* Light blue background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #808080; /* Gray border color */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
    require_once dirname(__FILE__)."/db_check.php"; 
    $customer = htmlspecialchars($_GET["customer"]);  //取得該客戶編號
    $conn = db_check(); //資料庫建立連結
    if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
    }
    $cust_name = "SELECT cust_name FROM customer WHERE cust_id='$username'"; //顯示客戶名稱
    $cust_result = mysqli_query($conn, $cust_name);
    if (mysqli_num_rows($store_result) > 0) {
        $cust_row = $cust_result->fetch_assoc();
        $cust_name = $cust_row['cust_name'];
    }
    echo "<h1><strong>$cust_name 的訂單</strong></h1>";

    $order = "SELECT order_id,order_store,order_date,order_chic,order_fish,order_pork,order_beef,order_spoon,order_finish FROM orders WHERE order_cust='$username'"; //取得該客戶訂單
    $order_result = mysqli_query($conn, $order);
    if (mysqli_num_rows($order_result) > 0) {
        /*
        echo "訂單編號，分店編號，照燒雞胸肉訂購數量，薄鹽鯖魚訂購數量，泡菜豬里肌訂購數量，日式壽喜牛訂購數量，訂單日期，訂單狀態<br>";
        while($row = $order_result->fetch_assoc()) {
            echo "{$row["order_id"]},{$row["order_store"]},{$row['order_chic']},{$row['order_fish']},{$row['order_pork']},{$row['beef']},{$row["order_date"]},{$row['order_spoon']},{$row['order_finish']}";
	    //顯示是否需要免洗餐具
	    if ($row['order_spoon'] == '0') {
            	echo "不需要";
            } 
            else {
            	echo "需要";
            }

            //顯示完成訂單或未完成
            if ($row['order_finish'] == '0') {
                echo "訂單尚未完成";
            } 
            else {
                echo "已完成訂單";
            }
            echo "<br>";
        }
        */
        echo "<table border='1'>";
        echo "<tr><th>訂單編號</th><th>分店編號</th><th>照燒雞胸肉訂購數量</th><th>薄鹽鯖魚訂購數量</th><th>泡菜豬里肌訂購數量</th><th>日式壽喜牛訂購數量</th><th>免洗餐具</th><th>訂單日期</th><th>訂單狀態</th></tr>";
        while ($row = $order_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['order_id']}</td>";
            echo "<td>{$row['order_store']}</td>";
            echo "<td>{$row['order_chic']}</td>";
	    echo "<td>{$row['order_fish']}</td>";
	    echo "<td>{$row['order_pork']}</td>";
	    echo "<td>{$row['order_beef']}</td>";
	    echo "<td id='status-{$row['order_id']}'}>";
	    if ($row['order_spoon'] == '0') {
            	echo "不需要";
            } 
            else {
            	echo "需要";
            }
            echo "</td>";
            echo "<td>{$row['order_date']}</td>";
	    echo "<td id='status-{$row['order_id']}'>";
	    if ($row['order_finish'] == '0') {
            	echo "訂單尚未完成";
            } 
            else {
            	echo "已完成訂單";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
    } 
    else {
        echo "暫無訂單";
    }
    $conn->close();// 關閉連接
    
    ?>

    </div>
</body>
</html>
