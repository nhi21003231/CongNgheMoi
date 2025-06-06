<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supplier</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/supplier_style.css">

</head>

<body>


    <?php
    include_once('function.php');
    include_once('connect_db.php');
if (isset($_POST['saveAdd'])) {
    if (isset($_POST['diachivuon']) && isset($_POST['id'])) {
        if ($_POST['diachivuon'] != '') {
            // Kết nối cơ sở dữ liệu
            $conn = mysqli_connect("localhost", "root", "", "nongsans_db");

            // Thiết lập mã hóa UTF-8
            mysqli_set_charset($conn, "utf8");

            // Lấy giá trị hiện tại của diachivuon từ cơ sở dữ liệu
            $id = (int)$_POST['id'];
            $query = "SELECT `diachivuon` FROM `khachhang` WHERE `id` = $id";
            $currentDataResult = mysqli_query($conn, $query);

            if ($currentDataResult && mysqli_num_rows($currentDataResult) > 0) {
                $currentData = mysqli_fetch_assoc($currentDataResult)['diachivuon'];

                // Kiểm tra nếu giá trị mới khác với giá trị hiện tại
                if ($_POST['diachivuon'] !== $currentData) {
                    // Thực hiện truy vấn cập nhật
                    $newAddress = mysqli_real_escape_string($conn, $_POST['diachivuon']);
                    $updateQuery = "UPDATE `khachhang` SET `diachivuon` = '$newAddress' WHERE `id` = $id";
                    $result = mysqli_query($conn, $updateQuery);

                    if ($result) {
                        echo "<script>
                                window.location.href = 'supplier.php';
                              </script>";
                    } else {
                        echo "<script>
                                alert('Cập nhật địa chỉ thất bại!');
                                window.location.href = 'supplier.php';
                              </script>";
                    }
                } else {
                    echo "<script>
                                window.location.href = 'supplier.php';
                              </script>";
                }
            } else {
                echo "<script>
                        alert('Không tìm thấy thông tin khách hàng!');
                        window.location.href = 'supplier.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Vui lòng nhập địa chỉ!');
                    window.location.href = 'supplier.php';
                  </script>";
        }
    }
}


    if (isset($_POST['btnadd'])) {
        if (isset($_POST['name']) && $_POST['name'] != '') {
            if (isset($_POST['price']) && $_POST['price'] != '') {
                if (isset($_POST['idtl']) && $_POST['idtl'] != '') {
                    if (isset($_POST['quantity']) && $_POST['quantity'] != '') {
                        if (isset($_POST['content']) && $_POST['content'] != '') {
                            $conn = mysqli_connect("localhost", "root", "", "nongsans_db");
                            mysqli_set_charset($conn, "utf8");
                            $namei = $_POST['name'];
                            $price = $_POST['price'];
                            $idtl = $_POST['idtl'];
                            $sl = $_POST['quantity'];
                            $idnb = $_POST['idnb'];
                            $content = $_POST['content'];

                            $check_sql = "SELECT * FROM `sanpham` WHERE `ten_sp` = '$namei'";
                            $check_result = mysqli_query($conn, $check_sql);

                            if (mysqli_num_rows($check_result) > 0) {
                                // Tên đã tồn tại
                                header("location:./supplier.php?act=addsptc&dk=trung");
                            } else {
                                if ($_FILES['image']['name'] != NULL) {
                                    // Kiểm tra file up lên có phải là ảnh không
                                    if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
                                        // Nếu là ảnh tiến hành code upload
                                        $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                                        $path2 = "../img/";
                                        $tmp_name = $_FILES['image']['tmp_name'];
                                        $name = $_FILES['image']['name'];
                                        // Upload ảnh vào thư mục images
                                        move_uploaded_file($tmp_name, $path2 . $name);
                                        $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                        // Insert ảnh vào cơ sở dữ liệu
                                        $sql1 = "INSERT INTO `sanpham` (`ten_sp`, `hinh_anh`, `don_gia`, `noi_dung`,`so_luong`,`id_the_loai`,`trangthai`,`id_nhaban`) 
                                        VALUES ('$namei','$image_url', " . str_replace('.', '', $price) . ", '$content','$sl','$idtl',0,'$idnb');";
                                        $result1 = mysqli_query($conn, $sql1);

                                        if (isset($_FILES['gallery']) && $_FILES['gallery'] != '') {
                                            $uploadedFiles = $_FILES['gallery'];
                                            @$result = uploadFiles($uploadedFiles);
                                            if ($result) {
                                                $galleryImages = $result['uploaded_files'];
                                                if (!empty($galleryImages)) {
                                                    $product_id = $conn->insert_id;
                                                    $insertValues = "";
                                                    foreach ($galleryImages as $path) {
                                                        if (empty($insertValues)) {
                                                            $insertValues = "( " . $product_id . ", '" . $path . "')";
                                                        } else {
                                                            $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                                        }
                                                    }
                                                    $result = mysqli_query($conn, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                                }
                                            }
                                        }

                                        if ($result1) {
                                            header('location:supplier.php?act=addsptc&dk=yes');
                                        } else {
                                            header("location:./supplier.php?act=addsptc&dk=no");
                                        }
                                    }
                                }
                            }
                        } else {
                            header("location:./supplier.php?act=addsptc&dk=no");
                        }
                    } else {
                        header("location:./supplier.php?act=addsptc&dk=no");
                    }
                } else {
                    header("location:./supplier.php?act=addsptc&dk=no");
                }
            } else {
                header("location:./supplier.php?act=addsptc&dk=no");
            }
        } else {
            header("location:./supplier.php?act=addsptc&dk=no");
        }
    }

    if (isset($_POST['btnsua'])) {
        if (isset($_POST['name']) && $_POST['name'] != '') {
            if (isset($_POST['price']) && $_POST['price'] != '') {
                if (isset($_POST['quantity']) && $_POST['quantity'] != '') {
                    if (isset($_POST['idtl']) && $_POST['idtl'] != '') {
                        if (isset($_POST['content']) && $_POST['content'] != '') {
                            if (isset($_POST['trangthai']) && $_POST['trangthai'] == "on") {
                                $trangthai = 0;
                            } else {
                                $trangthai = 7;
                            }
    
                            include_once('function.php');
                            $con = mysqli_connect("localhost", "root", "", "nongsans_db");
                            mysqli_set_charset($con, "utf8");
                            $result4 = mysqli_query($con, "SELECT `id_the_loai` FROM `sanpham` WHERE `id`=" . $_GET['id'] . "");
                            $r2 = mysqli_fetch_array($result4);
    
                            if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                $uploadedFiles = $_FILES['gallery'];
                                $result = uploadFiles($uploadedFiles);
                                $galleryImages = $result['uploaded_files'];
                            }
    
                            if (!empty($_POST['gallery_image'])) {
                                $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                            }
    
                            if (!isset($image_url) && !empty($_POST['image'])) {
                                $image_url = $_POST['image'];
                            }
    
                            if ($_FILES['image']['name'] != NULL) {
                                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
                                    $path1 = "";
                                    $path = "../img/";
                                    $tmp_name = $_FILES['image']['tmp_name'];
                                    $name = $_FILES['image']['name'];
                                    move_uploaded_file($tmp_name, $path . $name);
                                    $image_url = $path1 . $name;
                                }
                            }
    
                            $check_sql = "SELECT * FROM `sanpham` WHERE `ten_sp` = '" . $_POST['name'] . "'";
                            $check_result = mysqli_query($con, $check_sql);
    
                            if (mysqli_num_rows($check_result) > 0) {
                                header("location:./supplier.php?act=suasptc&dk=trung");
                            } else {
                                $result1 = mysqli_query($con, "UPDATE `sanpham` SET `ten_sp` = '" . $_POST['name'] . "', `hinh_anh` =  '$image_url', `don_gia` = " . str_replace('.', '', $_POST['price']) . ", `noi_dung` = '" . $_POST['content'] . "', `ngay_sua` = " . time() . ", `id_the_loai` = " . $_POST['idtl'] . ", `so_luong` = " . $_POST['quantity'] . ", `trangthai` = " . $trangthai . " WHERE `sanpham`.`id` = " . $_GET['id']);
    
                                if (!empty($galleryImages)) {
                                    $product_id = ($_GET['act'] == 'sua' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                    $insertValues = "";
                                    foreach ($galleryImages as $path) {
                                        if (empty($insertValues)) {
                                            $insertValues = "( " . $product_id . ", '" . $path . "')";
                                        } else {
                                            $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                        }
                                    }
                                    $result = mysqli_query($con, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                    echo "cap nhat thanh cong";
                                }
    
                                if ($result1) {
                                    header("location:./supplier.php?act=suasptc&dk=yes");
                                } else {
                                    header("location:./supplier.php?act=suasptc&dk=no");
                                }
                            }
                        } else {
                            header("location:./supplier.php?act=suasptc&dk=no");
                        }
                    } else {
                        header("location:./supplier.php?act=suasptc&dk=no");
                    }
                } else {
                    header("location:./supplier.php?act=suasptc&dk=no");
                }
            } else {
                header("location:./supplier.php?act=suasptc&dk=no");
            }
        } else {
            header("location:./supplier.php?act=suasptc&dk=no");
        }
    }

    if (isset($_POST['btntladd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                $namei = $_POST['name'];
                $sql = "INSERT INTO `theloai`(`ten_tl`) VALUES ('$namei')";
                $result = mysqli_query($con, $sql);
                if ($result)
                    header("location:./supplier.php?act=addtltc&dk=yes");
                else
                    header("location:./supplier.php?act=addtltc&dk=no");
            } else
                header("location:./supplier.php?act=addtltc&dk=no");
    }
    if (isset($_POST['btntlsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                $con = mysqli_connect("localhost", "root", "", "nongsans_db");
                $result1 = mysqli_query($con, "UPDATE `theloai` SET `ten_tl` = '" . $_POST['name'] . "'WHERE `theloai`.`id` = " . $_GET['id'] . " ");
                if ($result1)
                    header("location:./supplier.php?act=suatltc&dk=yes");
                else
                    header("location:./supplier.php?act=suatltc&dk=no");
            } else
                header("location:./supplier.php?act=suatltc&dk=no");
    }
    if (isset($_POST['btnnccadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['email']))
                    if ($_POST['email'] != '') {
                        if (isset($_POST['website']))
                            if ($_POST['website'] != '') {
                                if (isset($_POST['sdt']))
                                    if ($_POST['sdt'] != '') {
                                        $sql = "INSERT INTO `nhacungcap`(`ten_ncc`, `email`, `web_site`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['website'] . "','" . $_POST['sdt'] . "')";
                                        $result = execute($sql);
                                        header("location:./supplier.php?act=nccaddtc&dk=yes");
                                    } else
                                        header("location:./supplier.php?act=nccaddtc&dk=no");
                            } else
                                header("location:./supplier.php?act=nccaddtc&dk=no");
                    } else
                        header("location:./supplier.php?act=nccaddtc&dk=no");
            } else
                header("location:./supplier.php?act=nccaddtc&dk=no");
    }
    // if (isset($_POST['btnnccdat'])) {
    //     if ($_POST['sldat'] != "") {
    //         if (is_int(intval($_POST['sldat']))) {
    //             $con = mysqli_connect("localhost", "root", "", "bannuocdb");
    //             $sanpham = mysqli_query($con, "SELECT `so_luong` FROM `sanpham` WHERE `id` = " . $_GET['id'] . "");
    //             $b = mysqli_fetch_array($sanpham);
    //             $a = $_POST['sldat'] + $b['so_luong'];
    //             $result1 = execute("UPDATE `sanpham` SET `so_luong` = '$a' WHERE `sanpham`.`id` = " . $_GET['id'] . " ");
    //         }
    
    //     }
    
    //     echo "xin chao";
    // }
    if (isset($_POST['btnkhtt'])) {
        if (isset($_POST['trangthai']) == "on")
            $trangthai = 0;
        if (isset($_POST['trangthai']) == NULL)
            $trangthai = 1;
        $sql = "UPDATE `khachhang` SET `trangthai` = '" . $trangthai . "' WHERE `khachhang`.`id` = " . $_GET['id'] . " ";
        $result = execute($sql);
        header("location:./supplier.php?act=khtttc&dk=yes");
    }
    if (isset($_POST['btnnvadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                // if (isset($_POST['tendangnhap'])) {
                //     if ($_POST['tendangnhap'] != '') {
                if (isset($_POST['sdt']))
                    if ($_POST['sdt'] != '') {
                        if (isset($_POST['email']))
                            if ($_POST['email'] != '') {
                                if ($_POST['tendangnhap'] != '')
                                    $tendangnhap = null;
                                $sql1 = "INSERT INTO `nhanvien`(`ten_nv`,`ten_dangnhap`,`email`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['tendangnhap'] . "','" . $_POST['email'] . "','" . $_POST['sdt'] . "')";
                                $result = mysqli_query($con, $sql1);
                                if ($result)
                                    header("location:./supplier.php?act=addnvtc&dk=yes");
                                else
                                    header("location:./supplier.php?act=addnvtc&dk=no");
                            } else
                                header("location:./supplier.php?act=addnvtc&dk=no");
                    } else
                        header("location:./supplier.php?act=addnvtc&dk=no");
                //     } else header("location:./supplier.php?act=addnvtc&dk=no");
                // } else header("location:./supplier.php?act=addnvtc&dk=no");
            } else
                header("location:./supplier.php?act=addnvtc&dk=no");
    }
    if (isset($_POST['btnnvsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['sdt']))
                    if ($_POST['sdt'] != '') {
                        // if (isset($_POST['tendangnhap']))
                        //     if ($_POST['tendangnhap'] != '') {
                        if (isset($_POST['email']))
                            if ($_POST['email'] != '') {
                                if ($_POST['tendangnhap'] != '')
                                    $tendangnhap = null;
                                $con = mysqli_connect("localhost", "root", "", "nongsans_db");
                                $result1 = mysqli_query($con, "UPDATE `nhanvien` SET `ten_nv` = '" . $_POST['name'] . "',`email` = '" . $_POST['email'] . "',`phone` = '" . $_POST['sdt'] . "',`ten_dangnhap` = '" . $_POST['tendangnhap'] . "' WHERE `nhanvien`.`id` = " . $_GET['id'] . " ");
                                if ($result1)
                                    header("location:./supplier.php?act=suanvtc&dk=yes");
                                else
                                    header("location:./supplier.php?act=suanvtc&dk=no");
                            } else
                                header("location:./supplier.php?act=suanvtc&dk=no");
                        // } else header("location:./supplier.php?act=suanvtc&dk=no");
                    } else
                        header("location:./supplier.php?act=suanvtc&dk=no");
            } else
                header("location:./supplier.php?act=suanvtc&dk=no");
    }
    if (isset($_POST['btntkmk'])) {
        if (isset($_POST['matkhaumoi']))
            if ($_POST['matkhaumoi'] != '') {
                $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `pass` = '" . $_POST['matkhaumoi'] . "' WHERE `username` = '" . $_GET['user'] . "'");
                var_dump($result1);
                if ($result1)
                    header("location:./supplier.php?act=tkmktc&dk=yes");
                else
                    header("location:./supplier.php?act=tkmktc&dk=no");
            } else
                header("location:./supplier.php?act=tkmktc&dk=no");
    }
    if (isset($_POST['btntkadd'])) {
        if (isset($_POST['tendangnhap']))
            if ($_POST['tendangnhap'] != '') {
                if (isset($_POST['matkhau']))
                    if ($_POST['matkhau'] != '') {
                        if (isset($_POST['name']))
                            if ($_POST['name'] != '') {
                                $sql2 = "INSERT INTO `taikhoang`(`id_quyen`,`username`,`pass`,`fullname`) VALUES (3,'" . $_POST['tendangnhap'] . "','" . $_POST['matkhau'] . "','" . $_POST['name'] . "')";
                                $result1 = mysqli_query($con, $sql2);
                                if ($result1)
                                    header("location:./supplier.php?act=addtktc&dk=yes");
                                else
                                    header("location:./supplier.php?act=addtktc&dk=no");
                            } else
                                header("location:./supplier.php?act=addtktc&dk=no");
                    } else
                        header("location:./supplier.php?act=addtktc&dk=no");
            } else
                header("location:./supplier.php?act=addtktc&dk=no");
    }
    if (isset($_POST['btntksua'])) {
        if (isset($_POST['quyen']))
            if ($_POST['quyen'] != '') {
                if (isset($_POST['trangthai']) == "on")
                    $trangthai = 0;
                if (isset($_POST['trangthai']) == NULL)
                    $trangthai = 1;
                var_dump(intval($_POST['quyen']));
                // if ($_POST['quyen'] == '1' || $_POST['quyen'] == '2' || $_POST['quyen'] == '3' || $_POST['quyen'] == '4') {
                $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `id_quyen` = '" . $_POST['quyen'] . "', `trang_thai` = ' " . $trangthai . "' WHERE `username` = '" . $_GET['id'] . "'");
                if ($result1)
                    header("location:./supplier.php?act=suatktc&dk=yes");
                else
                    header("location:./supplier.php?act=suatktc&dk=no");
                // } else header("location:./supplier.php?act=suatktc&dk=no");
            } else
                header("location:./supplier.php?act=suatktc&dk=no");
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xnhd') {
            if (isset($_GET['cuser']))
                if ($_GET['cuser'] != '') {
                    $conn = mysqli_connect("localhost", "root", "", "nongsans_db");
                    //$sql="SELECT `hoadon`.`id`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`, `trangthai`, `ten_dangnhap`, `ten_nv`,`nhanvien`.`id` AS `idnv` FROM (`hoadon` LEFT JOIN `nhanvien` ON `nhanvien`.`id`=`id_nhanvien` ) WHERE `hoadon`.`id` = " . $_GET['id'] . "";
                    $taikhoan = mysqli_query($conn, "SELECT `id`, `ten_dangnhap` FROM `khachhang` WHERE `id`='" . $_GET['iduser'] . "'");
                    // $hoadon=mysqli_query($conn,$sql);var_dump($hoadon);
                    $row = mysqli_fetch_array($taikhoan);
                    $result1 = mysqli_query($conn, "UPDATE `hoadon` SET `trang_thai` = '1' ,`id_nhanvien` = '" . $row['id'] . "',`id_nhaban` = '" . $row['id'] . "',`ngay_tao`=`ngay_tao` WHERE `id` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./supplier.php?act=xnhdtc&dk=yes");
                    else
                        header("location:./supplier.php?act=xnhdtc&dk=no");
                } else
                    header("location:./supplier.php?act=xnhdtc&dk=no");
        }
    }

    // if (isset($_POST['btndm1'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
    //     foreach($data['row1'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(1,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./supplier.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm2'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=2");
    //     foreach($data['row2'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(2,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./supplier.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm3'])) {
    //     $data=$_POST;
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=3");
    //     foreach($data['row3'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(3,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    //     header("location:./supplier.php?act=btndmtc&dk=yes");
    // }
    // if (isset($_POST['btndm4'])) {
    //     $data=$_POST;
    //     var_dump($data);
    //     $inserts="";
    //     $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=4");
    //     foreach($data['row4'] as $insertid){
    //         $inserts .= !empty($inserts) ? "," : "";
    //         $inserts .= "(4,".$insertid.")";
    //     }
    //     $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
    
    // }
    if (isset($_POST['btndmadd'])) {
        $data = $_POST;
        $inserts = "";
        if (isset($data['row'])) {
            $them = mysqli_query($con, "INSERT INTO `quyen`(`ten_quyen`) VALUES ('" . $_POST['tendanhmuc'] . "')");
            $id_quyen = mysqli_insert_id($con);
            foreach ($data['row'] as $insertid) {
                $inserts .= !empty($inserts) ? "," : "";
                $inserts .= "(" . $id_quyen . "," . $insertid . ")";
                var_dump($data['row']);
            }

            $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
            if ($inserted)
                header("location:./supplier.php?act=btndmaddtc&dk=yes");
            else
                header("location:./supplier.php?act=btndmaddtc&dk=no");
        } else
            header("location:./supplier.php?act=btndmaddtc&dk=no");

        // $deleted=mysqli_query($con,"DELETE FROM `quyendahmuc` WHERE `id_quyen`=1");
        // foreach($data['row1'] as $insertid){
        //     $inserts .= !empty($inserts) ? "," : "";
        //     $inserts .= "(1,".$insertid.")";
        // }
        // $inserted=mysqli_query($con,"INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES ".$inserts."");
        // header("location:./supplier.php?act=btndmtc&dk=yes");
    }
    if (isset($_POST['btndmsua'])) {
        $data = $_POST;
        $inserts = "";
        if (isset($_POST['tendanhmuc']))
            if ($_POST['tendanhmuc'] != '') {
                if (isset($data['row'])) {
                    $sua = mysqli_query($con, "UPDATE `quyen` SET `ten_quyen`='" . $_POST['tendanhmuc'] . "' WHERE `id`=" . $_GET['idq'] . "");
                    $deleted = mysqli_query($con, "DELETE FROM `quyendahmuc` WHERE `id_quyen`=" . $_GET['idq'] . "");
                    foreach ($data['row'] as $insertid) {
                        $inserts .= !empty($inserts) ? "," : "";
                        $inserts .= "(" . $_GET['idq'] . "," . $insertid . ")";
                        var_dump($inserts);
                    }

                    $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
                    var_dump($inserted);
                    if ($inserted)
                        header("location:./supplier.php?act=btndmsuatc&dk=yes");
                    else
                        header("location:./supplier.php?act=btndmsuatc&dk=no");
                } else
                    header("location:./supplier.php?act=btndmsuatc&dk=no");
            } else
                header("location:./supplier.php?act=btndmsuatc&dk=no");

    }

    if (isset($_POST['btndang'])) {
        // Kết nối cơ sở dữ liệu bằng MySQLi theo kiểu đối tượng
        $conn = new mysqli("localhost", "root", "", "nongsans_db");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy id sản phẩm từ form
        $id = $_POST['id'];

        // Câu lệnh SQL để cập nhật trạng thái sản phẩm
        $sql = "UPDATE sanpham SET trangthai = 6 WHERE id = ?";

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);

            // Kiểm tra xem câu lệnh có thực thi thành công không
            if ($stmt->execute()) {
                // Chuyển hướng sau khi thành công
                header("Location: ./supplier.php?act=dang&dk=yes");
                exit();
            } else {
                // Nếu có lỗi trong quá trình thực thi
                header("Location: ./supplier.php?act=dang&dk=no");
                exit();
            }
        }
    }

    if (isset($_POST['btngui'])) {
        // Kết nối cơ sở dữ liệu bằng MySQLi theo kiểu đối tượng
        $conn = new mysqli("localhost", "root", "", "nongsans_db");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Lấy id sản phẩm từ form
        $id = $_POST['id'];

        // Câu lệnh SQL để cập nhật trạng thái sản phẩm
        $sql = "UPDATE sanpham SET trangthai = 1 WHERE id = ?";

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("i", $id);

            // Kiểm tra xem câu lệnh có thực thi thành công không
            if ($stmt->execute()) {
                // Chuyển hướng sau khi thành công
                header("Location: ./supplier.php?act=gui&dk=yes");
                exit();
            } else {
                // Nếu có lỗi trong quá trình thực thi
                header("Location: ./supplier.php?act=gui&dk=no");
                exit();
            }
        }
    }
    ?>
</body>

</html>