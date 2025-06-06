<!-- BREADCRUMB -->

<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<img src="./img/banner/banner11.png" alt="Your Banner" style="width: 100%; height: 500px; display: inline-block; border-top-left-radius: 100px 100px; border-bottom-right-radius: 100px 100px; " class="img-fluid">
				<!-- Thêm thuộc tính "display: inline-block;" -->

			</div>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">
				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title"></h3>
					<img src="./img/quangcao.jpg" alt="Your Banner" style="width: 100%; height: 550px; display: inline-block; border-top-left-radius: 100px 100px; border-bottom-right-radius: 100px 100px; " class="img-fluid">

				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->

				<!-- /aside Widget -->

				<!-- aside Widget -->

				<!-- /aside Widget -->


			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sắp Xếp:
							<select class="input-select" id="sap_xep">
								<option value="-1">--Chọn--</option>
								<option value="0">Bán Chạy</option>
								<option value="1">Giá cao</option>
								<option value="2">Giá thấp</option>
							</select>
						</label>
					</div>
					<!--
								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>     -->
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row" id="phan_trang">
					<!-- product -->

					<!-- /product -->

				</div>

				<!-- /store products -->

				<!-- store bottom filter -->

				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
			<!-- STORE SECTION - HIỂN THỊ DANH SÁCH SẢN PHẨM -->
			<div class="col-md-12"><h1 class="aside-title">Danh sách sản phẩm</h1></div>
			 <div class="mt-4"></div>
			<div class="row" id="phan_trang">
				<?php
				if ($act == 'category' && $id > 0) {
					$sql = "SELECT * FROM sanpham WHERE id_the_loai = $id ORDER BY id DESC LIMIT 0, 8";
					$dssp = executeResult($sql);

					if (!empty($dssp)) {
						foreach ($dssp as $sp) {
							echo '<div class="col-md-3 col-sm-6">'
								. '<div class="product">'
								. '<div class="product-img">'
								. '<img src="./img/' . $sp['hinh_anh'] . '" style="height:200px; object-fit:cover" alt="">'
								. '</div>'
								. '<div class="product-body">'
								// . '<p class="product-category">Thể loại</p>'
								. '<h3 class="product-name"><a href="?act=product&id=' . $sp['id'] . '">' . $sp['ten_sp'] . '</a></h3>'
								. '<h4 class="product-price">' . currency_format($sp['don_gia']) . '</h4>'
								. '</div>'
								. '<div class="add-to-cart">'
								// . '<button class="add-to-cart-btn" onclick="addCart(' . $sp['id'] . ', 1)">Thêm vào giỏ</button>'

. '<button class="add-to-cart-btn" onclick="addCart(' . $sp['id'] . ', 1); themThanhCong(' . $sp['id'] . ');">Thêm vào giỏ</button>'
								. '</div>'
								. '</div>'
								. '</div>';
						}
					} else {
						echo '<div class="col-12"><p>Không có sản phẩm nào thuộc thể loại này.</p></div>';
					}
				}
				?>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<script>
function themThanhCong(id) {
    alert('Thêm vào giỏ thành công!');
}
</script>

<!-- /SECTION -->
<script type="text/javascript">
	$(document).ready(function() {
		load_data();

		function load_data(page) {
			var selected = $('#sap_xep').val();
			var price_min = $('#price-min').val();
			var price_max = $('#price-max').val();
			var checkedBrand = [];
			$('.checkBrand').each(function() {
				if ($(this).is(':checked')) {
					checkedBrand.push('or ten_sp like "%' + $(this).val() + '%"');
				}
			});
			checkedBrand = checkedBrand.toString();
			var checkedDv = [];
			$('.checkDv').each(function() {
				if ($(this).is(':checked')) {
					checkedDv.push('or ten_sp like "%' + $(this).val() + '%"');
				}
			});
			checkedDv = checkedDv.toString();
			$.ajax({
				url: "frontend/ajax.php",
				method: "POST",

				data: {
					page: page,
					'act': '<?= $act ?>',
					'id': '<?= $id ?>',
					'search': '<?= $search ?>',
					'selected_sort': selected,
					'price_min': price_min,
					'price_max': price_max,
					'checkedBrand': checkedBrand,
					'checkedDv': checkedDv
				},
				success: function(data) {
					$('#phan_trang').html(data);
				}
			})
		}
		$(document).on('click', '.phan_trang_lk', function() {
			var page = $(this).attr("id");
			load_data(page);
		});
		$('#sap_xep').change(function() {
			load_data(1);
		});
		$('#btn_gia').click(function() {
			load_data(1);
		});
		$('#chkBrand').change(function() {
			load_data(1);
		});
		$('#chkDv').change(function() {
			load_data(1);
		});
	});
</script>