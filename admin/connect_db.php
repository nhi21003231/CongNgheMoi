<?php
$host = "localhost";
$user = "nongsans_root";
$password = "7HgAYa_,yc@f";
$database = "nongsans_db";

// Kết nối đến cơ sở dữ liệu
$con = mysqli_connect($host, $user, $password, $database);

// Kiểm tra kết nối
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno(); exit;
}
mysqli_set_charset($con, "utf8");

?>
