-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2012 at 12:41 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `articles`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_ratings`
--

CREATE TABLE `article_ratings` (
  `article_id` mediumint(11) NOT NULL,
  `rating` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_ratings`
--

INSERT INTO `article_ratings` VALUES(1, '2');
INSERT INTO `article_ratings` VALUES(1, '4');
INSERT INTO `article_ratings` VALUES(2, '1');
INSERT INTO `article_ratings` VALUES(2, '4');
INSERT INTO `article_ratings` VALUES(3, '1');
INSERT INTO `article_ratings` VALUES(3, '5');
INSERT INTO `article_ratings` VALUES(4, '2');
