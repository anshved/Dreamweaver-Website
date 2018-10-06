-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `dreamer_upload`;
CREATE TABLE `dreamer_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `resume` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2018-10-06 11:29:26