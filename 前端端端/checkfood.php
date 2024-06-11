<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    $cid = htmlspecialchars($_GET["cid"]);  //取得該客戶編號
    $conn = db_check(); //資料庫建立連結
    if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
    }
    $cust_name = "SELECT cust_name FROM customer WHERE cust_id='$cid'"; //顯示客戶名稱
    $cust_result = mysqli_query($conn, $cust_name);
    if (mysqli_num_rows($cust_result) > 0) {
        $cust_row = $cust_result->fetch_assoc();
        $cust_name = $cust_row['cust_name'];
    }
    echo "<h1><strong>$cust_name 的訂單</strong></h1>";
    echo '<button onclick="window.location=\'./cushome.php\'">回首頁</button>';

    //$order = "SELECT order_id,order_store,order_date,order_chic,order_fish,order_pork,order_beef,order_num,order_total,order_spoon,order_finish FROM orders WHERE order_cust='$cid'"; //取得該客戶訂單
    $order = "
    SELECT orders.order_id, store.store_name, orders.order_date, orders.order_chic, orders.order_fish, 
           orders.order_pork, orders.order_beef, orders.order_num, orders.order_total, orders.order_spoon, orders.order_finish, orders.point_flag, orders.order_point
    FROM orders
    JOIN store ON orders.order_store = store.store_id
    WHERE orders.order_cust='$cid'
    ";
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
        echo "<tr><th>訂單編號</th>
              <th>取餐分店</th>
              <th>訂單日期</th>
              <th>照燒雞胸肉訂購數量</th>
              <th>薄鹽鯖魚訂購數量</th>
              <th>泡菜豬里肌訂購數量</th>
              <th>日式壽喜牛訂購數量</th>
              <th>是否需要免洗餐具</th>
              <th>訂購餐盒總數量</th>
              <th>訂單總金額</th>
              <th>訂單狀態</th>
              <th>訂單評分</th></tr>";
        while ($row = $order_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['order_id']}</td>";
            echo "<td>{$row['store_name']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td>{$row['order_chic']}</td>";
            echo "<td>{$row['order_fish']}</td>";
            echo "<td>{$row['order_pork']}</td>";
            echo "<td>{$row['order_beef']}</td>";
            echo "<td>";//id='status-{$row['order_id']}'}
            if ($row['order_spoon'] == '0') {
                echo "不需要";
            } 
            else {
                echo "需要";
            }
            echo "</td>";
            echo "<td>{$row['order_num']}</td>";
            echo "<td>{$row['order_total']}</td>";
	        echo "<td>";//id='status-{$row['order_id']}'
            if ($row['order_finish'] == '0') {
                    echo "訂單尚未完成";
            } 
            else {
                echo "訂單已完成";
            }
            echo "</td>";
            echo "<td id='status-{$row['order_id']}'>";
            if ($row['point_flag'] == '0') {
                echo "<select id='rating-{$row['order_id']}'>
                        <option value=''>選擇評分</option>
                        <option value='5'>⭐⭐⭐⭐⭐</option>
                        <option value='4'>⭐⭐⭐⭐</option>
                        <option value='3'>⭐⭐⭐</option>
                        <option value='2'>⭐⭐</option>
                        <option value='1'>⭐</option>
                      </select>
                    <button id='button-{$row['order_id']}' onclick='submitRating({$row['order_id']})'>確定</button>";
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
    </div>

<script>
function submitRating(orderId) {
    var rating = $('#rating-' + orderId).val();
    if (rating === "") {
        Swal.fire({
            icon: 'warning',
            title: '未選擇評分',
            text: '請選擇一個評分',
        });
        return;
    }
    $.ajax({
        url: 'point_upd.php', //評分寫進資料庫
        type: 'GET',
        data: {
            order_id: orderId,
            rating: rating
        },
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: '評分成功',
                text: '您的評分已提交',
            }).then(() => {
                location.reload(); //刷新網頁
            });
        },
        error: function() {
            Swal.fire({
                icon: 'error',
                title: '提交失敗',
                text: '請稍後再試',
            });
        }
    });
}
</script>
</body>
</html>
