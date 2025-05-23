<div style="padding: 10px;">
    <ul class="input-select2">
        <?php
        $sql = "SELECT id, ten_danhmuc FROM danhmuc, quyendahmuc WHERE `id_danhmuc`=`id` AND `id_quyen`=" . $_SESSION['quyen'];
        $list = executeResult($sql);
        foreach ($list as $item) {
            echo '<li class="item"><a href="admin.php?muc=' . $item['id'] . '&tmuc=' . $item['ten_danhmuc'] . '">' . $item['ten_danhmuc'] . '</a></li>';
        }
                if ($_SESSION['quyen'] == 1 || $_SESSION['quyen'] == 10) {
            echo '<li class="item"><a href="admin.php?tmuc=Phân công kiểm định">Phân công kiểm định</a></li>';
            echo '<li class="item"><a href="./admin.php?tmuc=Duyệt bài đăng">Duyệt bài đăng</a></li>';
            echo '<li class="item"><a href="./admin.php?tmuc=Thống kê doanh thu">Thống kê doanh thu</a></li>';
        }
        if ($_SESSION['quyen'] == 8) {
            echo '<li class="item"><a href="./admin.php?tmuc=Kiểm định nông sản">Danh sách Sản phẩm</a></li>';
            echo '<li class="item"><a href="./admin.php?tmuc=Tạo QR cho sản phẩm">Tạo QR cho sản phẩm</a></li>';
            echo '<li class="item"><a href="./admin.php?tmuc=Quy tắc kiểm định">Quy tắc kiểm định</a></li>';
            
        }
        if ($_SESSION['quyen'] == 1) {
            echo '<li class="item"><a href="./admin.php?tmuc=Phân công vận chuyển">Phân công vận chuyển</a></li>';

        }
        if ($_SESSION['quyen'] == 9) {
            echo '<li class="item"><a href="./admin.php?tmuc=Quản lý vận chuyển">Quản lý vận chuyển</a></li>';


        }
        ?>
    </ul>
</div>