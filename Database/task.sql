-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 03:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_reg`
--

CREATE TABLE `admin_reg` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_reg`
--

INSERT INTO `admin_reg` (`id`, `username`, `email`, `password`, `img`) VALUES
(1, 'ritu_20', 'battinbalmani@gmail.com', '1234', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `billing_detail`
--

CREATE TABLE `billing_detail` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `payment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_detail`
--

INSERT INTO `billing_detail` (`id`, `fname`, `lname`, `email`, `mobile`, `address`, `country`, `city`, `state`, `zip`, `cust_id`, `payment`) VALUES
(1, 'Balmani', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413002, 1, 'COD'),
(2, 'Ritika', 'Battin', 'battinbalmani@gmail.com', 8421789223, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 2, 'paypal'),
(3, 'Lavanya', 'Kadadas', 'lavanyakadadas2002@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 3, 'COD'),
(4, 'Balmani', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(5, 'Balmani', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413026, 1, 'COD'),
(6, 'Balmani', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413131, 1, 'COD'),
(7, 'Ritika', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(8, 'Balmani', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 41314, 1, 'bank_transfer'),
(9, 'Balmani', 'battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(10, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 45132, 1, 'paypal'),
(11, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 413002, 1, 'paypal'),
(12, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(13, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(14, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'paypal'),
(15, '', '', '', 0, 'solapur', 'United States', 'solapur', 'maharashtra', 4564, 1, 'cod'),
(16, 'Balmani ', 'Battin', 'battinbalmani@gmail.com', 1111, 'so', 'United States', '', '', 0, 1, ''),
(17, 'Balmani ', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413002, 1, 'paypal'),
(18, 'Balmani ', 'Battin', 'battinbalmani@gmail.com', 8421034880, 'solapur', 'United States', 'solapur', 'maharashtra', 413005, 1, 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` text NOT NULL,
  `img` varchar(256) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `img`, `quantity`) VALUES
(1, 'Men Fashion', '616SFW+eSmL._UX569_.jpg', 0),
(2, 'Women Tshirts', 'images (1).jpeg', 0),
(3, 'Women Tops', 'download (6).jpeg', 0),
(4, 'Western Dress', 'images.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `message` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Shrutika', 'shrutikakadgi2002@gmail.com', 'related to product ', 'good product');

-- --------------------------------------------------------

--
-- Table structure for table `multi`
--

CREATE TABLE `multi` (
  `pname` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multi`
--

INSERT INTO `multi` (`pname`, `price`) VALUES
('Flayer Dress', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `prod_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `invoice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `prod_name`, `price`, `cust_id`, `invoice`) VALUES
(1, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 5648),
(2, 'Floral Top,White Tshirt', 798, 2, 9783),
(3, 'Wrinkle Dress For women,Georgette Western Dress,Bodycon Dress', 2897, 3, 4569),
(4, 'Bodycon Dress,Floral Top', 1298, 1, 1569),
(5, 'Bodycon Dress,Floral Top', 1298, 1, 2698),
(6, 'Bodycon Dress,Floral Top', 1298, 1, 3597),
(7, 'Bodycon Dress,Floral Top', 1298, 1, 6785),
(8, 'Bodycon Dress,Floral Top', 1298, 1, 5987),
(9, 'Wrinkle Dress For women,Georgette Western Dress,Bodycon Dress', 2897, 1, 7596),
(11, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 2655),
(12, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 9414),
(13, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 9343),
(14, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 4828),
(15, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 5757),
(16, 'Wrinkle Dress For women,Georgette Western Dress', 1998, 1, 7552),
(17, 'Georgette Western Dress,Bodycon Dress', 2198, 1, 7846),
(18, 'Georgette Western Dress,Bodycon Dress', 2198, 1, 5653);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `pname` text NOT NULL,
  `price` int(11) NOT NULL,
  `category` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `img`, `pname`, `price`, `category`, `details`) VALUES
(1, 'w4.png,w3.png,w1.png', 'Wrinkle Dress For women', 699, '4', 'Soft Stretchable Comfy Dress'),
(2, '71slUd2NkDL._UY741_.jpg,61ucrq30WhL._UY741_.jpg,6115Kf5IG7L._UY741_.jpg', 'Georgette Western Dress', 1299, '4', 'Chiffon Western Dress '),
(3, '81NGVuKlk7L._UL1500_.jpg,61OP+9KCZcL._UL1500_.jpg,61Ibo4WuZzL._UY741_.jpg', 'Bodycon Dress', 899, '4', 'Comfortable Light Weight Dress'),
(4, '81uFTsVrQxL._UX679_.jpg,51V4wkfI2CL._UX679_.jpg,51i-+rDs+3L._UX679_.jpg', 'Green Bodycon Dress', 799, '4', 'Crape material comfortable dress'),
(5, '71pVzQtjuOL._UY741_.jpg,81g1S7BmE3L._UY741_.jpg,81KtAJ495-L._UY741_.jpg', 'Floral Top', 399, '3', 'Best Material'),
(6, '51Y0Ae5TX-L._UY741_.jpg,61xFyIMW8FL._UY741_.jpg,61yfZiZJ7kL._UY879_.jpg', 'Green Crop Top', 299, '3', 'Soft material comfortable fabric'),
(7, '61L8c40m3KL._UY741_.jpg,61pnGhGuuCL._UY741_.jpg,61rFGpjMMbL._UY741_.jpg', 'Red floral crop top', 359, '3', 'Soft material'),
(8, '51T01TAxPML._UY741_.jpg,51hv6iu2k-L._UX679_.jpg,61bl8UatefL._UX679_.jpg', 'White Tshirt', 399, '2', 'Oversized comfortable'),
(9, '71t7DK3c-EL._UX569_.jpg,61DDK0-i6tL._UX569_.jpg,61K1AMOSdFL._UY879_.jpg', 'Urban Fancy tshirts', 439, '2', 'Lycra fabric short sleeves '),
(10, '71dJmm4NGML._UY741_.jpg,71X0+4nHqML._UY741_.jpg,61df1nk2FkL._UY879_.jpg', 'Sports tshirt', 399, '2', ' suitable for outdoor activities'),
(11, '514POMNyXJL._UX569_.jpg,616SFW+eSmL._UX569_.jpg,61GmEjXOdzL._UY879_.jpg', 'Fancy Tshirt', 499, '1', 'Casual T-shirts for Men');

-- --------------------------------------------------------

--
-- Table structure for table `product1`
--

CREATE TABLE `product1` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product1`
--

INSERT INTO `product1` (`id`, `pname`, `price`) VALUES
(1, 'flayer dress', 899),
(2, 'partywear dress', 1299),
(3, 'Formal shoes', 899),
(4, 'sneakers', 699);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `password`, `mobile`, `img`) VALUES
(1, 'Balmani ', 'Battin', 'battinbalmani@gmail.com', '1111', 8421034880, 'download (6).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `title` text NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_reg`
--
ALTER TABLE `admin_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_detail`
--
ALTER TABLE `billing_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product1`
--
ALTER TABLE `product1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_reg`
--
ALTER TABLE `admin_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_detail`
--
ALTER TABLE `billing_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product1`
--
ALTER TABLE `product1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
