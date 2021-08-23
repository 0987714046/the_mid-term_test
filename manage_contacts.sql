-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 23, 2021 lúc 09:20 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_contacts`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `agency_directory`
--

CREATE TABLE `agency_directory` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `id_affiliated_units` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `agency_directory`
--

INSERT INTO `agency_directory` (`id`, `name`, `address`, `phone`, `email`, `website`, `id_affiliated_units`) VALUES
(1, 'Khoa Công Nghệ Thông Tin', 'Tầng 2 tòa C1 175 Tây Sơn Hà nội', 24356556, 'vpkcntt@tlu.edu.vn', 'http://cse.tlu.edu.vn', NULL),
(2, 'Phòng Đào Tạo', 'tầng 1 Nhà A4 175 Tây Sơn', 123435, 'pdt@tlu.edu.vn', 'http://pdt.edu.vn', NULL),
(3, 'Bộ Môn Hệ Thống Thông tin', 'p201 tòa C1 175 Tây Sơn Hà Nội', 123456, 'httt@tlu.edu.vn', 'http://httt@tlu.edu.vn', 1),
(4, 'Trạm Y Tế', '1 Nguyễn Trãi Thanh Xuân Hà Nội', 114, 'tyt@gmail.com', 'http://tramyte.vn', NULL),
(5, 'Phòng Quản Trị', 'Tòa A1 175 Tây Sơn  ', 436576823, 'pqt@tlu.vn', 'http://pqt.com.vn', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_directory`
--

CREATE TABLE `personal_directory` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `id_agency` int(10) UNSIGNED NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `personal_directory`
--

INSERT INTO `personal_directory` (`id`, `full_name`, `email`, `phone`, `position`, `id_agency`, `address`) VALUES
(1, 'Nguyễn Thanh Tùng', 'tung@tlu.edu.vn', 241345465, 'Trưởng khoa', 1, 'P204'),
(2, 'Đăng Thị Thu Hiền', 'hien@tlu.edu.vn', 352543643, 'Phó Khoa', 1, 'P 206'),
(3, 'Nguyễn Văn Cường', 'cuong@tlu.edu.vn', 2424324, 'Trưởng Bộ Môn', 3, 'P 222'),
(4, 'Pham Thị Hiền', 'hhhh@tlu.edu.vn', 241535, 'Phó Bộ Môn', 3, 'P333');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pass_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `pass_word`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `agency_directory`
--
ALTER TABLE `agency_directory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_affiliated_units` (`id_affiliated_units`);

--
-- Chỉ mục cho bảng `personal_directory`
--
ALTER TABLE `personal_directory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agency` (`id_agency`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `personal_directory`
--
ALTER TABLE `personal_directory`
  ADD CONSTRAINT `personal_directory_ibfk_1` FOREIGN KEY (`id_agency`) REFERENCES `agency_directory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
