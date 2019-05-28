-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2019 lúc 03:17 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manus`
--

CREATE TABLE `manus` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manus`
--

INSERT INTO `manus` (`id`, `name`, `img`) VALUES
(1, 'Samsung', 'tb1.jpg.png'),
(2, 'Applee', 'qweqwe.png'),
(3, 'Oppo', 'qweqwe (2).png'),
(9, 'Canon', 'canon.png'),
(7, 'Intel', 'wwerew.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2019_05_12_144247_create_session_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(10) NOT NULL,
  `manu_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img`, `type_id`, `manu_id`, `created_at`, `updated_at`) VALUES
(1, 'dien thoai samsung a8', 2050, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '636523986341921012_1.jpg', 1, 1, '2018-12-11 02:52:51', '2018-12-11 02:53:07'),
(3, 'lenovo i3', 2590, 'hính thức trình làng với khả năng selfie kép, cùng màn hình tỷ lệ 18.5: 9 cho trải nghiệm xem rộng hơn. Với thiết kế hiện đại, hứa hẹn bộ đôi sản phẩm này sẽ tiếp bước sự thành công của lenovo tại thị trường Việt Nam.', '3.jpg', 1, 1, '2018-12-11 02:52:51', '2018-12-11 02:53:07'),
(4, 'mobistart v10', 250, 'hính thức trình làng với khả năng selfie kép, cùng màn hình tỷ lệ 18.5: 9 cho trải nghiệm xem rộng hơn. Với thiết kế hiện đại, hứa hẹn bộ đôi sản phẩm này sẽ tiếp bước sự thành công của lenovo tại thị trường Việt Nam.', '4.jpg', 1, 1, '2018-12-11 02:52:51', '2018-12-11 02:53:07'),
(5, 'dien thoai samsung a7', 20501, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '6.jpg', 1, 1, '2018-12-11 02:52:51', '2018-12-11 02:53:07'),
(38, 'Samsung A9 2018', 1990000, 'qweqw', 'a92018.png', 1, 1, '2019-05-26 23:13:00', '2019-05-26 23:13:00'),
(26, 'Laptop Legion Y9', 12312, 'wqdqwd', 'ewqwewee.jpg', 3, 1, '2018-12-17 20:43:23', '2019-05-26 19:17:42'),
(30, 'Laptop Gaming MSI i7', 312312, 'weqw', 'adas.png', 3, 7, '2018-12-24 17:33:37', '2019-05-26 23:13:38'),
(31, 'Apple IMac IPhone MacBook', 231231, 'qweqwe', 'sqdqwdqw.jpeg', 3, 2, '2019-05-26 19:19:01', '2019-05-26 23:16:09'),
(39, 'Laptop Intel RFB', 13123, 'qweqwe', 'qwa.jpg', 3, 7, '2019-05-26 23:17:13', '2019-05-26 23:17:13'),
(40, 'Laptop Royal G5', 224411, 'mô tả ở đây', 'aaaaaaaaa.jpg', 3, 2, '2019-05-26 23:18:44', '2019-05-26 23:18:44'),
(41, 'Iphone X', 123123, 'qweqwe', 'iphone-x-64gb-21-600x600.jpg', 1, 2, '2019-05-26 23:23:00', '2019-05-26 23:23:00'),
(42, 'Samsung galaxy Tab 2', 123123, 'qweqwe', 'adqwdqdq.jpg', 9, 1, '2019-05-26 23:23:52', '2019-05-26 23:23:52'),
(43, 'Samsung Galaxy Tab4', 123123, 'qewq', 'tab4.jpg', 9, 1, '2019-05-26 23:24:41', '2019-05-26 23:24:41'),
(44, 'PC Gaming 8Pack Supernova', 123123123, 'mô tả', 'sxxxxx.jpg', 13, 7, '2019-05-26 23:25:40', '2019-05-26 23:25:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `name`, `img`) VALUES
(1, 'Smartphone', 'smartphone.jpg'),
(3, 'Laptop', 'c05949225.png'),
(9, 'Tablet', 'tablet.jpg'),
(13, 'PC', 'pc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '2',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Duy Huynh', 'admin@gmail.com', '$2y$10$enByQUTlS7CNY6hz.mQUVOuOSh30waBdriX.WKFDbM5Zge/voU2pC', 'Cjh2hJl6f96oKGHb4HxWlHrOLOPlnZSZaWLDAnKjvgo7cw4eJ0hmNtPch04i', 1, '2018-12-20 17:43:41', '2019-05-26 23:25:44'),
(2, 'thao', 'thao@hotmail.com', '$2y$10$fc3hqXFN8TTtqhlCNqCNP.R6KmvDOzQ3nltLNLY9Uq4BnaOqLqL5O', 'LEhsHf5oNo7M2WwJgLghvo4NvfYkYRnpSvU51P8L', 2, '2018-12-20 18:45:21', '2018-12-24 18:28:49'),
(3, 'Ha Phi', 'phinguyen@gmail.com', '$2y$10$vEsQUEQwOuwUTJ4mDsogsuZfZtJKjtzV3KpQNhJAM3mLeZ4k.Kkp6', 'LEhsHf5oNo7M2WwJgLghvo4NvfYkYRnpSvU51P8L', 2, '2018-12-24 18:08:21', '2018-12-24 18:08:21');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manus`
--
ALTER TABLE `manus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`type_id`),
  ADD KEY `fk_manu` (`manu_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manus`
--
ALTER TABLE `manus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
