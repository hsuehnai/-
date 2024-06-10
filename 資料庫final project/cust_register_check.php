<?php
require_once dirname(__FILE__)."/db_check.php";

$query = [
  'username' => htmlspecialchars($_GET["username"]),
  'phone' => htmlspecialchars($_GET["phone"]),
  'email' => htmlspecialchars($_GET["email"])
  'pw' => htmlspecialchars($_GET["pw"])
];
$conn = db_check();
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

insertData($query['username'], $query['phone'], $query['email'], $query['pw'], $conn);

function insertData($username, $phone, $email, $email, $conn) {
    $email_sql = "SELECT cust_id FROM customer WHERE cust_email = '$email'";
    $email_result = mysqli_query($conn, $email_sql);

    $phone_sql = "SELECT cust_id FROM customer WHERE cust_phone = '$phone'";
    $phone_result = mysqli_query($conn, $phone_sql);


    if(mysqli_num_rows($email_result) > 0) {
         header("Location: ./register.php?error=customer_email_repeat");
    }
    if(mysqli_num_rows($phone_result) > 0) {
         header("Location: ./register.php?error=customer_phone_repeat");
    }

    if(mysqli_num_rows($email_result) === 0 && mysqli_num_rows($phone_result) === 0) {
        $sql = "INSERT INTO customer (cust_name,cust_phone,cust_email,cust_pw)
        VALUES ('$username', '$phone', '$email', '$pw')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ./login.php?register_success");
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  
    }
}
$conn->close();
?>
