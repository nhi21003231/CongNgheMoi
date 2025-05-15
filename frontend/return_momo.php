<?php
if (isset($_GET['resultCode']) && $_GET['resultCode'] == '0') {
    echo "Thanh toán thành công!";
    // Lưu thông tin đơn hàng vào cơ sở dữ liệu tại đây
} else {
    echo "Thanh toán thất bại! Mã lỗi: " . $_GET['resultCode'];
}
?>