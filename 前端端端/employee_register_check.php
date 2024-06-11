<?php
require_once dirname(__FILE__)."/db_check.php";

session_start();
$query = [
  'employee_name' => htmlspecialchars($_GET["employee_name"]),
  'employee_store' => htmlspecialchars($_GET["employee_store"]),
  'employee_pw' => htmlspecialchars($_GET["employee_pw"])
];
$conn = db_check();
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

insertData($query['employee_name'], $query['employee_store'], $query['employee_pw'], $conn);

function insertData($employee_name, $employee_store, $employee_pw, $conn) {
  $name_sql = "SELECT employee_id FROM employee WHERE employee_name = '$employee_name'";
  $name_result = mysqli_query($conn, $name_sql);
  
  if(mysqli_num_rows($name_result) > 0) {
      echo "此員工已註冊";
      header("Location: ./register.php?error=employee_name_repeat");
  }
  if(mysqli_num_rows($name_result) === 0) {
    $sql = "INSERT INTO employee (employee_name, employee_store, employee_pw)
    VALUES ('$employee_name', '$employee_store', '$employee_pw')";
    if (mysqli_query($conn, $sql)) {
      header("Location: ./login.php?register_success");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
  }
}
$conn->close();
?>
