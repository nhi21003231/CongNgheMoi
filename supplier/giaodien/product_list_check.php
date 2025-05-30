<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>

<body>
    <?php
    include_once("./connect_db.php");

    if (isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap']) && $_SESSION['user_id']) {
        $user_id = $_SESSION['user_id'];
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 6;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        if (isset($_POST['search'])) {
            $sql = "SELECT * FROM `sanpham` WHERE id_nhaban = $user_id AND trangthai IN (0,1,2)";

            if (!empty($_POST['productId'])) {
                $sql .= " AND `id` = '" . $_POST['productId'] . "'";
            }
            if (!empty($_POST['productName'])) {
                $sql .= " AND `ten_sp` = '" . $_POST['productName'] . "'";
            }
            if (!empty($_POST['status']) && $_POST['status'] != '99') {
                $sql .= " AND `trangthai` = '" . $_POST['status'] . "'";
            }
            // echo '' . $sql . '';
            $totalRecordsResult = mysqli_query($con, $sql);
        } else {
            $totalRecordsQuery = "SELECT * FROM `sanpham` WHERE id_nhaban = $user_id AND trangthai IN (0,1,2)";
            $totalRecordsResult = mysqli_query($con, $totalRecordsQuery);
        }
        $totalRecords = $totalRecordsResult->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);

        if (isset($_POST['search'])) {
            $sql = "SELECT * FROM `sanpham` WHERE id_nhaban = $user_id AND trangthai IN (0,1,2)";

            if (!empty($_POST['productId'])) {
                $sql .= " AND `sanpham`.`id` = '" . $_POST['productId'] . "'";
            }
            if (!empty($_POST['productName'])) {
                $sql .= " AND `sanpham`.`ten_sp` LIKE '%" . $_POST['productName'] . "%'";
            }
            if (!empty($_POST['status']) && $_POST['status'] != '99') {
                $sql .= " AND `trangthai` = '" . $_POST['status'] . "'";
            }
            $products = mysqli_query($con, $sql);

        } else {
            $query = "SELECT * FROM `sanpham` WHERE id_nhaban = $user_id AND trangthai IN (0,1,2) LIMIT $item_per_page OFFSET $offset";
            $products = mysqli_query($con, $query);
        }

        mysqli_close($con);
        ?>
    <div class="main-content" style="color: green">
        <h1>Danh sách sản phẩm chưa kiểm định</h1>
        <form method="POST" action="./supplier.php?tmuc=SP%20chưa%20duyệt">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="orderId">Mã sản phẩm:</label>
                    <input type="text" class="form-control" id="productId" name="productId"
                        placeholder="Nhập Mã sản phẩm">
                </div>
                <div class="form-group col-md-3">
                    <label for="orderId">Tên sản phẩm:</label>
                    <input type="text" class="form-control" id="productName" name="productName"
                        placeholder="Nhập Tên sản phẩm">
                </div>
                <div class="form-group col-md-3">
                    <label for="status">Trạng thái:</label>
                    <select id="status" name="status" class="form-control">
                        <option value="99">Chọn trạng thái</option>
                        <option value="0">Chưa kiểm định</option>
                        <option value="1">Chờ phân công</option>
                        <option value="2">Đang kiểm định</option>

                    </select>
                </div>
            </div>
            <input name="search" type="submit" class="btn btn-primary" value="SEARCH">
        </form>
        <div class="product-items">
            <div class="table-responsive-sm ">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="text-align:center">ID</th>
                            <th style="text-align:center">Ảnh</th>
                            <th style="text-align:center">Tên sản phẩm</th>
                            <th style="text-align:center">Số lượng tồn</th>
                            <th style="text-align:center">Số lượng bán</th>
                            <th style="text-align:center">Trạng thái</th>
                            <th style="text-align:center">Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($products)) {
                                ?>
                        <tr>
                            <td style="text-align:center; padding-top: 50px"><?= $row['id'] ?></td>
                            <td><img style="width: 100px;height: 100px " src="../img/<?= $row['hinh_anh'] ?>" /></td>
                            <td style="text-align:center; padding-top: 50px"><?= $row['ten_sp'] ?></td>
                            <td style="text-align:center; padding-top: 50px"><?= $row['so_luong'] ?></td>
                            <td style="text-align:center; padding-top: 50px"><?= $row['sl_da_ban'] ?></td>
                            <td style="text-align:center; padding-top: 50px">
                                <?php
                                        if ($row['trangthai'] == '7')
                                            echo "Đã đăng";
                                        elseif ($row['trangthai'] == '6')
                                            echo "Chờ duyệt bài đăng";
                                        elseif ($row['trangthai'] == '5')
                                            echo "Sản phẩm chưa đạt chuẩn";
                                        elseif ($row['trangthai'] == '4')
                                            echo "Sản phẩm đạt chuẩn";
                                        elseif ($row['trangthai'] == '3')
                                            echo "Đang chờ tạo mã QR";
                                        elseif ($row['trangthai'] == '2')
                                            echo "Đang chờ kiểm định";
                                        elseif ($row['trangthai'] == '1')
                                            echo "Đang chờ phân công";
                                        elseif ($row['trangthai'] == '0')
                                            echo "Chưa kiểm định ";
                                        ?>
                            </td>
                            <?php if ($row['trangthai'] == '0') { ?>
                            <td style="text-align:center; padding-top: 50px">
                                <form method="POST" action="xulythem.php">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="btngui"
                                        onclick="return confirm('Bạn có muốn gửi yêu cầu kiểm định?')">Gửi</button>
                                </form>

                                <?php if ($row['trangthai'] == '0') { ?>
                                <a href="supplier.php?act=xoa&id=<?= $row['id'] ?>"
                                    onclick="return confirm('Bạn có muốn xóa sản phẩm?');"><button type="submit"
                                        name="btndang">Xóa</button></a>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            <div class="clear-both"></div>
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <?php include './pagination.php'; ?>
        <div class="clear-both"></div>
    </div>
    <?php
    }
    ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>