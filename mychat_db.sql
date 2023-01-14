-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 06:41 AM
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
-- Table structure for table `block_list`
--

CREATE TABLE `block_list` (
  `id` bigint(20) NOT NULL,
  `blocked_by` bigint(20) NOT NULL,
  `blocked` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `block_list`
--

INSERT INTO `block_list` (`id`, `blocked_by`, `blocked`) VALUES
(8, 852162731, 184793477769);

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
(1, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 2579389443460, 852162731, 'hi', NULL, '2023-01-14 06:02:47', 1, 1, 0, 0),
(2, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 852162731, 2579389443460, 'Hello', NULL, '2023-01-14 06:03:04', 1, 1, 0, 0),
(3, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 2579389443460, 852162731, 'How are you?', NULL, '2023-01-14 06:03:25', 1, 1, 0, 0),
(4, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 2579389443460, 852162731, '', 'uploads/ann1.png', '2023-01-14 06:03:51', 1, 1, 0, 0),
(5, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 2579389443460, 852162731, 'All right', NULL, '2023-01-14 06:04:37', 1, 1, 0, 0),
(6, 'xMukEh3C73f57VHGmq2QBWdeMJhEOCCK1rWy', 852162731, 2579389443460, 'I didn\'t get that', NULL, '2023-01-14 06:06:56', 0, 1, 0, 0);

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
  `password` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `image`, `date`, `online`) VALUES
(1, 852162731, 'Sanjatul Hasan Siam', 'shsiam99@yahoo.com', 'Male', '$2y$10$0gjzXC3qbyEweD1IdXal3uC3WhCVGW1vr6BsVprc3IcqeuXMA78Xy', '', '2023-01-14 04:26:01', 0),
(2, 184793477769, 'Abdullah Al Tahmid', 'tahmid@gmail.com', 'Male', '$2y$10$mWvveZf5x539uWKMFcWXzOdIw05nZvEAuA8SxuBT4zKTWdQHBlilm', '', '2023-01-14 04:27:27', 0),
(3, 3969942498, 'Sunaan Sultan', 'sunaan@gmail.com', 'Male', '$2y$10$Ayd5ixr2mOpXPWx3PU4c5.qKb1.Obq98DBsEknTlJzfCetR3bRLT.', '', '2023-01-14 04:28:22', 0),
(4, 2579389443460, 'Ayesha Nasrin Ripa', 'ayesha@gmail.com', 'Female', '$2y$10$0P7lxVgxZv/.aU4vY5fhjub34bZuBTjgXpgaEKo9QkNk/7ILgPptG', '', '2023-01-14 04:29:06', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_list`
--
ALTER TABLE `block_list`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `block_list`
--
ALTER TABLE `block_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
