-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2019 lúc 05:18 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vietpeacetravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` mediumint(9) NOT NULL,
  `parent` int(5) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu` tinyint(1) NOT NULL,
  `sort` int(2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `type`, `parent`, `name`, `alias`, `description`, `content`, `image`, `menu`, `sort`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Destinations', 'destinations', '', NULL, NULL, 2, 1, 1, 1, '2019-04-26 08:12:04', '2019-04-27 00:27:31'),
(2, 0, 0, 'Tours', 'tours', '', NULL, NULL, 2, 2, 1, 1, '2019-04-26 16:07:03', '2019-04-27 00:15:34'),
(3, 0, 0, 'Travel Guide', 'travel-guide', '', NULL, NULL, 2, 3, 1, 1, '2019-04-27 00:31:05', '2019-04-27 00:38:56'),
(4, 1, 1, 'Vietnam Destinations', 'vietnam-destinations', 'Voted as a favourite destination in 2016, Vietnam is becoming as an attractive destination in Asia thanks to magnificent natural scenery, delicious foods, rich culture, white sandy beaches. The must see places in Vietnam are Hanoi, Halong Bay, Sapa valleys, Tam Coc caves, Trang An grottoes, Phong Nha, Hue ancient capital, Hoi An ancient town, Nha Trang, Mui Ne, Ho Chi Minh City, Cu Chi tunnels, Mekong delta, Phu Quoc island. Vietnam holiday is diverse and suitable for everyone and any style of travel.', NULL, 'public/uploads/images/201905/GWmK6aAy3t.jpg', 0, 1, 1, 1, '2019-04-27 00:32:05', '2019-05-03 14:38:34'),
(6, 1, 1, 'Lao Destinations', 'lao', NULL, NULL, NULL, 0, 2, 1, 1, '2019-04-27 00:37:56', '2019-05-02 14:53:23'),
(7, 2, 2, 'Vietnam Tours', 'vietnam', NULL, NULL, NULL, 0, 0, 1, 1, '2019-04-27 00:39:49', '2019-05-02 14:53:27'),
(8, 2, 2, 'Lao Tours', 'lao', NULL, NULL, NULL, 0, 2, 1, 1, '2019-04-27 00:40:24', '2019-05-02 14:53:33'),
(9, 0, 1, 'Cambodia Destinations', 'cambodia-destinations', 'test', NULL, NULL, 0, 3, 1, 1, '2019-05-02 14:54:10', '2019-05-03 14:06:16'),
(10, 0, 0, 'Hotels', 'hotels', NULL, NULL, NULL, 3, 5, 1, 1, '2019-05-03 13:36:39', '2019-05-03 13:36:39'),
(11, 1, 4, 'Binh Minh', 'binh-minh', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 14:28:37', '2019-05-03 14:28:37'),
(12, 1, 4, 'Hội An', 'hoi-an', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 14:41:31', '2019-05-03 14:59:06'),
(13, 1, 4, 'Hà Nội', 'ha-noi', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 14:42:42', '2019-05-03 14:59:43'),
(14, 0, 2, 'Cambodia', 'cambodia', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:04:50', '2019-05-03 15:04:50'),
(15, 2, 7, 'Vietname classic tours', 'vietname-classic-tours', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:05:33', '2019-05-03 15:05:33'),
(16, 0, 3, 'Vietname Travel Guide', 'vietname-travel-guide', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:06:28', '2019-05-03 15:06:28'),
(17, 0, 10, 'Vietnam Hotels', 'vietnam-hotels', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:06:48', '2019-05-03 15:06:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `alias`, `description`, `image`, `sort`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', '', '', 1, 1, 1, '2019-04-26 13:49:03', '2019-04-26 13:49:03'),
(2, 'Tours', '', '', '', 2, 1, 1, '2019-04-26 13:49:21', '2019-04-26 13:49:21'),
(3, 'Hotels', '', '', '', 3, 1, 1, '2019-04-26 13:49:57', '2019-04-26 13:49:57'),
(4, 'Transfers', '', '', '', 4, 1, 1, '2019-04-26 13:50:28', '2019-04-26 13:50:28'),
(5, 'Restaurants', 'Restaurants', 'Restaurants', '', 5, 1, 1, '2019-04-26 13:51:01', '2019-04-26 13:51:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `cate_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `conntent` longtext COLLATE utf8_unicode_ci,
  `image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewed` mediumint(9) NOT NULL,
  `vote` mediumint(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'manager', NULL, '2018-06-01 04:05:47', '0000-00-00 00:00:00'),
(2, 'employee', NULL, '2018-06-01 04:05:47', '0000-00-00 00:00:00'),
(3, 'guest', NULL, '2018-06-01 04:05:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` tinyint(5) NOT NULL,
  `role_id` tinyint(2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 1, 1, '2019-04-22 13:52:24', '2018-12-18 06:26:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Binh Minh', 'minhnb.it@gmail.com', NULL, '$2y$10$HM9EuFScf/dCcwzscmeiG.CEW7QxwQ67a07Geo5L3qkelhxh7Mz.O', NULL, '2019-04-22 06:46:05', '2019-04-22 06:46:05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
