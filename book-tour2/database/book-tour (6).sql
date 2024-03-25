-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 01:44 PM
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
-- Database: `book-tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin_ID` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Passkey` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin_ID`, `First_Name`, `Surname`, `Email`, `Passkey`) VALUES
(1, 'Zahid', 'Faqiri', 'zahidfaqiri786@gmail.com', '$2y$12$mw07/brCLJwtRr91xuK1hePyob6peEMQwA4wBrGl/e9LaC9iqoTa2');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Book_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Stock` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_ID`, `Title`, `Author`, `Genre`, `Price`, `Stock`, `file`, `deleted_at`) VALUES
(1, 'changeplz', 'Me', 'Fantasy', 75.00, '39', '1710932456-rtyuio.jpg', '2024-03-25 10:26:26'),
(2, 'change', 'Zahid', 'Fiction', 30.00, '87', '1710937640-new book.png', '2024-03-23 15:24:22'),
(3, 'other', 'Zahid', 'Non Fiction', 90.00, '148', '1710937679-other.png', '2024-03-23 14:22:57'),
(6, 'Testing', 'Zahid', 'Non Fiction', 70.00, '179', '1710938783-Testing.png', NULL),
(8, 'dsnfj', 'uisd', 'iuhd', 92.00, '281', '1711206799-dsnfj.png', NULL),
(9, 'jkdsnf', 'jnfsk', 'kjnfs', 439.00, '981', '1711208519-jkdsnf.png', '2024-03-25 11:26:15'),
(10, 'djkan', 'kjndakj', 'jknd', 89.00, '443', '1711330012-djkan.png', '2024-03-25 12:10:28');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_03_23_141113_add_soft_deletes_to_books_table', 2),
(5, '2024_03_25_021519_add_status_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Shipping_First_Name` varchar(255) NOT NULL,
  `Shipping_Last_Name` varchar(255) NOT NULL,
  `Shipping_Address` text NOT NULL,
  `Shipping_City` varchar(255) NOT NULL,
  `Order_Total` decimal(10,2) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('accepted','processing','delivering','delivered') NOT NULL DEFAULT 'processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `User_ID`, `Shipping_First_Name`, `Shipping_Last_Name`, `Shipping_Address`, `Shipping_City`, `Order_Total`, `Created_At`, `Updated_At`, `status`) VALUES
(1, 2, 'asndu', 'uadia', 'ubda', 'kjdna', 155.00, '2024-03-21 21:37:57', '2024-03-25 12:00:54', 'processing'),
(2, 2, 'kjasdb', 'kjbdkjab', 'kjdbakjbd', 'kjbdakjb', 170.00, '2024-03-21 22:08:06', '2024-03-21 22:08:06', 'accepted'),
(3, 3, 'vbhnj', 'vbhnm', 'dfghj', 'fvgbhn', 35.00, '2024-03-23 15:23:47', '2024-03-25 12:20:49', 'processing'),
(4, 3, 'dfghj', 'fghj', 'fghj', 'fghj', 444.00, '2024-03-25 02:43:50', '2024-03-25 12:05:06', 'processing'),
(5, 3, 'dfgh', 'fghjk', 'dfghjghj', 'fgh', 625.00, '2024-03-25 03:19:41', '2024-03-25 03:19:41', 'accepted'),
(11, 4, 'fghjk', 'fghj', 'fghj', 'fghj', 167.00, '2024-03-25 11:55:13', '2024-03-25 12:08:13', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `Order_Item_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Book_ID` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`Order_Item_ID`, `Order_ID`, `Book_ID`, `Quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2024-03-21 21:37:57', '2024-03-21 21:37:57'),
(2, 1, 3, 1, '2024-03-21 21:37:57', '2024-03-21 21:37:57'),
(3, 2, 3, 1, '2024-03-21 22:08:06', '2024-03-21 22:08:06'),
(4, 2, 1, 1, '2024-03-21 22:08:06', '2024-03-21 22:08:06'),
(5, 3, 2, 1, '2024-03-23 15:23:47', '2024-03-23 15:23:47'),
(6, 4, 9, 1, '2024-03-25 02:43:50', '2024-03-25 02:43:50'),
(7, 5, 10, 1, '2024-03-25 03:19:41', '2024-03-25 03:19:41'),
(8, 5, 8, 1, '2024-03-25 03:19:41', '2024-03-25 03:19:41'),
(9, 5, 9, 1, '2024-03-25 03:19:41', '2024-03-25 03:19:41'),
(10, 11, 6, 1, '2024-03-25 11:55:13', '2024-03-25 11:55:13'),
(11, 11, 8, 1, '2024-03-25 11:55:13', '2024-03-25 11:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin', 1, 'BookTourAdmin', 'd7778ccdc6cd798324f4a126be373dfd088ccc30c4a7f384de067e5c98029f04', '[\"*\"]', '2024-03-20 11:00:58', NULL, '2024-03-20 10:55:30', '2024-03-20 11:00:58'),
(2, 'App\\Models\\Admin', 1, 'BookTourAdmin', '0950ffab1e61e1c56cd5a7abd2534df90549ef6577d22b4ecd6b7ec051f0f54d', '[\"*\"]', '2024-03-21 22:21:46', NULL, '2024-03-20 12:26:35', '2024-03-21 22:21:46'),
(3, 'App\\Models\\Admin', 1, 'BookTourAdmin', '94d1afc281ff9ab1905d49e8dcc410fde91a4831f71cd1195e96c20bf4faf856', '[\"*\"]', '2024-03-22 00:07:34', NULL, '2024-03-21 23:16:19', '2024-03-22 00:07:34'),
(4, 'App\\Models\\Admin', 1, 'BookTourAdmin', '2d0c11921ddc09dfdf817f648ab13dd358b390f6ddcb5965a8e106998b8fd96e', '[\"*\"]', '2024-03-25 04:37:30', NULL, '2024-03-22 00:07:58', '2024-03-25 04:37:30'),
(5, 'App\\Models\\Admin', 1, 'BookTourAdmin', 'a99a197e87034e649c1176f217cfff69202826d4619433f21f2a4702d1af8e57', '[\"*\"]', '2024-03-25 12:21:45', NULL, '2024-03-25 10:26:12', '2024-03-25 12:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `readinglist`
--

CREATE TABLE `readinglist` (
  `User_ID` bigint(20) NOT NULL,
  `Book_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readinglist`
--

INSERT INTO `readinglist` (`User_ID`, `Book_ID`) VALUES
(1, 1),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Book_ID` int(11) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Customer_Name` varchar(20) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Book_ID`, `User_ID`, `Customer_Name`, `Title`, `Body`, `created_at`, `updated_at`) VALUES
(1, 1, 'Josiah', 'Best Book!', 'Testing review function pls work', '2024-03-20 11:03:43', '2024-03-20 11:03:43'),
(1, 4, 'othertest2', 'very good', 'i liked this book', '2024-03-22 13:28:42', '2024-03-22 13:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Josiah', 'josiahfitton@gmail.com', NULL, '$2y$12$mt1sQlbcdncePC5Frv3tR.7Dhakguh/LJc3.425hmtXaxblIwq4kG', NULL, '2024-03-20 10:43:26', '2024-03-20 10:43:26'),
(2, 'testing', 'test@test.com', NULL, '$2y$12$ltUpR9TUQ2Hc/bSBJslC9.B9geY88BzIVd8Cis.0/LujMPoOVlZ0.', NULL, '2024-03-21 21:36:58', '2024-03-21 21:36:58'),
(3, 'othertest', 'other@test.com', NULL, '$2y$12$cX5EPlMPaNCSSeyxlRgNPeIs0r.d8EogfhqIJSaRDYAuO.VuaqcCe', NULL, '2024-03-22 12:43:57', '2024-03-22 12:43:57'),
(4, 'othertest2', 'other2@test.com', NULL, '$2y$12$UTUtilQU2nUiiizt0oJDoO6Y6VQnEUGqOduhB2.Y7eFMBO32XsSK.', NULL, '2024-03-22 12:49:04', '2024-03-22 12:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD KEY `fk_book_id` (`Book_ID`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_ID`);

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
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `fk_orders_user_id` (`User_ID`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`Order_Item_ID`),
  ADD KEY `fk_orders_order_id` (`Order_ID`),
  ADD KEY `fk_books_book_id` (`Book_ID`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `readinglist`
--
ALTER TABLE `readinglist`
  ADD KEY `fk_readinglist_user_id` (`User_ID`),
  ADD KEY `fk_readinglist_book_id` (`Book_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `fk_reviews_user_id` (`User_ID`),
  ADD KEY `fk_reviews_book_id` (`Book_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `Order_Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_book_id` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_books_book_id` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`),
  ADD CONSTRAINT `fk_orders_order_id` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`);

--
-- Constraints for table `readinglist`
--
ALTER TABLE `readinglist`
  ADD CONSTRAINT `fk_readinglist_book_id` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`),
  ADD CONSTRAINT `fk_readinglist_user_id` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_book_id` FOREIGN KEY (`Book_ID`) REFERENCES `books` (`Book_ID`),
  ADD CONSTRAINT `fk_reviews_user_id` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
