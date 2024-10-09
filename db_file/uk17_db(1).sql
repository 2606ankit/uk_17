-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 08:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uk17_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `uk_category`
--

CREATE TABLE `uk_category` (
  `id` int(11) NOT NULL,
  `category_uid` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `category_alias` varchar(255) NOT NULL,
  `category_text` text NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_image_url` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uk_category`
--

INSERT INTO `uk_category` (`id`, `category_uid`, `category_name`, `category_description`, `category_alias`, `category_text`, `category_image`, `category_image_url`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '19CATPRE', 'tst', 'test', 'test', 'test description', 'CAT_1728488370_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '87CATPRE', 'sdfgsdfg', 'gsdfgsdfgsd', 'sdfgsdfgsdf', 'sdfgsdf', 'CAT_1728488821_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:47:01', '2024-10-09 15:47:01'),
(3, '80CATPRE', 'sdfgsdfg', 'gsdfgsdfgsd', 'sdfgsdfgsdf', 'sdfgsdf', 'CAT_1728489052_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:50:52', '2024-10-09 15:50:52'),
(4, '62CATPRE', 'sdfgsdfg', 'gsdfgsdfgsd', 'sdfgsdfgsdf', 'sdfgsdf', 'CAT_1728489100_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:51:40', '2024-10-09 15:51:40'),
(5, '38CATPRE', 'dfgd', 'dfgdf', 'fgdfg', 'sdfgsdf', 'CAT_1728489203_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:53:23', '2024-10-09 15:53:23'),
(6, '85CATPRE', 'dfgdf', 'sdgsdg', 'sdfgsdfgsdfsdg', 'sdfgsdf', 'CAT_1728489286_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:54:46', '2024-10-09 15:54:46'),
(7, '30CATPRE', 'asdfsa', 'asdfas', 'asdfasdf', 'asdfasd', 'CAT_1728489388_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:56:28', '2024-10-09 15:56:28'),
(8, '75CATPRE', 'asdfsa', 'asdfas', 'asdfasdf', 'asdfasd', 'CAT_1728489479_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:57:59', '2024-10-09 15:57:59'),
(9, '73CATPRE', 'asdfsa', 'sdfgsdf', 'sdfgsdgf', 'sdfgsd', 'CAT_1728489497_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:58:17', '2024-10-09 15:58:17'),
(10, '11CATPRE', 'hjh', 'hjh', 'hjhj', 'hjh', 'CAT_1728489550_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 15:59:10', '2024-10-09 15:59:10'),
(11, '50CATPRE', 'sdfggsdfg', 'kjk', 'hjjkk', 'ghjkg', 'CAT_1728489767_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 2, 1, '', '2024-10-09 16:02:47', '2024-10-09 16:02:47'),
(12, '81CATPRE', 'sdfggsdfg', 'kjk', 'hjjkk', 'ghjkg', 'CAT_1728489779_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 2, 1, '', '2024-10-09 16:02:59', '2024-10-09 16:02:59'),
(13, '94CATPRE', 'sdfggsdfg', 'kjk', 'hjjkk', 'ghjkg', 'CAT_1728489803_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 2, 1, '', '2024-10-09 16:03:23', '2024-10-09 16:03:23'),
(14, '17CATPRE', 'dfgdfg', 'yrt', 'fgdfgtyrt', 'rtyr', 'CAT_1728489825_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:03:45', '2024-10-09 16:03:45'),
(15, '21CATPRE', 'dfgdfg', 'yrt', 'fgdfgtyrt', 'rtyr', 'CAT_1728490054_IMG.png', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:07:34', '2024-10-09 16:07:34'),
(16, '46CATPRE', 'asdfasfd', 'asdfasdf', 'asdfasdf', 'asdf', 'CAT_1728490065_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:07:45', '2024-10-09 16:07:45'),
(17, '17CATPRE', 'asdfasfd', 'asdfasdf', 'asdfasdf', 'asdf', 'CAT_1728490087_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:08:07', '2024-10-09 16:08:07'),
(18, '21CATPRE', 'dfd', 'qwe', 'qwe', 'qweqw', 'CAT_1728490098_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:08:18', '2024-10-09 16:08:18'),
(19, '58CATPRE', 'dfd', 'qwe', 'qwe', 'qweqw', 'CAT_1728490225_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:10:25', '2024-10-09 16:10:25'),
(20, '81CATPRE', 'nm', 'nm', 'nm', 'nm', 'CAT_1728490240_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:10:40', '2024-10-09 16:10:40'),
(21, '38CATPRE', 'nm', 'nm', 'nm', 'nm', 'CAT_1728490354_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:12:34', '2024-10-09 16:12:34'),
(22, '55CATPRE', 'testtest', 'setsetset', 'testsetset', 'tgestset', 'CAT_1728490533_IMG.jpg', 'C:/xampp2/htdocs/uk-17/catagory_image/', 1, 1, '', '2024-10-09 16:15:33', '2024-10-09 16:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `uk_contact_information`
--

CREATE TABLE `uk_contact_information` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(25) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uk_product`
--

CREATE TABLE `uk_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_un_id` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_sub_category_id` int(11) NOT NULL,
  `in_stoke` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_gender` int(11) NOT NULL,
  `product_sale_type` varchar(100) NOT NULL,
  `in_stoke_message` text NOT NULL,
  `out_of_stoke_message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uk_product_size`
--

CREATE TABLE `uk_product_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `in_stoke` varchar(100) NOT NULL,
  `size_color` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uk_site_master`
--

CREATE TABLE `uk_site_master` (
  `id` int(11) NOT NULL,
  `store_name` varchar(255) NOT NULL,
  `store_alias` varchar(255) NOT NULL,
  `customer_service_email` varchar(255) NOT NULL,
  `store_email` varchar(255) NOT NULL,
  `store_logo` varchar(255) NOT NULL,
  `store_icon` varchar(255) NOT NULL,
  `store_url` varchar(255) NOT NULL,
  `store_state` varchar(255) NOT NULL,
  `store_location` varchar(255) NOT NULL,
  `store_address` varchar(255) NOT NULL,
  `contact_email_display` varchar(255) NOT NULL,
  `store_status` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `from_email_name` varchar(255) NOT NULL,
  `from_email_address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uk_sub_category`
--

CREATE TABLE `uk_sub_category` (
  `id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `sub_category_image` varchar(255) NOT NULL,
  `sub_category_image_url` varchar(255) NOT NULL,
  `sub_category_description` text NOT NULL,
  `sub_category_text` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uk_users`
--

CREATE TABLE `uk_users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `is_user_login` varchar(255) NOT NULL,
  `last_login_time` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uk_users`
--

INSERT INTO `uk_users` (`id`, `username`, `user_type_id`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `password`, `phone`, `session_id`, `is_active`, `is_user_login`, `last_login_time`, `created_at`, `updatedAt`) VALUES
(1, 'admin', 1, 'ankit', 'kumar', 'sharma', '1', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3 ', '958866995', '1728487972', '1', '1', '2024-10-09 15:33:27', '2024-10-09 12:29:10', '2024-10-09 12:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `uk_user_role`
--

CREATE TABLE `uk_user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uk_category`
--
ALTER TABLE `uk_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_contact_information`
--
ALTER TABLE `uk_contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_product`
--
ALTER TABLE `uk_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_product_size`
--
ALTER TABLE `uk_product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_site_master`
--
ALTER TABLE `uk_site_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_sub_category`
--
ALTER TABLE `uk_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_users`
--
ALTER TABLE `uk_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uk_user_role`
--
ALTER TABLE `uk_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uk_category`
--
ALTER TABLE `uk_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `uk_contact_information`
--
ALTER TABLE `uk_contact_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uk_product`
--
ALTER TABLE `uk_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uk_product_size`
--
ALTER TABLE `uk_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uk_site_master`
--
ALTER TABLE `uk_site_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uk_sub_category`
--
ALTER TABLE `uk_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uk_users`
--
ALTER TABLE `uk_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uk_user_role`
--
ALTER TABLE `uk_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
