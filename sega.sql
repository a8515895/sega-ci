-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 27, 2018 lúc 12:55 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `id_teacher`, `username`, `password`, `level`, `img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$rb559TOAkTXl94PjOryL5.BQRhauPXHoqGUoOybNVqb1/8RPyhSqW', 0, '', 'fgRngp8aUAv1hCExm2y6C0bC8yieNiWrW2FMMmykpiqyt0dRReUB2wOAnka1', '2018-03-15 07:16:21', '0000-00-00 00:00:00'),
(2, 2, 'admin2', '$2y$10$rb559TOAkTXl94PjOryL5.BQRhauPXHoqGUoOybNVqb1/8RPyhSqW', 0, '', '', '2018-03-15 07:16:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anwser_detail`
--

CREATE TABLE `anwser_detail` (
  `id_exam` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `anwserTrue` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lớp 12', '2018-03-15 17:00:00', '0000-00-00 00:00:00'),
(2, 'Lớp 11', '2018-03-15 17:00:00', '0000-00-00 00:00:00'),
(3, 'Lớp 9', '2018-03-15 17:00:00', '0000-00-00 00:00:00'),
(4, 'Lớp 8', '2018-03-15 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `avatar`, `username`, `password`) VALUES
(1, 'KH A', '', '', ''),
(2, 'KH B', '', '', ''),
(3, 'KH C', '', '', ''),
(4, 'KH D', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam`
--

INSERT INTO `exam` (`id`, `id_teacher`, `id_subject`, `name`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'TEST 1', 1, 0, '2018-03-17 04:14:00', '0000-00-00 00:00:00'),
(2, 1, 1, 'TEST 2', 0, 0, '2018-03-17 04:14:04', '0000-00-00 00:00:00'),
(12, 1, 1, 'TEST 5', 2, 0, '2018-03-19 09:20:01', '2018-03-19 09:20:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_detail`
--

CREATE TABLE `exam_detail` (
  `id_exam` int(11) NOT NULL,
  `id_teacer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `code` int(11) NOT NULL DEFAULT '1',
  `sort` int(11) NOT NULL,
  `point` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_detail`
--

INSERT INTO `exam_detail` (`id_exam`, `id_teacer`, `id_question`, `code`, `sort`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 2, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 3, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 4, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 5, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 6, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 7, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 8, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 9, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 10, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 11, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 12, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 13, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 14, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 15, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 16, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 17, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 18, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 19, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00'),
(1, 1, 20, 0, 0, 0.2, '2018-03-16 03:31:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_level`
--

CREATE TABLE `exam_level` (
  `id` int(11) NOT NULL,
  `name` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_level`
--

INSERT INTO `exam_level` (`id`, `name`) VALUES
(0, 'Tất cả'),
(1, 'Rất dễ'),
(2, 'Dễ'),
(3, 'Vừa'),
(4, 'Khó'),
(5, 'Rất khó');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orther_name` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `orther_name`, `price`) VALUES
(1, 'SP A', '', '500000'),
(2, 'SP B', '', '350000'),
(3, 'SP D', '', '500000'),
(4, 'SP E', '', '350000'),
(5, 'SP F', '', '500000'),
(6, 'SP FFE', '', '350000'),
(7, 'SP AB', '', '500000'),
(8, 'SP BC', '', '350000'),
(9, 'SP DDE', '', '500000'),
(10, 'SP BEE', '', '350000'),
(11, 'SP FAB', '', '500000'),
(12, 'SP CAF', '', '350000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id`, `id_teacher`, `id_class`, `id_subject`, `title`, `level`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, '1+1 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(2, 1, 4, 1, '2+2 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(3, 1, 4, 1, '5+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(4, 1, 4, 1, '6+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(5, 1, 4, 1, '12+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(6, 1, 4, 1, '5+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(7, 1, 4, 1, '8+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(8, 1, 4, 1, '3+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(9, 1, 4, 1, '13+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(10, 1, 4, 1, '1+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(11, 1, 4, 1, '5+7 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(12, 1, 4, 1, '8+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(13, 1, 4, 1, '3+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(14, 1, 4, 1, '6+4 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(15, 1, 4, 1, '2+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(16, 1, 4, 1, '61+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(17, 1, 4, 1, '3+88 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(18, 1, 4, 1, '7+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(19, 1, 4, 1, '31+5 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00'),
(20, 1, 4, 1, '70+6 = ?', 1, '2018-03-16 04:01:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Toán', '2018-03-15 03:31:30', '0000-00-00 00:00:00'),
(2, 'Văn', '2018-03-15 03:31:30', '0000-00-00 00:00:00'),
(3, 'Anh', '2018-03-16 05:09:34', '0000-00-00 00:00:00'),
(4, 'Lý', '2018-03-16 05:09:34', '0000-00-00 00:00:00'),
(5, 'Hóa', '2018-03-16 05:09:43', '0000-00-00 00:00:00'),
(6, 'Sinh', '2018-03-16 05:09:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id`, `id_user`, `id_subject`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anh Khoa', '2018-03-16 05:10:10', '2018-03-14 17:00:00'),
(2, 2, 2, 'Anh Khoa 2', '2018-03-16 05:10:16', '2018-03-14 17:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `anwser_detail`
--
ALTER TABLE `anwser_detail`
  ADD PRIMARY KEY (`id_exam`,`id_question`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_id`,`product_id`,`customer_id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `exam_level`
--
ALTER TABLE `exam_level`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `exam_level`
--
ALTER TABLE `exam_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
