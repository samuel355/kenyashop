-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2022 at 07:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kenyashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'motorolla'),
(5, 'LG'),
(6, 'Cloth Brand');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Ladies Bags'),
(2, 'Ladies Shoes'),
(3, 'Men Shoes'),
(4, 'Ladies Wear'),
(5, 'Men Wear'),
(6, 'Sneakers'),
(7, 'Other'),
(8, 'Men Slippers');

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE `email_info` (
  `email_id` int(100) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_id`, `email`) VALUES
(3, 'admin@gmail.com'),
(4, 'puneethreddy951@gmail.com'),
(5, 'puneethreddy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `reference_code` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `order_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `unique_id`, `product_id`, `qty`, `reference_code`, `status`, `order_date`) VALUES
(24, 9, '854379552', 81, 1, '32620211', 'Pending', '22-04-22 At 04:40:41'),
(25, 9, '854379552', 2, 1, '32620211', 'Pending', '22-04-22 At 04:40:41'),
(26, 9, '854379552', 53, 2, '32620211', 'Pending', '22-04-22 At 04:40:41'),
(27, 9, '854379552', 58, 1, '549358393', 'Pending', '22-04-22 At 04:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(200) NOT NULL,
  `region` varchar(255) NOT NULL,
  `total_qty` int(15) DEFAULT NULL,
  `items_price` int(15) DEFAULT NULL,
  `delivery` int(10) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `total_price` int(15) NOT NULL,
  `reference_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `unique_id`, `firstname`, `lastname`, `email`, `phone`, `address`, `city`, `country`, `region`, `total_qty`, `items_price`, `delivery`, `discount`, `total_price`, `reference_code`, `status`, `order_date`) VALUES
(27, 9, '854379552', 'Samuel', 'Osei', 'addsamuel355@gmail.com', '0542374844', 'Kumasi Ghana', 'Kumasi', 'Ghana (+233)', 'Ashanti', 4, 2150, 20, 0, 2170, '32620211', 'Pending', '22-04-22 At 04:40:41'),
(28, 9, '854379552', 'Samuel', 'Osei', 'addsamuel355@gmail.com', '0542374844', 'Kumasi Ghana', 'Kumasi', 'Ghana (+233)', 'Ashanti', 1, 350, 20, 0, 370, '549358393', 'Pending', '22-04-22 At 04:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `items_price` int(15) DEFAULT NULL,
  `delivery` int(15) NOT NULL,
  `discount` int(15) NOT NULL,
  `total_price` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `unique_id` varchar(200) NOT NULL,
  `payment_code` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_pro_id`, `order_id`, `product_id`, `qty`, `items_price`, `delivery`, `discount`, `total_price`, `user_id`, `unique_id`, `payment_code`, `status`, `order_date`) VALUES
