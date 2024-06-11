<?php
require_once dirname(__FILE__)."/db_check.php";

session_start();
if (isset($_GET['submit'])){
  $query = [
    'cust_name' => htmlspecialchars($_GET["cust_name"]),
    'cust_pw' => htmlspecialchars($_GET["cust_pw"]),
  ];
  $conn = db_check();
  checkData($query['cust_name'], ($query['cust_pw']), $conn);
}

function checkData($cust_name, $cust_pw, $conn) {
    $sql = "SELECT cust_id,cust_name FROM customer WHERE cust_name = '$cust_name'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0) {
      echo "查無此會員";
  	  header("Location: ./login.php?error=no_cust_name");   
    } 
    else{
      $sql = "SELECT cust_id,cust_name FROM customer WHERE cust_name = '$cust_name' AND cust_pw = '$cust_pw'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) == 0) {
        echo "密碼錯誤";
        header("Location: ./login.php?error=wrong_cust_pw");   
      }
      else {
        $row = mysqli_fetch_assoc($result);
        echo "登入成功";
        $_SESSION['cust_name'] = $row['cust_name'];
        $_SESSION['cust_id'] = $row['cust_id'];
        //$_SESSION['cust_pw'] = $row['cust_pw'];
        header("Location: ./cushome.php?login_success");
      }
    }
}
$conn->close();
?>
