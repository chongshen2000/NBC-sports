-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 12:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'moklee@gmail.com', 'moklee123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(100) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, 'NIKE'),
(2, 'ADIDAS'),
(3, 'UNDER ARMOUR');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `date` date NOT NULL,
  `order_reference` int(100) NOT NULL,
  `total_price` decimal(9,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `customer_name`, `customer_email`, `customer_address`, `customer_contact`, `date`, `order_reference`, `total_price`) VALUES
(1, 6, 'Candy', 'candy@gmail.com', '123, Candy Street', 123342454, '2017-09-07', 34318, '99.00'),
(2, 1, 'Mika', 'mika@gmail.com', '123, Mika Street', 101111111, '2017-06-05', 60563, '698.00'),
(3, 2, 'William', 'william@gmail.com', '123, William Street', 101111113, '2016-12-05', 97244, '799.00'),
(4, 2, 'William', 'william@gmail.com', '123, William Street', 101111113, '2016-12-07', 59711, '349.00'),
(5, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor.', 173066509, '2017-12-07', 1332, '89.00'),
(6, 4, 'Tom', 'tom@gmail.com', '123, Tom Street', 101111114, '2016-12-07', 77615, '199.00'),
(7, 6, 'Candy', 'candy@gmail.com', '123, Candy Street', 123342454, '2017-11-29', 77697, '120.00'),
(8, 4, 'Tom', 'tom@gmail.com', '123, Tom Street', 101111114, '2017-11-29', 42073, '699.00'),
(9, 4, 'Tom', 'tom@gmail.com', '123, Tom Street', 101111114, '2017-11-30', 6196, '229.00'),
(10, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor', 173066509, '2017-11-30', 47403, '719.00'),
(11, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor', 173066509, '2017-12-27', 64578, '89.00'),
(12, 1, 'Mika', 'mika@gmail.com', '123, Mika Street', 101111111, '2016-12-27', 7468, '987.00'),
(13, 1, 'Mika', 'mika@gmail.com', '123, Mika Street', 101111111, '2021-04-23', 45198, '8910.00'),
(14, 5, 'Alice Thum', 'alice@gmail.com', '123, Alice Street', 101111115, '2021-06-02', 76900, '314.10'),
(15, 7, 'Chris Wong', 'chriswongez@gmail.com', '32, Jalan SJI 5,Taman Seremban Jaya Idaman', 1111142344, '2021-06-06', 82819, '80.10'),
(16, 7, 'Chris Wong', 'chriswongez@gmail.com', '32, Jalan SJI 5,Taman Seremban Jaya Idaman', 1111142344, '2021-06-06', 30838, '539.10');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `orderdetail_ID` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `pro_title` varchar(100) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'process'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`orderdetail_ID`, `pro_id`, `pro_title`, `price`, `quantity`, `order_id`, `status`) VALUES
(1, 4, 'Underarmour Hoodie Sportswear', '349.00', 1, 1, 'done'),
(2, 3, 'Nike Air Force 1', '1398.00', 2, 1, 'done'),
(3, 14, 'Nike Air Max 720', '99.00', 1, 2, 'done'),
(4, 2, 'Nike Sportswear Hoodie', '199.99', 1, 2, 'done'),
(5, 2, 'Adidas Sportswear Hoodie', '229.00', 1, 3, 'done'),
(6, 15, ' Adidas T-shirt', '89.00', 1, 3, 'done'),
(7, 12, 'Adidas Ultraboost 4.0 DNA Shoes', '799.00', 1, 4, 'done'),
(8, 1, 'Under Armour Curry 8', '1198.00', 2, 4, 'done'),
(9, 2, 'Under Armour UA Tech', '120.00', 1, 5, 'done'),
(10, 7, 'Under Armour Hoodie Sportswear', '349.00', 1, 5, 'done'),
(11, 2, 'Adidas T-shirt price', '178.00', 2, 6, 'done'),
(28, 9, 'Under Armour Hoodie ', '349.00', 1, 14, 'process'),
(27, 2, 'Nike Men Air Max 720 T-Shirt', '9900.00', 100, 13, 'process'),
(29, 5, 'Adidas T-Shirt', '89.00', 1, 14, 'process'),
(30, 2, 'Nike Men Air Max 720 T-Shirt', '99.00', 1, 14, 'process'),
(31, 7, 'Under Armour Curry 8', '599.00', 1, 16, 'process'),
(32, 4, 'Adidas Sportswear Hoodie', '229.00', 1, 16, 'process'),
(33, 3, 'Nike Sportswear Hoodie', '199.99', 1, 16, 'process');

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
  `sport_image` text NOT NULL,
  `isHidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sport_id`, `sport_name`, `description`, `sport_category`, `sport_price`, `sport_image`, `isHidden`) VALUES
(1, 'Nike Air Force 1', 'Nike Shoes', '1', '699.00', 'Nike Shoes.jpeg', 0),
(2, 'Nike Men Air Max 720 T-Shirt', 'Nike T-Shirt', '1', '99.00', 'Nike T-Shirt.jpeg', 0),
(3, 'Nike Sportswear Hoodie', 'Nike Hoodie', '1', '199.99', 'Nike Hoodie.jpeg', 0),
(4, 'Adidas Sportswear Hoodie', 'Adidas Hoodie', '2', '229.00', 'Adidas Hoodie.jpeg', 0),
(5, 'Adidas T-Shirt', 'Adidas Men T-Shirt', '2', '89.00', 'Adidas T-Shirt.jpeg', 0),
(6, 'Adidas Ultraboost 4.0 DNA ', 'Adidas Shoes', '2', '799.00', 'Adidas Shoes.jpeg', 0),
(7, 'Under Armour Curry 8', 'Under Armour Shoes', '3', '599.00', 'Under Armour Shoes.jpeg', 0),
(8, 'Under Armour UA Tech', 'Under Armour T-Shirt', '3', '120.00', 'Under Armour T-Shirt.jpeg', 0),
(9, 'Under Armour Hoodie ', 'Under Armour Hoodie', '3', '349.00', 'Under Armour Hoodie.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_pass2` varchar(100) NOT NULL,
  `user_address` text NOT NULL,
  `user_state` text NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_pass2`, `user_address`, `user_state`, `user_contact`, `user_image`) VALUES
(1, 'Mika', 'mika@yahoo.com', 'mika12345678901', 'mika234', '123, Mika Street', 'Kedah', '0101111111', '2c2c1a5c1b3b0f2745a1e1661ffba1bc--svg-file-happy-faces.jpg'),
(2, 'William', 'william@gmail.com', 'william', 'william', '123, William Street', 'Sabah', '0101111113', '34d006f321f50dfe304a464ef11cce09.jpg'),
(3, 'Grace Tan', 'grace@gmail.com', 'huihui12345678901', 'huihui1102', '1,JLN Ahmad, 84000 Muar, Johor.', 'Johor', '0173066509', '037e79b2fb52127537be79110891ae3f--smiley-emoji-emoji-faces.jpg'),
(4, 'Tom', 'tom@gmail.com', 'tom12345678901', 'tom123', '123, Tom Street', 'Sabah', '0101111114', '957c3f835d2a915ef8020a9a61aa84e2.jpg'),
(5, 'Alice Thum', 'alice@gmail.com', 'alice12345678901', 'alice123', '123, Alice Street', 'Penang', '0101111115', '6533518-1x1-340x340.jpg'),
(6, 'Candy', 'candy@gmail.com', 'candy12345678901', 'candy123', '123, Candy Street', 'Penang', '0123342454', 'images.jpg'),
(7, 'Chris Wong', 'chriswongez@gmail.com', '111112222222222', '111112222222222', '32, Jalan SJI 5,\r\nTaman Seremban Jaya Idaman', 'Negeri Sembilan', '01111142344', 'ezgif.com-gif-maker (5).gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`orderdetail_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `orderdetail_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `sport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
