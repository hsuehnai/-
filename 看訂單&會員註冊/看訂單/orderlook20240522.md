目前結果：

![image](https://github.com/hsuehnai/-/assets/162154266/8a016d0c-fce8-4717-8a37-6b483de6ba8a)

/*
1.因要取得該員工所在的店家編號，才能看到訂單，所以先預設為分店4
2.訂單的顯示有兩個版本，兩個顯示的內容一樣，樣式版面不一樣，註解起來的是無樣式的(28到41行)，無註解的是表格，看哪個方便調整版面就用哪個
3.AJAX的button是按下完成訂單後即時顯示訂單狀態，除顯示的文字外建議不要改任何東西...
*/
<?php
    require_once "dbconnect.php";
    //取得該分店編號
    //$store = htmlspecialchars($_GET["store"]); 
    $store=4; 
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
    echo "$store_name 訂單：";

    //取得該分店訂單
    $order = "SELECT order_id,order_cust,order_num,order_date,order_finish FROM orders WHERE order_store='$store'";
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
        echo "<tr><th>訂單編號</th><th>會員編號</th><th>訂購數量</th><th>訂單日期</th><th>訂單狀態</th></tr>";
        while ($row = $order_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['order_id']}</td>";
            echo "<td>{$row['order_cust']}</td>";
            echo "<td>{$row['order_num']}</td>";
            echo "<td>{$row['order_date']}</td>";
            echo "<td id='status-{$row['order_id']}'>";
            if ($row['order_finish'] == '0') {
                echo "<button id='button-{$row['order_id']}' onclick='finish({$row['order_id']})'>完成訂單</button>";
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

<!--AJAX的button-->
<script>
function finish(order_id) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "order_update.php?order_id="+order_id, true);
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
