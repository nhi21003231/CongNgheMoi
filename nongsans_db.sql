-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2025 lúc 05:27 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nongsans_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_sanpham` int(10) UNSIGNED NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL,
  `id_nhaban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`id`, `id_sanpham`, `id_hoadon`, `so_luong`, `id_nhaban`) VALUES
(5, 6, 7, 2, NULL),
(6, 7, 7, 4, NULL),
(7, 8, 7, 3, NULL),
(8, 5, 7, 2, NULL),
(9, 4, 8, 1, NULL),
(10, 2, 8, 1, NULL),
(11, 1, 8, 4, NULL),
(12, 8, 9, 7, NULL),
(13, 4, 10, 1, NULL),
(14, 9, 10, 1, NULL),
(15, 8, 10, 1, NULL),
(16, 1, 10, 1, NULL),
(17, 3, 10, 4, NULL),
(18, 11, 10, 4, NULL),
(19, 10, 10, 1, NULL),
(20, 1, 11, 2, NULL),
(21, 3, 11, 2, NULL),
(22, 6, 11, 8, NULL),
(23, 4, 11, 3, NULL),
(24, 5, 11, 2, NULL),
(25, 3, 12, 5, NULL),
(28, 8, 15, 1, NULL),
(29, 7, 15, 4, NULL),
(30, 9, 15, 1, NULL),
(31, 5, 16, 1, NULL),
(32, 4, 16, 1, NULL),
(33, 6, 16, 1, NULL),
(34, 5, 17, 1, NULL),
(35, 4, 17, 1, NULL),
(36, 6, 17, 1, NULL),
(37, 5, 18, 1, NULL),
(38, 4, 18, 1, NULL),
(39, 6, 18, 1, NULL),
(40, 5, 19, 1, NULL),
(41, 4, 19, 1, NULL),
(42, 6, 19, 1, NULL),
(43, 10, 24, 1, NULL),
(44, 11, 24, 1, NULL),
(45, 3, 24, 1, NULL),
(46, 12, 24, 1, NULL),
(47, 5, 25, 1, NULL),
(48, 6, 26, 1, NULL),
(49, 5, 26, 4, NULL),
(51, 3, 28, 5, NULL),
(52, 6, 29, 1, NULL),
(53, 6, 30, 1, NULL),
(54, 11, 31, 1, NULL),
(55, 12, 32, 1, NULL),
(56, 3, 33, 1, NULL),
(57, 10, 34, 1, NULL),
(58, 1, 35, 1, NULL),
(59, 8, 36, 1, NULL),
(60, 6, 37, 1, NULL),
(61, 4, 37, 1, NULL),
(62, 6, 39, 3, NULL),
(63, 6, 40, 1, NULL),
(64, 7, 40, 1, NULL),
(65, 6, 41, 1, NULL),
(66, 4, 41, 1, NULL),
(67, 1, 42, 1, NULL),
(68, 7, 43, 1, NULL),
(69, 8, 43, 1, NULL),
(70, 7, 44, 1, NULL),
(71, 8, 44, 1, NULL),
(74, 4, 46, 3, NULL),
(75, 6, 46, 4, NULL),
(76, 9, 46, 6, NULL),
(77, 5, 46, 4, NULL),
(78, 1, 46, 1, NULL),
(80, 5, 48, 1, NULL),
(81, 4, 52, 1, NULL),
(82, 4, 53, 1, NULL),
(83, 9, 54, 1, NULL),
(85, 5, 56, 1, NULL),
(86, 4, 57, 1, NULL),
(87, 6, 58, 1, NULL),
(88, 5, 59, 1, NULL),
(89, 4, 60, 1, NULL),
(90, 5, 61, 1, NULL),
(91, 9, 62, 1, NULL),
(92, 1, 63, 1, NULL),
(93, 1, 64, 3, NULL),
(94, 4, 65, 1, NULL),
(95, 3, 66, 1, NULL),
(96, 1, 67, 1, NULL),
(97, 11, 67, 1, NULL),
(98, 1, 68, 2, NULL),
(99, 2, 68, 6, NULL),
(100, 3, 68, 2, NULL),
(101, 6, 69, 1, NULL),
(102, 7, 69, 1, NULL),
(103, 8, 69, 1, NULL),
(104, 9, 69, 1, NULL),
(105, 1, 70, 1, NULL),
(106, 10, 70, 1, NULL),
(107, 11, 70, 1, NULL),
(108, 12, 70, 1, NULL),
(109, 1, 71, 2, NULL),
(110, 5, 71, 2, NULL),
(111, 6, 71, 2, NULL),
(112, 4, 71, 2, NULL),
(113, 1, 72, 1, NULL),
(114, 3, 72, 1, NULL),
(115, 6, 72, 7, NULL),
(116, 8, 73, 3, NULL),
(118, 4, 75, 7, NULL),
(119, 5, 76, 2, NULL),
(120, 6, 76, 1, NULL),
(121, 7, 76, 2, NULL),
(122, 5, 77, 1, NULL),
(123, 6, 77, 3, NULL),
(124, 1, 77, 4, NULL),
(125, 2, 77, 6, NULL),
(126, 26, 81, 1, NULL),
(127, 27, 81, 1, NULL),
(129, 5, 83, 1, NULL),
(130, 6, 83, 1, NULL),
(131, 4, 83, 1, NULL),
(132, 8, 83, 2, NULL),
(133, 7, 83, 2, NULL),
(134, 9, 83, 2, NULL),
(135, 1, 84, 1, NULL),
(136, 2, 84, 1, NULL),
(137, 3, 84, 1, NULL),
(138, 6, 84, 1, NULL),
(139, 29, 84, 3, NULL),
(140, 31, 84, 2, NULL),
(143, 27, 87, 4, NULL),
(144, 8, 88, 3, NULL),
(145, 46, 88, 3, NULL),
(146, 2, 89, 2, NULL),
(147, 49, 89, 2, NULL),
(148, 26, 90, 1, NULL),
(149, 28, 90, 1, NULL),
(150, 13, 90, 1, NULL),
(153, 7, 92, 1, NULL),
(154, 35, 93, 2, NULL),
(155, 35, 94, 1, NULL),
(156, 5, 95, 2, NULL),
(157, 6, 95, 2, NULL),
(158, 7, 95, 2, NULL),
(159, 8, 95, 1, NULL),
(160, 2, 95, 2, NULL),
(161, 27, 96, 1, NULL),
(162, 26, 96, 3, NULL),
(163, 2, 97, 2, NULL),
(164, 3, 97, 1, NULL),
(165, 1, 97, 2, NULL),
(166, 35, 98, 1, NULL),
(167, 40, 98, 1, NULL),
(168, 6, 99, 1, NULL),
(169, 46, 99, 2, NULL),
(170, 6, 100, 1, NULL),
(171, 39, 100, 2, NULL),
(172, 46, 101, 1, NULL),
(173, 1, 101, 1, NULL),
(174, 2, 101, 1, NULL),
(175, 14, 101, 1, NULL),
(176, 18, 101, 2, NULL),
(177, 22, 101, 1, NULL),
(178, 26, 102, 2, NULL),
(179, 5, 103, 1, NULL),
(180, 6, 103, 1, NULL),
(181, 7, 103, 1, NULL),
(182, 1, 103, 1, NULL),
(183, 26, 103, 1, NULL),
(184, 36, 103, 7, NULL),
(185, 37, 103, 2, NULL),
(186, 38, 103, 1, NULL),
(187, 39, 103, 1, NULL),
(188, 34, 104, 1, NULL),
(189, 2, 105, 11, NULL),
(190, 11, 105, 1, NULL),
(191, 9, 105, 3, NULL),
(192, 9, 106, 1, NULL),
(193, 8, 106, 1, NULL),
(194, 6, 107, 1, NULL),
(195, 7, 107, 1, NULL),
(198, 26, 109, 1, NULL),
(201, 12, 113, 3, 4),
(202, 56, 113, 1, 5),
(203, 1, 113, 3, 4),
(204, 12, 114, 3, 4),
(205, 56, 114, 1, 5),
(206, 1, 114, 3, 4),
(207, 56, 115, 1, 5),
(208, 12, 115, 1, 4),
(209, 56, 116, 1, 5),
(210, 11, 117, 1, 3),
(211, 56, 117, 1, 5),
(212, 12, 118, 1, 4),
(213, 12, 119, 2, 4),
(214, 18, 120, 1, 4),
(215, 18, 121, 1, 4),
(216, 18, 122, 1, 4),
(217, 18, 123, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `id_phieunhap` int(10) UNSIGNED NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctphieunhap`
--

INSERT INTO `ctphieunhap` (`id_phieunhap`, `id_sp`, `so_luong`) VALUES
(2, 52, 50),
(3, 53, 10),
(4, 54, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_danhmuc` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danhmuc`) VALUES
(1, 'Hóa đơn'),
(2, 'Thống kê'),
(5, 'Khách hàng'),
(7, 'Sản phẩm'),
(8, 'Thể loại'),
(9, 'Phiếu nhập'),
(10, 'Tài khoản'),
(11, 'Danh mục'),
(12, 'Nhà cung cấp'),
(13, 'Nhân viên'),
(14, 'Đổi mật khẩu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `function`
--

CREATE TABLE `function` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `function_permission`
--

CREATE TABLE `function_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_permission` int(10) UNSIGNED NOT NULL,
  `id_function` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsp`
--

CREATE TABLE `hinhanhsp` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_sp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsp`
--

INSERT INTO `hinhanhsp` (`id`, `hinh_anh`, `id_sp`) VALUES
(1, 'TraiCay1.jpg', 1),
(2, 'TraiCay2.jpg', 2),
(3, 'TraiCay3.jpg', 3),
(4, 'TraiCay_4.jpg', 4),
(5, 'TraiCay_5.jpg', 5),
(6, 'TraiCay_6.jpg', 6),
(7, 'Rau1.jpg', 7),
(8, 'Rau2.jpg', 8),
(9, 'Rau3.jpg', 9),
(10, 'Rau4.jpg', 10),
(11, 'Rau5.jpg', 11),
(12, 'Rau6.jpg', 12),
(13, 'ThucPham1.jpg', 13),
(14, 'ThucPham2.jpg', 14),
(15, 'ThucPham3.jpg', 15),
(16, 'ThucPham4.jpg', 16),
(17, 'ThucPham5.jpg', 17),
(18, 'ThucPham6.jpg', 18),
(19, 'BunGao1.jpg', 19),
(20, 'BunGao2.jpg', 20),
(21, 'BunGao3.jpg', 21),
(22, 'BunGao4.jpg', 22),
(23, 'BunGao5.jpg', 23),
(24, 'BunGao6.jpg', 24),
(25, 'QuanTay1.jpg', 25),
(26, 'QuanTay2.jpg', 26),
(27, 'QuanTay3.jpg', 27),
(28, 'QuanTay4.jpg', 28),
(29, 'QuanTay5.jpg', 29),
(30, 'QuanTay6.jpg', 30),
(31, 'QuanKaKi1.jpg', 31),
(32, 'QuanKaKi2.jpg', 32),
(33, 'QuanKaKi3.jpg', 33),
(34, 'QuanKaKi4.jpg', 34),
(35, 'QuanKaKi5.jpg', 35),
(36, 'QuanKaKi6.jpg', 36),
(37, 'TraiCay1_1.jpg', 1),
(38, 'TraiCay1_2.jpg', 1),
(39, 'TraiCay2_1.jpg', 2),
(40, 'TraiCay2_2.jpg', 2),
(41, 'TraiCay3_1.jpg', 3),
(42, 'TraiCay3_2.jpg', 3),
(43, 'TraiCay_4_1.jpg', 4),
(44, 'TraiCay_4_2.jpg', 4),
(45, 'TraiCay_5_1.jpg', 5),
(46, 'TraiCay_5_2.jpg', 5),
(47, 'TraiCay_6_1.jpg', 6),
(48, 'TraiCay_6_2.jpg', 6),
(49, 'Rau1_1.jpg', 7),
(50, 'Rau1_2.jpg', 7),
(51, 'Rau2_2.jpg', 8),
(52, 'Rau2_2.jpg', 8),
(53, 'Rau3_1.jpg', 9),
(54, 'Rau3_2.jpg', 9),
(55, 'Rau4_1.jpg', 10),
(56, 'Rau4_2.jpg', 10),
(57, 'Rau5_1.jpg', 11),
(58, 'Rau5_2.jpg', 11),
(59, 'Rau6_1.jpg', 12),
(60, 'Rau6_2.jpg', 12),
(61, 'ThucPham1_1.jpg', 13),
(62, 'ThucPham1_2.jpg', 13),
(63, 'ThucPham2_1.jpg', 14),
(64, 'ThucPham2_2.jpg', 14),
(65, 'ThucPham3_1.jpg', 15),
(66, 'ThucPham3_2.jpg', 15),
(67, 'ThucPham4_1.jpg', 16),
(68, 'ThucPham4_2.jpg', 16),
(69, 'ThucPham5_1.jpg', 17),
(70, 'ThucPham5_2.jpg', 17),
(71, 'ThucPham6_1.jpg', 18),
(72, 'ThucPham6_2.jpg', 18),
(73, 'BunGao1_1.jpg', 19),
(74, 'BunGao1_2.jpg', 19),
(75, 'BunGao2_1.jpg', 20),
(76, 'BunGao2_2.jpg', 20),
(77, 'BunGao3_1.jpg', 21),
(78, 'BunGao3_2.jpg', 21),
(79, 'BunGao4_1.jpg', 22),
(80, 'BunGao4_2.jpg', 22),
(81, 'BunGao5_1.jpg', 23),
(82, 'BunGao5_2.jpg', 23),
(83, 'BunGao6_1.jpg', 24),
(84, 'BunGao6_2.jpg', 24),
(85, 'QuanTay1_1.jpg', 25),
(86, 'QuanTay1_2.jpg', 25),
(87, 'QuanTay2_1.jpg', 26),
(88, 'QuanTay2_2.jpg', 26),
(89, 'QuanTay3_1.jpg', 27),
(90, 'QuanTay3_2.jpg', 27),
(91, 'QuanTay4_1.jpg', 28),
(92, 'QuanTay4_2.jpg', 28),
(93, 'QuanTay5_1.jpg', 29),
(94, 'QuanTay5_2.jpg', 29),
(95, 'QuanTay6_1.jpg', 30),
(96, 'QuanTay6_2.jpg', 30),
(97, 'QuanKaKi1_1.jpg', 31),
(98, 'QuanKaKi1_2.jpg', 31),
(99, 'QuanKaKi2_1.jpg', 32),
(100, 'QuanKaKi2_2.jpg', 32),
(101, 'QuanKaKi3_1.jpg', 33),
(102, 'QuanKaKi3_2.jpg', 33),
(103, 'QuanKaKi4_1.jpg', 34),
(104, 'QuanKaKi4_2.jpg', 34),
(105, 'QuanKaKi5_1.jpg', 35),
(106, 'QuanKaKi5_2.jpg', 35),
(107, 'QuanKaKi6_1.jpg', 36),
(108, 'QuanKaKi6_2.jpg', 36),
(109, '304802b33136a13eae5e157c125c7d72.jpg', 37),
(110, 'P06889_1_l.jpg', 37),
(111, 'stt-dutch-lady-cao-khoe-vi-dau-hop-170ml-loc-4-3-1.jpg', 38),
(112, '1e7dd84af654c8a39aed956345befd51.jpg', 38),
(113, 'sfdfsfsf.jpg', 39),
(114, 'loc-4-hop-sua-tuoi-tiet-trung-khong-duong-vinamilk-100-sua-tuoi-180ml-202104091038151238.jpg', 40),
(115, 'sua-tuoi-vinamilk-hop-180ml-co-duong.jpg', 40),
(116, 'sua-tuoi-tiet-trung-vinamilk-220ml-676.jpg', 41),
(117, 'kd_d30b9c547be84e288364ed86d4988d8d_grande.jpg', 41),
(118, '200d9e53691bd10126e6ebe688e9ce21.jpg', 42),
(119, '6-lon-nuoc-tang-luc-warrior-huong-dau-325ml-202103300854176447.jpg', 42),
(120, '1_13.jpg', 43),
(121, '6-chai-nuoc-tang-luc-warrior-nho-330ml-201908082348251932.jpg', 43),
(122, '24-chai-nuoc-tang-luc-warrior-nho-330ml-201908082349345412.jpg', 44),
(123, 'srete3.jpg', 45),
(124, 'Che-phin-5-Trung-Nguyen-331f.jpg', 45),
(125, 'erwrwr.jpg', 45),
(126, 'ca-phe-sua-nescafe-3-in-1-dam-da-hai-hoa-340g-202004251732202397.jpg', 46),
(127, 'a5749bf2284be7eea62cf4c4d1dc1648.jpg', 46),
(128, 'b43262f8b424190d50be66e9bf2ec128.png', 46),
(129, 'gh345f.jpg', 14),
(130, 'nuoc-ngot-mirinda-huong-xa-xi-330ml-202003101804043892.jpg', 14),
(131, '6-chai-nuoc-ngot-pepsi-cola-390ml-202103171112477714.jpg', 47),
(132, '8934588013065-1-4.jpg', 47),
(133, 'GfwJ61UW1YVW.jpeg', 47),
(134, 'fghtydfgs.jpg', 48),
(135, 'f139287a1444b271155f414261289.jpg', 48),
(136, '-202103311105034301.jpg', 48),
(137, '610no2LASdL.-SL1500--x0cp-2u-www.shophangmy.vn-1550810606.jpg', 49),
(138, 'downloasf.jpg', 49),
(139, 'nuoc_ngot_pepsi_light_thung_24__lon_x_330ml_3863a4a31705452ca6b8075c2e16013a_1024x1024.jpg', 49),
(140, 'nuoc_ngot_pepsi_light_loc_6__lon_x_330ml_96356e97abb648afb2a119cfddaaaf87_1024x1024.jpg', 50),
(141, 'nuoc_ngot_pepsi_light_thung_24__lon_x_330ml_3863a4a31705452ca6b8075c2e16013a_1024x1024.jpg', 50),
(149, '', 52),
(150, '', 53),
(151, '320mltwisterlonthung(1).jpg', 52),
(152, '99d02277a94ceb61595bb7d8d2dc(1).jpg', 53),
(153, '', 54),
(154, '', 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_khachhang` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_nhanvien` int(10) DEFAULT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `deliveryStatus` varchar(255) DEFAULT 'Đang giao',
  `diachinhanhang` varchar(255) DEFAULT NULL,
  `ten_nguoinhan` varchar(255) DEFAULT NULL,
  `sdt_nguoinhan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `tong_tien`, `ngay_tao`, `id_nhanvien`, `trang_thai`, `deliveryStatus`, `diachinhanhang`, `ten_nguoinhan`, `sdt_nguoinhan`) VALUES
