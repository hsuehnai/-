<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();

storerev($conn);

function storerev($conn) {
  $e_store = $_SESSION['employee_store'];
  //取得分店資訊
  $s_num = "SELECT store_name, store_chic, store_fish, store_pork, store_beef, store_num, store_revenue FROM store WHERE store_id = '$e_store'";
  $result = mysqli_query($conn, $s_num);

  if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $sname = $row["store_name"];
    $store_chic = $row['store_chic'];
    $store_fish = $row['store_fish'];
    $store_pork = $row['store_pork'];
    $store_beef = $row['store_beef'];
    $snum = $row['store_num'];
    $srev = $row['store_revenue'];
  }

  //取得該分店訂單與訂單評分
  $order_query = "SELECT point_flag,order_point FROM orders WHERE order_store='$e_store' AND point_flag='1'";
  $order_result = mysqli_query($conn, $order_query);

  if(mysqli_num_rows($order_result) > 0) {
    $total_ratings = 0;
    $num_orders = 0;
    while ($row = mysqli_fetch_assoc($order_result)) {
      if ($row['order_point'] !== 0) {
        $total_ratings += $row['order_point'];
        $num_orders++;
      }
    }
    $average_rating = $num_orders > 0 ? ($total_ratings / $num_orders) : 0;
  }

  echo "<h1>$sname 營業額</h1>" . "<br>";
  echo "照燒雞胸賣出數量：" . $store_chic . "<br>";
  echo "薄鹽鯖魚賣出數量：" . $store_fish . "<br>";
  echo "泡菜豬里肌賣出數量：" . $store_pork . "<br>";
  echo "日式壽喜牛賣出數量：" . $store_beef . "<br>";
  echo $sname . "賣出餐盒總數量：" . $snum . "<br>";
  echo "<b>=></b> " . $sname . "總營業額：" . $srev . "<br><br>";
  echo "<h1>$sname 評分</h1>" . "<br>";
  echo $average_rating . "<br><br>";
}
echo '<button onclick="window.location=\'./home.php\'">回首頁</button>';
$conn->close();
?>