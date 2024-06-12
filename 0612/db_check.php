<?php
function db_check() {
  $servername = "localhost";
  $dbname = "term_project";
  $username = "root";
  $password = "";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else return $conn;
}
?>
