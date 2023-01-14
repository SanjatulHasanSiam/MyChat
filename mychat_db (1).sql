-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 10:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `msgid` varchar(60) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `files` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `received` int(11) NOT NULL DEFAULT 0,
  `deleted_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `sender`, `receiver`, `message`, `files`, `date`, `seen`, `received`, `deleted_sender`, `deleted_receiver`) VALUES
(1, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 41012589130781368, 433039169540, 'hello there', NULL, '2023-01-10 18:43:10', 0, 0, 0, 0),
(2, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hey hey', NULL, '2023-01-10 19:10:21', 0, 0, 0, 0),
(3, 'uGKQmNZcGAIPAXxvfuHXzcjfbLVBAgGN1fI3yMzstp5zCQjgEUqTo', 433039169540, 178543073478862768, 'hello hello', NULL, '2023-01-10 19:10:43', 1, 1, 0, 0),
(4, 'LMDKczr2nTZk1TkOWmWJrNsy', 433039169540, 324252818113, 'okkk brohhh', NULL, '2023-01-10 19:10:55', 0, 0, 0, 0),
(5, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'Hi brooh', NULL, '2023-01-10 19:15:27', 0, 0, 0, 0),
(6, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'idk', NULL, '2023-01-10 19:16:39', 0, 0, 0, 0),
(7, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'idk', NULL, '2023-01-10 19:16:42', 0, 0, 0, 0),
(8, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'idk', NULL, '2023-01-10 19:16:43', 0, 0, 0, 0),
(9, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hi', NULL, '2023-01-10 19:21:59', 0, 0, 0, 0),
(10, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'okk', NULL, '2023-01-10 19:28:30', 0, 0, 0, 0),
(11, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'whats up', NULL, '2023-01-10 19:29:21', 0, 0, 0, 0),
(12, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'more testing', NULL, '2023-01-10 19:36:59', 0, 0, 0, 0),
(13, 'LMDKczr2nTZk1TkOWmWJrNsy', 433039169540, 324252818113, 'how are you', NULL, '2023-01-10 19:41:59', 0, 0, 0, 0),
(14, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'How are you?', NULL, '2023-01-10 19:42:12', 0, 0, 0, 0),
(15, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'how are you?', NULL, '2023-01-10 19:42:26', 0, 0, 0, 0),
(16, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'latest', NULL, '2023-01-10 19:45:35', 0, 0, 0, 0),
(17, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'latest latest', NULL, '2023-01-10 19:48:15', 0, 0, 0, 0),
(18, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hey', NULL, '2023-01-10 20:14:00', 0, 0, 0, 0),
(19, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hello', NULL, '2023-01-10 20:14:03', 0, 0, 0, 0),
(20, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hi', NULL, '2023-01-10 20:14:06', 0, 0, 0, 0),
(21, 'junNK3Q1JsL1iCeU3Bwb73G7d8kR7MyGC1UDAjI4qp7YD3doFCY5C', 433039169540, 41012589130781368, 'hello', NULL, '2023-01-10 20:49:39', 0, 0, 0, 0),
(22, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hey merry', NULL, '2023-01-13 06:58:13', 1, 1, 1, 0),
(23, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, 'how are you?', NULL, '2023-01-13 07:20:08', 1, 1, 0, 1),
(24, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'i\'m fine', NULL, '2023-01-13 07:20:33', 1, 1, 1, 0),
(25, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '?', NULL, '2023-01-13 07:20:38', 1, 1, 0, 1),
(26, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hello', NULL, '2023-01-13 07:31:26', 1, 1, 1, 0),
(27, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hghg', NULL, '2023-01-13 11:58:43', 1, 1, 1, 0),
(28, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hello whats up', NULL, '2023-01-13 13:04:50', 1, 1, 1, 0),
(29, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, 'I\'m fine', NULL, '2023-01-13 13:05:53', 1, 1, 0, 1),
(30, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'Testing audio', NULL, '2023-01-13 13:20:54', 1, 1, 1, 0),
(31, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, 'got it', NULL, '2023-01-13 13:21:28', 1, 1, 0, 1),
(32, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hello', NULL, '2023-01-13 13:34:19', 1, 1, 1, 0),
(33, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'sound check', NULL, '2023-01-13 13:39:08', 1, 1, 1, 0),
(34, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, 'Hi', NULL, '2023-01-13 16:14:27', 1, 1, 0, 0),
(36, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '', 'uploads/user2.jpg', '2023-01-13 16:46:46', 1, 1, 0, 0),
(37, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, '', 'uploads/ann2.png', '2023-01-13 16:52:00', 1, 1, 0, 0),
(38, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '', 'uploads/user1.jpg', '2023-01-13 17:04:48', 1, 1, 0, 0),
(39, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '', 'uploads/user1.jpg', '2023-01-13 17:07:38', 1, 1, 0, 0),
(40, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '', 'uploads/IMG_20220630_173351.jpg', '2023-01-13 17:11:54', 1, 1, 0, 0),
(41, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 178543073478862768, 324252818113, '', 'uploads/user1.jpg', '2023-01-13 17:46:12', 1, 1, 0, 0),
(42, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'hi there', NULL, '2023-01-13 20:38:43', 1, 1, 0, 0),
(43, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'how are you?', NULL, '2023-01-13 20:39:04', 1, 1, 0, 0),
(44, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'I\'m fine though', NULL, '2023-01-13 20:41:28', 0, 1, 0, 0),
(45, 'nmG1G9hjJpjKx7FjyHg6SZUguc5zjfZpNhRyhmVJUCRwUo', 324252818113, 178543073478862768, 'I\'m also fine', NULL, '2023-01-13 20:42:32', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `image`, `date`, `online`) VALUES
(3, 41012589130781368, 'Siam', 'sanjatulhasansiam.iit@gmail.com', 'Male', 'password', '', '2022-12-22 20:35:22', 0),
(4, 433039169540, 'hasan', 'shsiam800@gmail.com', 'Male', 'password', 'uploads/IMG_20220630_174725.jpg', '2022-12-24 15:21:08', 0),
(6, 178543073478862768, 'marry', 'shsiam99@yahoo.com', 'Female', 'password', '', '2022-12-24 16:19:21', 0),
(7, 324252818113, 'sanjatulsiam', 'shss@gmail.com', 'Male', '123456789', 'uploads/IMG_20220630_173351.jpg', '2022-12-24 16:31:36', 0),
(8, 1676411055305239504, 'shss', 'sib@gmail.com', 'Male', '123456789', '', '2023-01-13 21:39:19', 0),
(9, 4042998808, 'tahmid', 'th@gmail.com', 'Male', '123456789', '', '2023-01-13 21:57:29', 0),
(12, 229115994377021, 'Sunaan', 'ssss@gmail.com', 'Female', '123456789', '', '2023-01-13 22:03:40', 0),
(13, 4070460939141126, 'sns', 'sns@gmail.com', 'Female', '123456789', '', '2023-01-13 22:05:41', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `date` (`date`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `deleted_receiver` (`deleted_receiver`),
  ADD KEY `seen` (`seen`),
  ADD KEY `msgid` (`msgid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gender` (`gender`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
