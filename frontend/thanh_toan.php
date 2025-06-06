<?php
session_start();
include('../db/dbhelper.php');
if (isset($_SESSION['ten_dangnhap'])) {
    $ten_dangnhap = $_SESSION['ten_dangnhap'];
    $sql = 'select * from khachhang where ten_dangnhap="' . $ten_dangnhap . '"';

    $tong_tien = 0;
    $infoCus = executeSingleResult($sql);
    if (isset($_SESSION['cart']))
        $cart = $_SESSION['cart'];
    $totalPrice = 0;
    $totalPriceArr = []; // Tạo một mảng trống để lưu tổng giá

    foreach ($cart as $value) {
        $totalPrice = $value['qty'] * $value['price'];
        $totalPriceArr[] = ['name' => $value['name'], 'price' => $totalPrice]; // Lưu tổng giá cho mỗi mặt hàng trong mảng
    }
    $totalPriceAll = 0;
    foreach ($cart as $item) {
        $totalPriceAll += $item['qty'] * $item['price'];
    }
    if (isset($_POST['saveTT'])) {
        $diachi = isset($_POST['customerAddress']) ? $_POST['customerAddress'] : $infoCus['dia_chi'];
        $ten = isset($_POST['customerName']) ? $_POST['customerName'] : $infoCus['ten_kh'];
        $sdt = isset($_POST['customerPhone']) ? $_POST['customerPhone'] : $infoCus['phone'];
    } else {
        $diachi = $infoCus['dia_chi'];
        $ten = $infoCus['ten_kh'];
        $sdt = $infoCus['phone'];
    }

    // Tạo ID đơn hàng
    $ngay_tao_HD = date('Y/m/d H:i:s');
    $result = executeSingleResult('SELECT id FROM hoadon ORDER BY ngay_tao DESC LIMIT 0, 1');
    if ($result !== null) {
        $id_hoadon = $result['id'] + 1;
    } else {
        $id_hoadon = 1;
    }
    $sql = 'insert into hoadon (id_khachhang, tong_tien, ngay_tao, deliveryStatus, diachinhanhang, ten_nguoinhan, sdt_nguoinhan) value ("' . $infoCus['id'] . '", "' . $totalPriceAll . '", "' . $ngay_tao_HD . '", 0,"' . $diachi . '","' . $ten . '","' . $sdt . '")';
    execute($sql);
    date_default_timezone_set("Asia/Ho_Chi_Minh");

    foreach ($cart as $key => $value) {

        // Lấy số lượng và số lượng đã bán của sản phẩm
        $sl = executeSingleResult('SELECT so_luong FROM sanpham WHERE id=' . $key)['so_luong'];
        $sldabancu = executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id=' . $key)['sl_da_ban'];

        // Lấy id_nhaban từ bảng sanpham
        $id_nhaban = executeSingleResult('SELECT id_nhaban FROM sanpham WHERE id=' . $key)['id_nhaban'];

        // Cập nhật số lượng sản phẩm và số lượng đã bán
        execute('UPDATE sanpham SET so_luong="' . ($sl - $value['qty']) . '", sl_da_ban="' . ($value['qty'] + $sldabancu) . '" WHERE id=' . $key);

        // Thêm thông tin vào bảng cthoadon bao gồm id_nhaban
        execute('INSERT INTO cthoadon (id_hoadon, id_sanpham, so_luong, id_nhaban) VALUE ("' . $id_hoadon . '", "' . $key . '", "' . $value['qty'] . '", "' . $id_nhaban . '")');
    }

    // Cập nhật số lượng sản phẩm
    foreach ($cart as $key => $value) {
        $sl = executeSingleResult('SELECT so_luong FROM sanpham WHERE id = ' . $key)['so_luong'];
        $sldabancu = executeSingleResult('SELECT sl_da_ban FROM sanpham WHERE id = ' . $key)['sl_da_ban'];
        execute('UPDATE sanpham SET so_luong="' . ($sl - $value['qty']) . '", sl_da_ban="' . ($value['qty'] + $sldabancu) . '" WHERE id = ' . $key);
    }

    $tong_tien_muahang = executeSingleResult('select tong_tien_muahang as s from khachhang where id=' . $infoCus['id'])['s']; //TỔng tiền hiện tại khách hàng đã mua
    execute('UPDATE khachhang SET tong_tien_muahang="' . ($tong_tien_muahang + $tong_tien) . '" WHERE id=' . $infoCus['id']); //Cập nhật lại tổng tiền mau hàng
    //Cập nhật lại sô lượng sản phẩm theo thể loại
    $listCate = executeResult('SELECT * FROM theloai WHERE 1');
    foreach ($listCate as $item) {
        $tongSPtheoTheLoai = executeSingleResult('SELECT SUM(so_luong) AS sl FROM sanpham WHERE id_the_loai=' . $item['id'])['sl'];
        execute('UPDATE theloai SET tong_sp="' . $tongSPtheoTheLoai . '" WHERE id=' . $item['id']);
    }
    // Lấy giỏ hàng từ phiên
    // $cart = $_SESSION['cart'];

    // Tạo một phiên mới
    // session_regenerate_id();

    // Lưu giỏ hàng vào phiên mới
    $_SESSION['cart'] = $cart;
    // Xóa giỏ hàng sau khi thanh toán
    //unset($_SESSION['cart']);
}

?>
<style>
/* Style the header */
.header {
    background-color: #f8f8f8;
    padding: 20px;
}

.title {
    text-align: center;
}

