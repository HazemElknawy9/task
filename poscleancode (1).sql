-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 04:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poscleancode`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'موبايلات', 1, NULL, '2020-05-19 22:11:35'),
(2, 'كمبيوتر', 1, NULL, '2020-05-06 06:00:55'),
(3, 'اجهزة كهربائية', 1, NULL, NULL),
(4, 'أدوات منزلية', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `address`, `active`, `created_at`, `updated_at`) VALUES
(4, 'hazem', '[\"+1 (773) 248-4042\",\"+1 (212) 662-1308\"]', 'Aga', 1, '2020-05-18 03:05:57', '2020-05-18 03:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment_subject`, `comment_text`, `comment_status`, `created_at`, `updated_at`) VALUES
(1, 'Et vel eveniet aute', 'Incidunt quis offic', 1, '2020-05-17 08:40:24', '2020-05-17 10:57:38'),
(2, 'Et vel eveniet aute', 'Incidunt quis offic', 1, '2020-05-17 09:59:38', '2020-05-17 10:57:38'),
(3, 'Anim dolore commodi', 'Praesentium iure qui', 1, '2020-05-17 09:59:57', '2020-05-17 10:57:38'),
(4, 'Anim dolore commodi', 'Praesentium iure qui', 1, '2020-05-17 10:00:19', '2020-05-17 10:57:38'),
(5, 's', 's', 1, '2020-05-17 10:00:29', '2020-05-17 10:57:38'),
(6, 's', 's', 1, '2020-05-17 10:00:45', '2020-05-17 10:57:38'),
(7, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:00:55', '2020-05-17 10:57:38'),
(8, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:08:07', '2020-05-17 10:57:38'),
(9, 'Magna et corporis te', 'Quo eum culpa do iu', 1, '2020-05-17 10:08:17', '2020-05-17 10:57:38'),
(10, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:17:04', '2020-05-17 10:57:38'),
(11, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:19:13', '2020-05-17 10:57:38'),
(12, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:20:57', '2020-05-17 10:57:38'),
(13, 'Eos sunt blanditiis', 'Ullamco rerum aliqua', 1, '2020-05-17 10:27:53', '2020-05-17 10:57:38'),
(14, 'qwdw', 'dqwdwq', 1, '2020-05-17 10:28:03', '2020-05-17 10:57:38'),
(15, 'laravel', 'hello laravel', 1, '2020-05-17 10:47:34', '2020-05-17 10:57:38'),
(16, 'adsd', 'asdad', 1, '2020-05-17 10:59:22', '2020-05-17 10:59:26'),
(17, 'حازم', 'dqwdwqd', 1, '2020-05-17 11:05:13', '2020-05-17 11:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `cruds`
--

CREATE TABLE `cruds` (
  `id` int(11) NOT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `en_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cruds`
--

INSERT INTO `cruds` (`id`, `ar_name`, `en_name`, `created_at`, `updated_at`) VALUES
(1, 'إضافة', 'create', NULL, NULL),
(2, 'للإطلاع فقط', 'read', NULL, NULL),
(3, 'تعديل', 'update', NULL, NULL),
(4, 'حذف ', 'delete', NULL, NULL);

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_24_145852_create_categories_table', 1),
(4, '2019_01_28_194130_create_category_translations_table', 1),
(5, '2019_02_05_031022_create_products_table', 1),
(6, '2019_02_05_031035_create_product_translations_table', 1),
(7, '2019_02_19_064134_create_clients_table', 1),
(8, '2019_02_27_224902_create_orders_table', 1),
(9, '2019_06_06_105828_create_product_order_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_01_10_100921_create_client_translations_table', 1),
(12, '2020_01_10_190552_create_stores_table', 1),
(13, '2020_01_10_190606_create_store_translations_table', 1),
(14, '2020_01_10_192253_create_posts_table', 1),
(15, '2020_01_10_192422_create_post_translations_table', 1),
(16, '2020_01_10_192444_create_tags_table', 1),
(17, '2020_01_10_192459_create_tag_translations_table', 1),
(18, '2020_01_16_032901_create_suppliers_table', 1),
(19, '2020_01_16_032928_create_supplier_translations_table', 1),
(20, '2020_01_16_095431_create_order_suppliers_table', 1),
(21, '2020_01_16_105828_create_product_order_supplier_table', 1),
(22, '2020_01_28_001519_mony_stocks_table', 1),
(23, '2020_01_28_001600_mony_stocks_translations_table', 1),
(24, '2020_02_06_111338_prosuct_store', 1),
(25, '2020_02_08_205351_create_order_returns_table', 1),
(26, '2020_02_08_205526_create_order_supplier_returns_table', 1),
(27, '2020_02_08_205629_product_order_return', 1),
(28, '2020_02_08_205647_product_order_supplier_return', 1),
(29, '2020_02_08_211522_create_order_stores_table', 1),
(30, '2020_03_09_180051_laratrust_setup_tables', 1),
(31, '2020_10_02_213601_create_post_tag_table', 1),
(32, '2020_03_13_113417_create_settings_table', 2),
(33, '2020_03_13_145353_create_role_sites_table', 3),
(35, '2020_05_02_171626_create_categories_table', 4),
(37, '2020_05_02_172352_create_products_table', 5),
(38, '2020_05_03_220516_create_clients_table', 6),
(39, '2020_05_04_001940_create_orders_table', 7),
(40, '2019_06_09_124338_create_product_order_table', 8),
(41, '2020_05_12_202653_create_vendors_table', 9),
(42, '2020_05_17_010509_create_comments_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `discount`, `total_price`, `created_at`, `updated_at`) VALUES
(63, 4, NULL, 6000.00, '2020-05-18 03:06:27', '2020-05-18 03:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `roleSite_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `roleSite_id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(124, 22, 'create_videos', 'create_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(125, 22, 'read_videos', 'read_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(126, 22, 'update_videos', 'update_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(127, 22, 'delete_videos', 'delete_videos', NULL, '2020-03-15 21:24:18', '2020-03-15 21:24:18'),
(132, 24, 'create_articles', 'create_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(133, 24, 'read_articles', 'read_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(134, 24, 'update_articles', 'update_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(135, 24, 'delete_articles', 'delete_articles', NULL, '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(136, 25, 'create_roles', 'create_roles', NULL, '2020-03-15 22:44:09', '2020-03-15 22:44:09'),
(137, 25, 'read_roles', 'read_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(138, 25, 'update_roles', 'update_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(139, 25, 'delete_roles', 'delete_roles', NULL, '2020-03-15 22:44:10', '2020-03-15 22:44:10'),
(140, 26, 'create_permissions_admin', 'create_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(141, 26, 'read_permissions_admin', 'read_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(142, 26, 'update_permissions_admin', 'update_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(143, 26, 'delete_permissions_admin', 'delete_permissions_admin', NULL, '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(144, 27, 'create_permissions_users', 'create_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(145, 27, 'read_permissions_users', 'read_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(146, 27, 'update_permissions_users', 'update_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(147, 27, 'delete_permissions_users', 'delete_permissions_users', NULL, '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(148, 28, 'create_settings', 'create_settings', NULL, '2020-03-16 20:24:49', '2020-03-16 20:24:49'),
(149, 28, 'read_settings', 'read_settings', NULL, '2020-03-16 20:24:50', '2020-03-16 20:24:50'),
(150, 28, 'update_settings', 'update_settings', NULL, '2020-03-16 20:24:51', '2020-03-16 20:24:51'),
(151, 28, 'delete_settings', 'delete_settings', NULL, '2020-03-16 20:24:51', '2020-03-16 20:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(124, 2),
(125, 2),
(125, 5),
(126, 2),
(127, 2),
(132, 2),
(133, 2),
(133, 5),
(134, 2),
(135, 2),
(144, 2),
(145, 2),
(146, 2),
(147, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` tinyint(4) NOT NULL DEFAULT 1,
  `invoice_number` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `purchase_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `purchase_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `vendor_id`, `store_id`, `invoice_number`, `name`, `description`, `image`, `purchase_price`, `sale_price`, `stock`, `active`, `purchase_date`, `created_at`, `updated_at`) VALUES
(76, 2, 6, 1, 5, 'HP probook 450 G6 كمبيوتر محمول', '', '40343.jpeg', 11.00, 11.00, 11, 1, '2020-05-22', '2020-05-23 02:53:54', '2020-05-23 02:53:54'),
(77, 2, 6, 1, 5, 'Dolan Long', '', '94193.jpg', 22.00, 22.00, 22, 1, '2020-05-22', '2020-05-23 02:53:55', '2020-05-23 02:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2020-03-13 14:26:44', '2020-03-13 14:26:44'),
(2, 'admin', 'Admin', 'Admin', '2020-03-13 14:26:51', '2020-03-13 14:26:51'),
(5, 'users', NULL, NULL, '2020-03-16 20:28:37', '2020-03-16 20:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `role_sites`
--

CREATE TABLE `role_sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_sites`
--

INSERT INTO `role_sites` (`id`, `name`, `ar_name`, `created_at`, `updated_at`) VALUES
(22, 'videos', 'الفيديوهات', '2020-03-15 21:24:17', '2020-03-15 21:24:17'),
(24, 'articles', 'المقالات', '2020-03-15 22:42:11', '2020-03-15 22:42:11'),
(25, 'roles', 'صلاحيات الموقع', '2020-03-15 22:44:09', '2020-03-15 22:44:09'),
(26, 'permissions_admin', 'صلاحيات الأدمن', '2020-03-15 22:45:14', '2020-03-15 22:45:14'),
(27, 'permissions_users', 'صلاحيات المستخدمين', '2020-03-15 22:45:49', '2020-03-15 22:45:49'),
(28, 'settings', 'إعدادت الموقع', '2020-03-16 20:24:48', '2020-03-16 20:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`, `team_id`) VALUES
(1, 1, 'App\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ar',
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `message_maintenance` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `ar_name`, `en_name`, `logo`, `icon`, `email`, `main_lang`, `description`, `keywords`, `status`, `message_maintenance`, `created_at`, `updated_at`) VALUES
(1, 'Austin Harding', 'Holly Lynn', 'MRLOM5e1oYg2bvWr7cFlLS0S3J8VgwMytqGupOyH.jpeg', 'o89ni2CBIQb90vkg4mrLCaDf3o89bReWUFMejNUn.jpeg', 'suris@mailinator.com', 'Id velit esse laud', 'Sunt tempor deserunt', 'Nihil consequuntur b', 'open', 'مغلق للصيانة', NULL, '2020-03-14 18:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `governrate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `channel_promote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `phone`, `governrate`, `city`, `address`, `date_birth`, `channel_promote`, `code`, `password`, `facebook_url`, `twitter_url`, `website_url`, `active`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Super', 'super_admin@app.com', 'dJZRxvCE2XaP94WMwK6Rfvo22ewglxhw3Y0RZShU.jpeg', '01028855871', NULL, '', NULL, NULL, NULL, NULL, '$2y$10$6WSh4slU6qvkANbsvrsdCO1nmTvdIFmA5ewwKpR21K.Nc8HlfSIn6', 'https://www.facebook.com/', NULL, NULL, 1, '2020-06-01 16:09:45', NULL, '2020-03-13 14:26:53', '2020-06-01 16:09:45', NULL, NULL, 1, NULL),
(21, 'test1', 'test1@app.com', 'default.png', '01028855872', 'الدقهلية', 'طنطا', 'Aga', '2020-06-30', 'فيس بوك', '6211', '$2y$10$t3lrB.lZphUVsesvp6E07.D/RVdBoW9QE.NSIDQD6eK20vFRnmhR6', NULL, NULL, NULL, 1, '2020-06-01 20:29:13', NULL, '2020-06-01 20:28:32', '2020-06-01 20:34:01', NULL, NULL, 21, NULL),
(22, 'test2', 'test2@yahoo.com', 'default.png', '01028855873', 'الشرقية', 'طنطا', 'Aga', '2020-06-24', NULL, '9706', '$2y$10$VlvhuJ7v0cLT5mrUx82XUur/H3YQPRZhhIkmxPrT/XfDdhu0GEH5e', NULL, NULL, NULL, 1, '2020-06-01 20:42:54', NULL, '2020-06-01 20:42:25', '2020-06-01 20:43:13', NULL, NULL, 22, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `address`, `email`, `image`, `active`, `created_at`, `updated_at`) VALUES
(4, 'vendor1', '[\"+1 (773) 248-4042\",\"+1 (212) 662-1308\"]', 'مورد ملتزم', 'vendor1@app.com', 'xP6TkNGrKCNQ5HAz46oPyBp3U0SSilujAC2MFrHI.png', 1, '2020-05-13 08:02:11', '2020-05-13 08:02:11'),
(5, 'vendor2', '[\"+1 (878) 416-4357\",\"+1 (212) 662-1308\"]', 'مورد غير ملتزم بالمواعيد', 'vendor2@app.com', 'Hq26ah9LX5ebyxLUkb0Xf6oXxI7EA80TM76QmzOU.jpeg', 1, '2020-05-13 08:03:40', '2020-05-13 08:03:40'),
(6, 'vendorfrompro', '[\"666666666\",\"12212212121\"]', 'ddddddddddd', 'vendorfrompro@app.com', 'default.png', 1, '2020-05-13 08:33:01', '2020-05-13 08:33:01'),
(7, 'lolololo', '[\"12212212121\",\"12212212121\"]', 'ssssssss', 'lolololo@app.com', 'default.png', 1, '2020-05-13 08:38:39', '2020-05-13 08:38:39'),
(8, 'rrrrr', '[\"12212212121\",\"12212212121\"]', 'rwrw', 'rrrrr@app.com', 'default.png', 1, '2020-05-13 10:07:31', '2020-05-13 10:07:31'),
(9, 'eeeee', '[\"12212212121\",\"wqeqweqeqeq\"]', 'eqweqeq', 'super_admin@app.com', 'default.png', 1, '2020-05-13 10:08:08', '2020-05-13 10:08:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cruds`
--
ALTER TABLE `cruds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `roleSite_id` (`roleSite_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD UNIQUE KEY `permission_user_user_id_permission_id_user_type_team_id_unique` (`user_id`,`permission_id`,`user_type`,`team_id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_product_id_foreign` (`product_id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_sites`
--
ALTER TABLE `role_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD UNIQUE KEY `role_user_user_id_role_id_user_type_team_id_unique` (`user_id`,`role_id`,`user_type`,`team_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_team_id_foreign` (`team_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_created_by_foreign` (`created_by`),
  ADD KEY `users_updated_by_foreign` (`updated_by`),
  ADD KEY `users_deleted_by_foreign` (`deleted_by`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vendors_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cruds`
--
ALTER TABLE `cruds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_sites`
--
ALTER TABLE `role_sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`roleSite_id`) REFERENCES `role_sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_deleted_by_foreign` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
