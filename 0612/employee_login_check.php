<?php
require_once dirname(__FILE__)."/db_check.php";

session_start();
if (isset($_GET['submit'])){
  $query = [
    'employee_name' => htmlspecialchars($_GET["employee_name"]),
    'employee_pw' => htmlspecialchars($_GET["employee_pw"]),
  ];
  $conn = db_check();
  checkData($query['employee_name'], ($query['employee_pw']), $conn);
}

function checkData($employee_name, $employee_pw, $conn) {
  $sql = "SELECT employee_id, employee_name FROM employee WHERE employee_name = '$employee_name'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 0) {
    header("Location: ./login.php?error=no_employee_name");   
  } 
    else{
    $sql = "SELECT employee_id, employee_name, employee_store FROM employee WHERE employee_name = '$employee_name' AND employee_pw = '$employee_pw'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0) {
      header("Location: ./login.php?error=wrong_employee_pw");   
    }
    else {
    $row = mysqli_fetch_assoc($result);
    echo "登入成功";
    $_SESSION['employee_name'] = $row['employee_name'];
    $_SESSION['employee_store'] = $row['employee_store'];
    //$_SESSION['employee_pw'] = $row['employee_pw'];
    header("Location: ./home.php");
    }
    }
}
$conn->close();
?>
