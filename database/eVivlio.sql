-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 14, 2021 at 11:16 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eVivlio`
--
CREATE DATABASE IF NOT EXISTS `eVivlio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eVivlio`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `best_seller`
--

CREATE TABLE `best_seller` (
  `book_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(17) NOT NULL,
  `title` varchar(100) NOT NULL,
  `book_cover` varchar(200) NOT NULL,
  `author` int(11) NOT NULL,
  `publisher` int(11) NOT NULL,
  `publishing_year` int(4) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL,
  `summary` text NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_code`, `category_name`) VALUES
(1, 'business', 'Business'),
(2, 'childrens', 'Children Collection'),
(3, 'history', 'History'),
(4, 'literature', 'Literature'),
(5, 'novels', 'Novels'),
(6, 'scifi', 'Science Fiction'),
(7, 'scitech', 'Science and Technology'),
(8, 'philo', 'Philosophy');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `birthdate` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `editors_pick`
--

CREATE TABLE `editors_pick` (
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `new_release`
--

CREATE TABLE `new_release` (
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisher_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin_permission` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `admin_permission`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `best_seller`
--
ALTER TABLE `best_seller`
  ADD UNIQUE KEY `book_id` (`book_id`),
  ADD KEY `isbn` (`book_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `ISBN` (`isbn`),
  ADD KEY `author` (`author`),
  ADD KEY `publisher` (`publisher`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `editors_pick`
--
ALTER TABLE `editors_pick`
  ADD UNIQUE KEY `book_id_2` (`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `new_release`
--
ALTER TABLE `new_release`
  ADD UNIQUE KEY `book_id_2` (`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `best_seller`
--
ALTER TABLE `best_seller`
  ADD CONSTRAINT `best_seller_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher`) REFERENCES `publisher` (`publisher_id`);

--
-- Constraints for table `editors_pick`
--
ALTER TABLE `editors_pick`
  ADD CONSTRAINT `editors_pick_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `new_release`
--
ALTER TABLE `new_release`
  ADD CONSTRAINT `new_release_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
