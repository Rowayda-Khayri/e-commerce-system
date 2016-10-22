-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2016 at 12:48 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_commerce_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'camera ', '2016-10-19 06:58:06', '2016-10-21 05:45:25', NULL),
(8, 'jkjk', '2016-10-19 10:07:03', '2016-10-19 15:33:03', '2016-10-19 15:33:03'),
(9, 'my newwwww cat', '2016-10-19 11:41:23', '2016-10-19 15:18:39', '2016-10-19 15:18:39'),
(11, 'my newwwww cat', '2016-10-19 11:41:26', '2016-10-19 15:53:57', '2016-10-19 15:53:57'),
(12, 'my newwwww cat', '2016-10-19 11:42:07', '2016-10-19 15:53:59', '2016-10-19 15:53:59'),
(13, 'my newwwww cat', '2016-10-19 11:42:09', '2016-10-21 04:20:39', '2016-10-21 04:20:39'),
(15, 'my newwwww cat', '2016-10-19 11:46:48', '2016-10-19 18:41:36', '2016-10-19 18:41:36'),
(16, 'helloCat', '2016-10-19 13:01:04', '2016-10-21 05:32:12', '2016-10-21 05:32:12'),
(17, 'new hello', '2016-10-19 13:02:03', '2016-10-20 04:56:45', '2016-10-20 04:56:45'),
(18, 'new hello', '2016-10-19 13:02:39', '2016-10-21 05:32:37', '2016-10-21 05:32:37'),
(19, 'Laptops', '2016-10-19 13:03:04', '2016-10-22 19:34:36', NULL),
(20, 'ghghghghyuyu', '2016-10-19 13:03:20', '2016-10-19 15:50:16', '2016-10-19 15:50:16'),
(21, 'my category', '2016-10-19 14:13:44', '2016-10-21 05:50:07', '2016-10-21 05:50:07'),
(22, 'hekoocat', '2016-10-19 14:25:17', '2016-10-21 05:39:55', '2016-10-21 05:39:55'),
(23, 'new cat2', '2016-10-19 14:44:18', '2016-10-21 05:39:59', '2016-10-21 05:39:59'),
(24, 'hellocaaaat', '2016-10-19 14:52:10', '2016-10-21 05:40:13', '2016-10-21 05:40:13'),
(26, 'hello again', '2016-10-19 14:53:24', '2016-10-19 15:47:44', '2016-10-19 15:47:44'),
(27, 'hello hello', '2016-10-19 14:53:35', '2016-10-19 15:47:38', '2016-10-19 15:47:38'),
(28, 'i am new  after edit', '2016-10-19 15:52:28', '2016-10-19 15:52:42', '2016-10-19 15:52:42'),
(29, 'new cat2', '2016-10-20 03:39:49', '2016-10-21 05:50:24', '2016-10-21 05:50:24'),
(30, 'hi', '2016-10-20 03:40:13', '2016-10-21 12:53:37', '2016-10-21 12:53:37'),
(31, 'hi', '2016-10-20 03:40:35', '2016-10-21 05:40:21', '2016-10-21 05:40:21'),
(32, 'hi', '2016-10-20 03:41:35', '2016-10-21 05:50:26', '2016-10-21 05:50:26'),
(33, 'hi', '2016-10-20 03:43:39', '2016-10-21 05:50:27', '2016-10-21 05:50:27'),
(34, 'category3', '2016-10-20 03:43:49', '2016-10-20 03:43:49', NULL),
(35, 'cat4', '2016-10-20 03:47:02', '2016-10-20 03:47:02', NULL),
(36, 'cat5', '2016-10-21 04:18:15', '2016-10-21 04:18:15', NULL),
(37, 'new cat ', '2016-10-22 19:04:49', '2016-10-22 19:34:45', '2016-10-22 19:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `subcategory_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `created_at`, `updated_at`, `deleted_at`, `subcategory_id`) VALUES
(3, 'item1', 200, '2016-10-21 11:00:29', NULL, NULL, 2),
(4, 'item2', 700, '2016-10-21 11:00:47', NULL, NULL, 5),
(7, 'gd', 43, '2016-10-21 11:46:28', '2016-10-21 17:41:25', '2016-10-21 17:41:25', 6),
(8, 'item4', 888, '2016-10-21 11:46:45', '2016-10-21 11:46:45', NULL, 6),
(9, 'item4', 888, '2016-10-21 12:15:19', '2016-10-22 05:56:22', NULL, 22),
(12, 'uiui', 89, '2016-10-21 12:33:59', '2016-10-21 16:54:14', '2016-10-21 16:54:14', 6),
(13, 'hello new', 9090, '2016-10-21 12:34:15', '2016-10-21 16:52:38', '2016-10-21 16:52:38', 22),
(14, 'hello new', 9090, '2016-10-21 12:43:39', '2016-10-21 16:51:00', '2016-10-21 16:51:00', 22),
(15, 'hello new', 9090, '2016-10-21 12:44:05', '2016-10-21 16:48:11', '2016-10-21 16:48:11', 22),
(16, 'hello new', 9090, '2016-10-21 12:46:36', '2016-10-21 12:58:46', '2016-10-21 12:58:46', 22),
(17, 'hello new', 9090, '2016-10-21 12:47:44', '2016-10-21 12:58:45', '2016-10-21 12:58:45', 22),
(18, 'hello new', 9090, '2016-10-21 12:48:35', '2016-10-21 12:58:35', '2016-10-21 12:58:35', 22),
(19, 'hello new', 9090, '2016-10-21 12:49:17', '2016-10-21 12:58:33', '2016-10-21 12:58:33', 22),
(20, 'my ', 444, '2016-10-21 17:41:51', '2016-10-21 17:42:10', '2016-10-21 17:42:10', 4),
(21, 're', 89, '2016-10-22 12:46:11', '2016-10-22 19:35:32', '2016-10-22 19:35:32', 4),
(22, 're', 89, '2016-10-22 12:48:56', '2016-10-22 19:05:43', '2016-10-22 19:05:43', 4),
(23, 're', 89, '2016-10-22 12:49:14', '2016-10-22 19:05:31', '2016-10-22 19:05:31', 4),
(24, 're', 89, '2016-10-22 12:57:10', '2016-10-22 19:05:45', '2016-10-22 19:05:45', 4),
(25, 're', 89, '2016-10-22 12:57:14', '2016-10-22 19:05:39', '2016-10-22 19:05:39', 4),
(26, 're', 89, '2016-10-22 12:57:17', '2016-10-22 19:05:41', '2016-10-22 19:05:41', 4),
(27, 're', 89, '2016-10-22 12:57:24', '2016-10-22 19:05:48', '2016-10-22 19:05:48', 4),
(28, 'io', 90, '2016-10-22 13:14:53', '2016-10-22 13:14:53', NULL, 22),
(29, 'ui', 78, '2016-10-22 13:27:39', '2016-10-22 19:35:28', NULL, 6),
(30, 'jk', 0, '2016-10-22 14:24:58', '2016-10-22 19:06:18', '2016-10-22 19:06:18', 4),
(31, 'jk', 8, '2016-10-22 14:55:11', '2016-10-22 19:05:34', '2016-10-22 19:05:34', 4),
(32, 'ew', 32, '2016-10-22 14:55:43', '2016-10-22 19:05:33', '2016-10-22 19:05:33', 4),
(33, 'my item', 89, '2016-10-22 15:02:28', '2016-10-22 19:06:10', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_18_105121_create_user_types_table', 1),
('2016_10_18_105324_create_orders_table', 1),
('2016_10_18_105517_create_items_table', 1),
('2016_10_18_105557_create_subcategories_table', 1),
('2016_10_18_105606_create_categories_table', 1),
('2016_10_18_110500_create_order_items_table', 1),
('2016_10_18_131325_add_fk_to_users_table', 2),
('2016_10_18_131904_add_new_fk_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `total_order_price` int(11) NOT NULL,
  `review` int(11) NOT NULL,
  `sent_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_order_price`, `review`, `sent_at`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(2, 11000, 1, '2016-10-22 21:10:11', NULL, '2016-10-22 19:47:03', NULL, 4),
(30, 99, 1, '0000-00-00 00:00:00', '2016-10-22 01:00:00', '2016-10-22 19:47:03', NULL, 4),
(31, 788, 1, '0000-00-00 00:00:00', '2016-10-22 05:00:00', '2016-10-22 19:47:03', NULL, 5),
(32, 4555, 1, '0000-00-00 00:00:00', '2016-10-22 16:39:00', '2016-10-22 19:47:03', NULL, 6),
(33, 56978, 1, '2016-10-22 21:31:58', '2016-10-22 20:50:47', '2016-10-22 19:47:03', NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `total_item_price` int(11) NOT NULL,
  `review` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `quantity`, `total_item_price`, `review`, `created_at`, `updated_at`, `deleted_at`, `order_id`, `item_id`) VALUES
(5, 5, 1000, 0, '2016-10-22 09:34:00', NULL, NULL, 2, 3),
(6, 50, 10000, 0, '2016-10-22 09:36:00', NULL, NULL, 2, 3),
(7, 2, 400, 0, '2016-10-22 12:34:33', NULL, NULL, 31, 3),
(8, 2, 400, 0, '2016-10-22 12:34:33', NULL, NULL, 31, 4),
(9, 2, 589, 0, '2016-10-22 12:34:33', NULL, NULL, 32, 3),
(10, 2, 800, 0, '2016-10-22 12:34:33', NULL, NULL, 30, 3),
(11, 2, 400, 0, '2016-10-22 12:34:33', NULL, NULL, 33, 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `category_id`) VALUES
(2, 'HD 55', '2016-10-19 20:55:51', '2016-10-21 05:41:40', '2016-10-21 05:41:40', 1),
(3, 'IP4', '2016-10-19 20:56:00', '2016-10-21 05:50:47', '2016-10-21 05:50:47', 1),
(4, 'dddd', '2016-10-19 21:35:22', NULL, NULL, 13),
(5, 'llll', '2016-10-19 21:35:35', '2016-10-20 04:58:09', '2016-10-20 04:58:09', 16),
(6, 'oooo', '2016-10-19 21:35:56', NULL, NULL, 16),
(13, 'ghghgh', '2016-10-21 04:03:18', '2016-10-21 04:20:50', '2016-10-21 04:20:50', 1),
(14, 'ghghgh4', '2016-10-21 04:05:22', '2016-10-21 04:20:52', '2016-10-21 04:20:52', 1),
(15, 'rerere', '2016-10-21 04:09:33', '2016-10-21 05:31:26', '2016-10-21 05:31:26', 1),
(16, 'ghghgh555', '2016-10-21 04:09:56', '2016-10-21 05:37:39', '2016-10-21 05:37:39', 1),
(17, 'ghghgh4', '2016-10-21 04:10:01', '2016-10-21 05:42:18', '2016-10-21 05:42:18', 1),
(18, 'ghghgh4', '2016-10-21 04:10:37', '2016-10-21 05:45:59', '2016-10-21 05:45:59', 1),
(19, 'ghghgh4', '2016-10-21 04:10:55', '2016-10-21 05:34:47', '2016-10-21 05:34:47', 1),
(20, 'ghghgh4', '2016-10-21 04:11:08', '2016-10-21 05:34:35', '2016-10-21 05:34:35', 1),
(21, 'ghghgh4', '2016-10-21 04:11:19', '2016-10-21 05:28:24', '2016-10-21 05:28:24', 1),
(22, ' subcat', '2016-10-21 04:18:32', '2016-10-22 19:04:25', NULL, 36),
(23, 'jiji4', '2016-10-21 05:28:02', '2016-10-21 05:28:12', '2016-10-21 05:28:12', 1),
(24, 'sub1', '2016-10-21 05:42:51', '2016-10-21 05:43:04', '2016-10-21 05:43:04', 1),
(25, 'sub2', '2016-10-21 05:42:58', '2016-10-21 05:43:17', '2016-10-21 05:43:17', 1),
(26, 'sub2', '2016-10-21 05:43:14', '2016-10-21 05:43:26', '2016-10-21 05:43:26', 1),
(27, 'sub2', '2016-10-21 05:43:24', '2016-10-21 05:45:43', '2016-10-21 05:45:43', 1),
(28, 'sub2', '2016-10-21 05:43:32', '2016-10-21 05:43:49', '2016-10-21 05:43:49', 1),
(29, 'sub1', '2016-10-21 05:47:58', '2016-10-21 05:48:47', '2016-10-21 05:48:47', 1),
(30, 'sub2', '2016-10-21 05:48:05', '2016-10-21 05:48:39', '2016-10-21 05:48:39', 1),
(31, 'sub3', '2016-10-21 05:48:10', '2016-10-21 05:48:30', '2016-10-21 05:48:30', 1),
(32, 'sub2', '2016-10-21 05:48:56', '2016-10-21 05:49:26', '2016-10-21 05:49:26', 1),
(33, 'sub1', '2016-10-21 05:48:59', '2016-10-21 05:49:24', '2016-10-21 05:49:24', 1),
(34, 'sub1', '2016-10-21 05:49:02', '2016-10-21 05:50:34', '2016-10-21 05:50:34', 1),
(35, 'jkjkjkk;k;', '2016-10-21 05:50:52', '2016-10-21 05:51:08', '2016-10-21 05:51:08', 1),
(36, 'lkl', '2016-10-21 05:50:57', '2016-10-21 05:51:07', '2016-10-21 05:51:07', 1),
(37, 'opo', '2016-10-21 06:03:13', '2016-10-21 06:03:18', '2016-10-21 06:03:18', 1),
(38, 'subcat1', '2016-10-22 19:03:42', '2016-10-22 19:03:42', NULL, 1),
(39, 'subcat2', '2016-10-22 19:03:51', '2016-10-22 19:03:51', NULL, 1),
(40, 'sub4', '2016-10-22 19:04:07', '2016-10-22 19:04:07', NULL, 34),
(41, 'new sub', '2016-10-22 19:04:57', '2016-10-22 19:05:00', '2016-10-22 19:05:00', 37),
(42, 'new sub', '2016-10-22 19:05:07', '2016-10-22 19:05:07', NULL, 37),
(43, 'dell', '2016-10-22 19:34:23', '2016-10-22 19:34:23', NULL, 19),
(44, 'hp', '2016-10-22 19:34:29', '2016-10-22 19:34:29', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `user_type_id`) VALUES
(1, 'admin', '', 'adminpass', '', 1, NULL, '2016-10-22 07:54:19', NULL, NULL, 1),
(2, 'user1', 'user1@mail.com', 'pass', '1234', 1, NULL, '2016-10-22 08:16:45', '2016-10-22 09:30:07', NULL, 2),
(3, 'user2', 'user2@mail.com', '123', '4568', 1, NULL, '2016-10-22 08:17:16', '2016-10-22 06:40:34', NULL, 2),
(4, 'user3', 'user3@mail.com', 'pass', '4567', 1, NULL, '2016-10-22 08:37:12', NULL, NULL, 2),
(5, 'user5', 'user5@mail.com', 'password', '', 0, NULL, '2016-10-22 21:18:00', NULL, NULL, 2),
(6, 'user6', 'user6@mail.com', 'password', '', 1, NULL, '2016-10-22 21:18:00', '2016-10-22 19:12:05', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2016-10-18 20:58:19', NULL, NULL),
(2, 'client', '2016-10-18 20:58:57', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`),
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
