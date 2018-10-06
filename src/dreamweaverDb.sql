-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_singers` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_desc` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_date` date NOT NULL,
  `album_banner` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `animation`;
CREATE TABLE `animation` (
  `animation_id` int(11) NOT NULL AUTO_INCREMENT,
  `animation_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `animation_desc` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `animation_banner` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`animation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(256) NOT NULL,
  `movie_actors` varchar(256) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_desc` varchar(1024) NOT NULL,
  `movie_duration` varchar(256) NOT NULL,
  `movie_banner` varchar(512) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `slides` (`id`, `image_name`) VALUES
(71,	'1538753541_9.jpeg'),
(72,	'1538753541_8.jpeg'),
(73,	'1538753541_7.jpeg'),
(74,	'1538753541_6.jpeg'),
(75,	'1538753542_5.jpeg'),
(76,	'1538753542_4.jpeg'),
(77,	'1538753542_3.jpeg'),
(78,	'1538753542_25.jpeg'),
(79,	'1538753542_24.jpeg'),
(80,	'1538753542_23.jpeg'),
(81,	'1538753542_22.jpeg'),
(82,	'1538753542_21.jpeg'),
(83,	'1538753559_20.jpeg'),
(84,	'1538753559_2.jpeg'),
(85,	'1538753559_19.jpeg'),
(86,	'1538753559_18.jpeg'),
(87,	'1538753559_17.jpeg'),
(88,	'1538753560_16.jpeg'),
(89,	'1538753560_15.jpeg'),
(90,	'1538753560_14.jpeg'),
(91,	'1538753560_13.jpeg'),
(92,	'1538753560_12.jpeg'),
(93,	'1538753560_11.jpeg'),
(94,	'1538753561_10.jpeg'),
(96,	'1538753561_1.jpeg');

DROP TABLE IF EXISTS `trailers`;
CREATE TABLE `trailers` (
  `trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `trailer_name` varchar(512) NOT NULL,
  PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `u_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`) VALUES
(1,	'admin@dreamweaver.com',	'$2y$10$g4f/SOBOlEKJ1rzYJ/Wiyuq1YxcmqLvZcIhMD2cqPdM5HIul9PQHO');

DROP TABLE IF EXISTS `webseries`;
CREATE TABLE `webseries` (
  `webseries_id` int(11) NOT NULL AUTO_INCREMENT,
  `webseries_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_actors` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_desc` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `webseries_season` int(4) NOT NULL,
  `webseries_date` date NOT NULL,
  `webseries_banner` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`webseries_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-10-06 06:55:42