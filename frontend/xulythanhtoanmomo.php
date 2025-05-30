<?php
// session_start(); // Khởi tạo session để xử lý giỏ hàng
// header('Content-type: text/html; charset=utf-8');

// function execPostRequest($url, $data)
// {
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Content-Length: ' . strlen($data))
//     );
//     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//     $result = curl_exec($ch);
//     curl_close($ch);
//     return $result;
// }

// // Thông tin thanh toán MoMo
// $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
// $partnerCode = 'MOMOBKUN20180529';
// $accessKey = 'klm05TvNBzhg7h7j';
// $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
// $orderInfo = "Thanh toán qua MoMo";

// // Kiểm tra số tiền từ POST và đảm bảo tính hợp lệ
// if (!isset($_POST['amount']) || !is_numeric($_POST['amount']) || floatval($_POST['amount']) <= 0) {
//     die("Số tiền không hợp lệ.");
// }
// $amount = floatval($_POST['amount']);

// // Cấu hình các thông số thanh toán
// $orderId = uniqid();
// $redirectUrl = "https://nongsansach.pro.vn/"; // Đường dẫn sau khi thanh toán thành công
// $ipnUrl = "https://nongsansach.pro.vn/"; // Đường dẫn nhận thông báo IPN (chế độ Live sẽ nhận thông báo IPN)
// $extraData = ""; // Thêm dữ liệu phụ (nếu cần)

// // Tạo requestId và signature
// $requestId = time() . "";
// $requestType = "payWithATM";

// $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . 
//     "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . 
//     "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . 
//     "&requestType=" . $requestType;

// $signature = hash_hmac("sha256", $rawHash, $secretKey);

// // Tạo dữ liệu yêu cầu để gửi cho MoMo
// $data = array(
//     'partnerCode' => $partnerCode,
//     'partnerName' => "Test",
//     'storeId' => "MomoTestStore",
//     'requestId' => $requestId,
//     'amount' => $amount,
//     'orderId' => $orderId,
//     'orderInfo' => $orderInfo,
//     'redirectUrl' => $redirectUrl,
//     'ipnUrl' => $ipnUrl,
//     'lang' => 'vi', // Ngôn ngữ hiển thị trang thanh toán
//     'extraData' => $extraData,
//     'requestType' => $requestType,
//     'signature' => $signature
// );

// // Gửi yêu cầu tới MoMo và nhận kết quả
// $result = execPostRequest($endpoint, json_encode($data));
// $jsonResult = json_decode($result, true);

// // Kiểm tra kết quả và chuyển hướng tới MoMo
// if (isset($jsonResult['payUrl'])) {
//     // Trước khi chuyển hướng người dùng đến trang thanh toán, xóa giỏ hàng trong session
//     unset($_SESSION['cart']); // Xóa giỏ hàng

//     // Chuyển hướng đến URL thanh toán của MoMo
//     header('Location: ' . $jsonResult['payUrl']);
//     exit; // Dừng thực thi mã sau khi chuyển hướng
// } else {
//     // Hiển thị lỗi nếu không tạo được yêu cầu thanh toán
//     echo "Lỗi khi tạo yêu cầu thanh toán: " . json_encode($jsonResult, JSON_UNESCAPED_UNICODE);
// }
// ?>

// <?php
// // Xử lý thông báo thanh toán thành công sau khi người dùng quay lại từ MoMo
// if (isset($_GET['status']) && $_GET['status'] == 'success') {
//     // Nếu thanh toán thành công, bạn có thể xử lý các bước như lưu thông tin đơn hàng vào cơ sở dữ liệu.
//     echo "Thanh toán thành công!";
//     // Có thể chuyển hướng người dùng đến trang khác nếu cần
//     header('Location: https://nongsansach.pro.vn/');
// } elseif (isset($_GET['status']) && $_GET['status'] == 'fail') {
//     // Nếu thanh toán thất bại, bạn có thể thông báo cho người dùng biết.
//     echo "Thanh toán không thành công, vui lòng thử lại!";
//     // Chuyển hướng người dùng về trang giỏ hàng hoặc trang thanh toán
//     header('Location: https://nongsansach.pro.vn/');
// }
session_start(); // Khởi tạo session để xử lý giỏ hàng
header('Content-type: text/html; charset=utf-8');

