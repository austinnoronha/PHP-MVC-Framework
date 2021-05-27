-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 08:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_articles`
--

CREATE TABLE `app_articles` (
  `id` int(11) NOT NULL,
  `article_title` text NOT NULL,
  `article_desc` longtext NOT NULL,
  `article_code` varchar(255) NOT NULL,
  `article_url` text NOT NULL,
  `article_image` text NOT NULL,
  `article_status` tinyint(1) NOT NULL DEFAULT 1,
  `article_report_abuse` tinyint(1) DEFAULT 0,
  `article_created` datetime NOT NULL,
  `article_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `article_location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_articles`
--
ALTER TABLE `app_articles`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `app_articles` ADD FULLTEXT KEY `IDX_FTEXT_ARTICLE_TITLE` (`article_title`);
ALTER TABLE `app_articles` ADD FULLTEXT KEY `IDX_FTEXT_ARTICLE_LOCATION` (`article_location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_articles`
--
ALTER TABLE `app_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
