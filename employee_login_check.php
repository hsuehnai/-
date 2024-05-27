<?php
require_once dirname(__FILE__)."/db_check.php";

session_start();
if (isset($_GET['submit'])){
  $query = [
    'employee_name' => htmlspecialchars($_GET["employee_name"]),
    'employee_pw' => htmlspecialchars($_GET["employee_pw"]),
    'employee_store' => htmlspecialchars($_GET["employee_store"]),
  ];
  $conn = db_check();
  checkData($query['employee_name'], ($query['employee_pw']), ($query['employee_store']), $conn);
}

function checkData($employee_name, $employee_pw, $employee_store, $conn) {
  $sql = "SELECT employee_name, employee_pw, employee_store FROM employee WHERE employee_name = '$employee_name' AND employee_pw = '$employee_pw' AND employee_store = '$employee_store'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    echo "帳號或密碼錯誤";
    header("Location: ./employee_login.php?error=帳號或密碼錯誤");   
  } else {
    $row = mysqli_fetch_assoc($result);
    echo "登入成功";
    $_SESSION['employee_name'] = $row['employee_name'];
    $_SESSION['employee_pw'] = $row['employee_pw'];
    $_SESSION['employee_store'] = $row['employee_store'];
    header("Location: ./home.php");
  }
}
$conn->close();
?>