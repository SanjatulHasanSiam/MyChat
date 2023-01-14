-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 06:49 PM
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
-- Table structure for table `friend_list`
--

CREATE TABLE `friend_list` (
  `id` bigint(20) NOT NULL,
  `added_by` bigint(20) NOT NULL,
  `added` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_list`
--

INSERT INTO `friend_list` (`id`, `added_by`, `added`) VALUES
(1, 1273952, 49321434932372),
(2, 1273952, 96818098321650);

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
(1, 'g7mQEGjx89X2xISFmFK1cGfk', 1273952, 49321434932372, 'Hi', NULL, '2023-01-14 18:43:55', 1, 1, 0, 0),
(2, 'g7mQEGjx89X2xISFmFK1cGfk', 49321434932372, 1273952, '', 'uploads/user2.jpg', '2023-01-14 18:44:55', 1, 1, 0, 0),
(3, 'g7mQEGjx89X2xISFmFK1cGfk', 49321434932372, 1273952, 'hi', NULL, '2023-01-14 18:45:38', 0, 1, 0, 0);

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
  `online` int(11) NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `OTP` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `username`, `email`, `gender`, `password`, `image`, `date`, `online`, `isVerified`, `OTP`) VALUES
(10, 1273952, 'Sanjatul', 'sanjatulhasansiam.iit@gmail.com', 'Male', '$2y$10$oSIczCashilbmtvYMCay4ONnoAZxtm3tUCwyImZV0M7TbXz/MyAoW', 'uploads/IMG_20220630_141150.jpg', '2023-01-14 18:22:03', 0, 1, 1645),
(11, 49321434932372, 'Ayesha', 'ayesharipa25@gmail.com', 'Female', '$2y$10$Fyta4iOGTsEb346RIxt19e3L/39DAVrTqnGtafD1mgXVOLLyG22/u', '', '2023-01-14 18:38:43', 0, 1, 1289),
(12, 96818098321650, 'Tahmid', 'mdtahmidh7@gmail.com', 'Male', '$2y$10$MQdKqkA8chWejNOLKi.lkuHeXw45JNF9HeYJwQ8TxMZozcgfWBk3y', '', '2023-01-14 18:40:12', 0, 1, 1050),
(13, 95856319111284, 'Fardin Alif', 'almfardin1521@gmail.com', 'Male', '$2y$10$8G66Skuzi5fIQQAuRCUCZ.RqKwZRWAwkeZlW96Y2uJcVt8vDFPoIq', '', '2023-01-14 18:41:28', 0, 1, 1239),
(14, 8817646, 'Siam', 'sanjatul2514@student.nstu.edu.bd', 'Male', '$2y$10$kpWckwaOO1u0UxA80iRVOOQ4BLPyl10M3gxO8xRDN2vUcsu4kZwCq', '', '2023-01-14 18:41:51', 0, 1, 1854);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_list`
--
ALTER TABLE `friend_list`
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
-- AUTO_INCREMENT for table `friend_list`
--
ALTER TABLE `friend_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
