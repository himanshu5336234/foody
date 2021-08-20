-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 11, 2021 at 12:42 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `food_factory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_pic` varchar(100) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_offer` int(11) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `cart_day` varchar(100) NOT NULL,
  `cart_status` varchar(100) NOT NULL default 'Not Ordered',
  `order_id` varchar(100) NOT NULL default '0',
  PRIMARY KEY  (`pid`,`uid`,`cart_day`,`p_name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pid`, `rid`, `uid`, `p_name`, `p_pic`, `p_price`, `p_offer`, `p_amount`, `quantity`, `r_name`, `duration`, `cart_day`, `cart_status`, `order_id`) VALUES
(7, 1, 2, 2, 'King Burger', 'a2.jpg', 25, 15, 22, 4, 'Kunjilal ', '2021-07-10 03:17:00', 'Today', 'Not Ordered', '1471'),
(10, 2, 2, 2, 'Butter Scoctch', 'c1.jpg', 250, 20, 200, 4, 'Kunjilal ', '2021-07-10 20:39:32', '2021-07-10 20:39:32', 'Not Ordered', '4391'),
(13, 3, 2, 2, 'Delight Veg', '33-330733_italy-pizza.jpg', 430, 40, 258, 5, 'Kunjilal ', '2021-07-11 04:47:09', '2021-07-11 04:47:09', 'Not Ordered', '21722'),
(6, 3, 2, 2, 'Delight Veg', '33-330733_italy-pizza.jpg', 430, 0, 430, 3, 'Kunjilal ', '2021-07-10 03:16:39', 'Today', 'Not Ordered', '1471'),
(12, 4, 2, 2, 'Chocolate Deligh', '38836_death-by-chocolate-cake.jpeg', 650, 15, 553, 4, 'Kunjilal ', '2021-07-11 04:41:18', '2021-07-11 04:41:18', 'Not Ordered', '7324'),
(11, 5, 2, 2, 'Butter Scoctch', 'c1.jpg', 250, 20, 200, 3, 'Kunjilal ', '2021-07-11 03:22:18', '2021-07-11 03:22:18', 'Not Ordered', '9365'),
(14, 9, 2, 2, 'Moti Choor Ladu', 'kunji_lado.png', 220, 20, 176, 1, 'Kunjilal ', '2021-07-11 05:10:12', '2021-07-11 05:10:12', 'Not Ordered', '602042');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL auto_increment,
  `c_name` varchar(100) NOT NULL,
  `c_pic` varchar(100) NOT NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `c_name` (`c_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `c_name`, `c_pic`) VALUES
