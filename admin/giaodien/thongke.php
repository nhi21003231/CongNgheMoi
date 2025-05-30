<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- Connect Database -->
<!-- Kết nối Database -->
<!-- -------------------------------------------------------------------------------------------------- -->

<?php
function DocDB($host, $user, $password, $db)
{
    $con = mysqli_connect($host, $user, $password, $db);

    $strSQL = "SELECT * FROM hoadon";
    $result = mysqli_query($con, $strSQL);
    mysqli_close($con);
    return $result;
}
function executeQuery($host, $user, $password, $db, $strSQL)
{
    $con = mysqli_connect($host, $user, $password, $db);
    $result = mysqli_query($con, $strSQL);
    mysqli_close($con);
    return $result;
}
?>
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- SQL -->
<!-- Truy vấn CSDL -->
<!-- -------------------------------------------------------------------------------------------------- -->

<?php
// Tổng tiền hóa đơn theo khách hàng từ ngày 2021-05-01 đến 2021-05-31
$strSQL = "SELECT id,ngay_tao, sum(tong_tien) FROM hoadon WHERE ngay_tao BETWEEN '2021-05-01' AND '2026-05-31' GROUP by id";
$tong = executeQuery("localhost", "root", "", "nongsans_db", $strSQL);
foreach ($tong as $item) {
    $array[] = $item;
}
for ($i = 0; $i < count($array); $i++) {
    $labelarray[] = $array[$i]["id"];
    $dataarray[] = $array[$i]["sum(tong_tien)"];
}

////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////
// Thống kê tình hình kinh doanh trong một khoảng thời gian của các sản phẩm thuộc một loại / tất cả sản phẩm.
$strSQL = "SELECT sanpham.id, SUM(cthoadon.so_luong*sanpham.don_gia) as tongtien FROM hoadon,cthoadon,sanpham WHERE hoadon.ngay_tao BETWEEN '2021-05-01' AND '2026-05-31' AND hoadon.id=cthoadon.id_hoadon and cthoadon.id_sanpham=sanpham.id GROUP by sanpham.id";
$tinhhinhkinhdoanh = executeQuery("localhost", "root", "", "nongsans_db", $strSQL);
foreach ($tinhhinhkinhdoanh as $item3) {
    $array3[] = $item3;
}
for ($t = 0; $t < count($array3); $t++) {
    $labelarray3[] = $array3[$t]["id"];
    $dataarray3[] = $array3[$t]["tongtien"];
}
//////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
// Thống kế sản phẩm bán chạy theo khoảng thời gian
// $strSQL= "SELECT id_sanpham, maxtong.max, maxtong.month 
// FROM 
//     (select MAX(xcv.tong) as max, xcv.month
//     FROM(
//         SELECT SUM(sdf.tong) as tong ,month(sdf.ngay_tao) as month
//         FROM ( 
//             SELECT cthoadon.id_hoadon,cthoadon.id_sanpham, cthoadon.so_luong, (cthoadon.so_luong*sanpham.don_gia) as tong, hoadon.ngay_tao FROM hoadon, cthoadon, sanpham WHERE hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id AND YEAR(hoadon.ngay_tao)=2021 GROUP by month(hoadon.ngay_tao),hoadon.id
//              ) as sdf
//         GROUP by month(sdf.ngay_tao),sdf.id_sanpham
//         ) as xcv
//     GROUP by xcv.month ) as maxtong
// ,
//     (SELECT sdf.id_sanpham,SUM(sdf.tong) as tong ,month(sdf.ngay_tao) as month
//     FROM ( 
//             SELECT cthoadon.id_hoadon,cthoadon.id_sanpham, cthoadon.so_luong, (cthoadon.so_luong*sanpham.don_gia) as tong, hoadon.ngay_tao FROM hoadon, cthoadon, sanpham WHERE hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id AND YEAR(hoadon.ngay_tao)=2021 GROUP by month(hoadon.ngay_tao),hoadon.id
//          ) as sdf
//     GROUP by month(sdf.ngay_tao),sdf.id_sanpham) as tong
// WHERE maxtong.max = tong.tong and maxtong.month= tong.month";
$strSQL = "SELECT id_sanpham, maxtong.max, maxtong.month 
FROM 
    (SELECT MAX(xcv.tong) as max, xcv.month
        FROM(
            SELECT SUM(sdf.tong) as tong ,MONTH(sdf.ngay_tao) as month
            FROM ( 
                SELECT cthoadon.id_hoadon, cthoadon.id_sanpham, cthoadon.so_luong, (cthoadon.so_luong*sanpham.don_gia) as tong, hoadon.ngay_tao 
                FROM hoadon, cthoadon, sanpham 
                WHERE hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id AND YEAR(hoadon.ngay_tao)=2025 
                GROUP BY MONTH(hoadon.ngay_tao), hoadon.id
            ) as sdf
            GROUP BY MONTH(sdf.ngay_tao), sdf.id_sanpham
        ) as xcv
        GROUP BY xcv.month
    ) as maxtong,
    (SELECT sdf.id_sanpham, SUM(sdf.tong) as tong, MONTH(sdf.ngay_tao) as month
        FROM ( 
            SELECT cthoadon.id_hoadon, cthoadon.id_sanpham, cthoadon.so_luong, (cthoadon.so_luong*sanpham.don_gia) as tong, hoadon.ngay_tao 
            FROM hoadon, cthoadon, sanpham 
            WHERE hoadon.id=cthoadon.id_hoadon AND cthoadon.id_sanpham=sanpham.id AND YEAR(hoadon.ngay_tao)=2025 
            GROUP BY MONTH(hoadon.ngay_tao), hoadon.id
        ) as sdf
        GROUP BY MONTH(sdf.ngay_tao), sdf.id_sanpham
    ) as tong
