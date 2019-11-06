-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2019 at 11:32 AM
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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