(3, 'Cake', 'c4.png'),
(4, 'Pizza', 'maxicum_milkbar.jpg'),
(5, 'Burger', 'a5.jpg'),
(6, 'Idli', 'i1.jpg'),
(7, 'Veg Thali', 'regular-deluxe-thali-500x500.png'),
(9, 'Sweets', 'diwali_sweets.jpg'),
(10, 'Veg Biryani', 'veg-biryani-recipe.jpg'),
(11, 'Dosa', 'Masala-Dosa-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(220) NOT NULL,
  `duration` varchar(100) NOT NULL,
  PRIMARY KEY  (`email`,`mobile`,`subject`),
  UNIQUE KEY `cid` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL auto_increment,
  `order_id` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `request_duration` varchar(100) NOT NULL default 'Today',
  `status` varchar(100) NOT NULL default 'In Process',
  `total_amount` int(11) NOT NULL,
  `message` varchar(200) NOT NULL default 'Na',
  `response_duration` varchar(100) default NULL,
  PRIMARY KEY  (`uid`,`order_id`),
  UNIQUE KEY `oid` (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `order_id`, `uid`, `request_duration`, `status`, `total_amount`, `message`, `response_duration`) VALUES
(1, '1471', 2, '2021-07-10 03:54:33', 'Delivered', 1413, '', '2021-07-11 03:49:08'),
(6, '21722', 2, '2021-07-11 04:47:18', 'Canceled', 1325, '', '2021-07-11 05:00:10'),
(2, '378440', 2, '2021-07-10 03:55:07', 'Delivered', 35, '', '2021-07-11 03:49:22'),
(3, '4391', 2, '2021-07-10 20:39:42', 'Delivered', 835, '', '2021-07-11 03:49:27'),
(7, '602042', 2, '2021-07-11 05:10:33', 'Delivered', 211, 'Urgent Delivered please', '2021-07-11 05:19:35'),
(5, '7324', 2, '2021-07-11 04:41:31', 'Delivered', 2247, '', '2021-07-11 04:42:07'),
(4, '9365', 2, '2021-07-11 03:22:28', 'Delivered', 635, '', '2021-07-11 04:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL auto_increment,
  `rid` int(11) NOT NULL default '0',
  `p_name` varchar(100) NOT NULL,
  `p_category` varchar(100) NOT NULL,
  `p_price` int(11) NOT NULL default '0',
  `p_offer` int(11) NOT NULL default '0',
  `p_about` varchar(250) NOT NULL default 'NA',
  `p_status` varchar(100) NOT NULL default 'Available',
  `p_pic` varchar(100) NOT NULL default 'default.jpg',
  PRIMARY KEY  (`p_name`,`rid`),
  UNIQUE KEY `pid` (`pid`),
  KEY `products` (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `rid`, `p_name`, `p_category`, `p_price`, `p_offer`, `p_about`, `p_status`, `p_pic`) VALUES
(2, 2, 'Butter Scoctch', 'Cake', 250, 20, 'Healthy & Fresh', 'Available', 'c1.jpg'),
(4, 2, 'Chocolate Deligh', 'Cake', 650, 15, 'Dark Chocolate with Coco', 'Available', '38836_death-by-chocolate-cake.jpeg'),
(3, 2, 'Delight Veg', 'Pizza', 430, 40, 'Medium', 'Available', '33-330733_italy-pizza.jpg'),
(1, 2, 'King Burger', 'Burger', 25, 15, 'Best Burger', 'Available', 'a2.jpg'),
(8, 2, 'Moti Choor Ladu', 'Sweets', 220, 20, 'Fresh Desi Ghee Moti Choor Ladu', 'Available', 'kunji_lado.png'),
(6, 2, 'Paneer Dosa', 'Dosa', 190, 10, 'Fresh Paneer Spacy Dosa', 'Available', 'Mysore_Masala_Dosa@Palates_Desire-e1593275925544-scaled.jpg'),
(5, 2, 'Pineapple  Delight', 'Cake', 300, 20, 'Hard Sweet and Healthy Pineapple', 'Available', 'p-classic-pineapple-cake-2-kg--6120-m.jpg'),
(7, 2, 'Rava Masala Dosa', 'Dosa', 150, 25, 'Fresh Rava Masala Dosa', 'Available', '0lgtffhg_diabetes-diet-oat-dosa_625x300_07_May_19.jpg'),
(9, 2, 'White Rasgula ', 'Sweets', 25, 0, 'Fresh Cheese White Rasgula', 'Available', 'kunji_rasgoola.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pro_info`
--
CREATE TABLE `pro_info` (
`r_id` int(11)
,`pid` int(11)
,`p_name` varchar(100)
,`p_category` varchar(100)
,`p_price` int(11)
,`p_offer` int(11)
,`p_about` varchar(250)
,`p_status` varchar(100)
,`p_pic` varchar(100)
,`r_name` varchar(100)
,`r_mobile` varchar(100)
,`r_email` varchar(100)
,`r_pic` varchar(100)
,`r_city` varchar(100)
,`r_address` varchar(100)
,`r_about` varchar(100)
,`r_title` varchar(100)
,`status` varchar(100)
);
-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `rid` int(11) NOT NULL auto_increment,
  `r_name` varchar(100) NOT NULL,
  `r_mobile` varchar(100) NOT NULL,
  `r_email` varchar(100) NOT NULL,
  `r_password` varchar(100) NOT NULL,
  `r_pic` varchar(100) NOT NULL default 'default.png',
  `r_city` varchar(100) NOT NULL,
  `r_address` varchar(100) NOT NULL default 'NA',
  `r_about` varchar(100) NOT NULL default 'NA',
  `r_title` varchar(100) NOT NULL default 'NA',
  `status` varchar(100) NOT NULL default 'Not Active',
  PRIMARY KEY  (`r_email`,`r_password`,`r_city`),
  UNIQUE KEY `rid` (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`rid`, `r_name`, `r_mobile`, `r_email`, `r_password`, `r_pic`, `r_city`, `r_address`, `r_about`, `r_title`, `status`) VALUES
(1, 'Hotel Abha Regency', '0571240443', 'abha@gmail.com', '123@123', 'h1.png', 'Aligarh', 'Ramghat Rd, near Sumangalam Hospital, New Vishnupuri, Aligarh, Uttar Pradesh 202001', 'In an area with retail outlets, this casual hotel is 6 minutes walk from Gandhi Eye Hospital, a kilo', 'NA', 'Active'),
(2, 'Kunjilal ', '9319189898', 'kunjilal@gmail.com', '123@123', 'kunji.png', 'Aligarh', 'Ram Ghat Road', 'Best Fast Food', 'NA', 'Active'),
(3, 'Shree Ram', '9319112323', 'ram@gmail.com', '123@123', 'chocolate-strawberry-designer-cake.jpg', 'Agra', 'NA', 'NA', 'NA', 'Not Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL default 'NA',
  `pic` varchar(100) NOT NULL default 'default.png',
  PRIMARY KEY  (`city`,`email`,`password`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `city`, `email`, `password`, `mobile`, `address`, `pic`) VALUES
(3, 'Nitin', 'Aligarh', 'nitin@gmail.com', '123@123', '9319189833', 'NA', 'default.png'),
(4, 'Prem Kumar', 'Aligarh', 'prem@gmail.com', '123@123', '9319189898', 'NA', 'default.png'),
(1, 'Rahul', 'Aligarh', 'rahul@gmail.com', '123@123', '931', 'NA', 'default.png'),
(2, 'Sanjay', 'Aligarh', 'sanjay@gmail.com', '123@123', '93319189898', 'ITI Road Aligarh (202001)', 'lotus1.jpg');

-- --------------------------------------------------------

--
-- Structure for view `pro_info`
--
DROP TABLE IF EXISTS `pro_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `food_factory`.`pro_info` AS select `food_factory`.`restaurants`.`rid` AS `r_id`,`food_factory`.`products`.`pid` AS `pid`,`food_factory`.`products`.`p_name` AS `p_name`,`food_factory`.`products`.`p_category` AS `p_category`,`food_factory`.`products`.`p_price` AS `p_price`,`food_factory`.`products`.`p_offer` AS `p_offer`,`food_factory`.`products`.`p_about` AS `p_about`,`food_factory`.`products`.`p_status` AS `p_status`,`food_factory`.`products`.`p_pic` AS `p_pic`,`food_factory`.`restaurants`.`r_name` AS `r_name`,`food_factory`.`restaurants`.`r_mobile` AS `r_mobile`,`food_factory`.`restaurants`.`r_email` AS `r_email`,`food_factory`.`restaurants`.`r_pic` AS `r_pic`,`food_factory`.`restaurants`.`r_city` AS `r_city`,`food_factory`.`restaurants`.`r_address` AS `r_address`,`food_factory`.`restaurants`.`r_about` AS `r_about`,`food_factory`.`restaurants`.`r_title` AS `r_title`,`food_factory`.`restaurants`.`status` AS `status` from (`food_factory`.`products` join `food_factory`.`restaurants` on((`food_factory`.`products`.`rid` = `food_factory`.`restaurants`.`rid`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `restaurants` (`rid`);
