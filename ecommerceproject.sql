-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(4, 'Microsoft', 'microsoft', 0, '2023-06-07 06:52:08', '2023-06-16 01:27:23', 15),
(5, 'Lenovo', 'lenovo', 0, '2023-06-10 04:14:08', '2023-06-10 04:14:08', 15),
(12, 'mi', 'mi', 0, '2023-06-16 02:24:24', '2023-06-16 02:24:24', 15);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_desc` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible , 1=hidden',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `desc`, `image`, `meta_title`, `meta_keyword`, `meta_desc`, `status`, `created_at`, `updated_at`) VALUES
(13, 'test', 'ewrtyuasdfsd', 'q2qw3er4t5y6u78i9o0p', '1686115203.jpg', '2qw3er4tgyh', '23er45tyhguj', '3er45tghyjmk', 0, '2023-06-06 23:50:03', '2023-06-09 23:54:03'),
(14, 'vikram', 'qwertyuikjhgfd', 'q2wesrdftgh', '1686285871.jpg', 'wertfgh', 'wertfg', 'wqert', 1, '2023-06-08 23:14:31', '2023-06-08 23:14:31'),
(15, 'mobile', 'mobile', 'qwertyuiopasdfghjkl', '1686745939.jpg', 'wsdefrgthy', 'wesdrfgthy', 'wqaesdrftgyhuj', 0, '2023-06-14 07:02:19', '2023-06-14 07:02:19'),
(16, 'mi', 'mi', 'mi', '1686902042.jpg', 'mi', 'mi', 'mi', 0, '2023-06-16 02:24:02', '2023-06-16 02:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Green', 'green', 0, NULL, NULL),
(5, 'Yellow', 'yellow', 0, NULL, NULL),
(6, 'Green', 'green', 0, NULL, NULL),
(7, 'WHITE', 'white', 1, NULL, NULL),
(8, 'Black', 'Black', 0, NULL, NULL),
(9, 'Black', 'black', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_03_102456_add_details_to_users_table', 2),
(6, '2023_06_05_054510_create_categories_table', 3),
(7, '2023_06_06_065539_create_brands_table', 4),
(8, '2023_06_07_125207_create_products_table', 5),
(9, '2023_06_08_051336_create_product_images_table', 5),
(11, '2023_06_10_093054_create_colors_table', 6),
(12, '2023_06_12_120230_create_product_colors_table', 7),
(13, '2023_06_13_120056_create_sliders_table', 7),
(15, '2023_06_16_054153_add_category_id_to_brands_table', 8),
(16, '2023_06_19_125755_create_wishlists_table', 9),
(17, '2023_06_22_124237_create_carts_table', 10),
(18, '2023_06_28_104426_create_orders_table', 11),
(19, '2023_06_28_105352_create_order_items_table', 11),
(20, '2023_07_15_113427_create_settings_table', 12),
(21, '2023_07_19_070244_create_user_details_table', 13),
(22, '2023_07_19_081815_alter_table_user_details_change_phone', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `status_message` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `fullname`, `email`, `phone`, `pincode`, `address`, `status_message`, `payment_mode`, `payment_id`, `created_at`, `updated_at`) VALUES
(5, 24, 'funda-6Mj6r9ccyn', 'vikram', 'vikram.classiebit@gmail.com', '9784923848', '123456', 'Rajthan', 'in+progress', 'Cash on Delivery', NULL, '2023-06-29 06:15:23', '2023-06-29 06:15:23'),
(6, 24, 'funda-FoaEjT4jbE', 'vikram', 'vikram.classiebit@gmail.com', '1234567890', '123456', 'wedsfrgthyu', 'completed', 'Cash on Delivery', NULL, '2023-07-01 06:26:32', '2023-07-05 06:26:30'),
(7, 24, 'funda-o6gzxjYUBe', 'vikram', 'vikram.classiebit@gmail.com', '1234567890', '123456', 'qwert5y6u7i8ko', 'in progress', 'Cash on Delivery', NULL, '2023-07-01 06:42:28', '2023-07-01 06:42:28'),
(8, 24, 'funda-WpQoeBySst', 'vikram', 'vikram.classiebit@gmail.com', '1234567890', '123456', 'qwertyguiopasdfcgvhbnjkml', 'in progress', 'Cash on Delivery', NULL, '2023-07-01 07:23:12', '2023-07-01 07:23:12'),
(9, 24, 'funda-aE0pyPsWLl', 'vikram', 'vikram.classiebit@gmail.com', '9784923848', '342003', 'Jodhpur', 'in progress', 'Cash on Delivery', NULL, '2023-07-03 07:02:21', '2023-07-03 07:02:21'),
(10, 24, 'funda-sXksmeX8Iz', 'vikram', 'vikram.classiebit@gmail.com', '9784923848', '342003', 'Gujrat', 'in progress', 'Cash on Delivery', NULL, '2023-07-03 07:03:50', '2023-07-03 07:03:50'),
(11, 24, 'funda-lTWiRCiE5H', 'vikram', 'vikram.classiebit@gmail.com', '1234567890', '123456', 'wertyuiop', 'in progress', 'Cash on Delivery', NULL, '2023-07-03 07:09:17', '2023-07-03 07:09:17'),
(12, 24, 'funda-0PywTdfBAz', 'vikram', 'vikram.classiebit@gmail.com', '1234567890', '123456', 'Jodhpur', 'in progress', 'Cash on Delivery', NULL, '2023-07-03 07:34:53', '2023-07-03 07:34:53'),
(13, 2, 'funda-IYA6RaVmLl', 'Admin', 'admin@gmail.com', '9812345671', '123456', 'Jodhpur', 'in progress', 'Cash on Delivery', NULL, '2023-07-27 07:20:21', '2023-07-27 07:20:21'),
(14, 2, 'funda-P7bgIKf8MG', 'Admin', 'admin@gmail.com', '9782354671', '123456', 'Jodhpur', 'in progress', 'Cash on Delivery', NULL, '2023-07-27 07:23:36', '2023-07-27 07:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_color_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_color_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 5, 8, 8, 1, 123456, '2023-06-29 06:15:23', '2023-06-29 06:15:23'),
(6, 6, 12, 12, 1, 123, '2023-07-01 06:26:32', '2023-07-01 06:26:32'),
(7, 7, 12, 12, 1, 123, '2023-07-01 06:42:28', '2023-07-01 06:42:28'),
(8, 8, 12, 12, 1, 123, '2023-07-01 07:23:12', '2023-07-01 07:23:12'),
(9, 9, 13, 13, 1, 1234, '2023-07-03 07:02:21', '2023-07-03 07:02:21'),
(10, 10, 12, 12, 1, 123, '2023-07-03 07:03:50', '2023-07-03 07:03:50'),
(11, 10, 13, 13, 2, 1234, '2023-07-03 07:03:50', '2023-07-03 07:03:50'),
(12, 11, 13, 13, 1, 1234, '2023-07-03 07:09:17', '2023-07-03 07:09:17'),
(13, 12, 13, 13, 1, 1234, '2023-07-03 07:34:53', '2023-07-03 07:34:53'),
(14, 13, 14, 14, 1, 999999, '2023-07-27 07:20:21', '2023-07-27 07:20:21'),
(15, 14, 12, 12, 1, 123, '2023-07-27 07:23:36', '2023-07-27 07:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `small_desc` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1= trending , 0= not-trending',
  `featured` tinyint(10) NOT NULL DEFAULT 0 COMMENT '1=featured, 0=non-featured',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1= hidden , 0= visible',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `small_desc`, `description`, `original_price`, `selling_price`, `quantity`, `trending`, `featured`, `status`, `meta_title`, `meta_keyword`, `meta_desc`, `created_at`, `updated_at`) VALUES
(8, 13, 'SDFGHJKL', 'asdfghjkl', 'Mi', 'ASDFGHJKL', 'ASDFGHJKL', 2134567, 123456, 12344, 0, 1, 0, 'QWERTYUIO', 'QWERTYUIO', 'QWERTYUIO', '2023-06-09 06:07:35', '2023-06-29 06:15:23'),
(10, 14, 'Hello', 'hello', 'Mi', 'qwertyuiop[dfvgbhnjmk,l', 'wsedrfgthyjuiklop;\'[', 1234, 1234, 12345, 1, 0, 0, 'qwertyuiop[', 'asdfghjkl', 'asdfghjkl', '2023-06-12 06:59:01', '2023-06-12 06:59:01'),
(11, 14, 'poiuytredw', 'asdfghjkl', 'Apple', 'qwertyuioplkjhgfdsazxcvbnm,', 'poiuytrewqasdfghjkl;mnbvcxz', 1234, 1234, 1234, 1, 0, 1, 'qwertyu', 'qwertyuiopasdfghjkl', '/.,mnbvcxz;lkjhgfdsa[poiuytrewq', '2023-06-12 07:04:38', '2023-06-12 07:04:38'),
(12, 15, 'Moblie', 'moblie-xm', 'mi', '1asdfghjklqwertyuiopzxcvbnm,', 'qwertyuiopasdfghjklzxcvbnm', 123, 123, 5, 0, 0, 0, 'qwertyu', 'qwertyu', 'qwertyu', '2023-06-15 00:47:53', '2023-07-27 07:23:36'),
(13, 15, 'mi xim', 'mi-xi', 'mi', 'qwertyuioasdfgthyju', 'aswdefrgthyjuk', 123456, 1234, 34, 0, 0, 0, 'qwe34rt5y6u7', 'qwertyu', 'qwertyui', '2023-06-16 02:25:30', '2023-06-16 02:25:30'),
(14, 15, 'Apple', 'apple', 'Lenovo', 'Apple is best company. Apple company in Uk.', 'Apple is best company. Apple company in Uk.', 100000, 999999, 11, 1, 0, 0, 'Apple', 'Apple', 'Apple', '2023-07-07 05:58:47', '2023-07-27 07:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `quantity`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(3, 6, 13, 4, '2023-06-16 02:25:30', '2023-07-03 07:34:53'),
(4, 1, 13, 5, '2023-06-16 02:25:30', '2023-07-03 07:09:17'),
(5, 12, 14, 4, '2023-07-07 05:58:47', '2023-07-07 05:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'uploads/product/1686310655.jpg', 8, '2023-06-09 06:07:35', '2023-06-09 06:07:35'),
(23, 'uploads/product/16865729411.jpg', 10, '2023-06-12 06:59:01', '2023-06-12 06:59:01'),
(24, 'uploads/product/16865732781.jpg', 11, '2023-06-12 07:04:38', '2023-06-12 07:04:38'),
(25, 'uploads/product/16868098731.jpeg', 12, '2023-06-15 00:47:53', '2023-06-15 00:47:53'),
(26, 'uploads/product/16869021301.jpg', 13, '2023-06-16 02:25:30', '2023-06-16 02:25:30'),
(27, 'uploads/product/16887293271.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(28, 'uploads/product/16887293272.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(29, 'uploads/product/16887293273.png', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(30, 'uploads/product/16887293274.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(31, 'uploads/product/16887293275.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(32, 'uploads/product/16887293276.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(33, 'uploads/product/16887293277.png', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47'),
(34, 'uploads/product/16887293278.jpg', 14, '2023-07-07 05:58:47', '2023-07-07 05:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_1` int(11) DEFAULT NULL,
  `phone_2` int(11) DEFAULT NULL,
  `email_1` varchar(255) DEFAULT NULL,
  `email_2` varchar(255) DEFAULT NULL,
  `facbook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_url`, `page_title`, `meta_keyword`, `meta_desc`, `address`, `phone_1`, `phone_2`, `email_1`, `email_2`, `facbook`, `twitter`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(3, 'Funda Ecom', 'https//www.logo.com', 'funda Ecom', 'funda Ecom', 'funda Ecom', 'GUJRAT', 1234567890, 1234567890, 'funda@gmal.com', 'funda@gmail.com', 'funda_web', 'funda_web', 'funda', 'http/www.funda.om', NULL, '2023-07-17 00:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` mediumtext DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1= hidden, 0= visiable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `desc`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Home', 'HomePage', 'uploads/slider/1686722784.jpg', 1, NULL, NULL),
