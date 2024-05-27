<?php
require_once dirname(__FILE__)."/db_check.php";

$query = [
  'employee_name' => htmlspecialchars($_GET["employee_name"]),
  'employee_store' => htmlspecialchars($_GET["employee_store"]),
  'employee_pw' => htmlspecialchars($_GET["employee_pw"])
];
$conn = db_check();
insertData($query['employee_name'], $query['employee_store'], $query['employee_pw'], $conn);

function insertData($employee_name, $employee_store, $employee_pw, $conn) {
  $employee_ns_sql = "SELECT employee_name AND employee_store FROM employee WHERE employee_name = '$employee_name' AND employee_store = '$employee_store'";
  $employee_ns_result = mysqli_query($conn, $employee_ns_sql);
  
  if(mysqli_num_rows($employee_ns_result) > 0) {
    echo "該 employee 已註冊過";
    echo '<br>';
    echo 'employee has already been registered';
  }
  if(mysqli_num_rows($employee_ns_result) === 0) {
    $sql = "INSERT INTO employee (employee_name, employee_store, employee_pw)
    VALUES ('$employee_name', '$employee_store', '$employee_pw')";
    if (mysqli_query($conn, $sql)) {
      echo "員工新增成功";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
  }
}
$conn->close();
?>