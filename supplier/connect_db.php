<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "nongsans_db";
$con = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}
mysqli_set_charset($con, "utf8"); // Thiết lập mã hóa UTF-8
?>
