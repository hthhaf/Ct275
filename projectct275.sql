-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 09:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectct275`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `email`, `password`, `confirmpassword`) VALUES
('hhh', 'hthh8101@gmail.com', '123', '123'),
('hhhaf', 'hthh8101@gmail.com5555', '123', '123'),
('Nguyen Van A', 'nva@gmail.com', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(33, 'Daisy', '2021-12-13 15:04:48', '2021-12-13 15:04:48'),
(35, 'Rose', '2021-12-13 15:20:48', '2021-12-13 15:20:48'),
(36, 'Lily', '2021-12-13 15:27:48', '2021-12-13 15:27:48'),
(43, 'Sunflower', '2021-12-13 15:34:49', '2021-12-13 20:33:27'),
(46, 'Tulip', '2021-12-13 15:11:50', '2021-12-13 15:11:50'),
(49, 'Forget-me-not', '2021-12-13 15:32:50', '2021-12-13 15:32:50'),
(54, 'Peony', '2021-12-13 15:15:51', '2021-12-13 15:15:51'),
(67, 'Lavender ', '2021-12-13 15:36:57', '2021-12-14 19:02:15'),
(76, 'Gypsophila', '2021-12-13 16:53:12', '2021-12-13 16:53:12'),
(77, 'Hydrangea', '2021-12-13 16:14:39', '2021-12-13 16:14:39'),
(78, 'Carnations', '2021-12-14 15:09:38', '2021-12-14 15:09:38'),
(80, 'Lotus', '2021-12-16 03:12:19', '2021-12-16 03:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float DEFAULT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Red Roses', 10, 'redrose.jpg', 'Most of us are familiar with what the red rose means, having been used across cultures to represent love and romance for centuries. Red roses are commonly thought to be the perfect gift for Valentine’s Day and have a classy and elegant look that makes them a classic symbol for “I love you”.\r\n\r\nThe meaning of red roses is universally understood to be love and passion. However, even within red roses there are rose colour meanings to be explored. A deep red rose is often thought to mean that you are ready for commitment, and can symbolise a deeper bond than lighter coloured red roses which are said to symbolise passion and desire.\r\n\r\nWhatever your romantic message, red roses are just the thing to make a big gesture to your partner with.\r\n\r\n', 35, '2021-12-11 18:56:08', '2021-12-14 15:58:30'),
(4, 'Peach Roses', 26, 'peach.jpg', 'The meaning of peach roses is gratitude. Their lovely tone and pale colour matches lots of interiors, making them a lovely gift. If you’re looking for a thank-you gift, look no further!', 35, '2021-12-11 18:56:08', '2021-12-14 15:57:33'),
(5, 'White Roses', 20, 'wr.jpg', 'The meaning of white roses is purity and grace. Perhaps that’s why they’re such popular wedding flowers as they symbolise young love and eternal loyalty. The colour white can also be representative of fresh beginnings and a pure, clear path which makes them the ideal flower for weddings and unions.\r\n\r\nIt’s important to note though that the white rose meaning differs to the ivory rose meaning, although they are very similar in colour. Ivory roses mean purity and grace, but also thoughtfulness. They are devoid of romantic meaning, which makes them a great friendship flower vs the white rose meaning which is much more romantic and passionate.', 35, '2021-12-11 19:03:05', '2021-12-14 15:18:35'),
(35, 'Daisy', 12, 'daisy.jpg', '<p>Daisy</p>', 33, '2021-12-13 16:05:07', '2021-12-14 15:39:36'),
(36, 'Pink Carnations', 32, 'pc.jpg', '<p>text</p>', 78, '2021-12-13 16:19:10', '2021-12-14 15:27:38'),
(37, 'Purple Gypsophila', 42, 'pppp.jpg', '<p>text</p>', 0, '2021-12-13 16:43:14', '2021-12-14 15:00:39'),
(38, 'Pink Peony', 20, 'ppp.jpg', '<p>text</p>', 0, '2021-12-13 16:30:18', '2021-12-14 15:31:39'),
(39, 'White Peony', 22, 'white.jpg', '<p>text</p>', 54, '2021-12-13 16:33:19', '2021-12-14 15:47:34'),
(40, 'White Gypsophila', 10, 'biw.jpg', '<p>Text</p>', 0, '2021-12-13 16:14:24', '2021-12-14 15:16:40'),
(41, 'Blue Gypsophila', 24, 'babyb.jpg', '<p>Text</p>', 0, '2021-12-13 16:51:26', '2021-12-14 15:35:41'),
(42, 'Lavender', 25, 'lavender.jpg', '<p>Text</p>', 67, '2021-12-13 16:24:28', '2021-12-14 15:16:42'),
(43, 'Sunflower', 22, 'sunflower.jpg', '<p>Text</p>', 43, '2021-12-13 16:12:30', '2021-12-14 15:13:31'),
(44, 'White Lily', 15, 'lilyw.jpg', '<p>Text</p>', 36, '2021-12-13 16:37:31', '2021-12-14 15:47:42'),
(45, 'White Tulips', 10, 'tulipw.jpg', '<p>Text</p>', 46, '2021-12-13 16:00:33', '2021-12-14 15:19:43'),
(47, 'Forget-me-not', 12, 'fgm.jpg', '<p>Text</p>', 49, '2021-12-13 16:59:36', '2021-12-14 15:27:33'),
(49, 'Blue Hydrangea', 25, 'ctc.jpg', '<p>Text</p>', 77, '2021-12-13 16:33:42', '2021-12-14 15:53:44'),
(50, 'Blue Roses', 24, 'rb.jpg', '<p>Most of us are familiar with what the red rose means, having been used across cultures to represent love and romance for centuries. Red roses are commonly thought to be the perfect gift for Valentine’s Day and have a classy and elegant look that makes them a classic symbol for “I love you”. The meaning of red roses is universally understood to be love and passion. However, even within red roses there are rose colour meanings to be explored. A deep red rose is often thought to mean that you are ready for commitment, and can symbolise a deeper bond than lighter coloured red roses which are said to symbolise passion and desire. Whatever your romantic message, red roses are just the thing to make a big gesture to your partner with.<br></p>', 35, '2021-12-13 16:39:45', '2021-12-14 15:35:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
