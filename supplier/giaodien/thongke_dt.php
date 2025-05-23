<?php
include_once("./connect_db.php");

if (isset($_SESSION['ten_dangnhap']) && !empty($_SESSION['ten_dangnhap']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;

    // Đếm số tháng có doanh thu trong bảng hoadon
    $totalRecordsQuery = mysqli_query($con, "
        SELECT COUNT(*) as total
        FROM (
            SELECT DATE_FORMAT(ngay_tao, '%Y-%m') AS month
            FROM hoadon
            WHERE id_khachhang = '$user_id'
            GROUP BY month
        ) AS subquery
    ");
    $totalRecordsRow = mysqli_fetch_assoc($totalRecordsQuery);
    $totalRecords = $totalRecordsRow['total'];

    // Tính tổng số trang
    $totalPages = ceil($totalRecords / $item_per_page);

    // Truy vấn dữ liệu doanh thu theo tháng
    $doanhThuQuery = "
        SELECT 
            DATE_FORMAT(ngay_tao, '%Y-%m') AS month,
            SUM(CASE WHEN trang_thai = 1 THEN tong_tien ELSE 0 END) AS total_doanhthu
        FROM 
            hoadon
        WHERE 
            id_khachhang = '$user_id'
        GROUP BY 
            month
        ORDER BY 
            month DESC
        LIMIT $item_per_page OFFSET $offset
    ";
    $doanhThuResult = mysqli_query($con, $doanhThuQuery);

    mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thống Kê Doanh Thu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        h1 { text-align: center; color: #fff; background-color: #1E90FF; padding: 20px 0; margin: 0; }
        table { width: 80%; margin: 20px auto; border-collapse: collapse; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #2980b9; color: #fff; }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #ddd; }
        a { color: #007bff; text-decoration: none; margin: 0 5px; }
        a:hover { text-decoration: underline; }
        .chart-container { width: 80%; margin: 20px auto; display: flex; justify-content: center; }
    </style>
</head>
<body>
<div class="main-content">
    <h1>Thống Kê Doanh Thu</h1>
    <div class="chart-container">
        <canvas id="doanhThuChart" width="300" height="300"></canvas>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th>Tháng</th>
                <th>Tổng Doanh Thu</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($doanhThuResult) > 0) {
                // Lưu dữ liệu cho biểu đồ
                $chartLabels = [];
                $chartData = [];
                mysqli_data_seek($doanhThuResult, 0);
                while ($row = mysqli_fetch_assoc($doanhThuResult)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['month']) . "</td>";
                    echo "<td>" . htmlspecialchars(number_format($row['total_doanhthu'], 0, ',', '.')) . " VNĐ</td>";
                    echo "</tr>";
                    $chartLabels[] = $row['month'];
                    $chartData[] = (int)$row['total_doanhthu'];
                }
            } else {
                echo "<tr><td colspan='2'>Không có dữ liệu</td></tr>";
                $chartLabels = [];
                $chartData = [];
            }
            ?>
        </tbody>
    </table>
</div>
<script>
    const labels = <?php echo json_encode($chartLabels); ?>;
    const data = <?php echo json_encode($chartData); ?>;

    const ctx = document.getElementById('doanhThuChart').getContext('2d');
    const doanhThuChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh Thu Theo Tháng',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Doanh Thu Theo Tháng' }
            }
        },
    });
</script>
<?php
    include './pagination.php';
?>
</body>
</html>
<?php
} else {
    echo "Bạn cần đăng nhập để truy cập trang này.";
}
?>