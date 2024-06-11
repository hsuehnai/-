<?php
require_once dirname(__FILE__)."/db_check.php";
session_start();
$conn = db_check();

storerev($conn);

function storerev($conn) {
  $e_store = $_SESSION['employee_store'];
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

  echo '<div class="centered">';
  echo "<h1>$sname 營業額</h1><br>";
  echo '<table class="sales-table">';
  echo "<tr class='highlight'><td class='total-sales'>照燒雞胸賣出數量</td><td class='large-text'>" . $store_chic . "</td></tr>";
  echo "<tr class='highlight'><td class='total-sales'>薄鹽鯖魚賣出數量</td><td class='large-text'>" . $store_fish . "</td></tr>";
  echo "<tr class='highlight'><td class='total-sales'>泡菜豬里肌賣出數量</td><td class='large-text'>" . $store_pork . "</td></tr>";
  echo "<tr class='highlight'><td class='total-sales'>日式壽喜牛賣出數量</td><td class='large-text'>" . $store_beef . "</td></tr>";
  echo "<tr class='highlight'><td class='total-sales'>" . $sname . "賣出餐盒總數量</td><td class='large-text total-sales'>" . $snum . "</td></tr>";
  echo '</table>';
  echo "<p class='total-revenue'><b>=></b> " . $sname . "總營業額：" . $srev . "</p><br>";
  echo '<button class="home-btn" onclick="window.location=\'./home.php\'">回首頁</button>'; // 修改此處加上 class 和修改字體大小的 style
  echo '</div>';
}

$conn->close();
?>

<style>
.centered {
  text-align: center;
  margin: 0 auto;
  max-width: 600px;
}
body {
  background-color: rgba(173, 216, 230, 0.9);
}
.large-text {
  font-size: 1.5em; /* 放大字體，可以根據需要調整 */
}
.sales-table {
  width: 100%;
  margin: 0 auto;
  border-collapse: collapse;
  background-color: #fff; /* 設置表格背景顏色為白色 */
}
.sales-table td {
  padding: 10px;
  border: 1px solid #000;
  color: #000; /* 黑色字體 */
}
.highlight {
  background-color: #ffffe0; /* 淡黃色 */
}
.total-revenue {
  font-size: 2em; /* 放大字體 */
  font-weight: bold; /* 加粗字體 */
}
.total-sales {
  font-size: 1.5em; /* 放大字體 */
  font-weight: bold; /* 加粗字體 */
  color: #8B0000; /* 深紅色字體 */
}
.home-btn {
  font-size: 1.5em; /* 放大字體 */
  padding: 10px 20px; /* 調整按鈕大小 */
  background-color: #fff; /* 白色背景 */
  color: #000; /* 黑色字體 */
  border: 1px solid #000; /* 黑色邊框 */
  border-radius: 10px; /* 圓角 */
}
</style>
