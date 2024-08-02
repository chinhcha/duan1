-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 12, 2024 lúc 08:08 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_bl` int(11) NOT NULL,
  `comment` text NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_tk` int(11) NOT NULL,
  `ngaybinhluan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id_bl`, `comment`, `id_sp`, `id_tk`, `ngaybinhluan`) VALUES
(1, 'Hàng toẹt vời', 1, 8, '2023-12-03 17:36:00'),
(13, 'tamndshbs', 1, 1, '0000-00-00 00:00:00'),
(14, 'hàng tệ', 1, 1, '2023-12-03 19:09:15'),
(15, 'Hàng đẹp như mặt Phương vậy', 2, 1, '2023-12-03 19:10:23'),
(17, 'hhahahahahhaha', 1, 1, '2023-12-03 22:54:39'),
(19, 'đăng ảnh vớ vẩn gì vậy', 21, 1, '2023-12-04 00:20:07'),
(20, 'Bạn Toản giỏi quá trời!!!!', 1, 7, '2023-12-04 00:49:39'),
(21, 'hay ho', 3, 1, '2023-12-05 10:52:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--

CREATE TABLE `chitiet_donhang` (
  `id_ctdon` int(11) NOT NULL,
  `id_tk` int(10) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `dia_chi` text NOT NULL,
  `thoi_gian` varchar(50) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 0,
  `thanh_toan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id_ctdon`, `id_tk`, `full_name`, `phone`, `dia_chi`, `thoi_gian`, `thanh_tien`, `trang_thai`, `thanh_toan`) VALUES
(18, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '15:12:48 07-12-2023', 2525000, 0, 'Thanh toán online'),
(21, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '15:12:48 07-12-2023', 2525000, 0, 'Thanh toán online'),
(22, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '15:12:44 07-12-2023', 2525000, 0, 'Thanh toán khi nhận hàng'),
(23, 7, 'hahhahahaha hâ', 436, 'sdfhdgh', '15:12:50 07-12-2023', 2325000, 0, 'Tiền mặt'),
(25, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '22:12:54 07-12-2023', 449250, 0, 'Thanh toán online'),
(26, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '22:12:36 07-12-2023', 449250, 0, 'Thanh toán online'),
(27, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '22:12:42 07-12-2023', 587250, 0, 'Tiền mặt'),
(28, 1, 'Nguyễn Đức Tâm', 987654324, 'gggfdf', '01:12:52 08-12-2023', 2600000, 0, 'Thanh toán online');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `name_color` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id_color`, `name_color`, `color`) VALUES
(2, 'Vàng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `name_dm` varchar(255) NOT NULL,
  `trang_thai` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `name_dm`, `trang_thai`) VALUES
(1, 'Giày Thể Thao', 0),
(2, 'Giày Nike', 0),
(4, 'Giày Tây nam', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don` int(11) NOT NULL,
  `id_ctd` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mau_sac` varchar(50) NOT NULL,
  `kich_co` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_don`, `id_ctd`, `id_sp`, `so_luong`, `mau_sac`, `kich_co`) VALUES
(1, 18, 1, 2, '', '0'),
(2, 21, 1, 2, 'màu trắng', '40'),
(3, 22, 1, 2, 'màu trắng', '40'),
(4, 22, 13, 2, 'màu trắng', '40'),
(5, 23, 1, 1, 'màu trắng', '40'),
(6, 23, 13, 2, 'màu trắng', '40'),
(7, 25, 14, 1, 'màu trắng', '40'),
(8, 27, 3, 1, 'màu trắng', '40'),
(9, 28, 21, 2, 'màu trắng', '40'),
(10, 28, 15, 2, 'màu trắng', '40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idsp` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `namesp` varchar(150) NOT NULL,
  `soluong` int(11) NOT NULL,
  `color_product` int(11) NOT NULL,
  `size_product` int(11) NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_sp`
--

CREATE TABLE `img_sp` (
  `id_img` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `img_sp`
--

INSERT INTO `img_sp` (`id_img`, `id_sp`, `img_url`) VALUES
(4, 21, 'giay_tay_nam.jpg'),
(5, 21, 'giay_tay_nam2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `image_sp` varchar(300) NOT NULL,
  `giam_gia` int(2) DEFAULT 0,
  `gia` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `ngay_nhap` date NOT NULL,
  `view` int(11) DEFAULT 0,
  `gioi_tinh` tinyint(4) NOT NULL,
  `id_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `name_sp`, `image_sp`, `giam_gia`, `gia`, `mo_ta`, `ngay_nhap`, `view`, `gioi_tinh`, `id_dm`) VALUES
