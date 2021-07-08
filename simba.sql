-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2020 at 02:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `ip_address`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(19, '127.0.0.1', 8, 2, '2020-10-27 06:59:12', NULL),
(20, '127.0.0.1', 7, 3, '2020-10-30 06:17:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'category_default_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `added_by`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men', 13, '1.jpeg', '2020-08-21 16:59:58', '2020-08-21 16:59:59', NULL),
(2, 'Women', 13, '2.jpeg', '2020-08-21 17:01:07', '2020-08-21 17:01:08', NULL),
(3, 'Electronics', 13, '3.jpeg', '2020-08-21 17:01:38', '2020-08-21 17:01:38', NULL),
(4, 'Watch', 13, '4.jpeg', '2020-08-21 17:03:38', '2020-08-21 17:05:47', NULL),
(5, 'Fashion', 13, '5.jpeg', '2020-09-06 16:44:25', '2020-09-06 16:44:58', '2020-09-06 16:44:58'),
(6, 'Blezzer', 13, '6.jpeg', '2020-09-21 09:57:16', '2020-09-21 09:57:52', '2020-09-21 09:57:52'),
(7, 'Baby', 13, '7.jpeg', '2020-10-10 15:51:17', '2020-10-10 15:51:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhaka', NULL, NULL),
(2, 1, 'Cottrogram', NULL, NULL),
(3, 1, 'Shylet', NULL, NULL),
(4, 1, 'Rajshahi', NULL, NULL),
(5, 2, 'Delli', NULL, NULL),
(6, 2, 'Mumbai', NULL, NULL),
(7, 2, 'Chennai', NULL, NULL),
(8, 2, 'Kolkata', NULL, NULL),
(9, 3, 'Masampa', NULL, NULL),
(10, 3, 'Jinja', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', NULL, NULL),
(2, 'India', NULL, NULL),
(3, 'Uganda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `validity_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount_amount`, `validity_date`, `created_at`, `updated_at`) VALUES
(1, 'Simba10', 10, '2020-09-08', '2020-09-05 17:39:57', NULL),
(2, 'Atik5', 5, '2020-09-07', '2020-09-05 17:41:01', NULL),
(3, 'Sinti15', 15, '2020-10-15', '2020-09-05 17:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faq_question` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faq_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_question`, `faq_answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HOW DO I ACTIVATE MY ACCOUNT?', 'The instructions to activate your account will be sent to your email once you have submitted the registration form. If you did not receive this email, your email service provider’s mailing software may be blocking it. You can try checking your junk / spam folder or contact us at atikurrahmantuhin041@gmail.com', '2020-08-10 03:31:23', NULL, NULL),
(2, 'HOW CAN I CHANGE MY SHIPPING ADDRESS?', 'By default, the last used shipping address will be saved into to your Sample Store account. When you are checking out your order, the default shipping address will be displayed and you have the option to amend it if you need to.', '2020-08-10 06:37:15', NULL, NULL),
(3, 'WHY MUST I MAKE PAYMENT IMMEDIATELY AT CHECKOUT?', 'Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.', '2020-08-13 06:14:14', NULL, NULL),
(4, 'HOW CAN I USE MY REMAINING ACCOUNT CREDITS?', 'WHY MUST I MAKE PAYMENT IMMEDIATELY AT CHECKOUT? Sample ordering is on ‘first-come-first-served’ basis. To ensure that you get your desired samples, it is recommended that you make your payment within 60 minutes of checking out.  HOW MANY FREE SAMPLES CAN I REDEEM? Due to the limited quantity, each member\'s account is only entitled to 1 unique free sample. You can check out up to 4 free samples in each checkout.  WHAT HAPPENS IF THERE\'S BEEN A DELIVERY MISHAP TO MY ORDER? (DAMAGED OR LOST DELIVERY) We take such matters very seriously and will look into individual cases thoroughly. Any sample that falls under the below categories should not be thrown away before taking photo proof and emailing the photo of the affected sample and your D.O (Delivery Order) to us at help@samplestore.com (if applicable).  We regret to inform you that no refunds will be given for orders that fall under the below categories.  1. In the event of damaged samples received, we will require photo proof of the affected samples and your D.O (Delivery Order) in order for us to investigate and review before a decision is made to re-send the sample to you at no cost, subject to availability. In light of this, any sample that falls into this category should not be thrown away before taking photo proof and emailing the photo to us at help@samplestore.com  2. In the event of lost mail, we will try to locate the delivery team in Singpost and if there\'s a clear indication that your order is indeed lost, we\'ll re-send the order to you at no cost, subject to availability.  WHAT HAPPENS IN THE EVENT OF UNSATISFACTORY/EXPIRED/WRONG SAMPLE/MISSING SAMPLES? We take such matters very seriously and will look into individual cases thoroughly. Any sample that falls under the below categories should not be thrown away before taking photo proof and emailing the photo of the affected sample and your D.O (Delivery Order) to us at help@samplestore.com (if applicable).  We regret to inform you that no refunds will be given for orders that fall under the below categories.  1. In the event that the sample you\'ve received is unsatisfactory in any way you perceive, we will require photo proof of the sample and your D.O (Delivery Order) as well and you may be required to send us back the sample for close inspection and review before a decision is made to re-send a sample to you at no cost, subject to availability. The postage cost will be credited back to your account after we receive the returned item.  2. In the event that you receive an expired product, we will require clear photo proof of the sample and its expiry date for close inspection and review before a decision is made to re-send a sample to you at no cost, subject to availability.  3. In the event that you\'ve received the wrong sample, we will require photo proof of the wrongly sent sample and D.O (Delivery Order) and after reviewing, we\'ll re-send the correct sample to you at no cost, subject to availability.  4. In the event you\'ve received your order with a missing sample, we will require you to email us a clear photo proof of your D.O (Delivery Order) to help@samplestore.com and after which, kindly give us a call at (+65) 68440092 and our customer service officer will attend to you to find out more before a decision is made to re-send the missing sample to you at no cost, subject to availability.  I AM HAVING PROBLEMS ACCESSING SAMPLE STORE. SOME OF THE PAGES LOOK WEIRD. AM I USING THE RIGHT BROWSER? As Sample Store uses some of the latest graphics designs which may not be supported in lower version of browsers, it is recommended that you use the following browsers to access Sample Store:  1. Microsoft Internet Explorer Version 10 onwards.  Download the latest Microsoft Internet Explorer at: http://windows.microsoft.com/en-us/internet-explorer/download-ie 2. Mozilla Firefox Version 10 onwards.  Download the latest Mozilla Firefox at: https://www.mozilla.org/en-US/firefox/new/ 3. Google Chrome Version 12 onwards.  Download the latest Google Chrome at: https://www.google.com/chrome/browser/desktop/ In addition, please ensure that your Javascript and Cookie is enabled on your browser.', '2020-08-13 06:14:52', '2020-08-13 06:31:05', '2020-08-13 06:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_07_05_201537_create_faqs_table', 2),
(6, '2020_07_28_120424_create_categories_table', 3),
(7, '2020_08_13_145957_create_products_table', 4),
(8, '2020_08_18_095359_create_product_details_table', 5),
(9, '2020_08_24_224618_create_carts_table', 6),
(10, '2020_09_04_231803_create_coupons_table', 7),
(11, '2020_09_17_151558_create_checkouts_table', 8),
(12, '2020_09_18_221507_create_orders_table', 8),
(14, '2020_09_21_221321_create_order_lists_table', 9),
(15, '2020_09_22_090615_create_countries_table', 10),
(16, '2020_09_22_091235_create_cities_table', 11),
(17, '2020_10_10_152916_create_permission_tables', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fname`, `email`, `phone`, `country_id`, `city_id`, `address`, `note`, `subtotal`, `total`, `payment_method`, `paid_status`, `created_at`, `updated_at`) VALUES
(1, 15, 'Atik', 'atikurrahmantuhin041@gmail.com', '01760012664', 1, 1, 'kathgara, savar-dhaka', 'please return it quickly', 310, 264, 2, 0, '2020-09-28 16:07:36', NULL),
(2, 15, 'Atik', 'atikurrahmantuhin041@gmail.com', '01631618174', 1, 2, 'afegegegeveve', 'fgfgnfjfjfj', 75, 75, 2, 0, '2020-09-28 16:14:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lists`
--

CREATE TABLE `order_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lists`
--

INSERT INTO `order_lists` (`id`, `user_id`, `order_id`, `product_id`, `quantity`, `review`, `star`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 5, 3, 'good', 4, '2020-09-28 16:07:36', '2020-10-05 17:24:50'),
(2, 15, 1, 6, 2, 'sei', 3, '2020-09-28 16:07:36', '2020-10-05 17:24:50'),
(3, 15, 1, 7, 4, NULL, NULL, '2020-09-28 16:07:36', '2020-10-05 17:24:50'),
(4, 15, 2, 6, 3, 'sei', 2, '2020-09-28 16:14:27', '2020-10-05 17:24:50'),
(5, 15, 2, 7, 3, NULL, NULL, '2020-09-28 16:14:27', '2020-10-05 17:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('kawsar@gmail.com', '$2y$10$Ld6uPgJLPMx9B03Mv5OJu.4X/SnrN.//USwSMvIn4pSjqpVHWxcf.', '2020-07-16 06:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'see category', 'web', '2020-10-13 01:57:02', '2020-10-13 01:57:02'),
(2, 'edit category', 'web', '2020-10-13 01:59:09', '2020-10-13 01:59:09'),
(3, 'delete category', 'web', '2020-10-13 02:00:29', '2020-10-13 02:00:29'),
(4, 'see product', 'web', '2020-10-13 02:03:54', '2020-10-13 02:03:54'),
(5, 'see faq', 'web', '2020-10-13 02:05:42', '2020-10-13 02:05:42'),
(6, 'edit faq', 'web', '2020-10-13 02:06:33', '2020-10-13 02:06:33'),
(7, 'delete faq', 'web', '2020-10-13 02:07:50', '2020-10-13 02:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product_default_thumbnail_photo.jpg',
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_short_description`, `product_long_description`, `category_id`, `quantity`, `product_thumbnail_photo`, `product_slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Formal Shirt V1', '5', 'valo jinish', 'its really wonderfull.', 1, 0, '1.jpeg', 'formal-shirt-v1-1598029751', '2020-08-21 17:09:11', '2020-08-21 17:09:11', NULL),
(2, 'Femaine Salowar', '7', 'sdvvsvbs', 'ssvsvv', 2, 0, '2.jpeg', 'femaine-salowar-1598030010', '2020-08-21 17:13:30', '2020-08-21 17:13:31', NULL),
(3, 'Cilleniean Men Watch', '15', 'valo', 'sycycwcww', 4, 0, '3.jpeg', 'cilleniean-men-watch-1598031941', '2020-08-21 17:45:41', '2020-08-21 17:45:42', NULL),
(4, 'Lems Mens Shoes', '8', 'valo', 'hdvvwev', 1, 100, '4.jpeg', 'lems-mens-shoes-1598079030', '2020-08-22 06:50:30', '2020-08-22 06:50:31', NULL),
(5, 'Iphone 11 Pro', '80', 'valo', 'vajbfajcsa', 3, 197, '5.jpeg', 'iphone-11-pro-1598286631', '2020-08-24 16:30:31', '2020-09-28 16:07:36', NULL),
(6, 'Raymond Blezzer', '15', 'Its really good', 'onek sundor color ase', 1, 2, '6.jpeg', 'raymond-blezzer-1600682432', '2020-09-21 10:00:32', '2020-09-28 16:14:27', NULL),
(7, 'Pant', '10', 'nice pant', 'onek color ase ekhane', 1, 5, '7.jpeg', 'pant-1600682602', '2020-09-21 10:03:22', '2020-09-28 16:14:27', NULL),
(8, 'baby oil', '20', 'khub valo', 'onek valo', 7, 100, '8.jpeg', 'baby-oil-1602346313', '2020-10-10 16:11:53', '2020-10-10 16:11:54', NULL),
(9, 'message oil', '30', 'onek valo', 'onek upokari', 2, 50, '9.jpeg', 'message-oil-1602346532', '2020-10-10 16:15:32', '2020-10-10 16:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_multiple_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `product_multiple_photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, '1-1.jpeg', '2020-08-21 17:09:12', NULL),
(2, 1, '1-2.jpeg', '2020-08-21 17:09:14', NULL),
(3, 1, '1-3.jpeg', '2020-08-21 17:09:14', NULL),
(4, 2, '2-1.jpeg', '2020-08-21 17:13:32', NULL),
(5, 2, '2-2.jpeg', '2020-08-21 17:13:34', NULL),
(6, 2, '2-3.png', '2020-08-21 17:13:34', NULL),
(7, 2, '2-4.png', '2020-08-21 17:13:36', NULL),
(8, 3, '3-1.jpeg', '2020-08-21 17:45:45', NULL),
(9, 3, '3-2.jpeg', '2020-08-21 17:45:48', NULL),
(10, 4, '4-1.jpeg', '2020-08-22 06:50:32', NULL),
(11, 4, '4-2.jpeg', '2020-08-22 06:50:32', NULL),
(12, 4, '4-3.jpeg', '2020-08-22 06:50:33', NULL),
(13, 4, '4-4.jpeg', '2020-08-22 06:50:34', NULL),
(14, 5, '5-1.jpeg', '2020-08-24 16:30:33', NULL),
(15, 5, '5-2.jpeg', '2020-08-24 16:30:34', NULL),
(16, 5, '5-3.jpeg', '2020-08-24 16:30:34', NULL),
(17, 6, '6-1.jpeg', '2020-09-21 10:00:33', NULL),
(18, 6, '6-2.jpeg', '2020-09-21 10:00:34', NULL),
(19, 6, '6-3.jpeg', '2020-09-21 10:00:35', NULL),
(20, 6, '6-4.jpeg', '2020-09-21 10:00:35', NULL),
(21, 6, '6-5.jpeg', '2020-09-21 10:00:36', NULL),
(22, 7, '7-1.jpeg', '2020-09-21 10:03:23', NULL),
(23, 7, '7-2.jpeg', '2020-09-21 10:03:24', NULL),
(24, 7, '7-3.jpeg', '2020-09-21 10:03:24', NULL),
(25, 8, '8-1.jpeg', '2020-10-10 16:11:54', NULL),
(26, 8, '8-2.jpeg', '2020-10-10 16:11:55', NULL),
(27, 8, '8-3.png', '2020-10-10 16:11:56', NULL),
(28, 9, '9-1.jpeg', '2020-10-10 16:15:34', NULL),
(29, 9, '9-2.jpeg', '2020-10-10 16:15:34', NULL),
(30, 9, '9-3.jpeg', '2020-10-10 16:15:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Md.Atikur Rahman', 'atikcseuu40@gmail.com', '2020-07-19 08:56:26', '$2y$10$QJB3wfWRUE79LU5s.QoZZ.0Wh9TisuPANdsHuS/P6A8W0qIPKu6qi', 0, NULL, '2020-07-19 08:54:32', '2020-07-20 09:17:35'),
(14, 'Tarek Ahmed', 'anisahmed13142@gmail.com', '2020-07-19 10:40:46', '$2y$10$drZWiwuuIPMGlVHaT/c1ruGevJaowPdt18qsOiFimiwMTAfHq0FGi', 0, NULL, '2020-07-19 10:31:35', '2020-07-23 10:19:54'),
(15, 'Atik', 'atikurrahmantuhin041@gmail.com', '2020-07-19 10:40:46', '$2y$10$hXaKLbOidGg33YhaCm5WAuUZ0oaX/t4ELy7NcZCuTVqPw2vshfrUi', 2, NULL, '2020-08-22 16:50:52', '2020-08-22 16:50:52'),
(16, 'Naeem Hossain', 'naeem.eee14@gmail.com', '2020-07-19 10:40:46', '$2y$10$dsPugIpIril1vJT2iTGGw.Gx2/ML8MQ2UD9Zv1lD080JZOm64O3KG', 0, NULL, '2020-10-13 01:26:29', '2020-10-13 01:26:29'),
(17, 'Alamin Hossain', 'alamin@gmail.com', '2020-07-19 10:40:46', '$2y$10$6qcbjnVC9NSHElJVknqD4ewKmvAcldGOSwGsdxCgqprb06qXpAvQm', 2, NULL, '2020-10-13 01:29:37', '2020-10-13 01:29:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lists`
--
ALTER TABLE `order_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_lists`
--
ALTER TABLE `order_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
