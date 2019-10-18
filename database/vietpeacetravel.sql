-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 10.220.52.253:3306
-- Thời gian đã tạo: Th10 18, 2019 lúc 11:00 AM
-- Phiên bản máy phục vụ: 5.7.19
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
(1, 0, 0, 'Destinations', 'destinations', '', NULL, NULL, 7, 1, 1, 1, '2019-04-26 08:12:04', '2019-04-27 00:27:31'),
(2, 0, 0, 'Tours', 'tours', '', NULL, NULL, 2, 2, 1, 1, '2019-04-26 16:07:03', '2019-04-27 00:15:34'),
(3, 0, 0, 'Travel Guide', 'travel-guide', '', NULL, NULL, 0, 3, 1, 1, '2019-04-27 00:31:05', '2019-04-27 00:38:56'),
(4, 1, 1, 'Vietnam Destinations', 'vietnam-destinations', '<p>Voted as a favourite destination in 2016, Vietnam is becoming as an attractive destination in Asia thanks to magnificent natural scenery, delicious foods, rich culture, white sandy beaches. The must see places in Vietnam are Hanoi, Halong Bay, Sapa valleys, Tam Coc caves, Trang An grottoes, Phong Nha, Hue ancient capital, Hoi An ancient town, Nha Trang, Mui Ne, Ho Chi Minh City, Cu Chi tunnels, Mekong delta, Phu Quoc island. Vietnam holiday is diverse and suitable for everyone and any style of travel.</p>', NULL, 'public/uploads/images/201910/2D1rsBxbIk.jpg', 0, 1, 1, 1, '2019-04-27 00:32:05', '2019-10-09 02:56:04'),
(6, 1, 1, 'Lao Destinations', 'lao', NULL, NULL, NULL, 0, 2, 1, 1, '2019-04-27 00:37:56', '2019-05-02 14:53:23'),
(7, 2, 2, 'Vietnam Tours', 'vietnam', NULL, NULL, NULL, 0, 0, 1, 1, '2019-04-27 00:39:49', '2019-05-02 14:53:27'),
(8, 2, 2, 'Lao Tours', 'lao', NULL, NULL, NULL, 0, 2, 1, 1, '2019-04-27 00:40:24', '2019-05-02 14:53:33'),
(9, 0, 1, 'Cambodia Destinations', 'cambodia-destinations', 'test', NULL, NULL, 0, 3, 1, 1, '2019-05-02 14:54:10', '2019-05-03 14:06:16'),
(10, 0, 0, 'Hotels', 'hotels', NULL, NULL, NULL, 3, 5, 1, 1, '2019-05-03 13:36:39', '2019-05-03 13:36:39'),
(12, 1, 4, 'Hội An', 'hoi-an', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 14:41:31', '2019-05-03 14:59:06'),
(13, 1, 4, 'Hà Nội', 'ha-noi', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 14:42:42', '2019-05-03 14:59:43'),
(14, 0, 2, 'Cambodia', 'cambodia', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:04:50', '2019-05-03 15:04:50'),
(15, 2, 7, 'Vietname classic tours', 'vietname-classic-tours', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:05:33', '2019-05-03 15:05:33'),
(16, 0, 3, 'Vietname Travel Guide', 'vietname-travel-guide', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:06:28', '2019-05-03 15:06:28'),
(17, 0, 10, 'Vietnam Hotels', 'vietnam-hotels', NULL, '', NULL, 0, 0, 1, 1, '2019-05-03 15:06:48', '2019-05-03 15:06:48'),
(18, 2, 7, 'Hà Nội - Hạ Long', 'ha-noi-ha-long', NULL, '', NULL, 0, 1, 1, 1, '2019-10-08 09:22:57', '2019-10-08 09:22:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `functions`
--

CREATE TABLE `functions` (
  `id` int(5) NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `param` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` smallint(4) NOT NULL,
  `sort` smallint(4) NOT NULL,
  `class` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked` tinyint(1) NOT NULL,
  `permissions` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `functions`
--

INSERT INTO `functions` (`id`, `name`, `url`, `param`, `parent`, `sort`, `class`, `blocked`, `permissions`, `updated_at`, `created_at`) VALUES
(1, 'Category', '#', NULL, 0, 1, 'menu-icon fa fa-book', 1, NULL, '2019-10-01 09:45:17', '2019-10-01 08:51:07'),
(2, 'Post', '#', NULL, 0, 2, 'fa-pencil-square-o', 1, NULL, '2019-10-01 09:45:27', '2019-10-01 08:52:52'),
(3, 'Settings', '#', NULL, 0, 6, 'fa-cogs', 1, NULL, '2019-10-01 09:45:37', '2019-10-01 08:53:15'),
(4, 'Sales Report', '#', NULL, 0, 5, 'fa-bar-chart-o', 1, NULL, '2019-10-01 09:04:50', '2019-10-01 09:04:50'),
(5, 'Route', 'get.dashboard.function.list', NULL, 3, 1, NULL, 1, '1|2', '2019-10-03 08:05:08', '2019-10-01 09:47:22'),
(6, 'Destinations', 'get.dashboard.category.list', '[\'alias\'=>\'destinations\']', 1, 1, 'fa-caret-right', 1, NULL, '2019-10-01 10:29:40', '2019-10-01 10:29:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(3) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
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

INSERT INTO `menu` (`id`, `name`, `alias`, `description`, `url`, `image`, `sort`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', '', NULL, '', 1, 1, 1, '2019-04-26 13:49:03', '2019-04-26 13:49:03'),
(2, 'Tours', '', '', NULL, '', 2, 1, 1, '2019-04-26 13:49:21', '2019-04-26 13:49:21'),
(3, 'Hotels', '', '', NULL, '', 4, 1, 1, '2019-04-26 13:49:57', '2019-04-26 13:49:57'),
(4, 'Transfers', '', '', NULL, '', 5, 1, 1, '2019-04-26 13:50:28', '2019-04-26 13:50:28'),
(5, 'Restaurants', 'Restaurants', 'Restaurants', NULL, '', 6, 1, 1, '2019-04-26 13:51:01', '2019-04-26 13:51:01'),
(6, 'About as', '', '', NULL, '', 9, 1, 1, '2019-10-08 08:03:36', '2019-10-08 08:03:36'),
(7, 'Destinations', 'Destinations', 'Destinations', NULL, '', 3, 1, 1, '2019-10-08 08:52:12', '2019-10-08 08:52:12');

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
-- Cấu trúc bảng cho bảng `m_config`
--

CREATE TABLE `m_config` (
  `id` smallint(4) NOT NULL,
  `code` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `data` json NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `user_id` smallint(5) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_config`
--

INSERT INTO `m_config` (`id`, `code`, `data`, `status`, `user_id`, `updated_at`, `created_at`) VALUES
(1, 'COMPANY', '{\"fax\": null, \"tax\": null, \"logo\": null, \"email\": \"minhnb.it@gmail.com\", \"phone\": \"09090909090\", \"slogan\": \"Vẻ đẹp bất tận, khám phá không tới hạn\", \"address\": \"Số 25 Hoàng Công Chất - Từ Liêm - Hà Nội\", \"company\": \"CÔNG TY DU LỊCH BÌNH ANH VIỆT\", \"contact\": \"Mr Tám\"}', 0, 1, '2019-10-09 08:23:01', '2019-10-09 08:23:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_slides`
--

CREATE TABLE `m_slides` (
  `id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name2` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` smallint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` tinyint(4) NOT NULL,
  `role_id` smallint(6) NOT NULL,
  `func_id` smallint(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `cate_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_number` smallint(5) DEFAULT '0',
  `unit_price` decimal(10,2) DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `full_trip` json DEFAULT NULL,
  `trip_faq` json DEFAULT NULL,
  `hotels` json DEFAULT NULL,
  `guide_transport` json DEFAULT NULL,
  `meals` json DEFAULT NULL,
  `gallery` json DEFAULT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `viewed` mediumint(9) NOT NULL,
  `vote` mediumint(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `cate_id`, `name`, `alias`, `day_number`, `unit_price`, `description`, `content`, `full_trip`, `trip_faq`, `hotels`, `guide_transport`, `meals`, `gallery`, `image`, `tags`, `viewed`, `vote`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '7|13', 'CT01: VIETNAM TOUR AT A GLANCE - 8 DAYS FROM HO CHI MINH', 'ct01:-vietnam-tour-at-a-glance-8-days-from-ho-chi-minh', 8, '635.00', '<p>This is private tour with a flexible schedule. There is no other traveler on the tour. You will have a private English speaking tour guide and a private air-conditioned vehicle in each destination. This is sample tour and can always be&nbsp;<strong>personalized</strong>&nbsp;to meet your personal needs and travel budget.</p>', '<p>What better way to get to view Vietnam at a glance than taking this&nbsp;<a href=\"https://www.vivutravel.com/vietnam-tours/vietnam-classic-tours\" target=\"_blank\"><strong>Vietnam classic tour</strong></a>? This tour takes you to every visitor&rsquo;s favorite destination; from Ho Chi Minh City to Mekong Delta to&nbsp;<a href=\"https://www.vivutravel.com/vietnam-travel-guide/things-to-do-in-vietnam/crawling-through-the-tunnels-of-cu-chi\" target=\"_blank\">Cu Chi Tunnels</a>&nbsp;to Ha Noi to Ha long Bay. These places are matched by a very few spots on this planet.</p>\r\n\r\n<p>Land at the capital city and get hauled along for the ride as the city breathes life and vivacity into the residents.&nbsp; Take a&nbsp;<a href=\"https://www.vivutravel.com/vietnam-travel-guide/vietnamese-food-and-drink/vietnamese-culinary\" target=\"_blank\"><strong>Vietnam culinary tour</strong></a>&nbsp;in the city and enjoy a blend of a variety of cooking techniques and flavor from pungent to mild as you dine in on traditional Vietnamese food. Wander through the timeless alleys of this Vietnam classic tour and get mesmerized by jaw dropping French architecture.</p>\r\n\r\n<p>Take a Vietnam history tour by going underground in Cu Chi tunnels to explore further the vast meandering underground tunnel built by guerilla fighters during the Vietnam War. Learn more about the Vietnam War, with the Vietnamese people refer to as the American War, in a Vietnamese point of view.</p>\r\n\r\n<p>Travel to the Mekong delta&nbsp; on a&nbsp;<strong>Vietnam culture tour</strong>&nbsp;and experience a different Vietnamese lifestyle of the communities living along the river. Watch the beautiful landscapes as the water move to the rhythm of the great Mekong. Take part in a shopping spree at Cai Rang floating market for fresh rice, vegetables and exotic fruits. Then take a flight to Hanoi city. Wander through the tree lines boulevards , visit the historical sites in the city&nbsp; and dine in on a different sumptuous meal.</p>\r\n\r\n<p>Travel to the aquatic landscapes and be taken aback by the Halong Bay. For a better view of Vietnam, Cannon Fort in Halong Bay is the place to be. From amazing panoramas of rolling jungles to the incredible aquatic landscapes and colorful tangles of fishing boats, it is the highlights of Vietnam on a spoon.</p>\r\n\r\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh City &ndash; Mekong Delta &ndash; Cu Chi Tunnels &ndash; Ha Noi &ndash; Ha Long Bay</p>\r\n\r\n<p><strong>Highlights:</strong>&nbsp;Hanoi city with street food tour, Halong bay cruise, Cu Chi Tunnels and Mekong Delta.</p>\r\n\r\n<p><strong>Brief Vietnam tour at a glance &ndash; 8 days from Hanoi</strong></p>\r\n\r\n<p>Day 1: Ho Chi Minh arrival<br />\r\nDay 2: HCM &ndash; Cao Dai temple &amp; Cu Chi tunnels &ndash; HCM<br />\r\nDay 3: HCM &ndash; Ben Tre &ndash; Can Tho<br />\r\nDay 4: Cai Rang floating market &ndash; Flight to Hanoi<br />\r\nDay 5: Hanoi city tour - Train Street<br />\r\nDay 6: Hanoi &ndash; Halong bay &ndash; Night on board<br />\r\nDay 7: Halong &ndash; Hanoi &ndash; Street food &amp; walking tour<br />\r\nDay 8: Hanoi departure</p>', '{\"content\": \"<h2>HO CHI MINH ARRIVAL (NONE)</h2>\\r\\n\\r\\n<p>It is essential to travel to Vietnam once in your lifetime as it will be really more different and interesting than just reading in the books, learning in the movies and hearing from the others. Vietnam is now far beyond your imagination with modern and dynamic cities, exotic and marvelous landscapes, famous natural and cultural World Heritage Sites. With efforts from our experienced travel consultants, it will be so quick and easy to plan your Vietnam tour packages.</p>\\r\\n\\r\\n<p>Being welcomed at&nbsp;<strong>Tan Son Nhat airport (Ho Chi Minh)</strong>&nbsp;by our experienced English speaking guide and driver and listen to a brief introduction of your beautiful Vietnam tour when we are on the way to hotel for<strong>&nbsp;check-in</strong>.</p>\\r\\n\\r\\n<p>Overnight in Ho Chi Minh.</p>\\r\\n\\r\\n<p>After breakfast, enjoy a morning drive through typical southern Vietnamese countryside to Tay Ninh Province in the west of Vietnam. At Tay Ninh visit the incredible&nbsp;<strong>Cao Dai Great Temple</strong>, with architecture that could have come straight from a Walt Disney fantasy and where all the major faiths of the world blend together in a unique religious cocktail.</p>\\r\\n\\r\\n<p>In the afternoon, visit the famous&nbsp;<strong>Cu Chi Tunnels</strong>, an underground tunnel network constructed by Vietnamese resistance fighters during the long struggle for independence where you will understand more about the Vietnam War or American War, a must see Vietnam Tour for any tourists to learn about Vietnam past and present days.</p>\\r\\n\\r\\n<p>Overnight in a Ho Chi Minh hotel.</p>\"}', '{\"content\": \"<p><strong>ABOUT VIVUTRAVEL</strong><br />\\r\\nVivutravel is a local, trustworthy and professional Vietnam tour operator, offering a wide range of Vietnam and Indochina tour packages to the most exciting destinations at most competitive price. Our Business License Number is 0104000493 and our International Tour Operator License Number is 01 &ndash; 258. We are very pleased to be a member of Vietnam Administration of Tourism with financial guarantee &ndash; a deposit of 1.000,000,000 million Vietnam Dong (US$ 50,000) in a bank of Vietnam. Besides that, we are also official members of VISTA (Vietnam Society of Travel Agents),&nbsp;<a href=\\\"http://www.patamanager.org/Members/8088\\\" target=\\\"_blank\\\">PATA</a>&nbsp;(Pacific Asia Travel Association) and higky recommended on&nbsp;<a href=\\\"https://www.tripadvisor.com/Attraction_Review-g293924-d2178753-Reviews-VivuTravel-Hanoi.html\\\" target=\\\"_blank\\\">Tripadvisor</a>.</p>\\r\\n\\r\\n<p>Are you planning your&nbsp;<strong>Vietnam Holiday</strong>, but not sure how to arrange the trip? Getting lost in many tour options? Being sick of searching...? Just leave your troubles behind to read our Vietnam travel guide and send us your requests. Your private travel consultant at Vivutravel will help you design a perfectly suggested tour itinerary and quote which are tailor made to suit your wishes and budget.</p>\"}', '{\"content\": \"<p><strong>We pick the selected hotels for you as below:</strong><br />\\r\\n<strong>Location:</strong>&nbsp;The hotels must be centrally &ndash; located, close to the main attractions and most convenient for you to enjoy your holiday.</p>\\r\\n\\r\\n<p><strong>Facility &amp; Service Quality:</strong>&nbsp;Vivutravel only uses the hotels that are regularly and strictly inspected. The hotel must provide international standards and your every need is cared for by the hotel staff.</p>\\r\\n\\r\\n<p><strong>Variety in Choice:</strong>&nbsp;As Vivutravel offers different styles of tour such as honeymoon,, family, adventure, discovery, homestay,... so we will offer many styles and grades of hotels which are available for different budgets, tastes and culture backgrounds.</p>\\r\\n\\r\\n<p><strong>Hotel Information for planning your holiday and stay.</strong><br />\\r\\n<strong>2 Stars - From US$35 - US$40:</strong><br />\\r\\nWe hardly use 2 star hotels for our clients but sometimes we have no choice if your trip is in the mountainous or remote areas. Basically, 2 star hotels will offer good size and clean guest rooms with AC, TV, hot water, shower and private bathrooms</p>\\r\\n\\r\\n<p><strong>3 Stars - From US$40 - US$80:</strong><br />\\r\\nOffering basic needs for a comfortable stay, good size and clean guest rooms with Free access high speed Internet, Welcome baskets and drinking water, Telephone with international dialing, Electronic safe box in room, Hairdryer, Coffee and Tea, Wake-up service, AC, TV, hot water, shower and private bathrooms. On-site restaurants with breakfast included and lunch or dinner at your own pick up. A small fitness center, spa and swimming pool can be expected.</p>\\r\\n\\r\\n<p><strong>4 Stars - From from US$80 - US$130:</strong><br />\\r\\nOffering a wide range of comfortable boutique hotels are available with shopping, dining and entertainment facilities nearby. Featuring quality service, fully furnished rooms, restaurants, fitness center with spa (and swimming pool in most cases), the hotels are expected to offer an above-average accommodation experience.</p>\\r\\n\\r\\n<p><strong>5 Stars - from US$130 - US$200 &ndash; US$ 300:</strong><br />\\r\\nOffering an extensive range of facilities for an excellent accommodation experience. Multiple restaurants on site and a wide range of choice for buffet breakfast, good size of swimming pool, fitness center and concierge service round out the experience.</p>\"}', '{\"content\": \"<p>Tour guide and driver are Vivutravel&#39;s representatives and your travel companions during your travel in Vietnam and Indochina who take care of our travel services and make your holiday a memorable time. Understanding this, Vivutravel always selects the best tour guides and drivers for tours.</p>\\r\\n\\r\\n<p><strong>Private Guide &amp; Transfer</strong><br />\\r\\nVivutravel&#39;s tour packages are private and tailor made so during your travel with us, you will have a private tour guide, private driver, and an air-conditioned vehicle escorting you at every destination you travel to. This will provide you with maximized personal care, security, and flexibility.</p>\"}', '{\"content\": \"<p><strong>Breakfast:</strong><br />\\r\\nBreakfast is included at all hotels and is buffet breakfast with Asian and Western food.</p>\\r\\n\\r\\n<p><strong>Lunch</strong><br />\\r\\nLunches (if included) are usually set menu at handpicked local restaurant with comfortable dining environment where you can rest assure to taste the local flavor. All restaurants are carefully selected and highly recommended.</p>\\r\\n\\r\\n<p><strong>If allergic to some food</strong><br />\\r\\nWe suggest you to list any food or ingredients that you are allergic to and let our travel consultant know. Then your travel consultant will mark them in the guide&rsquo;s itinerary, so that our reservation&#39;s team and tour guides in different cities can make some preparations and arrangements in advance.</p>\\r\\n\\r\\n<p><strong>Dinner</strong><br />\\r\\nDinners are only included if you stay overnight in a homestay, overnight on cruise in Halong Bay, Mekong Delta or at some special occasions such as welcome dinner, farewell dinner or on requested. So dinners are at your own choice and arrangement, but Vivutravel&#39;s tour guide will always give you good suggestions based on your preferences.</p>\"}', '{\"arr_images\": [\"public/uploads/images/201910/FcxkYZslGW.jpg\", \"public/uploads/images/201910/uAhm7yVC2r.jpg\", \"public/uploads/images/201910/pkNu0dUQ1s.jpg\", \"public/uploads/images/201910/XW3rVUdpt2.jpg\"]}', 'public/uploads/images/201910/GLKdvRcPZ4.jpg', NULL, 0, 0, 1, 1, '2019-09-25 03:54:17', '2019-10-08 02:45:24'),
(2, '7|12', 'CT02: VIETNAM TOUR AT A GLANCE - 8 DAYS FROM HOI AN', 'ct02:-vietnam-tour-at-a-glance-8-days-from-hoi-an', 5, '1000.00', '<p>What better way to get to view Vietnam at a glance than taking this&nbsp;<a href=\"https://www.vivutravel.com/vietnam-tours/vietnam-classic-tours\" target=\"_blank\"><strong>Vietnam classic tour</strong></a>? This tour takes you to every visitor&rsquo;s favorite destination; from Ho Chi Minh City to Mekong Delta to&nbsp;<a href=\"https://www.vivutravel.com/vietnam-travel-guide/things-to-do-in-vietnam/crawling-through-the-tunnels-of-cu-chi\" target=\"_blank\">Cu Chi Tunnels</a>&nbsp;to Ha Noi to Ha long Bay. These places are matched by a very few spots on this planet.</p>', '<p>What better way to get to view Vietnam at a glance than taking this&nbsp;<a href=\"https://www.vivutravel.com/vietnam-tours/vietnam-classic-tours\" target=\"_blank\"><strong>Vietnam classic tour</strong></a>? This tour takes you to every visitor&rsquo;s favorite destination; from Ho Chi Minh City to Mekong Delta to&nbsp;<a href=\"https://www.vivutravel.com/vietnam-travel-guide/things-to-do-in-vietnam/crawling-through-the-tunnels-of-cu-chi\" target=\"_blank\">Cu Chi Tunnels</a>&nbsp;to Ha Noi to Ha long Bay. These places are matched by a very few spots on this planet.</p>\r\n\r\n<p>Land at the capital city and get hauled along for the ride as the city breathes life and vivacity into the residents.&nbsp; Take a&nbsp;<a href=\"https://www.vivutravel.com/vietnam-travel-guide/vietnamese-food-and-drink/vietnamese-culinary\" target=\"_blank\"><strong>Vietnam culinary tour</strong></a>&nbsp;in the city and enjoy a blend of a variety of cooking techniques and flavor from pungent to mild as you dine in on traditional Vietnamese food. Wander through the timeless alleys of this Vietnam classic tour and get mesmerized by jaw dropping French architecture.</p>\r\n\r\n<p>Take a Vietnam history tour by going underground in Cu Chi tunnels to explore further the vast meandering underground tunnel built by guerilla fighters during the Vietnam War. Learn more about the Vietnam War, with the Vietnamese people refer to as the American War, in a Vietnamese point of view.</p>\r\n\r\n<p>Travel to the Mekong delta&nbsp; on a&nbsp;<strong>Vietnam culture tour</strong>&nbsp;and experience a different Vietnamese lifestyle of the communities living along the river. Watch the beautiful landscapes as the water move to the rhythm of the great Mekong. Take part in a shopping spree at Cai Rang floating market for fresh rice, vegetables and exotic fruits. Then take a flight to Hanoi city. Wander through the tree lines boulevards , visit the historical sites in the city&nbsp; and dine in on a different sumptuous meal.</p>\r\n\r\n<p>Travel to the aquatic landscapes and be taken aback by the Halong Bay. For a better view of Vietnam, Cannon Fort in Halong Bay is the place to be. From amazing panoramas of rolling jungles to the incredible aquatic landscapes and colorful tangles of fishing boats, it is the highlights of Vietnam on a spoon.</p>\r\n\r\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh City &ndash; Mekong Delta &ndash; Cu Chi Tunnels &ndash; Ha Noi &ndash; Ha Long Bay</p>\r\n\r\n<p><strong>Highlights:</strong>&nbsp;Hanoi city with street food tour, Halong bay cruise, Cu Chi Tunnels and Mekong Delta.</p>\r\n\r\n<p><strong>Brief Vietnam tour at a glance &ndash; 8 days from Hanoi</strong></p>\r\n\r\n<p>Day 1: Ho Chi Minh arrival<br />\r\nDay 2: HCM &ndash; Cao Dai temple &amp; Cu Chi tunnels &ndash; HCM<br />\r\nDay 3: HCM &ndash; Ben Tre &ndash; Can Tho<br />\r\nDay 4: Cai Rang floating market &ndash; Flight to Hanoi<br />\r\nDay 5: Hanoi city tour - Train Street<br />\r\nDay 6: Hanoi &ndash; Halong bay &ndash; Night on board<br />\r\nDay 7: Halong &ndash; Hanoi &ndash; Street food &amp; walking tour<br />\r\nDay 8: Hanoi departure</p>', '{\"content\": null}', '{\"content\": null}', '{\"content\": null}', '{\"content\": \"<p><strong>Tour Guide:</strong><br />\\r\\nWe do understand that a good tour guide will make your holiday a beautiful time and tour guides who work with us are well-paid, experienced with a university background, eager to exchange our culture, lifestyle, knowledge...with travelers, and have a great passion for their country and understand the personal touch.</p>\\r\\n\\r\\n<p><strong>Note:</strong>&nbsp;In Sapa or some mountainous areas, we may use local tour guides who come from the ethnic groups like H&#39;Mong, or Red Dao as they know better than anyone else about their land, culture, customs and habits... and this is also the way that Vivutravel helps the local people a better life.</p>\\r\\n\\r\\n<p><strong>Vivutravel&#39;s requirements for a tour guide:</strong><br />\\r\\n1 - Licensed at least for 4 years with working experience.</p>\\r\\n\\r\\n<p>2 - Guiding does require more than just hanging out in the sun. Guides must be friendly and good with people, organized enough to keep groups or people on schedule, quick on their feet and ready for the inevitable snafus that arises.</p>\\r\\n\\r\\n<p>3 - Must be an honest broker of their services and able to take criticism.</p>\\r\\n\\r\\n<p>4 - Should be qualified at some level in health, health care or first aid.</p>\\r\\n\\r\\n<p>5 - Able to relate to people from a wide range of cultures and backgrounds.</p>\\r\\n\\r\\n<p>6 - Clear speech and good hearing.</p>\\r\\n\\r\\n<p>7 - Must not be a alcoholic or No-alcohol during working time or anytime when on tour.</p>\\r\\n\\r\\n<p>8 - Tour guide is a nurse to take care of visitors, a boss to keep the right itinerary, a teacher to give information, an ambassador to introduce our country, an entertainer</p>\\r\\n\\r\\n<p>9 - Must be on time every time. Being late or delay is unacceptable.</p>\\r\\n\\r\\n<p>10 - Check flight tickets, train tickets, meals, weather... to make sure things are in order and inform local office if any changes that might effect the tour.</p>\\r\\n\\r\\n<p>11 - Solve problems with care when there is dissatisfy. Argument should be averted by courtesy.</p>\\r\\n\\r\\n<p>12 - If any change of itinerary is needed for unexpected reasons, your private tour guides will be more than accommodating in suggesting alternatives to ensure that you always have a wonderful experience.</p>\"}', '{\"content\": \"<p><strong>Breakfast:</strong><br />\\r\\nBreakfast is included at all hotels and is buffet breakfast with Asian and Western food.</p>\\r\\n\\r\\n<p><strong>Lunch</strong><br />\\r\\nLunches (if included) are usually set menu at handpicked local restaurant with comfortable dining environment where you can rest assure to taste the local flavor. All restaurants are carefully selected and highly recommended.</p>\\r\\n\\r\\n<p><strong>If allergic to some food</strong><br />\\r\\nWe suggest you to list any food or ingredients that you are allergic to and let our travel consultant know. Then your travel consultant will mark them in the guide&rsquo;s itinerary, so that our reservation&#39;s team and tour guides in different cities can make some preparations and arrangements in advance.</p>\\r\\n\\r\\n<p><strong>Dinner</strong><br />\\r\\nDinners are only included if you stay overnight in a homestay, overnight on cruise in Halong Bay, Mekong Delta or at some special occasions such as welcome dinner, farewell dinner or on requested. So dinners are at your own choice and arrangement, but Vivutravel&#39;s tour guide will always give you good suggestions based on your preferences.</p>\"}', '{\"arr_images\": [\"public/uploads/images/201910/JXpwipjuGc.jpg\", \"public/uploads/images/201910/6ptc34CTDc.jpg\", \"public/uploads/images/201910/NZD45Dd16L.jpg\", \"public/uploads/images/201910/q2AyAV9uPg.jpg\"]}', 'public/uploads/images/201910/0PJ3TknGA1.jpg', NULL, 0, 0, 1, 1, '2019-09-25 04:25:00', '2019-10-08 04:24:19'),
(3, '6', 'LT01: ESSENTIAL VIETNAM TOUR - 12 DAYS FROM HCM', 'lt01:-essential-vietnam-tour-12-days-from-hcm', 1, '1.00', NULL, '<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\" target=\"_blank\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\r\n\r\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\r\n\r\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\r\n\r\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\r\n\r\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\r\n\r\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\r\n\r\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\r\n\r\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\r\n\r\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\r\n\r\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\r\n\r\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\r\n\r\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\r\nDay 1: Ho Chi Minh Arrival<br />\r\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\r\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\r\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\r\nDay 5:&nbsp;Hoi An Free Day<br />\r\nDay 6: Hoi An Free Day<br />\r\nDay 7: Hoi An - drive to Hue<br />\r\nDay 8: Hue City Tour - Hanoi<br />\r\nDay 9: Hanoi City Tour<br />\r\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\r\nDay 11: Halong Bay Cruise - Hanoi<br />\r\nDay 12: Hanoi Departure</p>', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"arr_images\": [\"public/uploads/images/201910/G1RmeYSV8c.jpg\"]}', 'public/uploads/images/201910/M0kifw1WOw.jpg', NULL, 0, 0, 1, 1, '2019-09-26 05:08:12', '2019-10-18 04:00:13');
INSERT INTO `posts` (`id`, `cate_id`, `name`, `alias`, `day_number`, `unit_price`, `description`, `content`, `full_trip`, `trip_faq`, `hotels`, `guide_transport`, `meals`, `gallery`, `image`, `tags`, `viewed`, `vote`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '7', 'CT03: IMPRESSIVE VIETNAM TOUR - 10 DAYS FROM HO CHI MINH', 'ct03:-impressive-vietnam-tour-10-days-from-ho-chi-minh', 0, '0.00', '<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>', '<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\" target=\"_blank\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\r\n\r\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\r\n\r\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\r\n\r\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\r\n\r\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\r\n\r\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\r\n\r\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\r\n\r\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\r\n\r\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\r\n\r\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\r\n\r\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\r\n\r\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\r\nDay 1: Ho Chi Minh Arrival<br />\r\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\r\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\r\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\r\nDay 5:&nbsp;Hoi An Free Day<br />\r\nDay 6: Hoi An Free Day<br />\r\nDay 7: Hoi An - drive to Hue<br />\r\nDay 8: Hue City Tour - Hanoi<br />\r\nDay 9: Hanoi City Tour<br />\r\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\r\nDay 11: Halong Bay Cruise - Hanoi<br />\r\nDay 12: Hanoi Departure</p>', '{\"content\": \"<p>12 days of excitement, culture, amazing cities and luxury hotels await you and your Vietnam adventure. This is your time to sit back, relax and let us take care of your&nbsp;<a href=\\\"https://www.vivutravel.com/vietnam-tours/vietnam-luxury-tours\\\" target=\\\"_blank\\\"><strong>Vietnam luxury holiday</strong></a><strong>.</strong></p>\\r\\n\\r\\n<p>Your tour starts in the thriving, colorful and exciting capital of Vietnam; Ho Chi Minh City. Jump on a Vespa and tour the city, the tour will take in pagoda&#39;s, temples, manicured gardens, museums and coffee shops. The day will finish with a night in a 5-star luxury hotel, situated in the heart of the city and just a step away from the magic of Saigon.</p>\\r\\n\\r\\n<p>Your next tour through the green, lush Vietnam countryside will deliver you to the Cu Chi tunnels also give you an insight into Vietnamese war history, learn how it has developed into the country you see today and discover tunnels used by Vietnam resistance.</p>\\r\\n\\r\\n<p>Your private luxury tour will take in the tranquility of the Mekong Delta. The private excursion floats through Ben Tre and Ham Luong river, a branch of Mekong delta. The Mekong offers a chance to see Vietnamese tradition at its most beautiful.</p>\\r\\n\\r\\n<p>A short flight will land you into Hoi An. An ancient town full of 15th-century buildings and luxurious sandy white beaches. You can choose to relax on the beach, roam around the pretty ancient streets or take a cycle tour to view rice paddies and the stunning countryside surrounding Hoi An.</p>\\r\\n\\r\\n<p>You will be privately driven to the next city on your luxury tour. The city of Hue is a perfectly formed variation of modern culture and history. A tour of the city will take in staggering mausoleums where emperors have graced their impressive grounds. Your luxury tour offers a unique and historical insight into this magical city.</p>\\r\\n\\r\\n<p>From the culturally rich Hue, you will land into Hanoi. You will be greeted by your personal tour guide and taken to your luxury hotel in the beautiful city center of Hanoi. The city is exotic, colorful and full of Vietnamese history and fantastic traditional food. Spend time at leisure breathing in all the city has to offer you. A tour of its many museums will leave you with a sense of a history as varied and diverse as Vietnam itself.</p>\\r\\n\\r\\n<p>No&nbsp;<strong>luxury tour of Vietnam</strong>&nbsp;would be complete without a visit to the most photographed area in Vietnam, Halong Bay. With over 3000 islands all waiting to be explored, your luxury tour will include a 5-star cruise and overnight stay on a traditional junk. Enjoy breakfast watching the sun rise, canoe around its many small islands or simply sit back and watch the sunset with a cocktail or two. Halong Bay offers views beyond your expectations.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam luxury holiday tour</strong>&nbsp;around the diverse and culturally rich Vietnam will leave you feeling blessed you have been able to visit and spend time in such a spectacular country.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh - Cu Chi Tunnels - Mekong Delta - Hoi An - Hue - Hanoi - Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:&nbsp;</strong>Discover&nbsp;Saigon by Scooter/Vespa,<strong>&nbsp;</strong>Underground Cu Chi tunnels, Floating market in Mekong Delta, Biking tour in Hoi An, Cyclo riding in Hanoi, Water puppet show, overnight cruise in Halong Bay.</p>\\r\\n\\r\\n<p><strong>Essential Vietnam Tour in brief:</strong><br />\\r\\nDay 1: Ho Chi Minh Arrival<br />\\r\\nDay 2: Ho Chi Minh - Cu Chi Tunnels - City tour by Vespa&nbsp;<br />\\r\\nDay 3: Ho Chi Minh - Ben Tre -Ham Luong (Brand of Mekong) - Ho Chi Minh<br />\\r\\nDay 4: Ho Chi Minh - Flight to Danang (Hoi An)<br />\\r\\nDay 5:&nbsp;Hoi An Free Day<br />\\r\\nDay 6: Hoi An Free Day<br />\\r\\nDay 7: Hoi An - drive to Hue<br />\\r\\nDay 8: Hue City Tour - Hanoi<br />\\r\\nDay 9: Hanoi City Tour<br />\\r\\nDay 10: Hanoi - Halong Bay - Overnight Cruise<br />\\r\\nDay 11: Halong Bay Cruise - Hanoi<br />\\r\\nDay 12: Hanoi Departure</p>\"}', '{\"content\": \"<p>test trip faq</p>\"}', '{\"content\": \"<p>hotels</p>\"}', '{\"content\": \"<p>guide</p>\"}', '{\"content\": \"<p>meals</p>\"}', NULL, 'public/uploads/images/201910/0VlGbLNKRV.jpg', NULL, 0, 0, 1, 1, '2019-09-26 05:18:59', '2019-10-18 07:31:34'),
(5, '7|13', 'CT03: IMPRESSIVE VIETNAM TOUR - 10 DAYS FROM HA NOI', 'ct03:-impressive-vietnam-tour-10-days-from-ha-noi', 10, '1.00', '<p>minhnb</p>', '<p>How would you want to experience Vietnam? With this&nbsp;<strong>classic tour to Vietnam</strong>&nbsp;you are sure to live your dreams. From Ho Chi Minh, Mekong Delta, Hoi An to Hue and out to Halong Bay.</p>\r\n\r\n<p>Are you ready for the ride of a lifetime? You can choose to take part in Ho Chi Minh Vespa tour and get to experience Vietnam city traffic. Get to experience this city as a buzzing hub of Vietnamese culture, Vietnamese cuisine and booming businesses. For a lover for beer, this city got you. The city is home to a variety of best craft beer breweries which take flavors to a new level by using local Vietnamese ingredients.</p>\r\n\r\n<p>Take a&nbsp;<strong>Vietnam tour</strong>&nbsp;to the Mekong Delta markets of Cai Be and Cai Rang for fresh produce as you watch the Vietnamese culture depicting itself in its culture.</p>\r\n\r\n<p>A&nbsp;<strong>Vietnam tour</strong>&nbsp;to Cu Chu tunnels brings you the grim reality of the war that existed. You will be able to understand the tumultuous past and appreciate how Vietnam has risen from devastation and massacre. Later you will take a flight to Danang travel to the small town of Hoi An. Explore the unique heritage of the Vietnamese on this farming and fishing tour. take a biking tour on this part of Vietnam as you further explore its scenic features</p>\r\n\r\n<p>A drive to Hue from Hoi An, is one exciting adventure. You get to watch the unique and marvelous landscape of Vietnam and the vast jungles home to a variety of exotic wildlife.&nbsp; Take Vietnam history tour to this city in central Vietnam and explore the infamous 19th century Citadel. It also encompasses Imperial city with palaces and shrines that you wouldn&rsquo;t want to miss seeing.</p>\r\n\r\n<p>Take a flight to Hanoi and enjoy an overnight&nbsp;<strong>Vietnam tour to Halong Bay</strong>. Watch the magnificent landscapes of this part of Vietnam. Take part in a&nbsp;<strong>Vietnam culinary tour</strong>&nbsp;and&nbsp; dine in on the sumptuous herb-laden everything along the streets.</p>\r\n\r\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh &ndash; Mekong Delta &ndash; Hoian &ndash; Hanoi &ndash; Halong Bay</p>\r\n\r\n<p><strong>Highlights:</strong>&nbsp;Vespa tour in Ho Chi Minh, Cai Be, Cai Rang Markets in Mekong Delta, Cu Chi tunnels, Biking tour in Hoian, Hoi An Memories Show, Street food tour in Hanoi and overnight in Halong bay cruise.</p>\r\n\r\n<p><strong>Brief Vietnam holiday in your eyes -10 days from Ho Chi Minh</strong></p>\r\n\r\n<p>Day 1: Ho Chi Minh arrival &ndash; Vespa tour (Optional)<br />\r\nDay 2: Ho Chi Minh &ndash; Ben Tre &ndash; Ho Chi Minh<br />\r\nDay 3: Ho Chi Minh &ndash; Cu Chi tunnels &ndash; Flight to Danang &ndash; Hoi An<br />\r\nDay 4: Hoi An farming &amp; fishing tour<br />\r\nDay 5: Hoi An free day - Hoi An Memories Show<br />\r\nDay 6:&nbsp;Hoi An - Danang &ndash; Flight to Hanoi<br />\r\nDay 7: Hanoi city tour - Train Street&nbsp;&nbsp;<br />\r\nDay 8: Hanoi &ndash; Halong bay &ndash; Overnight on board<br />\r\nDay 9: Halong bay &ndash; Hanoi&nbsp;<br />\r\nDay 10: Hanoi departure</p>', '{\"content\": \"<p>How would you want to experience Vietnam? With this&nbsp;<strong>classic tour to Vietnam</strong>&nbsp;you are sure to live your dreams. From Ho Chi Minh, Mekong Delta, Hoi An to Hue and out to Halong Bay.</p>\\r\\n\\r\\n<p>Are you ready for the ride of a lifetime? You can choose to take part in Ho Chi Minh Vespa tour and get to experience Vietnam city traffic. Get to experience this city as a buzzing hub of Vietnamese culture, Vietnamese cuisine and booming businesses. For a lover for beer, this city got you. The city is home to a variety of best craft beer breweries which take flavors to a new level by using local Vietnamese ingredients.</p>\\r\\n\\r\\n<p>Take a&nbsp;<strong>Vietnam tour</strong>&nbsp;to the Mekong Delta markets of Cai Be and Cai Rang for fresh produce as you watch the Vietnamese culture depicting itself in its culture.</p>\\r\\n\\r\\n<p>A&nbsp;<strong>Vietnam tour</strong>&nbsp;to Cu Chu tunnels brings you the grim reality of the war that existed. You will be able to understand the tumultuous past and appreciate how Vietnam has risen from devastation and massacre. Later you will take a flight to Danang travel to the small town of Hoi An. Explore the unique heritage of the Vietnamese on this farming and fishing tour. take a biking tour on this part of Vietnam as you further explore its scenic features</p>\\r\\n\\r\\n<p>A drive to Hue from Hoi An, is one exciting adventure. You get to watch the unique and marvelous landscape of Vietnam and the vast jungles home to a variety of exotic wildlife.&nbsp; Take Vietnam history tour to this city in central Vietnam and explore the infamous 19th century Citadel. It also encompasses Imperial city with palaces and shrines that you wouldn&rsquo;t want to miss seeing.</p>\\r\\n\\r\\n<p>Take a flight to Hanoi and enjoy an overnight&nbsp;<strong>Vietnam tour to Halong Bay</strong>. Watch the magnificent landscapes of this part of Vietnam. Take part in a&nbsp;<strong>Vietnam culinary tour</strong>&nbsp;and&nbsp; dine in on the sumptuous herb-laden everything along the streets.</p>\\r\\n\\r\\n<p><strong>Destinations:</strong>&nbsp;Ho Chi Minh &ndash; Mekong Delta &ndash; Hoian &ndash; Hanoi &ndash; Halong Bay</p>\\r\\n\\r\\n<p><strong>Highlights:</strong>&nbsp;Vespa tour in Ho Chi Minh, Cai Be, Cai Rang Markets in Mekong Delta, Cu Chi tunnels, Biking tour in Hoian, Hoi An Memories Show, Street food tour in Hanoi and overnight in Halong bay cruise.</p>\\r\\n\\r\\n<p><strong>Brief Vietnam holiday in your eyes -10 days from Ho Chi Minh</strong></p>\\r\\n\\r\\n<p>Day 1: Ho Chi Minh arrival &ndash; Vespa tour (Optional)<br />\\r\\nDay 2: Ho Chi Minh &ndash; Ben Tre &ndash; Ho Chi Minh<br />\\r\\nDay 3: Ho Chi Minh &ndash; Cu Chi tunnels &ndash; Flight to Danang &ndash; Hoi An<br />\\r\\nDay 4: Hoi An farming &amp; fishing tour<br />\\r\\nDay 5: Hoi An free day - Hoi An Memories Show<br />\\r\\nDay 6:&nbsp;Hoi An - Danang &ndash; Flight to Hanoi<br />\\r\\nDay 7: Hanoi city tour - Train Street&nbsp;&nbsp;<br />\\r\\nDay 8: Hanoi &ndash; Halong bay &ndash; Overnight on board<br />\\r\\nDay 9: Halong bay &ndash; Hanoi&nbsp;<br />\\r\\nDay 10: Hanoi departure</p>\"}', '{\"content\": null}', '{\"content\": null}', '{\"content\": null}', '{\"content\": null}', '{\"arr_images\": [\"public/uploads/images/201910/Vv2NEGttP0.jpg\"]}', 'public/uploads/images/201910/CqFVUP79OA.jpg', NULL, 0, 0, 1, 1, '2019-09-30 04:00:21', '2019-10-18 04:02:01'),
(6, '7|12', 'CT05: IMPRESSIVE VIETNAM TOUR - 10 DAYS FROM HA NOI - HOI AN', 'ct05:-impressive-vietnam-tour-10-days-from-ha-noi-hoi-an', 0, '0.00', '<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>', '<p>The&nbsp;<code>Illuminate\\Contracts\\Cache\\Factory</code>&nbsp;and&nbsp;<code>Illuminate\\Contracts\\Cache\\Repository</code>&nbsp;<a href=\"https://laravel.com/docs/5.7/contracts\">contracts</a>&nbsp;provide access to Laravel&#39;s cache services. The&nbsp;<code>Factory</code>&nbsp;contract provides access to all cache drivers defined for your application. The&nbsp;<code>Repository</code>&nbsp;contract is typically an implementation of the default cache driver for your application as specified by your&nbsp;<code>cache</code>&nbsp;configuration file.</p>\r\n\r\n<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>', '{\"content\": \"<p>The&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Factory</code>&nbsp;and&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Repository</code>&nbsp;<a href=\\\"https://laravel.com/docs/5.7/contracts\\\">contracts</a>&nbsp;provide access to Laravel&#39;s cache services. The&nbsp;<code>Factory</code>&nbsp;contract provides access to all cache drivers defined for your application. The&nbsp;<code>Repository</code>&nbsp;contract is typically an implementation of the default cache driver for your application as specified by your&nbsp;<code>cache</code>&nbsp;configuration file.</p>\\r\\n\\r\\n<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>\"}', '{\"content\": null}', '{\"content\": \"<p>The&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Factory</code>&nbsp;and&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Repository</code>&nbsp;<a href=\\\"https://laravel.com/docs/5.7/contracts\\\">contracts</a>&nbsp;provide access to Laravel&#39;s cache services. The&nbsp;<code>Factory</code>&nbsp;contract provides access to all cache drivers defined for your application. The&nbsp;<code>Repository</code>&nbsp;contract is typically an implementation of the default cache driver for your application as specified by your&nbsp;<code>cache</code>&nbsp;configuration file.</p>\\r\\n\\r\\n<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>\"}', '{\"content\": \"<p>The&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Factory</code>&nbsp;and&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Repository</code>&nbsp;<a href=\\\"https://laravel.com/docs/5.7/contracts\\\">contracts</a>&nbsp;provide access to Laravel&#39;s cache services. The&nbsp;<code>Factory</code>&nbsp;contract provides access to all cache drivers defined for your application. The&nbsp;<code>Repository</code>&nbsp;contract is typically an implementation of the default cache driver for your application as specified by your&nbsp;<code>cache</code>&nbsp;configuration file.</p>\\r\\n\\r\\n<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>\"}', '{\"content\": \"<p>The&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Factory</code>&nbsp;and&nbsp;<code>Illuminate\\\\Contracts\\\\Cache\\\\Repository</code>&nbsp;<a href=\\\"https://laravel.com/docs/5.7/contracts\\\">contracts</a>&nbsp;provide access to Laravel&#39;s cache services. The&nbsp;<code>Factory</code>&nbsp;contract provides access to all cache drivers defined for your application. The&nbsp;<code>Repository</code>&nbsp;contract is typically an implementation of the default cache driver for your application as specified by your&nbsp;<code>cache</code>&nbsp;configuration file.</p>\\r\\n\\r\\n<p>However, you may also use the&nbsp;<code>Cache</code>&nbsp;facade, which is what we will use throughout this documentation. The&nbsp;<code>Cache</code>&nbsp;facade provides convenient, terse access to the underlying implementations of the Laravel cache contracts:</p>\"}', '{\"arr_images\": [\"public/uploads/images/201910/MTT2M65z1S.jpg\"]}', 'public/uploads/images/201910/2283GE4vxk.jpg', NULL, 0, 0, 1, 1, '2019-10-18 07:31:20', '2019-10-18 07:31:20');

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
(7, 1, 1, '2019-04-22 13:52:24', '2018-12-18 06:26:29'),
(8, 1, 4, '2019-09-28 01:28:02', '2019-09-28 01:28:02');

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
  `blocked` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `blocked`, `created_at`, `updated_at`) VALUES
(1, 'Binh Minh', 'minhnb.it@gmail.com', NULL, '$2y$10$j.DBpGEVvmJnjVfz7WhC1eq81efPWM3gkpZQ4QFfMZq1e/m/SGsfq', 'emvU0wdOsJ0PHCXGgfRfOUcVyyBJF7ByBJV5BuuFw4RXk8VvS4z26ffyFNaB', 1, '2019-04-22 06:46:05', '2019-04-22 06:46:05'),
(4, 'minhnb', 'abc@gmail.com', NULL, '$2y$10$pcTnPGrZ2BTiS2iAwHvAe.kj7It2gyGb2cGhGsZtKI/h5OqWvBycq', NULL, 1, '2019-09-27 10:15:04', '2019-09-28 01:28:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `functions`
--
ALTER TABLE `functions`
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
-- Chỉ mục cho bảng `m_config`
--
ALTER TABLE `m_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_slides`
--
ALTER TABLE `m_slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_id` (`role_id`,`func_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `functions`
--
ALTER TABLE `functions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `m_config`
--
ALTER TABLE `m_config`
  MODIFY `id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `m_slides`
--
ALTER TABLE `m_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
