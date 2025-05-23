<!-- <div style="padding: 10px;">
    <ul class="input-select2">
        <?php
        // $sql = "select id,ten_danhmuc from danhmuc,quyendahmuc where `id_danhmuc`=`id` AND `id_quyen`=" . $_SESSION['quyen'] . "";
        // $list = executeResult($sql);
        // foreach ($list as $item) {
        //     echo '<li class="item"><a href="supplier.php?muc=' . $item['id'] . '&tmuc=' . $item['ten_danhmuc'] . '">' . $item['ten_danhmuc'] . '</a></li>';
        // }
        ?>
    </ul>
</div> -->

<!-- <div style="padding: 10px;">
    <ul class="input-select2">
        <?php
        // $allowed = ['Hóa đơn', 'Thống kê', 'Sản phẩm']; // Danh mục muốn hiển thị
        // $sql = "SELECT id, ten_danhmuc FROM danhmuc, quyendahmuc 
        // WHERE id_danhmuc = id 
        // AND id_quyen = " . intval($_SESSION['quyen']);
        // $list = executeResult($sql);
        // foreach ($list as $item) {
        //     if (in_array($item['ten_danhmuc'], $allowed)) {
        //         echo '<li class="item"><a href="supplier.php?muc=' . $item['id'] . '&tmuc=' . $item['ten_danhmuc'] . '">' . $item['ten_danhmuc'] . '</a></li>';
        //     }
        // }
        ?>
    </ul>
</div> -->
<!-- cach cuoi -->
<!-- 
<div style="padding: 10px;">
    <ul class="input-select2">
        <?php
        // Chỉ hiện các danh mục có id là 1, 2, 3
        // $sql = "SELECT id, ten_danhmuc FROM danhmuc, quyendahmuc 
        //         WHERE id_danhmuc = id 
        //         AND id_quyen = " . intval($_SESSION['quyen']) . " 
        //         AND danhmuc.id IN (1,2,3)";
        // $list = executeResult($sql);
        // foreach ($list as $item) {
        //     echo '<li class="item"><a href="supplier.php?muc=' . $item['id'] . '&tmuc=' . $item['ten_danhmuc'] . '">' . $item['ten_danhmuc'] . '</a></li>';
        // }
        ?>
    </ul>
</div> -->


<div style="padding: 10px;">
    <ul class="input-select2">
        <?php
        $menus = [
            'Sản phẩm',
            'Quản lý doanh thu',
            'Thống kê doanh thu',
            'Thống kê sản phẩm',
            'Sản phẩm chưa kiểm định',
            'Sản phẩm đã kiểm định',
            'Sản phẩm không đạt',
            'Sản phẩm chưa duyệt',
            'Sản Phẩm đã duyệt',
            'Sản Phẩm chưa đạt',
            // 'Nhà cung cấp',
            'Hóa đơn'
        ];
        foreach ($menus as $menu) {
            echo '<li class="item"><a href="supplier.php?tmuc=' . urlencode($menu) . '">' . $menu . '</a></li>';
        }
        ?>
    </ul>
</div>