(99, 24, 81, 1, 2150, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(100, 25, 2, 1, 2150, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(101, 26, 53, 2, 2150, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(102, 24, 81, 1, 350, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(103, 25, 2, 1, 350, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(104, 26, 53, 2, 350, 20, 0, 2170, 9, '854379552', '32620211', 'Pending', ''),
(105, 27, 58, 1, 350, 20, 0, 370, 9, '854379552', '549358393', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_cat_title` varchar(80) DEFAULT NULL,
  `color` varchar(80) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_cat_title`, `color`, `size`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 'Men Shoes', 'Black', '43', 2, 'Fashion Men Shoe', 200, ' Quality Men shoe ', 'p3.jpeg', 'samsung mobile electronics'),
(2, 1, 'Ladies Wear', 'Brown', 'Medium and size 41', 3, 'Ladies Bag', 250, ' Quality and Affordable ladies bag. Matching bag and shoe. ', 'p1.jpeg', 'mobile iphone apple'),
(3, 1, 'Ladies Wear', 'Light green', 'Medium and size 41', 3, 'Bag and shoe', 350, ' Quality women bag and matching shoe ', 'p2.jpeg', 'apple ipad tablet'),
(52, 3, 'Men Shoes', 'Black', '43', 6, 'Men Shoe', 800, ' Affordable and Quality  ', 'p33.jpeg', 'suit boys shirts'),
(53, 3, 'Men Shoes', 'Black', '43', 6, 'Men Shoe', 800, ' Affordable and Quality  ', 'p32.jpeg', 'suit boys shirts'),
(54, 3, 'Men Shoes', 'Black', '43', 6, 'Men Shoe', 800, ' Affordable and Quality  ', 'p31.jpeg', 'suit boys shirts'),
(55, 3, 'Men Shoes', 'purple', '43', 6, 'Men Shoe', 800, '  Affordable and Quality ', 'p30.jpeg', 'suit boys shirts'),
(56, 3, 'Men Shoes', 'Brown', '42', 6, 'Men Shoe', 750, ' Affordable and Quality ', 'p29.jpeg', 'suit boys shirts'),
(57, 3, 'Men Shoes', 'Black', '42', 6, 'Men Shoe', 800, ' Affordable and Quality  ', 'p28.jpeg', 'suit boys shirts'),
(58, 3, 'Men Slippers', 'Brown', '42', 6, 'Men Louis Vuitton Slippers', 350, '  Affordable and Quality   ', 'p27.jpeg', 'suit boys shirts'),
(59, 3, 'Men Shoes', 'Black', '42', 6, 'Men Shoe', 800, ' Affordable and Quality ', 'p26.jpeg', 'suit boys shirts'),
(60, 3, 'Other', 'Black', '42', 6, 'Men Sandals', 350, '  Affordable and Quality  ', 'p25.jpeg', 'suit boys shirts'),
(61, 3, 'Other', 'Black', '42', 6, 'Men Sandals', 300, ' Affordable and Quality ', 'p24.jpeg', 'suit boys shirts'),
(62, 3, 'Men Shoes', 'Black', '42', 6, 'Men Shoe', 550, ' Affordable and Quality ', 'p23.jpeg', 'suit boys shirts'),
(63, 3, 'Men Shoes', 'Black', '43', 6, 'Gucci Men Shoe', 600, '  Affordable and Quality  ', 'p22.jpeg', 'boys Jeans Pant'),
(64, 3, 'Sneakers', 'Light Blue', '43', 6, 'Men Sneaker', 450, ' Affordable and Quality ', 'p21.jpeg', 'boys Jeans Pant'),
(65, 3, 'Men Slippers', 'Black', '43', 6, 'Men Slippers', 250, ' Affordable and Quality ', 'p20.jpeg', 'boys Jeans Pant'),
(66, 3, 'Men Slippers', 'Black', '42', 6, 'Men slippers', 150, ' Affordable and quality men slippers ', 'p19.jpeg', 'boys Jeans Pant'),
(67, 3, 'Men Slippers', 'Black', '43', 6, 'Men Slippers', 120, ' Nice and affordable men slippers ', 'p18.jpeg', 'boys Jeans Pant'),
(68, 3, 'Men Shoes', 'Brown', '42', 6, 'Leather men shoe', 250, ' Quality leather men shoes. brown. ', 'p17.jpeg', 'boys Jeans Pant'),
(69, 3, 'Sneakers', 'Light Green', '42', 6, 'Designer Men Sneaker', 350, ' Quality designer men sneakers. Green  ', 'p16.jpeg', 'boys Jeans Pant'),
(70, 3, 'Men Slippers', 'Black', '42', 6, 'Quality Men Slipper', 150, ' Quality designer men slippers ', 'p15.jpeg', 'boys Jeans Pant'),
(71, 1, 'Sneakers', 'Black', '43', 2, 'Designer Sneaker', 250, ' Quality Designer Sneakers ', 'p14.jpeg', 'samsung mobile electronics'),
(72, 7, 'Men Shoes', 'Black', '42', 2, 'Leather Men Shoe', 200, ' Quality Men Shoe with affordable price ', 'p13.jpeg', 'sony Headphones electronics gadgets'),
(73, 7, 'Men Slippers', 'Black', '42', 2, 'Leather Slippers', 180, ' Quality men slippers ', 'p12.jpeg', 'samsung Headphones electronics gadgets'),
(74, 1, 'Men Shoes', 'Dark Gold-Stripes', '43', 1, 'Versace Men shoe', 350, '   Quality Designer versace men shoes   ', 'p11.jpeg', 'HP i5 laptop electronics'),
(75, 1, 'Men Shoes', 'Black', '43', 1, 'Versace Men shoe', 280, 'Quality designer Versace men shoes        ', 'p10.jpeg', 'HP i7 laptop 8gb ram electronics'),
(76, 1, 'Men Shoes', 'Black', '43', 5, 'Designer Men shoe', 350, ' Quality Men Shoe and it is very affordable ', 'p9.jpeg', 'sony note 6gb ram mobile electronics'),
(77, 1, 'Men Shoes', 'Light Blue', '44', 4, 'Designer Men shoe', 300, ' Quality Designer Men shoe ', 'p8.jpeg', 'MSV laptop 16gb ram NVIDEA Graphics electronics'),
(78, 1, 'Men Shoes', 'Blue', '43', 5, 'Designer Men shoe', 300, ' Quality Designer Men Shoe with affordable price. ', 'p7.jpeg', 'dell laptop 8gb ram intel integerated Graphics electronics'),
(79, 7, 'Men Shoes', 'Brown', '42', 2, 'Quality Designer Men Shoe', 250, ' Quality Men Shoe with affordable price ', 'p6.jpeg', 'camera with 3D pixels camera electronics gadgets'),
(80, 1, 'Men Shoes', 'Sea Blue', '44', 1, 'Versace Men Shoe', 250, ' Quality Designer Men Shoe ', 'p5.jpeg', 'dfgh'),
(81, 4, 'Men Shoes', 'Light blue', '43', 6, 'Designer Men shoe', 300, ' Quality Designer Men shoe ', 'p4.jpeg', 'kids blue dress');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `unique_id` varchar(250) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `utype` varchar(10) NOT NULL DEFAULT 'user',
  `mobile` varchar(10) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `date_registered` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `firstname`, `lastname`, `email`, `password`, `utype`, `mobile`, `address`, `date_registered`) VALUES
(9, '854379552', 'Samuel', 'Osei', 'addsamuel355@gmail.com', '22d7fe8c185003c98f97e5d6ced420c7', 'user', '0542374844', 'Kumasi Ghana', '2022-04-16 At 09:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `users_backup`
--

CREATE TABLE `users_backup` (
  `user_id` int(10) NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `utype` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date_registered` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `email_info`
--
ALTER TABLE `email_info`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_pro_id`),
  ADD KEY `order_products` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_backup`
--
ALTER TABLE `users_backup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `email_info`
--
ALTER TABLE `email_info`
  MODIFY `email_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
