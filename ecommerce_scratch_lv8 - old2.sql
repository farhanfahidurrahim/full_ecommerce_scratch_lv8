-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 07:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_scratch_lv8`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_page` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_logo`, `front_page`, `created_at`, `updated_at`) VALUES
(3, 'Easy', 'easy', 'public/files/brand/easy.jpg', NULL, NULL, NULL),
(4, 'Freeland', 'freeland', 'public/files/brand/freeland.png', NULL, NULL, NULL),
(5, 'Gentle Park', 'gentle-park', 'public/files/brand/gentle-park.jpg', NULL, NULL, NULL),
(7, 'Aarong', 'aarong', 'public/files/brand/aarong.jpg', NULL, NULL, NULL),
(8, 'Canon', 'canon', 'public/files/brand/canon.png', NULL, NULL, NULL),
(9, 'Nike', 'nike', 'public/files/brand/nike.jpg', NULL, NULL, NULL),
(10, 'Plus Point', 'plus-point', 'public/files/brand/plus-point.jpg', NULL, NULL, NULL),
(11, 'Zara', 'zara', 'public/files/brand/zara.jpg', NULL, NULL, NULL),
(12, 'Toyota', 'toyota', 'public/files/brand/toyota.jpg', NULL, NULL, NULL),
(13, 'Honda', 'honda', 'public/files/brand/honda.png', NULL, NULL, NULL),
(14, 'China', 'china', 'public/files/brand/china.jpg', NULL, NULL, NULL),
(15, 'One Plus', 'one-plus', 'public/files/brand/one-plus.png', NULL, NULL, NULL),
(16, 'Xiaomi', 'xiaomi', 'public/files/brand/xiaomi.png', NULL, NULL, NULL),
(17, 'Apple', 'apple', 'public/files/brand/apple.png', NULL, NULL, NULL),
(18, 'Yamaha', 'yamaha', 'public/files/brand/yamaha.png', NULL, NULL, NULL),
(19, 'Suzuki', 'suzuki', 'public/files/brand/suzuki.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(9, 'Mens Fashion', 'mens-fashion', NULL, NULL),
(10, 'Womens Fashion', 'womens-fashion', NULL, NULL),
(12, 'Kids Fashion', 'kids-fashion', NULL, NULL),
(13, 'Electronics', 'electronics', NULL, NULL),
(14, 'Vehicle', 'vehicle', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `childcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `childcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `category_id`, `subcategory_id`, `childcategory_name`, `childcategory_slug`, `created_at`, `updated_at`) VALUES
(4, 9, 12, 'Formal Shoe', 'formal-shoe', NULL, NULL),
(5, 10, 13, 'Heel Shoe', 'heel-shoe', NULL, NULL),
(6, 9, 6, 'Full Shirt', 'full-shirt', NULL, NULL),
(7, 12, 14, '[0-1 Year]', '0-1-year', NULL, NULL),
(8, 12, 14, '[1-5 Year]', '1-5-year', NULL, NULL),
(10, 12, 18, 'Belt', 'belt', NULL, NULL),
(11, 12, 18, 'Non-Belt', 'non-belt', NULL, NULL),
(12, 12, 18, 'Light & Sound', 'light-sound', NULL, NULL),
(13, 10, 9, 'Jamdanee', 'jamdanee', NULL, NULL),
(14, 10, 13, 'Sandal', 'sandal', NULL, NULL),
(15, 10, 9, 'Tatee', 'tatee', NULL, NULL),
(16, 10, 9, 'Shutee', 'shutee', NULL, NULL),
(17, 10, 9, 'Benaroshi', 'benaroshi', NULL, NULL),
(18, 10, 11, 'Normal Lehenga', 'normal-lehenga', NULL, NULL),
(19, 10, 11, 'Wedding Lehenga', 'wedding-lehenga', NULL, NULL),
(20, 9, 19, 'Cotton', 'cotton', NULL, NULL),
(21, 9, 19, 'Jeans', 'jeans', NULL, NULL),
(22, 9, 6, 'Half Shirt', 'half-shirt', NULL, NULL),
(23, 9, 12, 'Loofer', 'loofer', NULL, NULL),
(24, 9, 12, 'Casula Shoe', 'casula-shoe', NULL, NULL),
(25, 12, 15, 'Cotton', 'cotton', NULL, NULL),
(26, 12, 15, 'Desgin', 'desgin', NULL, NULL),
(27, 12, 16, 'Cotton', 'cotton', NULL, NULL),
(28, 12, 17, 'Cotton', 'cotton', NULL, NULL),
(29, 10, 10, 'Three Piece', 'three-piece', NULL, NULL),
(31, 9, 8, 'Round Coller', 'round-coller', NULL, NULL),
(32, 9, 8, 'Coller', 'coller', NULL, NULL),
(33, 9, 7, 'Gabardine', 'gabardine', NULL, NULL),
(34, 9, 7, 'Jeans', 'jeans', NULL, NULL),
(35, 9, 7, 'Formal Pant', 'formal-pant', NULL, NULL),
(36, 13, 22, 'OnePlus', 'oneplus', NULL, NULL),
(37, 13, 22, 'Xiaomi', 'xiaomi', NULL, NULL),
(38, 13, 22, 'Realme', 'realme', NULL, NULL),
(39, 13, 25, 'Canon', 'canon', NULL, NULL),
(40, 13, 25, 'Laptop', 'laptop', NULL, NULL),
(41, 14, 21, 'Honda', 'honda', NULL, NULL),
(42, 13, 22, 'Iphone', 'iphone', NULL, NULL),
(43, 14, 21, 'Suzuki', 'suzuki', NULL, NULL),
(44, 14, 21, 'Yamaha', 'yamaha', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `coupon_amount` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `type`, `coupon_amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 'tyrety', '2022-12-05', 2, 87964, 'Inactive', NULL, NULL),
(13, 'oooo', '2022-12-02', 2, 369, 'Active', NULL, NULL),
(14, 'gggg', '2022-12-09', 1, 458965, 'Active', NULL, NULL),
(15, 'rrrrr', '2022-12-06', 1, 96321, 'Active', NULL, NULL),
(16, 'uyuyuyu', '2022-12-01', 1, 798789, 'Active', NULL, NULL),
(20, 'rtyr', '2023-01-04', 1, 14, 'Active', NULL, NULL),
(21, 'oipiop', '2023-01-07', 1, 777, 'Active', NULL, NULL),
(22, 'iouupoxx', '2023-01-05', 1, 1111, 'Active', NULL, NULL),
(23, 'jghj', '2023-01-06', 2, 545, 'Active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_15_041739_create_categories_table', 2),
(6, '2022_11_16_034017_create_subcategories_table', 3),
(7, '2022_11_16_094706_create_childcategories_table', 4),
(8, '2022_11_17_064714_create_brands_table', 5),
(9, '2022_11_23_064646_create_seos_table', 6),
(10, '2022_11_23_082441_create_seos_table', 7),
(11, '2022_11_23_102506_create_pages_table', 8),
(12, '2022_11_26_095147_create_products_table', 9),
(13, '2022_11_26_101223_create_warehouses_table', 10),
(14, '2022_11_27_140946_create_settings_table', 11),
(15, '2022_11_30_045001_create_coupons_table', 12),
(16, '2022_11_30_144234_create_pickup_point_table', 13),
(17, '2022_12_01_044812_add_pickup_point_id_to_products_table', 14),
(18, '2022_12_01_094916_add_color_to_products_table', 15),
(19, '2022_12_01_120743_add_slug_to_products_table', 16),
(20, '2022_12_01_174159_add_date_month_to_products_table', 17),
(21, '2022_12_08_135221_create_orders_table', 18),
(22, '2022_12_08_135247_create_order_details_table', 18),
(23, '2022_12_08_144234_add_subtotal_price_to_order_details_table', 19),
(24, '2022_12_09_043427_create_payment_gateway_bd_table', 20),
(25, '2014_10_12_000000_create_users_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_extra_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `c_name`, `c_phone`, `c_email`, `c_country`, `c_zipcode`, `c_address`, `c_extra_phone`, `c_city`, `total`, `payment_type`, `tax`, `shipping_charge`, `order_id`, `status`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 2, 'Rabbani', '01675717825', 'rabbani@gmail.com', 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdfsdf', 'sdfsdf', '50,000.00', 'Aamarpay', '0', '0', '737193', 1, '08-12-2022', 'December', '2022', NULL, NULL),
(2, 2, 'Rabbani', '0199999999', 'rabbani@gmail.com', 'Bangladesh', '2300', 'Nagua', '01777777777', 'kg', '50,000.00', 'Hand Cash', '0', '0', '69606', 1, '10-12-2022', 'December', '2022', NULL, NULL),
(3, 2, 'Rabbani', '016666666', 'rabbani@gmail.com', 'Bangladesh', '2300', 'Nagua', '01777777777', 'kg', '50,000.00', 'Hand Cash', '0', '0', '674587', 1, '10-12-2022', 'December', '2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `single_price`, `subtotal_price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'OnePlus 9 Pro SD 888', 'Morning Mist', '197g', '1', '50000', '50000', NULL, NULL),
(2, 3, 2, 'OnePlus 9 Pro SD 888', 'Morning Mist', '197g', '1', '50000', '50000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_position` int(11) DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_position`, `page_name`, `page_slug`, `page_title`, `page_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'asd name', 'asd', 'asd title', 'asd', NULL, NULL),
(3, 2, 'FFFQqqq Wwww', 'fffqqqq-wwww', 'Eeee Rrrr', '<p>FFFtttt Yyyyyy</p>', NULL, NULL),
(6, 1, 'opuiop', 'opuiop', 'uouooo', '<p>tuukghj</p>', NULL, NULL),
(8, 2, 'mmm', 'mmm', 'nnn', '<p>bbbb</p>', NULL, NULL),
(9, 1, 'Terms and Conditions', 'terms-and-conditions', 'Terms and Conditions For Purchasing Our Products', '<p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; font-size: 1.1rem; line-height: 1.65; color: rgb(31, 30, 51); font-family: Roboto, &quot;system-ui&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">Creating the&nbsp;<strong style=\"box-sizing: inherit; font-weight: bold;\">best terms and conditions page possible</strong>&nbsp;will protect your business from the following:</p><ul style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px 0px 0px 2.5em; overflow: hidden; font-size: 1.1rem; line-height: 1.65; color: rgb(31, 30, 51); font-family: Roboto, &quot;system-ui&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\"><li style=\"box-sizing: inherit; list-style-type: disc;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Abusive users:&nbsp;</strong>Terms and Conditions agreements allow you to establish what constitutes appropriate activity on your site or app, empowering you to remove abusive users and content that violates your guidelines.</li><li style=\"box-sizing: inherit; list-style-type: disc;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Intellectual property theft:&nbsp;</strong>Asserting your claim to the creative assets of your site in your terms and conditions will prevent ownership disputes and copyright infringement.</li><li style=\"box-sizing: inherit; list-style-type: disc;\"><strong style=\"box-sizing: inherit; font-weight: bold;\">Potential litigation:&nbsp;</strong>If a user lodges a legal complaint against your business, showing that they were presented with clear terms and conditions before they used your site will help you immensely in court.</li></ul><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; font-size: 1.1rem; line-height: 1.65; color: rgb(31, 30, 51); font-family: Roboto, &quot;system-ui&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;\">In short, terms and conditions give you&nbsp;<strong style=\"box-sizing: inherit; font-weight: bold;\">control over your site</strong><strong style=\"box-sizing: inherit; font-weight: bold;\">&nbsp;and legal enforcement</strong>&nbsp;if users try to take advantage of your operations.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_bd`
--

CREATE TABLE `payment_gateway_bd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gateway_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_bd`
--

INSERT INTO `payment_gateway_bd` (`id`, `gateway_name`, `store_id`, `signature_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aaamarpay', 'aamarpay', '28c78bb1f45112f5d40b956fe104645a', '0', NULL, NULL),
(2, 'Surjopay', NULL, NULL, '0', NULL, NULL),
(3, 'SSl Commerz', NULL, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_point`
--

CREATE TABLE `pickup_point` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_point_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_point`
--

INSERT INTO `pickup_point` (`id`, `pickup_point_name`, `pickup_point_address`, `pickup_point_phone`, `pickup_point_phone_two`, `created_at`, `updated_at`) VALUES
(1, 'Kishoreganj Branch', 'Ishaka Road, Rothkhola', '016147852', '017369781', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `childcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `today_deal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `product_slider` int(11) DEFAULT NULL,
  `flash_deal_id` int(11) DEFAULT NULL,
  `cash_on_delivery` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `pickup_point_id`, `name`, `slug`, `code`, `unit`, `tags`, `size`, `color`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `description`, `thumbnail`, `images`, `featured`, `today_deal`, `status`, `product_slider`, `flash_deal_id`, `cash_on_delivery`, `admin_id`, `month`, `date`, `created_at`, `updated_at`) VALUES
(1, 9, 6, 6, 3, 1, 'FFR rrf', 'ffr-rrf', '963', 'pcs', 'shirt,men', 'M,XL', 'Black', NULL, '1000', '1500', '300', '10', 'F w name', '<p>asdadad ad</p>', 'ffr-rrf.jpg', '[\"1751037156792880.jpg\"]', 1, 1, 1, 0, NULL, NULL, 1, 'December', '01-12-2022', NULL, NULL),
(2, 13, 22, 36, 15, 1, 'OnePlus 9 Pro SD 888', 'oneplus-9-pro-sd-888', 'CP-68239', 'pcs', 'phone,oneplus,mobile', '197g, 8.7mm thickness', 'Morning Mist, Forest Green, Stellar Black', NULL, '40,000', '55000', '50000', '10', 'Nagua', '<p><span style=\"color: rgb(51, 51, 51); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 14px;\">OnePlus 9 Pro internal storage base variant of 8 GB, 12 GB Ram, 128 GB, 256 GB Internal Memory (ROM). OnePlus 9 Pro which is available in Morning Mist, Forest Green, Stellar Black colour.</span><br></p>', 'oneplus-9-pro-sd-888.jpg', '[\"1751477813612525.jpg\"]', 1, 1, 1, 1, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(3, 14, 21, 41, 13, 1, 'Honda CBR150R Repsol ABS', 'honda-cbr150r-repsol-abs', 'H-951753', 'pcs', 'honda,bike', NULL, 'Orange', NULL, '50,000', '60000', '55000', '10', 'Nagua', '<p>This is Honda bike</p>', 'honda-cbr150r-repsol-abs.jpg', '[\"1751479253903396.jpg\",\"1751479253962867.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(4, 9, 12, 23, 14, 1, 'Lather Shoe Loofer', 'lather-shoe-loofer', 'LS-487631', 'pcs', 'shoe,loofer', 'M,XL', 'Black,Grey', NULL, '1,500', '2500', '2000', '15', 'Puranthana', '<p>this is shoe</p>', 'lather-shoe-loofer.jpg', '[\"1751479679832695.jpg\",\"1751479679892823.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(5, 10, 13, 14, 3, 1, 'Women Stylish Shoe', 'women-stylish-shoe', 'ws-367418', 'pcs', 'shoe,women', 'M,XL', 'Black,Grey', NULL, '2,500', '3500', '3000', '12', 'Nagua', '<p>this is women shoe</p>', 'women-stylish-shoe.jpg', '[\"1751479874879421.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(6, 10, 13, 14, 4, 1, 'Women Normal Shoe', 'women-normal-shoe', 'ws-475819', 'pcs', 'shoe,women', 'M,XL', 'Black,Grey', NULL, '2,000', '3000', '2500', '14', 'Nagua', '<p>thi is women shoe</p>', 'women-normal-shoe.jpg', '[\"1751480010150782.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(7, 13, 22, 42, 17, 1, 'Iphone 9 256GB', 'iphone-9-256gb', 'ip-714638', 'pcs', 'phone,mobile,iphone', '197g, 8.7mm thickness', 'Orange', NULL, '70000', '85000', '80000', '12', 'Nagua', '<p>this is iphone</p>', 'iphone-9-256gb.jpg', '[\"1751480198947767.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL),
(8, 14, 21, 43, 19, 1, 'Suzuki New Bike', 'suzuki-new-bike', 'sb-463297', 'pcs', 'bike,suzuki', NULL, 'Blue', NULL, '300000', '360000', '350000', '10', 'Nagua', '<p>this is bike</p>', 'suzuki-new-bike.jpg', '[\"1751480737600960.jpg\"]', 1, 1, 1, NULL, NULL, NULL, 1, 'December', '06-12-2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `meta_keyword`, `google_verification`, `google_analytics`, `google_adsense`, `alexa_verification`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency_icon`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `facebook`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '৳', '01675717825', '01798947545', 'farhan.fahidurrahim@gmail.com', 'farhan.fahidurrahim@gmail.com', 'public/files/setting/6384524b659db.png', 'public/files/setting/638452b694841.png', 'House No. 298, Nagua, Kishoreganj Sadar.', 'https://github.com/farhanfahidurrahim/', 'https://github.com/farhanfahidurrahim/', 'https://github.com/farhanfahidurrahim/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcat_slug`, `created_at`, `updated_at`) VALUES
(6, 9, 'Shirt', 'shirt', NULL, NULL),
(7, 9, 'Full Pant', 'full-pant', NULL, '2022-12-01 04:49:57'),
(8, 9, 'T-Shirt', 't-shirt', NULL, '2022-12-01 05:09:05'),
(9, 10, 'Sharee', 'sharee', NULL, NULL),
(10, 10, 'Dress', 'dress', NULL, NULL),
(11, 10, 'Lehenga', 'lehenga', NULL, NULL),
(12, 9, 'Shoe [Men]', 'shoe-men', NULL, '2022-12-01 04:52:06'),
(13, 10, 'Shoe [Women]', 'shoe-women', NULL, '2022-12-01 04:51:58'),
(14, 12, 'Dress [Full Set]', 'dress-full-set', NULL, '2022-12-01 04:49:37'),
(15, 12, 'Short Pant', 'short-pant', NULL, NULL),
(16, 12, 'Full Pant', 'full-pant', NULL, NULL),
(17, 12, 'Half Pant', 'half-pant', NULL, NULL),
(18, 12, 'Shoe [Kids]', 'shoe-kids', NULL, '2022-12-01 04:51:45'),
(19, 9, 'Half Pant', 'half-pant', NULL, NULL),
(20, 14, 'Car', 'car', NULL, NULL),
(21, 14, 'Bike', 'bike', NULL, NULL),
(22, 13, 'Phone', 'phone', NULL, NULL),
(23, 13, 'Computer', 'computer', NULL, NULL),
(24, 13, 'Laptop', 'laptop', NULL, NULL),
(25, 13, 'Camera', 'camera', NULL, NULL);

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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `is_admin`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Farhan', 'farhan@gmail.com', NULL, '$2y$10$qSO3KnAbHh60TncxN746mOcGZSTK0l2xiusIQJ/heDKL/NpfQy0eu', '01675717825', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Ah Rabbani', 'ahrabbani95@gmail.com', NULL, '$2y$10$qSO3KnAbHh60TncxN746mOcGZSTK0l2xiusIQJ/heDKL/NpfQy0eu', '01777777777', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Fahidur Rahim Farhan', 'farhan.fahidurrahim@gmail.com', NULL, '', NULL, NULL, 'https://lh3.googleusercontent.com/a/AEdFTp4TEJxHMlPL3u2jk93289lPbk4rqTYJcW3qB6QR=s96-c', 'google', '112148754157351629555', 'ya29.a0AeTM1iddifniAzfv1r4AwS5oqoVjtrlCBC04OmWdJni4UoISXNMP-CGRnf1ay1-6zInTgYdvfdWvRhQ2IRYcXjdqyaLm2riAOG3hJo7Eyzlkcdml_VmQOXiOQzU9WtcvJP0Yh_hbI_pGpfl9rHRfCKVvaW4AaCgYKATYSARASFQHWtWOmFR6XzQYKtIgBdIJwWSLluA0163', 'uyXR3TyTpCgVuPMdFzLUDI5zZH5hVrFQ3Y3FIBLRonCDmrJcsdu4ekqtB5e0', '2022-12-10 11:58:17', '2022-12-10 12:10:21'),
(4, 'FarhaN Fahidur Rahim', 'f.onefarhan@gmail.com', NULL, '', NULL, NULL, 'https://lh3.googleusercontent.com/a/AEdFTp6KVqw-VSSTwUbCjFfOPwYQLweUuLiHHLvtctJD=s96-c', 'google', '111175482385009713964', 'ya29.a0AeTM1ifZZcVh_eBI01Rw_pDVehGgDwRItev9aPW9Cal9iLQiQuzSugDHBwEXZVcY0KyAXmaxIVW_fXNkhA8utmH6Xj4MpJA7oSCa0GwIBt3of_kzodYGe_s5Fk0Idr75bmt72ihnXKgq35BG8TkApmaNS47NaCgYKAdISARASFQHWtWOmhQhHlpY21qeC1C1CgZuYeA0163', 'zm0dvQbEoQxvLzy7Ujl9FQmixYCl9P6jMxe8EFkh3QPqD8Lii757rLaNeIE9', '2022-12-10 12:09:39', '2022-12-10 12:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `warehouse_address`, `warehouse_phone`, `created_at`, `updated_at`) VALUES
(1, 'Nagua', 'Nagua, Kishoreganj', '016', NULL, NULL),
(3, 'Gaital', 'Gaital, Kishoreganj', '879845', NULL, NULL),
(4, 'Puranthana', 'Puranthana, Kishoreganj', '36451', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcategories_category_id_foreign` (`category_id`),
  ADD KEY `childcategories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateway_bd`
--
ALTER TABLE `payment_gateway_bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_point`
--
ALTER TABLE `pickup_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_gateway_bd`
--
ALTER TABLE `payment_gateway_bd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_point`
--
ALTER TABLE `pickup_point`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD CONSTRAINT `childcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `childcategories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
