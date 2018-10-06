-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `webseries_trailer`;
CREATE TABLE `webseries_trailer` (
  `wb_trailer_id` int(11) NOT NULL AUTO_INCREMENT,
  `webseries_id` int(11) NOT NULL,
  `wb_trailer_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`wb_trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2018-10-06 13:12:53