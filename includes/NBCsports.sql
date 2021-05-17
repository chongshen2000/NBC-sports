-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 05:23 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_book_store`
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
(1, 'Rice'),
(2, 'Mee'),
(3, 'Porridge'),
(4, 'Dessert'),
(5, 'Drinks');


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
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
(1, 6, 'Candy', 'candy@gmail.com', '123, Candy Street',  123342454, '2017-9-07', 34318, '8.10'),
(2, 1, 'Mika', 'mika@gmail.com', '123, Mika Street',  101111111, '2017-6-05', 60563, '11.7'),
(3, 2, 'William', 'william@gmail.com', '123, William Street',  101111113, '2016-12-05', 97244, '10.80'),
(4, 2, 'William', 'william@gmail.com', '123, William Street',  101111113, '2016-12-07', 59711, '11.70'),
(5, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor.', 173066509, '2017-12-07', 1332, '6.30'),
(6, 4, 'Tom', 'tom@gmail.com', '123, Tom Street',  101111114, '2016-12-07', 77615, '23.40'),
(7, 6, 'Candy', 'candy@gmail.com', '123, Candy Street',  123342454, '2017-11-29', 77697, '11.70'),
(8, 4, 'Tom', 'tom@gmail.com', '123, Tom Street',  101111114, '2017-11-29', 42073, '19.80'),
(9, 4, 'Tom', 'tom@gmail.com', '123, Tom Street',  101111114, '2017-11-30', 6196, '11.70'),
(10, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor', 173066509, '2017-11-30', 47403, '18.90'),
(11, 3, 'Grace Tan', 'grace@gmail.com', '1,JLN Ahmad, 84000 Muar, Johor', 173066509, '2017-12-27', 64578, '10.80'),
(12, 1, 'Mika', 'mika@gmail.com', '123, Mika Street',  101111111, '2016-12-27', 7468, '8.10');

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
(1, 4, 'Wantan Mee', '5.00', 1, 1, 'done'),
(2, 3, 'Nasi Kandar ', '16.00', 2, 1, 'done'),
(3, 14, 'Fried Rice', '5.00', 1, 2, 'done'),
(4, 2, 'Nasi Ayam', '8.00', 1, 2, 'done'),
(5, 2, 'Nasi Ayam', '8.00', 1, 3, 'done'),
(6, 15, 'Cendol', '4.00', 1, 3, 'done'),
(7, 12, 'Cola', '3.00', 1, 4, 'done'),
(8, 1, 'Nasi Lemak', '10.00', 2, 4, 'done'),
(9, 2, 'Nasi Ayam', '8.00', 1, 5, 'done'),
(10, 7, 'Chiken Porridge', '7.00', 1, 5, 'done'),
(11, 2, 'Nasi Ayam', '16.00', 2, 6, 'done'),
(12, 9, 'Teochew Porridge ', '10.00', 1, 6, 'done'),
(13, 12, 'Cola', '3.00', 1, 7, 'done'),
(14, 4, 'Wantan Mee', '10.00', 2, 7, 'done'),
(15, 16, 'Ais Kacang', '4.00', 1, 8, 'done'),
(16, 1, 'Nasi Lemak', '5.00', 1, 8, 'done'),
(17, 7, 'Chicken Porridge', '7.00', 1, 8, 'done'),
(18, 6, 'Pan Mee', '6.00', 1, 8, 'done'),
(19, 1, 'Nasi Lemak', '5.00', 1, 9, 'done'),
(20, 8, 'Plain Porridge', '4.00', 1, 9, 'done'),
(21, 16, 'Ais Kacang', '4.00', 1, 9, 'done'),
(22, 2, 'Nasi Ayam', '16.00', 2, 10, 'done'),
(23, 1, 'Nasi Lemak', '5.00', 1, 10, 'done'),
(24, 3, 'Nasi Kandar ', '8.00', 1, 11, 'process'),
(25, 16, 'Ais Kacang', '4.00', 1, 11, 'process'),
(26, 11, 'Orange juice', '9.00', 3, 12, 'process');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sport_id` int(100) NOT NULL,
  `sport_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `sport_category` varchar(100) NOT NULL,
  `sport_price` decimal(9,2) NOT NULL,
  `sport_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sport_id`, `sport_name`,  `description`, `sport_category`, `sport_price`, `sport_image`) VALUES
(1, 'Nasi Lemak', 'The rice is normally cooked with pandan leaves that gives it a distinctive flavour. Traditionally, nasi lemak is served with a hot spicy sauce (sambal), and usually includes various garnishes, including fresh cucumber slices, small fried anchovies (ikan bilis), roasted peanuts, and hard-boiled or fried egg.' ,'Rice', '5.00', 'nasi-lemak.jpg'),
(2, 'Nasi Ayam', 'Chicken rice, or nasi ayam, is also very popular with the Malay community, with the dish adapted to suit the Malay liking for spicier and more robustly flavoured food. The chicken is steamed, and then fried or roasted, although this usually result in a drier texture for the chicken meat.', 'Rice', '8.00', 'hainanese-chicken-83.jpg'),
(3, 'Nasi Kandar ','Nasi kandar is a popular northern Malaysian dish, which originates from Penang. It is a meal of steamed rice which can be plain or mildly flavoured, and served with a variety of curries and side dishes.', 'Nasi', '8.00', 'nasi-kandar.jpg'),
(4, 'Wantan Mee', 'Wantan Mee is a Cantonese noodle dish which is popular in Guangzhou, Hong Kong, Malaysia, Singapore and Thailand. The dish is usually served in a hot broth, garnished with leafy vegetables, and wonton dumplings.', 'Mee', '5.00', 'featured_image.jpg'),
(5, 'Prawn Mee', 'Hae mee is a noodle soup dish popular in Malaysia and Singapore. It can also refer to a fried noodle dish known as Hokkien mee. The dish name literally means "prawn noodles" in Hokkien.','Mee', '6.00', '0002DA7B54C33CDDEE90BEj.jpg'),
(6, 'Pan Mee', ' Pan Mee is a Hakka-style noodle, originating from Malaysia. Its Chinese name literally translates to "flat flour noodle". It is part of Malaysian Chinese cuisine.', 'Mee', '6.00', '0003GJ971065ECE7F59EB0j.jpg'),
(7, 'Chicken Porridge', 'Chicken Rice Porridge (Chicken Congee) is so easy to prepare. It makes a delicious breakfast and is a bowl of comfort any time of the day.', 'Porridge', '7.00', 'IMG_0078.jpg'),
(8, 'Plain Porridge', ' Porridge is a dish made by boiling ground, crushed or chopped starchy plants typically grain in water or milk.', 'Porridge', '4.00', 'GPa46D3hqwzq9G31H4ze.jpg'),
(9, 'Teochew porridge ', 'Teochew porridge is a Teochew and Singaporean rice porridge dish often accompanied with various small plates of side dishes. Teochew porridge is served as a banquet of meats, fish egg and vegetables eaten with plain rice porridge','Porridge', '10.00', 'joo-seng-teochew-porridge-rice-2.jpg'),
(10, 'Apple juice', 'Apple juice is a fruit juice made by the maceration and pressing of an apple.', 'Drinks', '3.00', '500xNxapplejuicemainjpg.jpg.pagespeed.ic.QfY5jIyxtL.jpg'),
(11, 'Orange juice', 'Orange juice is a fruit juice made by the maceration and pressing of an orange', 'Drinks', '3.00', 'orange-pineapple-juice-recipe.jpg'),
(12, 'Cola','soft drinks', 'Drinks', '3.00', 'Coca-Cola-33cl-CAN1.jpg'),
(13, 'Mee Goreng',  'Mee goreng, also known as bakmi goreng, is a flavourful and spicy fried noodle dish common in Indonesia, Malaysia, Brunei Darussalam and Singapore.','Mee', '5.00', 'mie_goreng-1.jpg'),
(14, 'Fried Rice', 'Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, or meat. It is often eaten by itself or as an accompaniment to another dish.', 'Rice', '5.00', 'Quinoa-Fried-Rice-Recipe-Photo-lifemadesweeter-300x450.jpg'),
(15, 'Cendol', 'Cendol is an iced sweet dessert that contains droplets of worm-like green rice flour jelly, coconut milk and palm sugar syrup.', 'Dessert', '4.00', 'stock-photo-delicious-iced-cendol-with-red-beans-349130195.jpg'),
(16, 'Ais Kacang','Ice kacang, literally meaning "bean ice", also commonly known as ABC, is a Malaysian dessert which is also common in Singapore and Brunei.', 'Dessert', '4.00', 'featured_image (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
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
(1, 'Mika', 'mika@gmail.com', 'mika123', 'mika123', '123, Mika Street', 'Kedah', '0101111111', '2c2c1a5c1b3b0f2745a1e1661ffba1bc--svg-file-happy-faces.jpg'),
(2, 'William', 'william@gmail.com', '123', '123', '123, William Street', 'Sabah', '0101111113', '34d006f321f50dfe304a464ef11cce09.jpg'),
(3, 'Grace Tan', 'grace@gmail.com', 'huihui1102', 'huihui1102', '1,JLN Ahmad, 84000 Muar, Johor.', 'Johor', '0173066509', '037e79b2fb52127537be79110891ae3f--smiley-emoji-emoji-faces.jpg'),
(4, 'Tom', 'tom@gmail.com', 'tom123', 'tom123', '123, Tom Street', 'Sabah', '0101111114', '957c3f835d2a915ef8020a9a61aa84e2.jpg'),
(5, 'Alice Thum', 'alice@gmail.com', 'alice123', 'alice123', '123, Alice Street', 'Penang', '0101111115', '6533518-1x1-340x340.jpg'),
(6, 'Candy', 'candy@gmail.com', 'candy123', 'candy123', '123, Candy Street', 'Penang', '0123342454', 'images.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

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
  ADD PRIMARY KEY (`sport_id`),
  ADD KEY `sport_category` (`sport_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `orderdetail_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `sport_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