WHERE maxtong.max = tong.tong and maxtong.month= tong.month";
$sanphambanchay = executeQuery("localhost", "root", "", "nongsans_db", $strSQL);

foreach ($sanphambanchay as $item4) {
    $array4[] = $item4;
}
for ($t = 0; $t < count($array4); $t++) {
    $id_sanpham[] = $array4[$t]["id_sanpham"];
    $max[] = $array4[$t]["max"];
    $month[] = $array4[$t]["month"];
}
?>
<!-- ----------------------------------------------------------------------- -->
<!-- Parse Javascript -->
<!-- -------------------------------------------------------------------------------------------------- -->
<script>
    var dataarray = <?php echo json_encode($dataarray); ?>;
    var labelarray = <?php echo json_encode($labelarray); ?>;
    var dataarray3 = <?php echo json_encode($dataarray3); ?>;
    var labelarray3 = <?php echo json_encode($labelarray3); ?>;
    var id_sanpham = <?php echo json_encode($id_sanpham); ?>;
    var max = <?php echo json_encode($max); ?>;
    var month = <?php echo json_encode($month); ?>;
</script>
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->

<!-- -------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!-- Thống kê  -->
<!-- -------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="c3charts/c3.css">
    <link rel="stylesheet" href="js/morris-bundle/morris.css">
</head>

<body style="width: 100%; height: 100%">

    <div class="row">
        <!-- ============================================================== -->
        <!-- bar chart  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Tổng tiền hóa đơn theo khách hàng từ ngày 2021-05-01 đến 2026-05-31</h5>
                <div class="card-body">
                    <canvas id="chartjs_bar"></canvas>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end bar chart  -->
        <!-- ============================================================== -->


    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- bar chart  -->
        <!-- ============================================================== -->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Thống kê tình hình doanh thu từ ngày 2021-05-01 đến 2026-05-31</h5>
                <div class="card-body">
                    <canvas id="chartjs_bar3"></canvas>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end bar chart  -->
        <!-- ============================================================== -->

    </div>

    <div class="row">
        <!-- ============================================================== -->
        <!--stacked chart  -->
        <!-- ============================================================== -->
        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Thống kê sản phẩm bán chạy nhất theo tháng trong năm 2025 </h5>
                <div class="card-body"> -->
                    <!-- <div id="morris_stacked"></div> -->
                    <!-- <div id="bar-chart"></div>
                </div>
            </div>
        </div> -->
        <!-- ============================================================== -->
        <!--end stacked chart  -->
        <!-- ============================================================== -->
    </div>

    </div>
</body>
<!-- <script src=".js/style.js"></script>
<script src=".js/jquery/jquery-3.3.1.min.js"></script>
<script src=".js/charts-bundle/Chart.bundle.js"></script>
<script src=".js/charts-bundle/chartjs.js"></script> -->
<script src="./js/style.js"></script>
<script src="./js/jquery/jquery-3.3.1.min.js"></script>
<script src="./js/charts-bundle/Chart.bundle.js"></script>
<script src="./js/charts-bundle/chartjs.js"></script>

<script src=".js/morris-bundle/raphael.min.js"></script>
<script src=".js/morris-bundle/morris.js"></script>
<script src=".js/morris-bundle/Morrisjs.js"></script>

</html>
