-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 06:17 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbc sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sport_id` int(10) NOT NULL,
  `sport_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `sport_category` varchar(100) NOT NULL,
  `sport_price` decimal(9,2) NOT NULL,
  `sport_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sport_id`, `sport_name`, `description`, `sport_category`, `sport_price`, `sport_image`) VALUES
(1, 'Nike Air Force 1', 'Nike Shoes', '1', '699.00', 'Nike Shoes.jpeg'),
(2, 'Nike Men Air Max 720 T-Shirt', 'Nike T-Shirt', '1', '99.00', 'Nike T-Shirt.jpeg'),
(3, 'Nike Sportswear Hoodie', 'Nike Hoodie', '1', '199.99', 'Nike Hoodie.jpeg'),
(4, 'Adidas Sportswear Hoodie', 'Adidas Hoodie', '2', '229.00', 'Adidas Hoodie.jpeg'),
(5, 'Adidas T-Shirt', 'Adidas Men T-Shirt', '2', '89.00', 'Adidas T-Shirt.jpeg'),
(6, 'Adidas Ultraboost 4.0 DNA ', 'Adidas Shoes', '2', '799.00', 'Adidas Shoes.jpeg'),
(7, 'Under Armour Curry 8', 'Under Armour Shoes', '3', '599.00', 'Under Armour Shoes.jpeg'),
(8, 'Under Armour UA Tech', 'Under Armour T-Shirt', '3', '120.00', 'Under Armour T-Shirt.jpeg'),
(9, 'Under Armour Hoodie ', 'Under Armour Hoodie', '3', '349.00', 'Under Armour Hoodie.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sport_id`),
  ADD KEY `sport_category` (`sport_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `sport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