(9, '<span>Best Ecommerce Solutions 1 </span>to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1686737389.jpeg', 0, NULL, NULL),
(10, '<span>Best Ecommerce Solutions 2 </span>to Boost your Brand Name &amp; Sales', 'We offer an industry-driven and successful digital marketing strategy that helps our clients in achieving a strong online presence and maximum company profit.', 'uploads/slider/1686737440.jpeg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=users, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'vikram kumar', 'vikram@example.com', NULL, '$2y$10$kqy10kR/P5FVPfYb/3W86eG3EY47nAfXQfcR799D5NFVO4L8AwFji', '2J1qknNRuFtH4fFeXZJod6qpnBm4atyyvPn7nJ5bvbRW9AJb5Lb8MUTWWO00', '2023-06-03 02:46:58', '2023-06-03 02:46:58', 0),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$kqy10kR/P5FVPfYb/3W86eG3EY47nAfXQfcR799D5NFVO4L8AwFji', 'bT88QTP9Hd6fevipdElT0IXWlkoPoWnAq7TYyXsa70zap2cn91bMaCenazWA', '2023-06-04 23:52:36', '2023-07-05 04:43:51', 1),
(3, 'Mrs. Sienna Armstrong', 'dlowe@example.com', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SK4rkQQfh5', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(4, 'Margarette Murray', 'clemens30@example.org', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '670z23B2wD', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(5, 'Mrs. Antonia Gibson', 'breitenberg.giovani@example.org', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'El76wbbVzk', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(6, 'Russel Goldner', 'morissette.oren@example.org', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4qvtYm546w', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(7, 'Mr. Toby McGlynn III', 'dicki.berenice@example.net', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XtUmjVwNbm', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(8, 'Wilber Kautzer III', 'kris.eddie@example.net', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mcqh13yzrg', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(9, 'Miss Gudrun Rippin', 'vlebsack@example.org', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n9RPximB8e', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(10, 'Irwin Feil II', 'yolanda13@example.com', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KZOWT6Hh5i', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(11, 'Mason Heller', 'hudson.junius@example.net', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4Zst73X2YQ', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(12, 'Garry Gerhold', 'sallie.rogahn@example.org', '2023-06-05 23:59:43', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PIczy0bQNp', '2023-06-05 23:59:43', '2023-06-05 23:59:43', 0),
(13, 'Arno Conn', 'bashirian.lazaro@example.org', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XXAauJ3i76', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(14, 'Mrs. Alisha Lakin', 'aryanna.hyatt@example.net', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1skxdcW9g3', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(15, 'Delphine Nienow', 'ocorwin@example.com', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'se8ZBHqxvk', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(16, 'Prof. Heidi Bernhard Jr.', 'marcelo91@example.org', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DGk1k232cm', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(17, 'Miss Cierra Lind DDS', 'schiller.samara@example.com', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qonqtaAtt6', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(18, 'Franco Lubowitz', 'fkovacek@example.net', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sv0LlULQbK', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(19, 'Brain Fay', 'ukonopelski@example.com', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GTCSv7DkD7', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(20, 'Paris Crona', 'jan.dicki@example.net', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jurlImmwat', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(21, 'Leatha Rempel Jr.', 'qmiller@example.com', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bf8dQBlPRj', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(22, 'Melvina Bradtke', 'maybell.lehner@example.net', '2023-06-06 00:00:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GOm87wbCkG', '2023-06-06 00:00:02', '2023-06-06 00:00:02', 0),
(28, 'Raju', 'RajuJohan888@gmail.com', NULL, '$2y$10$SXMaJzIAwZSEUzrtsSY.m.J0HG8kQ1Kh24I1BQLJH5zOACIuSUrmO', NULL, '2023-07-18 05:01:17', '2023-07-18 05:01:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `pincode` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `phone`, `pincode`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '9784923848', 342003, 'Jodhpur', 2, '2023-07-19 02:38:35', '2023-07-19 02:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(10, 2, 8, '2023-07-27 06:23:21', '2023-07-27 06:23:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_colors_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_colors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