h1 {
    font-size: 24px;
    font-weight: bold;
}

/* Style the table */
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 8px;
    border: 1px solid #ddd;
}

thead th {
    background-color: #f2f2f2;
    text-align: left;
}

/* Style the form */
form {
    margin-top: 20px;
}

.form-group {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.form-group>div {
    margin: 0 10px;
}

#ttmomo,
#tt {
    background-color: darkgreen;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 400px;
}

#ttmomo:hover,
#tt:hover {
    background-color: forestgreen;

}
#confirmationModal {
    animation: fadeIn 0.5s ease-in-out;
}

#overlay {
    animation: fadeIn 0.5s ease-in-out;
}
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title = "Thstyleoán" ?></title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="../css/slick.css" />
    <link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="../css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="../js/jquery1.min.js"></script>
    <!-- Popper JS  -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
</head>
<?php
$sql = "SELECT * FROM `phuongthucvanchuyen`";
$result = executeResult($sql);
// $sqltt = "SELECT * FROM `phuongthucthanhtoan`";
// $resulttt = executeResult($sqltt);

?>

<body>
    <div class="header">
        <div class="title">
            <h1>Thanh Toán</h1>
        </div>
    </div>
    <h2 style="margin-left: 10px;">Thông tin đơn hàng</h2>

    <div style="display: flex; width: 95%; justify-content: space-between; margin: 0 auto;">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $item) { ?>
                <tr>
                    <td>
                        <?php echo $item['name'] ?>
                    </td>
                    <td>
                        <?php echo $item['qty'] ?>
                    </td>
                    <td>
                        <?php echo number_format($item['price'], 0, ',', '.') ?>
                    </td>
                    <?php $totalPrice = 0;
                        $totalPrice = $item['qty'] * $item['price'];
                        $tong_tien += $totalPrice;
                        foreach ($totalPriceArr as $totalPriceItem) {
                            if ($totalPriceItem['name'] == $item['name']) {
                                $totalPrice = $totalPriceItem['price'];
                                break;
                            }
                        }
                        echo '<td>' . number_format($totalPrice, 0, ',', '.') . '</td>'; ?>

                </tr>
                <?php
                } ?>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Tổng tiền:</strong></td>
                    <td><?php echo number_format($totalPriceAll, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2>Phương thức thanh toán</h2>
    <?php
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item['qty'] * $item['price'];
    }
    ?>
        <div id="confirmationModal"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #ffffff; padding: 20px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3); border-radius: 10px; z-index: 1000; width: 500px; max-height: 80%; overflow-y: auto;">
        <h2 style="text-align: center; margin-bottom: 20px; font-size: 20px; color: #333;">Xác nhận đơn hàng</h2>
        <div style="margin-bottom: 20px;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                <thead>
                    <tr style="background-color: #f5f5f5; text-align: left;">
                        <th style="padding: 10px; border: 1px solid #ddd;">Sản phẩm</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Số lượng</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Đơn giá</th>
                        <th style="padding: 10px; border: 1px solid #ddd;">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item) { ?>
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">
                            <?php echo $item['name'] ?>
                        </td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                            <?php echo $item['qty'] ?>
                        </td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">
                            <?php echo number_format($item['price'], 0, ',', '.') ?>
                        </td>
                        <?php
                            $totalPrice = $item['qty'] * $item['price'];
                            $tong_tien += $totalPrice;
                            ?>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: right;">
                            <?php echo number_format($totalPrice, 0, ',', '.') ?>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3"
                            style="padding: 10px; border: 1px solid #ddd; text-align: right; font-weight: bold;">Tổng
                            cộng:</td>
                        <td
                            style="padding: 10px; border: 1px solid #ddd; text-align: right; font-weight: bold; color: #e74c3c;">
                            <?php echo number_format($totalPriceAll, 0, ',', '.') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
            <form action="create_order.php" method="post" class="form-group">
                <button type="submit"
                    style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                    Xác nhận
                </button>
            </form>
            <button id="cancelOrder"
                style="margin-top: 20px;height: 40px;background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Hủy
            </button>
        </div>
    </div>

    <div id="overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;">
    </div>
    <table>
        <tr>
            <td>
                <form name="payUrl" method="POST" action="xulythanhtoanmomo.php" class="form-group">
                    <div><input type="hidden" name="amount" value="<?= $totalPriceAll ?>">
                        <button id="ttmomo" type="submit">Thanh toán MOMO</button>
                    </div>
                </form>
                <div style="margin-left: 10px;">
                    <button id="showConfirmation" type="button"
                        style="background-color: darkgreen; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; width: 400px;">Thanh
                        toán khi nhận hàng</button>
                </div>
            </td>
            <td>
            </td>
        </tr>
    </table>

</body>

<script>
// Lấy các phần tử HTML
const confirmationModal = document.getElementById('confirmationModal');
const overlay = document.getElementById('overlay');
const showConfirmation = document.getElementById('showConfirmation');
const cancelOrder = document.getElementById('cancelOrder');

// Hiển thị modal khi nhấn nút Thanh toán khi nhận hàng
showConfirmation.addEventListener('click', () => {
    confirmationModal.style.display = 'block';
    overlay.style.display = 'block';
});

// Ẩn modal khi nhấn nút Hủy
cancelOrder.addEventListener('click', () => {
    confirmationModal.style.display = 'none';
    overlay.style.display = 'none';
});

// Ẩn modal khi nhấn vào overlay
overlay.addEventListener('click', () => {
    confirmationModal.style.display = 'none';
    overlay.style.display = 'none';
});
</script>