(7, 1, 96300, '2021-05-13 09:49:40', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(8, 1, 57450, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(9, 1, 52500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(10, 1, 118500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(11, 2, 166500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(12, 2, 37500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(15, 2, 52800, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(16, 2, 29500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(17, 2, 29500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(18, 2, 29500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(19, 2, 29500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(24, 2, 36450, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(25, 2, 8500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(26, 2, 44500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(27, 2, 8500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(28, 2, 37500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(29, 2, 10500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(30, 2, 10500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(31, 2, 10500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(32, 2, 8950, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(33, 2, 7500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(34, 2, 9500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(35, 2, 9500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(36, 2, 7500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(37, 3, 21000, '2021-05-13 10:05:08', 1, 1, 'Đang giao', NULL, NULL, NULL),
(39, 3, 31500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(40, 3, 19450, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(41, 3, 21000, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(42, 3, 9500, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(43, 3, 16450, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(44, 3, 16450, '2021-05-13 09:50:03', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(46, 4, 174000, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(48, 4, 8500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(52, 4, 10500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(53, 4, 10500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(54, 4, 9500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(56, 4, 8500, '2021-05-13 10:05:06', 1, 1, 'Đang giao', NULL, NULL, NULL),
(57, 4, 10500, '2021-05-13 10:05:04', 1, 1, 'Đang giao', NULL, NULL, NULL),
(58, 4, 10500, '2021-05-13 10:05:00', 1, 1, 'Đang giao', NULL, NULL, NULL),
(59, 4, 8500, '2021-05-13 10:04:58', 1, 1, 'Đang giao', NULL, NULL, NULL),
(60, 4, 10500, '2021-05-13 10:04:56', 1, 1, 'Đang giao', NULL, NULL, NULL),
(61, 4, 8500, '2021-05-13 10:04:50', 1, 1, 'Đang giao', NULL, NULL, NULL),
(62, 4, 9500, '2021-05-13 10:04:48', 1, 1, 'Đang giao', NULL, NULL, NULL),
(63, 4, 9500, '2021-05-13 10:04:46', 1, 1, 'Đang giao', NULL, NULL, NULL),
(64, 4, 28500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(65, 4, 10500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(66, 4, 7500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(67, 4, 20000, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(68, 7, 87700, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(69, 6, 36450, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(70, 6, 38450, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(71, 6, 78000, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(72, 5, 90500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(73, 5, 22500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(75, 5, 73500, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(76, 5, 45400, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(77, 6, 131700, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(81, 6, 269000, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(83, 6, 81400, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(84, 6, 564450, '2021-05-13 09:50:03', 1, 1, 'Đang giao', NULL, NULL, NULL),
(87, 3, 1016000, '2021-05-13 10:02:43', 1, 1, 'Đang giao', NULL, NULL, NULL),
(88, 7, 232500, '2021-05-13 13:10:37', 1, 1, 'Đang giao', NULL, NULL, NULL),
(89, 7, 35800, '2021-05-13 13:11:28', 1, 1, 'Đang giao', NULL, NULL, NULL),
(90, 7, 42600, '2021-05-13 13:23:26', 1, 1, 'Đang giao', NULL, NULL, NULL),
(92, 9, 8950, '2021-05-13 13:48:02', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(93, 9, 400000, '2021-05-13 13:50:00', 1, 1, 'Đang giao', NULL, NULL, NULL),
(94, 8, 200000, '2021-05-13 14:25:24', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(95, 2, 81300, '2021-05-14 03:46:31', 1, 1, 'Đang giao', NULL, NULL, NULL),
(96, 1, 299000, '2021-05-14 03:47:21', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(97, 1, 44400, '2021-05-14 03:48:33', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(98, 1, 224200, '2021-05-14 03:49:07', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(99, 1, 150500, '2021-05-14 03:52:56', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(100, 3, 340500, '2021-05-14 03:57:38', 1, 1, 'Đang giao', NULL, NULL, NULL),
(101, 3, 136350, '2021-05-14 03:58:05', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(102, 3, 30000, '2021-05-14 04:38:04', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(103, 3, 408950, '2021-05-14 06:01:00', 1, 1, 'Đang giao', NULL, NULL, NULL),
(104, 3, 45000, '2021-05-14 06:40:59', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(105, 3, 137450, '2021-05-14 08:04:48', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(106, 6, 17000, '2021-05-14 13:22:17', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(107, 6, 19950, '2021-05-14 14:18:36', NULL, 0, 'Đang giao', NULL, NULL, NULL),
(109, 10, 15000, '2021-05-15 02:54:50', 1, 1, 'Đang giao', NULL, NULL, NULL),
(112, 12, 3325000, '2025-05-13 09:50:00', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(113, 12, 3325000, '2025-05-13 09:50:54', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(114, 12, 3325000, '2025-05-13 09:52:26', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(115, 12, 990000, '2025-05-13 09:53:10', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(116, 12, 490000, '2025-05-13 09:53:30', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(117, 12, 727000, '2025-05-13 09:59:17', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(118, 12, 500000, '2025-05-13 10:00:25', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(119, 12, 1000000, '2025-05-13 10:00:33', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(120, 12, 272500, '2025-05-13 10:13:11', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(121, 12, 272500, '2025-05-13 10:14:52', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(122, 12, 272500, '2025-05-13 10:18:18', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322'),
(123, 12, 272500, '2025-05-13 10:22:15', NULL, 0, '0', 'kk', 'Vo Van Nhi', '0945352322');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_kh` varchar(191) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `dia_chi` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tong_tien_muahang` int(11) NOT NULL,
  `trangthai` tinyint(1) NOT NULL,
  `is_nongdan` tinyint(1) DEFAULT 0,
  `diachivuon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `ten_kh`, `hinh_anh`, `ten_dangnhap`, `mat_khau`, `email`, `dia_chi`, `phone`, `ngay_tao`, `ngay_sua`, `tong_tien_muahang`, `trangthai`, `is_nongdan`, `diachivuon`) VALUES
(1, 'Nguyen Van P', '', 'user123', '12345', 'BBBBbbb@gmail.com', '321 Đồng Văn Cống, Quận 2', '098999999', '2021-05-10 14:12:04', '2021-05-10 12:35:47', 1042850, 1, 0, NULL),
(2, 'Nguyen Van A', '', 'user1234', '123456', 'wewewew@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', '0985123131', '2021-05-10 14:17:13', '2021-05-10 12:58:31', 575700, 0, 0, NULL),
(3, 'Phan Hữu Cường', '', 'abcdef', 'abcdef', 'abdc@gmail.com', 'Đồng Nai', '0969295720', '2021-05-11 03:38:01', '2021-05-14 07:10:19', 2266050, 0, 0, NULL),
(4, 'Phạm Nguyên', '', 'nguyen123', '124532', 'nugyen_pham123@yahoo.com', 'Huyện Nhà Bè, TP. Hồ Chí Minh', '075472323', '2021-05-11 03:40:51', '2021-05-10 22:12:47', 372500, 0, 0, NULL),
(5, 'Tấn Trọng Bùi', '', 'buitan', '12345', 'ngocbau2015tqk@gmail.com', '99 An Dương Vương, phường 16, quận 8, Thành phố Hồ Chí Minh', '0969295720', '2021-05-12 09:15:51', '2021-05-12 11:15:12', 306900, 0, 0, NULL),
(6, 'Nguyễn Ngọc Báu', '', 'admin', 'admin', 'ngocbau2015tqk@gmail.com', 'Tx. Ninh Hòa, Tỉnh KHánh Hòa', '0969295720', '2021-05-12 10:23:23', '2021-05-14 08:39:09', 2322794, 0, 0, NULL),
(7, 'Bùi Tấn Âu', '', 'aubui17', '1234567', 'aubui17@gmail.com', '99 An Dương Vương, P16, Q8, Tp.HCM', '0387070222', '2021-05-12 10:25:12', '2021-05-13 13:24:39', 433600, 0, 0, NULL),
(8, 'Nguyeenx Thij P', '', '4tgsgs', 'ư36tgsd', 'wrwrewrw@bgt', 'wrwrwrwrwrw', '0014245683', '2021-05-13 10:41:49', '2021-05-13 14:11:25', 200000, 0, 0, NULL),
(9, '', '', 'abcbdfe', '123456', '575@dfdfdf.c', '', '6786786333', '2021-05-13 13:46:31', '2021-05-13 13:46:31', 408950, 0, 0, NULL),
(10, '', '', 'asdfg', 'asdfg', 'abcs@gmail.com', '', '0969295720', '2021-05-15 02:51:36', '2021-05-15 02:51:36', 115000, 0, 0, NULL),
(11, '', '', 'huynhdinhphuc', 'huynhdinhphuc123', 'huynhdinhphuccubes@gmail.com', '', '0383363223', '2023-11-16 00:23:45', '2023-11-16 00:23:45', 453500, 0, 0, NULL),
(12, 'Vo Van Nhi', '', 'nhi', '$2y$10$rrELyi/H2HHfu2i4ePuRkeNe1oxM/rf7CY3PllSgdiNOGE.YePvTu', 'vovannhi@gmail.com', 'kk', '0945352322', '2025-05-07 12:46:35', '2025-05-07 12:46:35', 0, 0, 1, 'kk'),
(13, 'Vo Van Nhi', '', 'nhi123', '$2y$10$57u3N6R3znn/A3.R1fbP3OGu0ZTgMv4XupyZZ6YklDi59iYi6tBRK', 'nhipro2513@gmail.com', 'aaaa', '0824073105', '2025-05-11 12:46:47', '2025-05-11 12:46:47', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `status` enum('seen','unseen') DEFAULT 'unseen',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_ncc` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web_site` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `ten_ncc`, `email`, `web_site`, `logo`, `phone`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Công Ty Yody', 'yody@gmail.com', 'http://www.yody.com/', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2F1000logos.net%2Fcoca-cola-logo%2F&psig=AOvVaw12lW3W89SleklNVXWrh4wK&ust=1617461914606000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJjCi7Dp3-8CFQAAAAAdAAAAABAD', '0932898324', '2021-04-15 10:28:52', '2021-04-15 10:28:52'),
(2, 'Công Ty Elise', 'congtyElise@gmail.com', 'https://www.elisevietnam.com/', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2F1000logos.net%2Fcoca-cola-logo%2F&psig=AOvVaw12lW3W89SleklNVXWrh4wK&ust=1617461914606000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJjCi7Dp3-8CFQAAAAAdAAAAABAD', '091234567', '2021-04-15 10:30:31', '2021-04-15 10:30:31'),
(3, 'Công ty cổ phần Maison Retail Management International', 'MRMI_vietnam,@gmail.com', 'https://www.MRMI_vn.vn/product/index/Maison_Retail_Management_International', 'https://www.google.com.vn/url?sa=i&url=https%3A%2F%2Fworldvectorlogo.com%2Flogo%2Ftropicana-twister-soda&psig=AOvVaw0STYR7jBWWv22HP8-88aw4&ust=1617464416594000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCJDmrNXy3-8CFQAAAAAdAAAAABAD', '0924892442', '2021-04-15 10:31:44', '2021-04-15 10:31:44'),
(4, 'Công ty TNHH Thương mại thời trang 3C', 'thoitrang3C@gmail.com', 'https://www.tt3C.com.vn', 'https://www.thp.com.vn/wp-content/uploads/2017/01/cropped-thp.png', '0924832442', '2021-04-15 10:32:56', '2021-04-15 10:32:56'),
(5, 'Công ty cổ phần thời trang Bimart', 'Bimart@gmail.com', 'https://bimart.com.vn/', 'https://bimart.com.vn/templates/images/logo.png', '0384832442', '2021-04-15 10:33:54', '2021-04-15 10:33:54'),
(6, 'Công ty TNHH thời trang H&A', 'H&A@gmail.com', 'thoitrangH&A.com.vn', 'none', '0384832442', '2021-05-12 17:50:19', '2021-05-12 17:50:19'),
(7, 'Công ty thời trang Nam Linh', 'namlinh@mgail.com', 'namlinhvn.com', 'none', '0924892442', '2021-05-13 02:24:32', '2021-05-13 02:24:32'),
(8, 'SIXDO', 'sixdo@gmail.com', 'htttp:\\\\sixdo/com', 'none', '064534543423', '2021-05-13 02:24:32', '2021-05-13 02:24:32'),
(9, 'VMG', 'VMG@gmail.com', 'vmg.vn', 'none', '0924892442', '2021-05-13 02:35:24', '2021-05-13 02:35:24'),
(10, 'Công ty thời trang Việt', 'thoitrangviet@gmail.com', 'ttviet.vn', 'none', '064534543423', '2021-05-13 02:35:24', '2021-05-13 02:35:24'),
(11, 'Smaker Clothing', 'Smaker@gmail.com', 'Smaker.com', 'none', '054646332', '2021-05-13 02:36:52', '2021-05-13 02:36:52'),
(12, 'ClownZ', 'ClownZ@gmail.com', 'ClownZ.com', 'none', '0924832442', '2021-05-13 02:37:28', '2021-05-13 02:37:28'),
(13, 'Dirty Coins', 'dirtycoins@gmail.com', 'DC.com', 'none', '046342435', '2021-05-13 02:37:28', '2021-05-13 02:37:28'),
(14, 'Grimm DC', 'grimDC@gmail.com', 'grimdc.com', 'none', '023423242', '2021-05-13 02:39:05', '2021-05-13 02:39:05'),
(15, 'Hades ', 'hades@gmail.com', 'hades.com', 'none', '093434223', '2021-05-13 02:39:05', '2021-05-13 02:39:05'),
(16, 'Badhabits', 'badhabits@gmail.com', 'badhabit.com', 'none', '08953543333', '2021-05-13 02:40:48', '2021-05-13 02:40:48'),
(17, 'Have Fun With The Homie', 'hfwth@gmail.com', 'hfwth.com', 'none', '07687543', '2021-05-13 02:40:48', '2021-05-13 02:40:48'),
(18, 'Now Sagion', 'Now_SG@gmail.com', 'Now_SG.com', 'none', '05462542', '2021-05-13 02:42:00', '2021-05-13 02:42:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_nv` varchar(191) NOT NULL,
  `ten_dangnhap` varchar(191) NOT NULL,
  `mat_khau` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `ten_nv`, `ten_dangnhap`, `mat_khau`, `phone`, `hinh_anh`, `email`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'admin 1', 'admin', '', '0353535353', '4567', '355353@jkdsgsd.sdf', '2021-05-12 15:32:29', '2021-05-12 15:32:29'),
(2, 'quan ly', 'quanly', '', '', '', '', '2021-05-12 15:33:12', '2021-05-12 15:33:12'),
(3, 'phamducmanh', 'nhanvien', '', '0383363223', '', 'huynhdinhphuccubes@gmail.com', '2021-05-12 15:33:41', '2021-05-12 15:33:41'),
(4, 'sp11', '', '', '013032', '', 'ádjk', '2021-05-12 15:34:10', '2021-05-12 15:34:10'),
(5, 'sp13', '', '', 'xcv', '', 'cxv', '2021-05-12 15:34:47', '2021-05-12 15:34:47'),
(6, 'kkk', 'nhi123', '123456', '032395884', '', '', '2025-03-21 05:37:15', '2025-03-21 05:37:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `address` varchar(255) NOT NULL,
  `timeExpect` date NOT NULL,
  `timeRecevice` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_nv` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `nguoi_nhan` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `ghichu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_nv`, `tong_tien`, `ngay_tao`, `nguoi_nhan`, `sdt`, `diachi`, `ghichu`) VALUES
(2, 1, 275000, '2021-05-14 13:37:13', 'ABCDEF', 987654332, '23 fefdg ', 'test'),
(3, 1, 55000, '2021-05-14 14:10:15', 'ABCDEF', 987654332, '23 fefdg ', 'test'),
(4, 1, 110000, '2021-05-15 03:07:17', 'ABCDEF', 987654332, '23 fefdg ', 'test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucvanchuyen`
--

CREATE TABLE `phuongthucvanchuyen` (
  `id` int(11) NOT NULL,
  `ten_phuongthuc` varchar(255) NOT NULL,
  `phi_vanchuyen` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuongthucvanchuyen`
--

INSERT INTO `phuongthucvanchuyen` (`id`, `ten_phuongthuc`, `phi_vanchuyen`) VALUES
(1, 'Giao hàng nhanh', 30000.00),
(2, 'Giao hàng tiêu chuẩn', 15000.00),
(3, 'Giao hàng tiết kiệm', 10000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_quyen` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `ten_quyen`) VALUES
(1, 'admin'),
(2, 'Quản lý'),
(3, 'Nhân viên'),
(4, 'Tự chọn'),
(6, 'ABC');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyendahmuc`
--

CREATE TABLE `quyendahmuc` (
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `id_danhmuc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyendahmuc`
--

INSERT INTO `quyendahmuc` (`id_quyen`, `id_danhmuc`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 11),
(3, 1),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(4, 1),
(4, 2),
(1, 1),
(1, 2),
(1, 5),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(6, 1),
(6, 2),
(6, 7),
(6, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(191) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `noi_dung` varchar(191) NOT NULL,
  `id_the_loai` int(10) UNSIGNED NOT NULL,
  `id_nha_cc` int(10) UNSIGNED NOT NULL,
  `so_luong` tinyint(4) NOT NULL,
  `sl_da_ban` tinyint(4) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NOT NULL DEFAULT current_timestamp(),
  `trangthai` tinyint(1) NOT NULL,
  `id_nhaban` int(11) DEFAULT NULL,
  `xuatsu` varchar(255) DEFAULT NULL,
  `phanbon` varchar(255) DEFAULT NULL,
  `chatluong` varchar(255) DEFAULT NULL,
  `dotuoi` varchar(255) DEFAULT NULL,
  `antoanthucpham` varchar(255) DEFAULT NULL,
  `tinhhopphapnguongoc` varchar(255) DEFAULT NULL,
  `dieukienbaoquan` varchar(255) DEFAULT NULL,
  `phantichvisinhvat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `don_gia`, `hinh_anh`, `noi_dung`, `id_the_loai`, `id_nha_cc`, `so_luong`, `sl_da_ban`, `ngay_tao`, `ngay_sua`, `trangthai`, `id_nhaban`, `xuatsu`, `phanbon`, `chatluong`, `dotuoi`, `antoanthucpham`, `tinhhopphapnguongoc`, `dieukienbaoquan`, `phantichvisinhvat`) VALUES
(1, 'Trái Cam', 445000, 'TraiCay1.jpg', 'Màu sắc: Họa tiết Tím cà', 1, 1, 14, 39, '2021-04-15 10:37:34', '0000-00-00 00:00:00', 0, 4, 'Hàn Quốc', 'Vô cơ', 'Loại 3', '10 ngày', 'Đạt', 'Không rõ nguồn gốc', 'Bảo quản mát 5-10°C', 'Không phát hiện vi sinh gây hại'),
(2, 'Trái Táo\r\n\r\n', 222500, 'TraiCay2.jpg', 'Màu sắc: Be sáng', 1, 1, 19, 31, '2021-04-15 10:39:21', '2021-04-15 10:39:21', 0, 4, 'Việt Nam', 'Hữu cơ sinh học', 'Loại 3', '1 tuần', 'Không đạt', 'Giả mạo giấy tờ', 'Nhiệt độ phòng', 'Đạt chuẩn vi sinh'),
(3, 'Xoài Thái\r\n', 207000, 'TraiCay3.jpg', 'Màu sắc: Đen', 1, 3, 43, 14, '2021-04-15 10:40:44', '2021-04-15 10:40:44', 7, 1, 'Mỹ', 'Hữu cơ sinh học', 'Loại 3', '1 tháng', 'Đạt', 'Không rõ nguồn gốc', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(4, 'Dưa Lưới', 425000, 'TraiCay_4.jpg', 'Màu sắc: Hồng tím\r\n\r\n', 1, 4, 32, 21, '2021-04-15 10:42:35', '2021-04-15 10:42:35', 0, 4, 'Việt Nam', 'Không sử dụng', 'Đạt chuẩn VietGAP', '2 tuần', 'Đang xét nghiệm', 'Hợp pháp', 'Đông lạnh -18°C', 'Phát hiện E.coli'),
(5, 'Thanh Long\r\n', 237000, 'TraiCay_5.jpg', 'Màu sắc: Xanh dương', 1, 5, 31, 20, '2021-04-15 10:43:51', '0000-00-00 00:00:00', 0, 4, 'Hàn Quốc', 'Hữu cơ', 'Đạt chuẩn VietGAP', '1 tuần', 'Đang xét nghiệm', 'Hợp pháp', 'Đông lạnh -18°C', 'Không phát hiện vi sinh gây hại'),
(6, 'Quả Lê\r\n', 355000, 'TraiCay_6.jpg', 'Màu sắc: Hồng tím', 1, 5, 21, 38, '2021-04-15 10:44:47', '0000-00-00 00:00:00', 7, 1, 'Mỹ', 'Hữu cơ sinh học', 'Loại 3', '2 tuần', 'Không đạt', 'Hợp pháp', 'Bảo quản mát 5-10°C', 'Không phát hiện vi sinh gây hại'),
(7, 'Rau Mồng Tơi', 237000, 'Rau1.jpg', 'Màu sắc: Xanh cổ vịt', 2, 5, 39, 19, '2021-04-15 10:45:58', '2021-04-15 10:45:58', 0, 2, 'Mỹ', 'Hữu cơ', 'Loại 3', '1 tuần', 'Đạt', 'Không rõ nguồn gốc', 'Đông lạnh -18°C', 'Đạt chuẩn vi sinh'),
(8, 'Cà Tím', 207000, 'Rau2.jpg', 'Màu sắc: Họa tiết Bạc hà', 2, 4, 25, 30, '2021-04-15 10:47:36', '0000-00-00 00:00:00', 0, 2, 'Mỹ', 'Vô cơ', 'Loại 1', '2 tuần', 'Đạt', 'Hợp pháp', 'Đông lạnh -18°C', 'Không phát hiện vi sinh gây hại'),
(9, 'Củ Dền', 207000, 'Rau3.jpg', 'Màu sắc: Kẻ Xanh dương đậm', 2, 8, 33, 18, '2021-04-15 10:51:33', '2021-04-15 10:51:33', 0, 5, 'Việt Nam', 'Không sử dụng', 'Loại 3', '1 tháng', 'Đạt', 'Hợp pháp', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(10, 'Cà Chua', 490000, 'Rau4.jpg', 'Màu sắc: Cam đỏ\r\n\r\n', 2, 13, 49, 3, '2021-04-15 10:53:07', '0000-00-00 00:00:00', 0, 5, 'Trung Quốc', 'Không sử dụng', 'Loại 3', '10 ngày', 'Không đạt', 'Giả mạo giấy tờ', 'Đông lạnh -18°C', 'Không phát hiện vi sinh gây hại'),
(11, 'Rau Cải Thìa\r\n', 237000, 'Rau5.jpg', 'Màu sắc: Đen', 2, 16, 45, 7, '2021-04-15 10:54:27', '2021-04-15 10:54:27', 0, 3, 'Thái Lan', 'Không sử dụng', 'Loại 1', '1 tuần', 'Đạt', 'Giả mạo giấy tờ', 'Nhiệt độ phòng', 'Không phát hiện vi sinh gây hại'),
(12, 'Rau Cải Hạt\r\n', 500000, 'Rau6.jpg', 'Màu sắc: Họa tiết Xanh tím than\r\n\r\n', 2, 17, 26, 26, '2021-04-15 10:55:19', '2021-04-15 10:55:19', 0, 4, 'Mỹ', 'Hữu cơ', 'Đạt chuẩn VietGAP', '2 tuần', 'Đang xét nghiệm', 'Không rõ nguồn gốc', 'Bảo quản mát 5-10°C', 'Không phát hiện vi sinh gây hại'),
(13, 'Mật Dừa Nước', 322000, 'ThucPham1.jpg', 'Màu sắc: Họa tiết Xanh oliu', 3, 6, 0, 1, '2021-05-12 17:51:12', '2021-05-12 17:51:12', 7, 4, 'Trung Quốc', 'Không sử dụng', 'Loại 1', '10 ngày', 'Đạt', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Đạt chuẩn vi sinh'),
(14, 'Mật Ong Phương Di\r\n', 297000, 'ThucPham2.jpg', 'Màu sắc: Kẻ Đỏ tươi', 3, 14, 49, 1, '2021-05-12 17:56:00', '2021-05-12 17:56:00', 0, 4, 'Hàn Quốc', 'Vô cơ', 'Loại 1', '1 tháng', 'Đạt', 'Không rõ nguồn gốc', 'Bảo quản mát 5-10°C', 'Đạt chuẩn vi sinh'),
(15, 'Mật Ong', 500000, 'ThucPham3.jpg', 'Màu sắc: Be vàng', 3, 2, 50, 0, '2021-05-12 17:56:00', '2021-05-12 17:56:00', 0, 3, 'Mỹ', 'Vô cơ', 'Đạt chuẩn GlobalGAP', '2 tuần', 'Đang xét nghiệm', 'Hợp pháp', 'Nhiệt độ phòng', 'Đạt chuẩn vi sinh'),
(16, 'Bột Diếp Cá\r\n', 272500, 'ThucPham4.jpg', 'Màu sắc: Xanh ghi đá', 3, 1, 50, 0, '2021-05-12 18:01:19', '2021-05-12 18:01:19', 0, 2, 'Việt Nam', 'Hữu cơ sinh học', 'Đạt chuẩn GlobalGAP', '1 tuần', 'Không đạt', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Đạt chuẩn vi sinh'),
(17, 'Bột Trà Xanh', 287000, 'ThucPham5.jpg', 'Màu sắc: Trắng', 3, 7, 50, 0, '2021-05-12 18:28:16', '2021-05-12 18:28:16', 0, 4, 'Mỹ', 'Hữu cơ', 'Đạt chuẩn GlobalGAP', '2 tuần', 'Đạt', 'Hợp pháp', 'Bảo quản mát 5-10°C', 'Đạt chuẩn vi sinh'),
(18, 'Hạt Chia Hữu Cơ\r\n\r\n', 272500, 'ThucPham6.jpg', 'Màu sắc: Xanh matcha', 3, 16, 40, 10, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 7, 4, 'Mỹ', 'Vô cơ', 'Đạt chuẩn VietGAP', '1 tháng', 'Đạt', 'Giả mạo giấy tờ', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(19, 'Bột Nếp', 300000, 'BunGao1.jpg', 'Màu sắc: Xanh ghi đá', 4, 17, 50, 0, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 0, 3, 'Hàn Quốc', 'Không sử dụng', 'Đạt chuẩn GlobalGAP', '1 tuần', 'Đang xét nghiệm', 'Hợp pháp', 'Nhiệt độ phòng', 'Không phát hiện vi sinh gây hại'),
(20, 'Bột Mì', 250000, 'BunGao2.jpg', 'Màu sắc: Xanh ghi đá\r\n\r\n', 4, 18, 50, 0, '2021-05-12 18:31:22', '2021-05-12 18:31:22', 0, 3, 'Thái Lan', 'Hữu cơ sinh học', 'Loại 3', '2 tuần', 'Đang xét nghiệm', 'Không rõ nguồn gốc', 'Nhiệt độ phòng', 'Không phát hiện vi sinh gây hại'),
(21, 'Bột Bắp', 320000, 'BunGao3.jpg', 'Màu sắc: Đen', 4, 15, 50, 0, '2021-05-12 18:35:24', '2021-05-12 18:35:24', 0, 4, 'Việt Nam', 'Vô cơ', 'Loại 1', '10 ngày', 'Đạt', 'Hợp pháp', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(22, 'Phở Gạo', 260000, 'BunGao4.jpg', 'Màu sắc: Xanh ghi đá', 4, 16, 49, 1, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0, 1, 'Trung Quốc', 'Vô cơ', 'Loại 3', '1 tuần', 'Đạt', 'Không rõ nguồn gốc', 'Bảo quản mát 5-10°C', 'Không phát hiện vi sinh gây hại'),
(23, 'Mì Trứng Cao Cấp', 350000, 'BunGao5.jpg', 'Màu sắc: Đen', 4, 12, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0, 4, 'Hàn Quốc', 'Không sử dụng', 'Đạt chuẩn VietGAP', '2 tuần', 'Đang xét nghiệm', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Đạt chuẩn vi sinh'),
(24, 'Nui Lúa Mạch', 450000, 'BunGao6.jpg', 'Màu sắc: Xanh ghi đá\r\n\r\n', 4, 4, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0, 1, 'Việt Nam', 'Vô cơ', 'Loại 1', '1 tuần', 'Không đạt', 'Hợp pháp', 'Nhiệt độ phòng', 'Đạt chuẩn vi sinh'),
(25, 'QUẦN ÂU KẺ CARO NAM\r\n', 375000, 'QuanTay1.jpg', 'Màu sắc: Kẻ Ghi khói', 5, 16, 50, 0, '2021-05-13 02:11:49', '2021-05-13 02:11:49', 0, 2, 'Việt Nam', 'Vô cơ', 'Loại 3', '1 tháng', 'Không đạt', 'Không rõ nguồn gốc', 'Nhiệt độ phòng', 'Đạt chuẩn vi sinh'),
(26, 'QUẦN DÀI KẺ DÁNG SLIM NAM\r\n', 337000, 'QuanTay2.jpg', 'Màu sắc: Kẻ Nâu socola\r\n\r\n', 5, 7, 34, 16, '2021-05-13 02:26:46', '2021-05-13 02:26:46', 0, 1, 'Hàn Quốc', 'Không sử dụng', 'Loại 2', '1 tuần', 'Đạt', 'Không rõ nguồn gốc', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(27, 'QUẦN ÂU NAM DÁNG SLIM NAM\r\n', 254000, 'QuanTay3.jpg', 'Màu sắc: Ghi khói\r\n\r\n', 5, 7, 44, 6, '2021-05-13 02:26:46', '2021-05-13 02:26:46', 0, 1, 'Mỹ', 'Không sử dụng', 'Đạt chuẩn VietGAP', '10 ngày', 'Không đạt', 'Hợp pháp', 'Đông lạnh -18°C', 'Phát hiện E.coli'),
(28, 'QUẦN TÂY DÀI ỐNG SUÔNG KÉO KHÓA NỮ\r\n', 500000, 'QuanTay4.jpg', 'Màu sắc: Trắng\r\n\r\n', 5, 8, 48, 2, '2021-05-13 02:31:10', '2021-05-13 02:31:10', 0, 3, 'Mỹ', 'Hữu cơ sinh học', 'Loại 3', '1 tuần', 'Không đạt', 'Không rõ nguồn gốc', 'Nhiệt độ phòng', 'Không phát hiện vi sinh gây hại'),
(29, 'QUẦN TÂY SUÔNG CHIẾT LY NỮ\r\n', 450000, 'QuanTay5.jpg', 'Màu sắc: Ghi khói\r\n\r\n', 5, 8, 47, 3, '2021-05-13 02:31:10', '2021-05-13 02:31:10', 0, 3, 'Thái Lan', 'Vô cơ', 'Loại 3', '10 ngày', 'Không đạt', 'Hợp pháp', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(30, 'QUẦN TÂY ỐNG SUÔNG HỌA TIẾT KẺ NỮ\r\n', 350000, 'QuanTay6.jpg', 'Màu sắc: Kẻ Đen\r\n\r\n', 5, 10, 50, 0, '2021-05-13 02:44:00', '2021-05-13 02:44:00', 0, 5, 'Thái Lan', 'Hữu cơ', 'Loại 1', '1 tháng', 'Đạt', 'Hợp pháp', 'Nhiệt độ phòng', 'Phát hiện E.coli'),
(31, 'QUẦN TÂY NAM KHAKI DÁNG SLIM\r\n', 360000, 'QuanKaKi1.jpg', 'Màu sắc: Be vàng\r\n\r\n', 6, 10, 48, 2, '2021-05-13 02:44:00', '2021-05-13 02:44:00', 0, 3, 'Thái Lan', 'Hữu cơ', 'Loại 3', '10 ngày', 'Đạt', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Phát hiện E.coli'),
(32, 'QUẦN TÂY NAM KHAKI DÂY KÉO RÚT\r\n', 230000, 'QuanKaKi2.jpg', 'Màu sắc: Đen\r\n\r\n', 6, 15, 50, 0, '2021-05-13 02:46:26', '2021-05-13 02:46:26', 0, 1, 'Thái Lan', 'Hữu cơ', 'Đạt chuẩn VietGAP', '1 tháng', 'Đạt', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Phát hiện E.coli'),
(33, 'QUẦN TÂY NAM KHAIKI GẤU BO\r\n', 187000, 'QuanKaKi3.jpg', 'Màu sắc: Xanh tím than\r\n\r\n', 6, 11, 49, 1, '2021-05-13 02:46:26', '2021-05-13 02:46:26', 0, 3, 'Việt Nam', 'Hữu cơ', 'Đạt chuẩn VietGAP', '2 tuần', 'Không đạt', 'Giả mạo giấy tờ', 'Bảo quản mát 5-10°C', 'Phát hiện E.coli'),
(34, 'QUẦN KAKI BAGGY DÂY LƯNG THẮT NƠ NỮ\r\n', 450000, 'QuanKaKi4.jpg', 'Màu sắc: Hồng nhạt\r\n\r\n', 6, 13, 49, 1, '2021-05-13 02:48:48', '2021-05-13 02:48:48', 0, 1, 'Mỹ', 'Hữu cơ', 'Loại 1', '2 tuần', 'Đạt', 'Không rõ nguồn gốc', 'Đông lạnh -18°C', 'Đạt chuẩn vi sinh'),
(35, 'QUẦN KAKI BAGGY VIỀN CHỈ ĐEN NỮ\r\n', 200000, 'QuanKaKi5.jpg', 'Màu sắc: Be', 6, 16, 46, 4, '2021-05-13 02:48:48', '2021-05-13 02:48:48', 0, 5, 'Trung Quốc', 'Vô cơ', 'Loại 3', '1 tháng', 'Đang xét nghiệm', 'Giả mạo giấy tờ', 'Đông lạnh -18°C', 'Không phát hiện vi sinh gây hại'),
(36, 'QUẦN KAKI BAGGY PHỐI ĐAI NỮ\r\n', 500000, 'QuanKaKi6.jpg', 'Màu sắc: Trắng\r\n\r\n', 6, 14, 42, 8, '2021-05-13 02:52:03', '2021-05-13 02:52:03', 0, 3, 'Việt Nam', 'Không sử dụng', 'Loại 1', '1 tuần', 'Đang xét nghiệm', 'Hợp pháp', 'Đông lạnh -18°C', 'Không phát hiện vi sinh gây hại'),
(56, 'Cà Chua\r\n', 490000, 'Rau4.jpg', 'Màu sắc: Cam đỏ\r\n\r\n', 2, 13, -10, 13, '2021-04-15 10:53:07', '0000-00-00 00:00:00', 7, 5, 'Hàn Quốc', 'Hữu cơ sinh học', 'Loại 1', '10 ngày', 'Đạt', 'Hợp pháp', 'Bảo quản mát 5-10°C', 'Không phát hiện vi sinh gây hại');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_quyen` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_order`
--

CREATE TABLE `status_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_product`
--

CREATE TABLE `status_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoang`
--

CREATE TABLE `taikhoang` (
  `trang_thai` tinyint(4) NOT NULL,
  `id_quyen` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoang`
--

INSERT INTO `taikhoang` (`trang_thai`, `id_quyen`, `username`, `pass`, `fullname`) VALUES
(0, 1, 'huynhdinhphuc', 'huynhdinhphuc123', 'Huynh Dinh Phuc'),
(0, 3, 'nhanvien', 'nhanvien', 'nhan vien'),
(0, 2, 'nhanvien10', '123', 'sp13'),
(0, 2, 'quanly', 'admin', 'quanly'),
(0, 6, 'vbm', 'admin', 'nv2'),
(0, 4, 'VoVanNhi', '123', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_tl` varchar(191) NOT NULL,
  `tong_sp` int(11) NOT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngay_sua` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`id`, `ten_tl`, `tong_sp`, `ngay_tao`, `ngay_sua`) VALUES
(1, 'Trái Cây', 160, '2021-04-15 10:23:25', '2021-04-15 10:23:25'),
(2, 'Rau Hữu Cơ', 207, '2021-04-15 10:24:24', '2021-04-15 10:24:24'),
(3, 'Thực Phẩm', 239, '2021-04-15 10:24:56', '2021-04-15 10:24:56'),
(4, 'Bún-Gạo-Đậu', 299, '2021-04-15 10:25:25', '2021-04-15 10:25:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_nongdan` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`),
  ADD KEY `cthoadon_ibfk_1` (`id_hoadon`);

--
-- Chỉ mục cho bảng `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `ctphieunhap_ibfk_1` (`id_phieunhap`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `function_permission`
--
ALTER TABLE `function_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_permission` (`id_permission`),
  ADD KEY `id_function` (`id_function`);

--
-- Chỉ mục cho bảng `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsp_ibfk_1` (`id_sp`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Chỉ mục cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Chỉ mục cho bảng `phuongthucvanchuyen`
--
ALTER TABLE `phuongthucvanchuyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyendahmuc`
--
ALTER TABLE `quyendahmuc`
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nha_cc` (`id_nha_cc`),
  ADD KEY `id_the_loai` (`id_the_loai`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Chỉ mục cho bảng `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_product`
--
ALTER TABLE `status_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoang`
--
ALTER TABLE `taikhoang`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_quyen` (`id_quyen`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `function`
--
ALTER TABLE `function`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `function_permission`
--
ALTER TABLE `function_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinhanhsp`
--
ALTER TABLE `hinhanhsp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phuongthucvanchuyen`
--
ALTER TABLE `phuongthucvanchuyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `status_product`
--
ALTER TABLE `status_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `function_permission`
--
ALTER TABLE `function_permission`
  ADD CONSTRAINT `function_permission_ibfk_1` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `function_permission_ibfk_2` FOREIGN KEY (`id_function`) REFERENCES `function` (`id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `khachhang` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