// function execPostRequest($url, $data)
// {
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Content-Length: ' . strlen($data))
//     );
//     curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//     $result = curl_exec($ch);
//     curl_close($ch);
//     return $result;
// }

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 20); // Tăng timeout lên 20 giây
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $result = curl_exec($ch);
    if ($result === false) {
        echo 'cURL error: ' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}
// Thông tin thanh toán MoMo
$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
$orderInfo = "Thanh toán qua MoMo";

// Kiểm tra số tiền từ POST và đảm bảo tính hợp lệ
if (!isset($_POST['amount']) || !is_numeric($_POST['amount']) || floatval($_POST['amount']) <= 0) {
    die("Số tiền không hợp lệ.");
}
$amount = floatval($_POST['amount']);

// Cấu hình các thông số thanh toán
$orderId = uniqid();
// $redirectUrl = "https://nongsansach.pro.vn/"; // Đường dẫn sau khi thanh toán thành công
// $ipnUrl = "https://nongsansach.pro.vn/"; // Đường dẫn nhận thông báo IPN (chế độ Live sẽ nhận thông báo IPN)
$redirectUrl = "http://localhost/Nhom10_CongNgheMoi/index.php"; // Đổi về trang index của bạn
$ipnUrl = "http://localhost/Nhom10_CongNgheMoi/index.php"; // Có thể để giống redirectUrl hoặc để trống nếu không dùng IPN
$extraData = ""; // Thêm dữ liệu phụ (nếu cần)

// Tạo requestId và signature
$requestId = time() . "";
$requestType = "payWithATM";

$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . 
    "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . 
    "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . 
    "&requestType=" . $requestType;

$signature = hash_hmac("sha256", $rawHash, $secretKey);

// Tạo dữ liệu yêu cầu để gửi cho MoMo
$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    'storeId' => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi', // Ngôn ngữ hiển thị trang thanh toán
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);

// Gửi yêu cầu tới MoMo và nhận kết quả
$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true);

// Kiểm tra kết quả và chuyển hướng tới MoMo
if (isset($jsonResult['payUrl'])) {
    // Trước khi chuyển hướng người dùng đến trang thanh toán, xóa giỏ hàng trong session
    unset($_SESSION['cart']); // Xóa giỏ hàng

    // Chuyển hướng đến URL thanh toán của MoMo
    header('Location: ' . $jsonResult['payUrl']);
    exit; // Dừng thực thi mã sau khi chuyển hướng
} else {
    // Hiển thị lỗi nếu không tạo được yêu cầu thanh toán
    echo "Lỗi khi tạo yêu cầu thanh toán: " . json_encode($jsonResult, JSON_UNESCAPED_UNICODE);
}
?>

<?php
// // Xử lý thông báo thanh toán thành công sau khi người dùng quay lại từ MoMo
// if (isset($_GET['status']) && $_GET['status'] == 'success') {
//     // Nếu thanh toán thành công, bạn có thể xử lý các bước như lưu thông tin đơn hàng vào cơ sở dữ liệu.
//     echo "Thanh toán thành công!";
//     // Có thể chuyển hướng người dùng đến trang khác nếu cần
//     header('Location: http://localhost/Nhom10_CongNgheMoi/index.php');
// } elseif (isset($_GET['status']) && $_GET['status'] == 'fail') {
//     // Nếu thanh toán thất bại, bạn có thể thông báo cho người dùng biết.
//     echo "Thanh toán không thành công, vui lòng thử lại!";
//     // Chuyển hướng người dùng về trang giỏ hàng hoặc trang thanh toán
//     header('Location: http://localhost/Nhom10_CongNgheMoi/index.php');
// }


?>
