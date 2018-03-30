-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 30, 2018 lúc 11:40 AM
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
-- Cơ sở dữ liệu: `sega`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `status`, `password`, `level`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(1, 'admin', 'Khoa', 'admin@gmail.com', 1, '3ad99e1368037aba797e658f266c662e483b6418dddc756b56711d0be517e170', 0, 1521969267, 1521969267, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `status` enum('new','open','pending','solved') COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `assign` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `solved_at` int(11) DEFAULT NULL,
  `pending_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id_bill` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `none_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `none_name`, `create_at`, `update_at`, `create_by`, `update_by`) VALUES
(9, 'Ô Long', 'o-long-1522402626', 1522402626, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT NULL,
  `create_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `none_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'tea-product.png',
  `create_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_create_by` (`create_by`),
  ADD KEY `id_user_assign` (`assign`),
  ADD KEY `id_priority` (`priority`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD KEY `id_bill_foreign_key` (`id_bill`),
  ADD KEY `id_product_foreign_key` (`id_product`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_foreign_key` (`create_by`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category_forign_key` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `id_priority` FOREIGN KEY (`priority`) REFERENCES `priority` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_user_assign` FOREIGN KEY (`assign`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `id_user_create_by` FOREIGN KEY (`create_by`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `id_bill_foreign_key` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product_foreign_key` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `id_user_foreign_key` FOREIGN KEY (`create_by`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `id_category_forign_key` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
