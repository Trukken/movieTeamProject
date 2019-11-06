-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 01:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviedb_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `actor_name` varchar(2000) NOT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `actor_name`) VALUES
(1, 'Imani Robles'),
(2, 'Remington Bond'),
(3, 'Efrain Garza'),
(4, 'Meredith Dean'),
(5, 'Jorden George'),
(6, 'Sonia Kelly'),
(7, 'Dayana Berry'),
(8, 'Raphael Tucker'),
(9, 'Kaeden Ochoa'),
(10, 'Judah Franklin'),
(11, 'Zachery Shields'),
(12, 'Leon Mccall'),
(13, 'Edward Sanchez'),
(14, 'Sofia Nunez'),
(15, 'Lamont Pierce'),
(16, 'Rayna Bright'),
(17, 'Jocelynn Petty'),
(18, 'Marisa Castro'),
(19, 'Pranav Stein'),
(20, 'Brodie Douglas');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(3000) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Action'),
(2, 'Science Fiction'),
(3, 'Comedy'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `movie_path` varchar(255) DEFAULT NULL,
  `release_year` date DEFAULT NULL,
  `short_synopsis` varchar(30) DEFAULT NULL,
  `long_synopsis` varchar(3000) DEFAULT NULL,
  `post_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `name`, `cat_id`, `movie_path`, `release_year`, `short_synopsis`, `long_synopsis`, `post_path`) VALUES
(1, 'The Mule', 1, NULL, '2018-12-12', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/the-mule-1545241252[1].jpg'),
(2, 'I am not a witch', 2, NULL, '2019-09-18', 'Lorem ipsum dolor sit ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?', './pics/i-am-not-a-witch-1538407034.jpg'),
(3, 'The Favourite', 3, NULL, '2017-12-11', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?', './pics/the-favourite-1543856486.jpg'),
(4, 'Mission Impossible: Fallout', 4, NULL, '2019-06-29', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/mission-impossible-fallout-1532552331.jpg'),
(5, 'Bisbee`17', 1, NULL, '2016-10-13', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/bisbee-17-1536075736.jpg'),
(6, 'Burning', 2, NULL, '2019-03-29', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/burning-1541173735.jpg'),
(7, 'leave no trace', 4, NULL, '2018-09-15', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/leave-no-trace-1530796800.jpg'),
(8, 'A prayer before dawn', 4, NULL, '2019-06-09', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/a-prayer-before-dawn-1533307129.jpg'),
(9, 'The endless', 3, NULL, '2019-05-03', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/the-endless-1522778896.jpg'),
(10, 'Paddington 2', 1, NULL, '2019-11-05', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis incidunt dignissimos deserunt odio, ab nobis, soluta alias voluptatem laborum eius totam ipsa qui officia! Possimus magnam nemo minus assumenda est?\r\n', './pics/paddington-2-1522778957.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

DROP TABLE IF EXISTS `movie_actors`;
CREATE TABLE IF NOT EXISTS `movie_actors` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  KEY `actor_id` (`actor_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`movie_id`, `actor_id`) VALUES
(1, 20),
(1, 7),
(2, 13),
(3, 13),
(4, 9),
(8, 19),
(9, 18),
(7, 15),
(10, 10),
(5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `playlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_name` varchar(80) NOT NULL,
  `playlist_creation_time` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`playlist_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `playlist_movies`
--

DROP TABLE IF EXISTS `playlist_movies`;
CREATE TABLE IF NOT EXISTS `playlist_movies` (
  `playlist_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  KEY `movie_id` (`movie_id`),
  KEY `playlist_id` (`playlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) NOT NULL,
  `user_password` varchar(80) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actors_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`),
  ADD CONSTRAINT `movie_actors_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `playlist_movies`
--
ALTER TABLE `playlist_movies`
  ADD CONSTRAINT `playlist_movies_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `playlist_movies_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`playlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
