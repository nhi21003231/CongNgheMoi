<?php
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra chữ ký (signature)
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Thay bằng Secret Key của bạn
$rawHash = "accessKey=" . $data['accessKey'] . "&amount=" . $data['amount'] . "&extraData=" . $data['extraData'] . "&ipnUrl=" . $data['ipnUrl'] . "&orderId=" . $data['orderId'] . "&orderInfo=" . $data['orderInfo'] . "&partnerCode=" . $data['partnerCode'] . "&requestId=" . $data['requestId'] . "&responseTime=" . $data['responseTime'] . "&resultCode=" . $data['resultCode'] . "&transId=" . $data['transId'];
$signature = hash_hmac("sha256", $rawHash, $secretKey);

if ($signature === $data['signature']) {
    if ($data['resultCode'] == '0') {
        // Thanh toán thành công
        // Lưu thông tin đơn hàng vào cơ sở dữ liệu
        echo "Thanh toán thành công!";
    } else {
        // Thanh toán thất bại
        echo "Thanh toán thất bại!";
    }
} else {
    echo "Chữ ký không hợp lệ!";
}
?>