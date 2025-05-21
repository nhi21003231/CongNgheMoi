<?php
$conn = mysqli_connect('localhost', 'root', '', 'nongsans_db');
mysqli_set_charset($conn, "utf8");

// Lấy tất cả tài khoản có mật khẩu chưa mã hóa (không bắt đầu bằng $2y$)
$sql = "SELECT id, mat_khau FROM khachhang WHERE mat_khau NOT LIKE '\$2y\$%'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $plain_password = $row['mat_khau'];
    $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

    // Cập nhật lại mật khẩu đã mã hóa
    $update_sql = "UPDATE khachhang SET mat_khau = '$hashed_password' WHERE id = $id";
    mysqli_query($conn, $update_sql);
}

echo "Đã cập nhật xong mật khẩu cho các tài khoản cũ.";
mysqli_close($conn);
?>  