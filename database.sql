-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Structuur van  tabel puzzel.informatie wordt geschreven
CREATE TABLE IF NOT EXISTS `informatie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titel` varchar(255) NOT NULL DEFAULT '0',
  `informatie` varchar(255) NOT NULL DEFAULT '0',
  `foto` varchar(255) NOT NULL DEFAULT '0',
  `locatie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel puzzel.informatie: 1 rows
/*!40000 ALTER TABLE `informatie` DISABLE KEYS */;
INSERT INTO `informatie` (`id`, `titel`, `informatie`, `foto`, `locatie_id`) VALUES
	(1, 'Jachtdieren', 'In afrika zijn er enorm veel...', 'http://static.nationalgeographic.nl/uploads/media/image/snelste-cheeta-sarah-foto-van-de-dag.jpg', NULL);
/*!40000 ALTER TABLE `informatie` ENABLE KEYS */;


-- Structuur van  tabel puzzel.locations wordt geschreven
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `long` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel puzzel.locations: 3 rows
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `name`, `lat`, `long`) VALUES
	(1, 'marker 1', 51.800140, 4.669297),
	(3, 'marker 3', NULL, NULL),
	(2, 'marker 2', NULL, NULL);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;


-- Structuur van  tabel puzzel.quiz wordt geschreven
CREATE TABLE IF NOT EXISTS `quiz` (
  `quizID` int(255) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`quizID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel puzzel.quiz: ~1 rows (ongeveer)
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` (`quizID`, `question`, `choice1`, `choice2`, `choice3`, `answer`) VALUES
	(3, 'Wat begon WW1?', 'duitsland viel andere landen aan', 'Franz Ferdinand werd vermoord', 'Duitsland Viel polen binnen.', 'Murica en russiaa');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;


-- Structuur van  tabel puzzel.user wordt geschreven
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `score` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel puzzel.user: 3 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `score`, `password`) VALUES
	(2, 'Hassan', 'baas', 'Hdebaas@hotmail.com', '2', '202cb962ac59075b964b07152d234b70'),
	(4, 'Mounir', 'Azaouagh', '1@1.nl', '5', 'c4ca4238a0b923820dcc509a6f75849b'),
	(5, 'Peter', 'dijk', '2@2.nl', '500', 'c81e728d9d4c2f636f067f89cc14862c');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
