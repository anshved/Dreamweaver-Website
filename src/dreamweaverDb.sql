-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2018 at 09:49 AM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamweaverDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_singers` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_desc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_date` date NOT NULL,
  `album_banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animation`
--

CREATE TABLE `animation` (
  `animation_id` int(11) NOT NULL,
  `animation_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animation_desc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animation_banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_actors` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_date` date NOT NULL,
  `movie_desc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_duration` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trailers`
--

CREATE TABLE `trailers` (
  `trailer_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `trailer_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trailers`
--

INSERT INTO `trailers` (`trailer_id`, `movie_id`, `trailer_name`) VALUES
(22, 59, '1537632829_a.mp4'),
(23, 59, '1537632854_b.mp4'),
(24, 59, '1537632927_c.mp4'),
(25, 59, '1537632927_b.mp4'),
(26, 59, '1537632927_a.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'admin@dreamweaver.com', '$2y$10$g4f/SOBOlEKJ1rzYJ/Wiyuq1YxcmqLvZcIhMD2cqPdM5HIul9PQHO');

-- --------------------------------------------------------

--
-- Table structure for table `webseries`
--

CREATE TABLE `webseries` (
  `webseries_id` int(11) NOT NULL,
  `webseries_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_actors` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_desc` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_season` int(4) NOT NULL,
  `webseries_date` date NOT NULL,
  `webseries_banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `animation`
--
ALTER TABLE `animation`
  ADD PRIMARY KEY (`animation_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `trailers`
--
ALTER TABLE `trailers`
  ADD PRIMARY KEY (`trailer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `u_email` (`user_email`);

--
-- Indexes for table `webseries`
--
ALTER TABLE `webseries`
  ADD PRIMARY KEY (`webseries_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `animation`
--
ALTER TABLE `animation`
  MODIFY `animation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `trailers`
--
ALTER TABLE `trailers`
  MODIFY `trailer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `webseries`
--
ALTER TABLE `webseries`
  MODIFY `webseries_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
