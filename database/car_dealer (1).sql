-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 01:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_dealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `visibility` enum('1','0') NOT NULL DEFAULT '1',
  `insert_date` varchar(255) NOT NULL,
  `update_date` varchar(255) NOT NULL,
  `user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `vid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `insert_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `second_number` varchar(10) DEFAULT NULL,
  `verified` enum('1','0') NOT NULL DEFAULT '0',
  `token` text DEFAULT NULL,
  `is_login` enum('1','0') NOT NULL DEFAULT '0',
  `active` enum('1','0') DEFAULT '1',
  `password` text NOT NULL,
  `map` text DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `email`, `number`, `second_number`, `verified`, `token`, `is_login`, `active`, `password`, `map`, `role`) VALUES
(1, 'Rabari', 'Ramesh', 'ramesh@gmail.com', '9924293903', NULL, '0', NULL, '0', '1', '$2y$10$4vdVKz/KSTeQPwoT6LWlpO3kZW2FpLdcS1i04knmpcwZRFqV/yiXq', NULL, 'visitor'),
(6, 'Desai', 'Ramesh', 'desairamesh955@gmail.com', '8200132164', '9924293903', '0', NULL, '1', '1', '$2y$10$BLzwfap7bf7w/w3fSG6/jeuvntOHkoe99JFHdRWk3r6qeGTtwOjVS', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.7917942542026!2d71.61249551481683!3d23.826001684552164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395b74fe8b4047cb%3A0x34753abf69f13d35!2sDhairya%20infocom!5e0!3m2!1sen!2sin!4v1617340944455!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'dealer'),
(7, 'hardik', 'panchal', 'hardik@gmail.com', '1234567890', NULL, '0', NULL, '1', '1', '$2y$10$FlI3bwW6qUrfS115tXQvgungTDanvWK/IcM04qgvMKhdcQjtCW0Cq', NULL, 'dealer');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `model_name` varchar(30) NOT NULL,
  `price` int(9) NOT NULL,
  `type` varchar(10) NOT NULL,
  `make` varchar(25) NOT NULL,
  `first_reg` varchar(30) NOT NULL,
  `fuel` varchar(7) NOT NULL,
  `engine_size` varchar(7) NOT NULL,
  `power` varchar(4) NOT NULL,
  `gearbox` varchar(10) NOT NULL,
  `num_of_seats` varchar(2) NOT NULL,
  `doors` varchar(2) NOT NULL,
  `color` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `extra` text NOT NULL,
  `km` int(7) NOT NULL,
  `locality` varchar(30) DEFAULT NULL,
  `active` enum('1','0') NOT NULL,
  `update_at` datetime DEFAULT NULL,
  `insert_at` date NOT NULL,
  `user` int(10) NOT NULL,
  `feature_image` text NOT NULL,
  `all_images` text DEFAULT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vid`, `title`, `model_name`, `price`, `type`, `make`, `first_reg`, `fuel`, `engine_size`, `power`, `gearbox`, `num_of_seats`, `doors`, `color`, `description`, `extra`, `km`, `locality`, `active`, `update_at`, `insert_at`, `user`, `feature_image`, `all_images`, `slug`) VALUES
(33, 'swift', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'swift'),
(34, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(35, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(36, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(37, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(38, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(39, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(40, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(41, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(42, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(43, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(44, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(45, 'Honda', 'Civic', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(46, 'Honda', 'Civic', 350000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(47, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda'),
(48, 'Honda', 'City', 250000, 'new', 'Honda', '2021-03-10', 'Diesel', '2000', '40', 'auto', '4', '4', 'Black ', '<p>vdsv</p>', '<p>Hello</p>', 20100, NULL, '1', '2016-04-21 03:07:15', '2016-04-21', 6, '10383691301604211137151510777655.jpeg', '19478324821604211137151832312237.jpeg,400253041604211137151174911420.jpeg,1201670856160421113715975166629.jpeg,1498691231604211137151599614541.jpeg', 'honda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vid` (`vid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vehicles` (`vid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
