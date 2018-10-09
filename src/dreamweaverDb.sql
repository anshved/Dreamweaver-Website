-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `singers` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `albums` (`id`, `name`, `singers`, `description`, `date`, `banner`, `status`, `date_created`) VALUES
(2,	'album test',	'tes',	'tes',	'2018-10-21',	'1538927118_leio-mclaren-299136-unsplash.jpg',	'completed',	'2018-10-07'),
(3,	'album test 2',	'test',	'tes',	'2018-10-05',	'1538999674_black-panther-4000x2250-tchalla-marvel-comics-purple-sky-purple-suit-13280.jpg',	'upcoming',	'2018-10-08');

DROP TABLE IF EXISTS `animation`;
CREATE TABLE `animation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `animation` (`id`, `name`, `description`, `banner`, `status`, `date_created`) VALUES
(2,	'Animation test',	'test',	'1538927165_leio-mclaren-299136-unsplash.jpg',	'inprogress',	'2017-10-07'),
(3,	'Animation test 2',	'test',	'1538999719_black-panther-4000x2250-tchalla-marvel-comics-purple-sky-purple-suit-13280.jpg',	'completed',	'2018-10-08');

DROP TABLE IF EXISTS `dreamer_upload`;
CREATE TABLE `dreamer_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `resume` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `dreamer_upload` (`id`, `first`, `last`, `type`, `resume`, `email`, `contact`, `description`, `filename`) VALUES
(2,	'tes',	'tes',	'Image',	'tes',	'tes@etes',	'tes',	'tes',	'1538822164_wade-meng-381499-unsplash.jpg'),
(3,	'tes',	'tes',	'Video',	'tes',	'tes@etes',	'tes',	'tes',	'1538822865_a.mp4'),
(4,	'Vivek',	'Gawande',	'Script',	'bit.ly/ViveksResume',	'vivekbgawande@gmail.com',	'07039715240',	'Hello world',	'1538825259_Delivery_Notes.txt'),
(5,	'test',	'test',	'Audio',	'test',	'vivekbgawande@gmail.com',	'07039715240',	'test',	'1539000272_bure bure.mp3');

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actors` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duration` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `banner` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `movies` (`id`, `name`, `actors`, `date`, `description`, `duration`, `banner`, `status`, `date_created`) VALUES
(66,	'tes',	'tes',	'2018-10-11',	'tes',	'1:15',	'1538926756_karl-s-1078414-unsplash.jpg',	'completed',	'2018-09-07'),
(67,	'movie test',	'tes',	'2018-10-19',	'tes',	'0:16',	'1538927076_karl-s-1078414-unsplash.jpg',	'completed',	'2018-10-05');

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `headline` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `trailer_name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`trailer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `trailers` (`trailer_id`, `movie_id`, `trailer_name`) VALUES
(32,	63,	'1538402828_a.mp4'),
(33,	67,	'1539003236_a.mp4'),
(34,	67,	'1539003237_b.mp4');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_pass` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `u_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`) VALUES
(1,	'admin@dreamweaver.com',	'$2y$10$g4f/SOBOlEKJ1rzYJ/Wiyuq1YxcmqLvZcIhMD2cqPdM5HIul9PQHO');

DROP TABLE IF EXISTS `webseries`;
CREATE TABLE `webseries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` int(4) NOT NULL,
  `date` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `webseries` (`id`, `name`, `actors`, `description`, `season`, `date`, `banner`, `status`, `date_created`) VALUES
(2,	'webseries test',	'test',	'test',	3,	'2018-10-13',	'1538927146_black-panther-4000x2250-tchalla-marvel-comics-purple-sky-purple-suit-13280.jpg',	'completed',	'2018-10-07'),
(3,	'webseries test 2',	'test',	'test',	2,	'2018-10-11',	'1538999330_leio-mclaren-299136-unsplash.jpg',	'upcoming',	'2018-10-08');

-- 2018-10-09 12:00:13