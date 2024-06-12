<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>訂單管理</title>
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
            max-width: 80%; /* 設置container最大寬度為80% */
            margin: 0 auto; /* 水平置中 */
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-responsive {
            margin-top: 20px;
            margin-left: 100px; /* 左右置中 */
            margin-right: auto; /* 左右置中 */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffe0;
        }
        table, th, td {
            border: 1px solid #808080; /* Gray border color */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            font-size: larger; /* Increase font size */
            background-color: #ffffe0; 
        }
        button {
            margin: 0;
            padding: 0;
            background-color: #ffe6e6; /* 粉紅色 */
            border: 1px solid black; /* Black border */
            border-radius: 5px;
            padding: 10px 20px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
    require_once dirname(__FILE__)."/db_check.php";
    //取得該分店編號
    $store = htmlspecialchars($_GET["store"]); 
    //資料庫建立連結
    $conn = db_check(); 
    if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
    }
    //顯示員工所在分店名稱
    $store_name = "SELECT store_name FROM store WHERE store_id='$store'";
    $store_result = mysqli_query($conn, $store_name);
    if (mysqli_num_rows($store_result) > 0) {
        $store_row = $store_result->fetch_assoc();
        $store_name = $store_row['store_name'];
    }
    echo "<h1><strong>$store_name 訂單</strong></h1>";
    echo '<button onclick="window.location=\'./home.php\'">回首頁</button>';
    //取得該分店訂單
    //$order = "SELECT order_id,order_cust,order_num,order_date,order_finish FROM orders WHERE order_store='$store'";
    $order = "
    SELECT 
        o.order_id,
        c.cust_name,
        o.order_num,
        o.order_date,
        o.order_chic,
        o.order_fish,
        o.order_pork,
        o.order_beef,
        o.order_finish,
        o.point_flag,
        o.order_point
    FROM orders o
    JOIN customer c ON o.order_cust = c.cust_id
    WHERE o.order_store='$store'
    ";
    $order_result = mysqli_query($conn, $order);
    if (mysqli_num_rows($order_result) > 0) {
        /*
        echo "訂單編號，會員編號，訂購數量，訂單日期，訂單狀態<br>";
        while($row = $order_result->fetch_assoc()) {
            echo "{$row["order_id"]},{$row["order_cust"]},{$row["order_num"]},{$row["order_date"]},<span id='status-{$row['order_id']}'></span>";
            //若訂單未完成，顯示「完成訂單」的按鈕
            if ($row['order_finish'] == '0') {
                echo "<button onclick='finish({$row['order_id']})'>完成訂單</button>";
            } 
            else {//已完成訂單
                echo "已完成訂單";
            }
            echo "<br>";
        }
        */
        
        echo "<table border='1'>";
        echo "<tr><th>訂單編號</th><th>會員姓名</th><th>取餐日期</th><th>照燒雞胸肉<br>訂購數量</th><th>薄鹽鯖魚<br>訂購數量</th><th>泡菜豬里肌<br>訂購數量</th><th>日式壽喜牛<br>訂購數量</th><th>訂購數量</th><th>訂單狀態</th><th>訂單評分</th></tr>";
        while ($row = $order_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['order_id']}</td>";
            echo "<td>{$row['cust_name']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['order_chic']}</td>";
            echo "<td>{$row['order_fish']}</td>";
            echo "<td>{$row['order_pork']}</td>";
            echo "<td>{$row['order_beef']}</td>";
            echo "<td>{$row['order_num']}</td>";
            echo "<td id='status-{$row['order_id']}'>";
            if ($row['order_finish'] == '0') {
                echo "<button id='button-{$row['order_id']}' onclick='finish({$row['order_id']})'>完成訂單</button>";
            } 
            else {
                echo "已完成訂單";
            }
            echo "</td>";
            echo "<td>";
            if ($row['point_flag'] == '0') {
                echo "尚未評分";
            } 
            else {
                if ($row['order_point'] == 5) echo "⭐⭐⭐⭐⭐";
                if ($row['order_point'] == 4) echo "⭐⭐⭐⭐";
                if ($row['order_point'] == 3) echo "⭐⭐⭐";
                if ($row['order_point'] == 2) echo "⭐⭐";
                if ($row['order_point'] == 1) echo "⭐";
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

<!--AJAX的button-->
<script>
function finish(order_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "order_upd.php?order_id="+order_id, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");//寫進資料庫，沒這行的話刷新會重置
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // 更新訂單狀態
            document.getElementById("status-" + order_id).innerText = "已完成訂單";
            // 移除按鈕
            let button = document.querySelector("button[onclick='finish(" + order_id+ ")']");
            if (button) {
                button.parentNode.removeChild(button);
            }
        }
    };
    xhr.send();
}
</script>
    </div>
</body>
</html>