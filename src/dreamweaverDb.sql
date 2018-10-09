-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singers` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `animation`;
CREATE TABLE `animation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `dreamer_upload`;
CREATE TABLE `dreamer_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `trailers`;
CREATE TABLE `trailers` (
  `trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `trailer_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_pass` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `u_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `webseries`;
CREATE TABLE `webseries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` int(4) NOT NULL,
  `date` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `webseries_trailer`;
CREATE TABLE `webseries_trailer` (
  `wb_trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `webseries_id` int(11) NOT NULL,
  `wb_trailer_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`wb_trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-10-09 03:12:07