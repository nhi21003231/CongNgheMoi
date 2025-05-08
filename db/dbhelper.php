<?php
require_once('config.php');

function execute($sql)
{
    // Mở kết nối đến cơ sở dữ liệu
    $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    // Đặt mã hóa ký tự UTF-8
    mysqli_set_charset($con, "utf8");

    // Thực thi câu lệnh SQL (INSERT, UPDATE, DELETE)
    mysqli_query($con, $sql);

    // Đóng kết nối
    mysqli_close($con);
}

function executeResult($sql)
{
    // Mở kết nối đến cơ sở dữ liệu
    $con = mysqli_connect("localhost", "root", "", "nongsans_db");

    // Đặt mã hóa ký tự UTF-8
    mysqli_set_charset($con, "utf8");

    // Thực thi câu lệnh SQL
    $result = mysqli_query($con, $sql);
    $data = [];

    if ($result != null) {
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }
    }

    // Đóng kết nối
    mysqli_close($con);

    return $data;
}

function executeSingleResult($sql)
{
    // Mở kết nối đến cơ sở dữ liệu
    $con = mysqli_connect("localhost", "root", "", "nongsans_db");

    // Đặt mã hóa ký tự UTF-8
    mysqli_set_charset($con, "utf8");

    // Thực thi câu lệnh SQL
    $result = mysqli_query($con, $sql);
    $row = null;

    if ($result != null) {
        $row = mysqli_fetch_array($result, 1);
    }

    // Đóng kết nối
    mysqli_close($con);

    return $row;
}