(1, 'Giày thể thao', 'giay-the-thao-nam-bn0068.jpg.webp', 0, 200000, 'giay-the-thao-nam', '2023-11-14', 0, 1, 1),
(2, 'Giày thể thao hot ', 'giay_the_thao_(2).webp', 0, 3750000, 'giay_the_thao_(2)', '2023-11-27', 0, 0, 1),
(3, 'Giày nike hot trend', 'nike4.webp', 13, 675000, 'Giày nike hot trend', '2023-11-22', 13, 1, 2),
(13, 'Giày nike đẹp', 'nike.webp', 15, 1250000, 'Giày nike đẹp', '2023-11-14', 0, 1, 2),
(14, 'Giày nike đen- trắng đẹp', 'nike2.webp', 25, 599000, 'Giày nike đen- trắng đẹp', '2023-11-14', 0, 1, 2),
(15, 'Giày tây nam công sở Oxford', 'Giày-tây-nam-công-sở-Oxford.jpg', 0, 1200000, 'Giày-tây-nam-công-sở-Oxford', '2023-11-14', 0, 0, 4),
(16, 'Giày vans \r\n', 'giay_vans.jpg', 35, 555000, 'Giày vans \r\n', '2023-11-14', 14, 0, 1),
(21, 'Giày nam thời trang', 'giay_tay_nam.jpg', 0, 100000, 'giay_tay_nam ', '2023-11-15', 20, 0, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_bienthe`
--

CREATE TABLE `sanpham_bienthe` (
  `id_spbt` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `trang_thai` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `name_size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `name_size`) VALUES
(1, '29'),
(2, '30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_tk` int(11) NOT NULL,
  `name_tk` varchar(150) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `image_tk` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `chucvu` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(150) NOT NULL,
  `phone` int(11) NOT NULL,
  `dia_chi` text NOT NULL,
  `lock` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_tk`, `name_tk`, `pass`, `image_tk`, `full_name`, `chucvu`, `email`, `phone`, `dia_chi`, `lock`) VALUES
(1, 'tam', '123456', 'anh111.jpg', 'Nguyễn Đức Tâm', 0, 'tam@gmail.com', 987654324, 'gggfdf', 0),
(5, 'hsag', '132456', NULL, '', 0, 'ductam19082k4@gmail.com', 0, '', 0),
(6, 'dfh', '132456', NULL, '', 0, 'ductam19082k4@gmail.com', 0, '', 0),
(7, 'ahhahaha', '11111', NULL, 'hahhahahaha hâ', 0, 'ductam19082k4@gmail.com', 436, 'sdfhdgh', 0),
(8, 'Nguyễn Đức Tâm', '12345', NULL, 'Nguyễn Đức Tâm', 0, 'ductam19082k4@gmail.com', 868315329, 'Phú Thọ', 0),
(10, 'admin', '12345', NULL, '', 1, '', 0, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_bl`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_tk` (`id_tk`);

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id_ctdon`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_ctd` (`id_ctd`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsp` (`idsp`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `img_sp`
--
ALTER TABLE `img_sp`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD PRIMARY KEY (`id_spbt`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_size` (`id_size`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id_ctdon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `img_sp`
--
ALTER TABLE `img_sp`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  MODIFY `id_spbt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`id_tk`) REFERENCES `taikhoan` (`id_tk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`id_ctd`) REFERENCES `chitiet_donhang` (`id_ctdon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id_sp`),
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `taikhoan` (`id_tk`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD CONSTRAINT `sanpham_bienthe_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`),
  ADD CONSTRAINT `sanpham_bienthe_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
