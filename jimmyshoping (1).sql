-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 05:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jimmyshoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `ab_id` int(11) NOT NULL,
  `aboutus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`ab_id`, `aboutus`) VALUES
(5, '<p><em>we are jimmyshoping.com</em></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart_master`
--

CREATE TABLE `tblcart_master` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `cart_create_date` date NOT NULL,
  `cart_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_details`
--

CREATE TABLE `tblorder_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `dispatch_date` date DEFAULT NULL,
  `is_approved` int(11) NOT NULL,
  `is_delivered` tinyint(1) NOT NULL,
  `delivery_charge` double DEFAULT NULL,
  `is_cancelled` tinyint(1) NOT NULL,
  `is_refunded` tinyint(1) NOT NULL,
  `cancel_reason` varchar(400) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder_details`
--

INSERT INTO `tblorder_details` (`order_detail_id`, `order_id`, `product_id`, `product_quantity`, `total_price`, `dispatch_date`, `is_approved`, `is_delivered`, `delivery_charge`, `is_cancelled`, `is_refunded`, `cancel_reason`, `delivery_date`, `otp`) VALUES
(18, 18, 43, 1, 248, '2021-06-10', 0, 0, NULL, 0, 0, NULL, NULL, NULL),
(19, 18, 40, 1, 50, '2021-06-11', 1, 0, NULL, 0, 0, NULL, '2021-06-21', 5648),
(20, 18, 42, 2, 1598, '2021-06-15', 1, 0, NULL, 0, 0, NULL, '2021-06-21', 2589),
(21, 18, 41, 1, 30, NULL, 1, 0, NULL, 0, 0, NULL, NULL, NULL),
(22, 20, 43, 1, 248, NULL, 1, 0, NULL, 0, 0, NULL, NULL, NULL),
(23, 21, 45, 1, 280, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL),
(24, 21, 29, 2, 1100, '2021-06-12', 1, 1, NULL, 0, 0, NULL, '2021-06-13', NULL),
(25, 21, 44, 1, 35999, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL),
(26, 23, 39, 1, 65499, '2021-06-24', 1, 1, NULL, 0, 0, NULL, '2021-06-24', 2248),
(27, 24, 29, 2, 1100, '2021-06-24', 1, 1, NULL, 0, 0, NULL, '2021-06-21', 7095),
(28, 24, 34, 1, 13999, '2021-06-21', 1, 1, NULL, 0, 0, NULL, '2021-06-21', 9208),
(29, 25, 49, 1, 100, NULL, 1, 0, NULL, 0, 0, NULL, NULL, NULL),
(30, 25, 47, 2, 60, '2021-06-15', 1, 1, NULL, 0, 0, NULL, NULL, NULL),
(33, 31, 49, 1, 100, '2021-06-25', 1, 1, NULL, 0, 0, NULL, '2021-06-25', 1437),
(34, 32, 50, 1, 100, '2021-06-25', 1, 1, NULL, 0, 0, NULL, '2021-06-25', 4374),
(35, 33, 44, 1, 35999, '2021-06-25', 1, 1, NULL, 0, 0, NULL, '2021-06-25', 6458),
(58, 46, 50, 1, 99, NULL, 0, 0, 50, 0, 0, NULL, NULL, NULL),
(59, 46, 46, 1, 10, NULL, 0, 0, 50, 0, 0, NULL, NULL, NULL),
(60, 47, 50, 1, 99, NULL, 0, 0, 50, 0, 0, NULL, NULL, NULL),
(61, 47, 46, 1, 10, NULL, 0, 0, 50, 0, 0, NULL, NULL, NULL),
(62, 47, 43, 3, 744, '2021-06-25', 1, 1, 0, 0, 0, NULL, '2021-06-25', 7989),
(63, 48, 43, 1, 248, '2021-06-25', 1, 1, 50, 0, 0, NULL, '2021-06-25', 4941),
(64, 49, 47, 1, 30, '2021-06-26', 1, 1, 50, 0, 0, NULL, '2021-06-26', 4335),
(65, 49, 50, 6, 594, '2021-06-26', 1, 1, 0, 0, 0, NULL, '2021-06-26', 4442),
(66, 50, 51, 1, 78470, '2021-06-26', 1, 1, 0, 0, 0, NULL, '2021-06-26', 8014),
(67, 51, 32, 1, 600, '2021-06-26', 1, 1, 0, 0, 0, NULL, '2021-06-26', 8101),
(68, 51, 38, 1, 12999, NULL, 0, 0, 0, 0, 0, NULL, NULL, NULL),
(69, 52, 50, 3, 297, NULL, 0, 0, 50, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder_master`
--

CREATE TABLE `tblorder_master` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `billing_add` varchar(400) NOT NULL,
  `shipping_add` varchar(400) NOT NULL,
  `city` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `total_order_amt` double NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `order_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder_master`
--

INSERT INTO `tblorder_master` (`order_id`, `user_id`, `full_name`, `order_date`, `billing_add`, `shipping_add`, `city`, `state`, `email_id`, `phno`, `total_order_amt`, `payment_mode`, `order_status`) VALUES
(18, 8, 'Smit Shah', '2021-06-10', 'E-58,Suryapur soc.,Rushbh tower,Rander road,adajan', 'E-58,Suryapur soc.,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 248, 'cash on delivery', 0),
(20, 8, 'Smit Shah', '2021-06-11', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 248, 'cash on delivery', 0),
(21, 8, 'Smit Shah', '2021-06-12', 'suryapur soc.,rander road,adajan', 'E-58,suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 35565.05, 'cash on delivery', 0),
(23, 8, 'Smit Shah', '2021-06-13', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 65499, 'cash on delivery', 0),
(24, 8, 'Smit Shah', '2021-06-15', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 15099, 'cash on delivery', 0),
(25, 8, 'Smit Shah', '2021-06-15', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 150, 'cash on delivery', 0),
(31, 8, 'Smit Shah', '2021-06-25', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 90, 'cash on delivery', 0),
(32, 8, 'Smit Shah', '2021-06-25', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 90, 'cash on delivery', 0),
(33, 14, 'shivsharan kushvaha', '2021-06-25', 'adajan', 'adajan', 12, 12, 'kushvahashivsharan786@gmail.com', '8469415135', 34199.05, 'cash on delivery', 0),
(46, 8, 'Smit Shah', '2021-06-25', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 209, 'cash on delivery', 0),
(47, 8, 'Smit Shah', '2021-06-25', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 953, 'cash on delivery', 0),
(48, 8, 'Smit Shah', '2021-06-25', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 298, 'cash on delivery', 0),
(49, 8, 'Smit Shah', '2021-06-26', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 674, 'cash on delivery', 0),
(50, 8, 'Smit Shah', '2021-06-26', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 78470, 'cash on delivery', 0),
(51, 8, 'Smit Shah', '2021-06-26', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 13599, 'cash on delivery', 0),
(52, 8, 'Smit Shah', '2021-07-29', 'suryapur soc.,rander road,adajan', 'suryapur soc.,rander road,adajan', 12, 12, 'shahsmitshah245@gmail.com', '9586672989', 347, 'cash on delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment_master`
--

CREATE TABLE `tblpayment_master` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `payment_getway` varchar(50) DEFAULT NULL,
  `trans_charge` double DEFAULT NULL,
  `trans_status` tinyint(1) NOT NULL,
  `total_payment` double NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_details`
--

CREATE TABLE `tblproduct_details` (
  `productdetail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_description` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct_details`
--

INSERT INTO `tblproduct_details` (`productdetail_id`, `product_id`, `product_description`) VALUES
(16, 29, 'ZARA Double XXL 100% Cotton Shirt'),
(17, 30, 'Raymond XL 100% Cotton Shirt'),
(18, 31, 'ZARA XXL Denim Jeans'),
(19, 32, 'Raymond Slim Man Size Xl Denim Jeans '),
(21, 34, 'Whirlpool 190 ltr 4 star(2021 Rating) Refrigerator 1 year warranty on other parts and 10 year warranty on compressor.'),
(22, 35, 'Mitsubishi 3 star(based on 2020 ratings) split AC with double filter inverter'),
(23, 36, 'VOLTAS 1.5 Ton 4star(based on 2019 Ratings) Tripal Inverter AC with Dual Air Purifier '),
(24, 37, 'Huawei Mat 20 Pro 6/128 gb smatphone \r\n1 year warranty on handset\r\n6 month warranty on charger and cable'),
(25, 38, 'Redmi Note 10 4/64GB\r\n48 mp rear camera\r\n16 mp fron camera\r\npunch hole display\r\n1 Year Warranty'),
(26, 39, 'HP Laptop 14s-er0003TU i5 9th Gen 8gb RAM,512gb SSD M.2 NVME,\r\n2.3ghz clock speed,\r\n1 year warranty on laptop,\r\n6 month warranty on charger,\r\ncarry-in warranty'),
(27, 40, 'Clean & Clear Foaming Face Wash for Oily Skin'),
(28, 41, 'Himalaya Purifying Neem Face Wash 50ml Pack for oily skin'),
(29, 42, 'TRESemme 1L keratin smooth shampoo for smooth hair'),
(30, 43, 'emami kesh king 650 ml anti hair fall ayurvedic shampoo '),
(31, 44, 'LG Refrigerator 260ltr convertable'),
(32, 45, 'emami kesh king 650ml anti hairfall shampoo'),
(33, 46, 'Britannia Good Day 50g pack'),
(34, 47, 'Sunfist Mari Gold 100g Pack'),
(35, 48, 'B Natural Mixed Fruit Juice 250ml Pack of 2'),
(36, 49, 'B natural mango juice'),
(37, 50, 'agsdvcj'),
(38, 51, 'good quality');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_image`
--

CREATE TABLE `tblproduct_image` (
  `productimg_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productimg_url` varchar(100) NOT NULL,
  `img_status` tinyint(1) NOT NULL,
  `default_img` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct_image`
--

INSERT INTO `tblproduct_image` (`productimg_id`, `product_id`, `productimg_url`, `img_status`, `default_img`) VALUES
(15, 29, 'zara shirt.jpg', 1, 1),
(16, 30, 'Raymond shirt.jpg', 1, 1),
(17, 31, 'zara jeans.jpg', 1, 1),
(18, 32, 'Raymond Jeans.jpeg', 1, 1),
(20, 34, 'whirlpool-refrigerator.jpg', 1, 1),
(21, 35, 'mitsubishi Ac.jpg', 1, 1),
(22, 36, 'voltas Ac.jpg', 1, 1),
(23, 37, 'huawei mat 20 pro.jpg', 1, 1),
(24, 38, 'redminote10.png', 1, 1),
(25, 39, 'hp laptop.jpg', 1, 1),
(26, 40, 'clean and clear foamin face wash.jpg', 1, 1),
(27, 41, 'purifying-neem-face-wash-50ml_1024x1024.jpg', 1, 1),
(28, 42, '40158272_3-tresemme-keratin-smooth-shampoo.jpg', 1, 1),
(29, 43, 'emami kesh king.jpg', 1, 1),
(30, 44, 'lg freez.jpg', 1, 1),
(31, 45, 'emami kesh king.jpg', 1, 1),
(32, 46, 'good day.jpg', 1, 1),
(33, 47, 'mari gold.jpg', 1, 1),
(34, 48, 'B natural.jpg', 1, 1),
(35, 49, 'B natural.jpg', 1, 1),
(36, 50, '3.png', 1, 1),
(37, 51, 'hp laptop.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_master`
--

CREATE TABLE `tblproduct_master` (
  `product_id` int(11) NOT NULL,
  `subcate_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `product_type` varchar(20) DEFAULT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` float DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `create_date` date NOT NULL,
  `modify_date` date DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct_master`
--

INSERT INTO `tblproduct_master` (`product_id`, `subcate_id`, `seller_id`, `product_name`, `company_name`, `product_type`, `product_qty`, `product_price`, `product_discount`, `gst`, `create_date`, `modify_date`, `product_status`) VALUES
(29, 25, 110, 'XXL shirt', 'ZARA', '4', 16, 600, 0, 0, '2021-06-09', '2021-06-26', 1),
(30, 25, 110, 'XL Shirt', 'Raymond', '4', 50, 700, 0, 0, '2021-06-09', '2021-06-09', 1),
(31, 26, 110, 'XXl Jeans', 'ZARA', '4', 20, 850, 0, 0, '2021-06-09', '2021-06-09', 1),
(32, 26, 110, 'Xl Jeans', 'Raymond', '4', 24, 600, 0, 0, '2021-06-09', '2021-06-09', 1),
(34, 27, 110, '195 ltr Refrigerator', 'Whirlpool', '5', 19, 13999, 0, 0, '2021-06-09', '2021-06-09', 1),
(35, 28, 110, '1 ton Air conditionor', 'Mitsubishi', '5', 5, 25999, 0, 0, '2021-06-09', '2021-06-09', 1),
(36, 28, 110, '1.5 Ton AC', 'Voltas', '5', 10, 35999, 0, 0, '2021-06-09', '2021-06-09', 1),
(37, 29, 110, 'Mate 20 Pro 6/128gb', 'Huawei', '6', 10, 64999, 0, 0, '2021-06-09', '2021-06-09', 1),
(38, 29, 110, 'Redmi Note 10 4/64GB', 'Xiaomi india', '6', 9, 12999, 0, 0, '2021-06-09', '2021-06-09', 1),
(39, 30, 110, 'HP Laptop 14s-er0003TU  i5 9th Gen', 'HP', '6', 4, 65499, 0, 0, '2021-06-09', '2021-06-09', 1),
(40, 31, 110, 'Foaming Face Wash 100ml', 'Clean & Clear', '26', 49, 50, 0, 0, '2021-06-09', '2021-06-09', 1),
(41, 31, 110, 'Purifying Neem Face Wash 50 ml', 'Himalaya', '26', 19, 30, 0, 0, '2021-06-09', '2021-06-09', 1),
(42, 32, 110, 'TRESemme 1L keratin smooth shampoo', 'TRESemme', '26', 48, 799, 0, 0, '2021-06-09', '2021-06-09', 1),
(43, 32, 110, 'kesh king anti hair fall shampoo 650ml', 'emami', '26', 44, 248, 0, 0, '2021-06-09', '2021-06-09', 1),
(44, 27, 110, '260 ltr Refrigerator', 'LG', '5', 8, 35999, 5, 0, '2021-06-11', '2021-06-11', 1),
(45, 32, 4, 'kesh king anti hair fall shampoo 650ml', 'emami', '26', 18, 280, 5, 0, '2021-06-11', '2021-06-11', 1),
(46, 23, 4, 'Good Day 50g pack', 'Britannia', '3', 89, 10, 0, 0, '2021-06-15', '2021-06-15', 1),
(47, 23, 4, 'Mari Gold 100g pack', 'Sunfist', '3', 27, 30, 0, 0, '2021-06-15', '2021-06-15', 1),
(48, 24, 4, 'Mixed Fruit Juice 250ml pack of 2', 'B Natural', '3', 24, 100, 10, 0, '2021-06-15', '2021-06-15', 1),
(49, 24, 4, '250ml mango juice', 'B Natural', '3', 18, 100, 10, 0, '2021-06-15', '2021-06-15', 1),
(50, 23, 4, 'wheat floor', 'ashirwad', '3', 75, 100, 10, 10, '2021-06-25', '2021-06-25', 1),
(51, 30, 110, 'HP Laptop 14s-er0003TU  i5 10th Gen', 'hp', '6', 9, 70000, 5, 18, '2021-06-26', '2021-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblreview_master`
--

CREATE TABLE `tblreview_master` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(300) DEFAULT NULL,
  `review_date` date NOT NULL,
  `review_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblreview_master`
--

INSERT INTO `tblreview_master` (`review_id`, `user_id`, `product_id`, `rating`, `review`, `review_date`, `review_status`) VALUES
(3, 8, 29, 3, 'nice product', '2021-06-15', 0),
(4, 11, 29, 3, 'amazing quality', '2021-06-15', 1),
(6, 8, 40, 4, 'amazing', '2021-06-21', 0),
(7, 14, 44, 5, 'nice product', '2021-06-25', 0),
(8, 8, 32, 4, 'NICE PRODUCT', '2021-06-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblseller_master`
--

CREATE TABLE `tblseller_master` (
  `seller_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `seller_company_name` varchar(100) NOT NULL,
  `seller_email` varchar(25) NOT NULL,
  `seller_phone_no` varchar(13) NOT NULL,
  `seller_password` varchar(10) NOT NULL,
  `seller_company_add` varchar(200) NOT NULL,
  `seller_pic` varchar(50) DEFAULT NULL,
  `pancard_no` varchar(10) NOT NULL,
  `adhaar_no` varchar(12) NOT NULL,
  `seller_regis_date` date DEFAULT NULL,
  `seller_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblseller_master`
--

INSERT INTO `tblseller_master` (`seller_id`, `city_id`, `first_name`, `last_name`, `seller_company_name`, `seller_email`, `seller_phone_no`, `seller_password`, `seller_company_add`, `seller_pic`, `pancard_no`, `adhaar_no`, `seller_regis_date`, `seller_status`) VALUES
(4, 10, 'Ankit', 'Patel', 'Patel and Son`s Pvt Ltd', 'ankit@gmail.com', '7860912118', 'ankit123', 'shop-113 sardar complex gujarat gas circle surat', 'seller4.jpg', 'QSC377388', '283848388', '2021-02-04', 1),
(5, 10, 'Pooja ', 'Desai', 'Desai Store ', 'pooja@gmail.com', '9454083695', 'pooja1234', 'Shop-85 Bhumika complex adajan pal surat', 'seller3.jpg', 'POO78542', '258963147', '2021-03-01', 0),
(6, 10, 'Nilesh', 'Gheewala', 'Nilesh General Store', 'nill@gmail.com', '7425893614', 'nill123', 'Shop-76 Town market mora tekra surat gujarat', 'seller1.jpg', 'NXC12365', '2834789014', '2021-01-08', 0),
(110, 1, 'shivsharan', 'kushvaha', 'abc', 'shiv@gmail.com', '8469415135', '123456', 'surat', 'IMG_20190604_082147.jpg', 'wwwwww', '5555555', '2021-02-15', 1),
(111, 1, 'ankit', 'yadav', 'ak pvt', 'ak@gmail.com', '786092118', '123', 'adajan', 'IMG_20190722_190447.jpg', '256314', '123654', '2021-03-25', 1),
(116, 1, 'Smit', 'Shah', 'ryuk traders', 'shahsmitshah245@gmail.com', '8347642609', '123456', 'E-58,Suryapur soc.,Rushbh tower,Rander road,adajan', 'IMG20200310172935[1].jpg', 'ADPKD1356S', '598425684562', '2021-04-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser_master`
--

CREATE TABLE `tbluser_master` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_gen` varchar(8) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(13) NOT NULL,
  `user_add` varchar(300) NOT NULL,
  `user_pass` varchar(10) NOT NULL,
  `user_pic` varchar(100) NOT NULL,
  `user_status` tinyint(1) NOT NULL,
  `regis_date` date NOT NULL,
  `user_otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser_master`
--

INSERT INTO `tbluser_master` (`user_id`, `user_name`, `user_gen`, `state_id`, `city_id`, `user_email`, `user_phone`, `user_add`, `user_pass`, `user_pic`, `user_status`, `regis_date`, `user_otp`) VALUES
(8, 'Smit Shah', 'Male', 12, 10, 'shahsmitshah245@gmail.com', '9586672989', 'suryapur soc.,rander road,adajan', 'Abcd_1234', 'C360_2020-02-07-12-17-00-193.jpg', 1, '2021-06-02', 2045),
(9, 'jimmy', 'Female', 12, 10, 'shah.jimmy78@gmail.com', '9587845655', 'surat', 'jimmy', 'C360_2019-12-20-14-36-36-015.jpg', 1, '2021-06-03', 2456),
(11, 'ankit yadav', 'Male', 12, 10, 'chopraarun47@gmail.com', '7864591563', 'adajan', 'admin123', 'user2.jpg', 1, '2021-06-07', 5880),
(14, 'shivsharan kushvaha', 'Male', 12, 12, 'kushvahashivsharan786@gmail.com', '8469415135', 'adajan', 'Abcd_1234', 'user2.jpg', 1, '2021-06-25', 4974);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(70) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `admin_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `phone_no`, `password`, `admin_pic`) VALUES
(1, 'smit', 'ss@gmail.com', '9586672989', 'admin123', 'logoname.png'),
(3, 'ankit', 'ankit@gmail.com', '7860912118', 'ankit123', 'avatar.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_id`, `user_id`, `product_id`, `create_date`) VALUES
(9, 8, 49, '2021-06-24'),
(10, 8, 50, '2021-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `tlbcategory`
--

CREATE TABLE `tlbcategory` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(50) NOT NULL,
  `cate_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbcategory`
--

INSERT INTO `tlbcategory` (`cate_id`, `cate_name`, `cate_status`) VALUES
(3, 'Food', 1),
(4, 'Cloth', 1),
(5, 'Electronics', 1),
(6, 'Gadgets', 1),
(26, 'Beauty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tlbcity`
--

CREATE TABLE `tlbcity` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbcity`
--

INSERT INTO `tlbcity` (`city_id`, `state_id`, `city_name`) VALUES
(11, 10, 'Sonipat'),
(12, 12, 'Surat'),
(13, 12, 'Ahmdabad'),
(14, 12, 'Vadodra'),
(15, 13, 'Bikaner'),
(16, 13, 'Jaipur'),
(17, 13, 'Udaipur'),
(18, 14, 'Bhopal'),
(19, 14, 'Nagpur'),
(20, 15, 'Patna'),
(21, 15, 'Varanasi'),
(22, 10, 'Gurugram'),
(23, 10, 'Panipat');

-- --------------------------------------------------------

--
-- Table structure for table `tlbcontact`
--

CREATE TABLE `tlbcontact` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_add` varchar(300) NOT NULL,
  `c_phone` varchar(13) NOT NULL,
  `c_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbcontact`
--

INSERT INTO `tlbcontact` (`c_id`, `c_name`, `c_add`, `c_phone`, `c_email`) VALUES
(1, 'Smit', 'Surat', '9586672989', 'shahsmitshah245@gmail.com'),
(2, 'ankit', 'surat', '7778768667', 'ankit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tlbfaq`
--

CREATE TABLE `tlbfaq` (
  `faq_id` int(11) NOT NULL,
  `question` varchar(400) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `faq_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbfaq`
--

INSERT INTO `tlbfaq` (`faq_id`, `question`, `answer`, `faq_status`) VALUES
(1, 'How to Register?', '<ul>\r\n	<li>Go to Registration page.</li>\r\n	<li>add appropriate details.</li>\r\n	<li>click on submit.</li>\r\n	<li>then go to the login page.</li>\r\n	<li>Login with Login Credentials.</li>\r\n	<li>Verify OTP.</li>\r\n	<li>congratulations you have been Registered.</li>\r\n</ul>\r\n', 0),
(4, 'How to order?', '<ul>\r\n	<li>First go to the product and click on add to cart.</li>\r\n	<li>Now click on the cart icon on top right corner to go to the cart.</li>\r\n	<li>check your product and quantity you want to order.</li>\r\n	<li>click on place order.</li>\r\n	<li>now view details of delivery and change according to your need.</li>\r\n	<li>select payment method and click on checkout.</li>\r\n	<li>congratulations your order has been placed&nbsp;</li>\r\n</ul>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tlbstate`
--

CREATE TABLE `tlbstate` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbstate`
--

INSERT INTO `tlbstate` (`state_id`, `state_name`) VALUES
(10, 'Haryana'),
(12, 'Gujarat'),
(13, 'Rajasthan'),
(14, 'Madhyapradesh'),
(15, 'Uttarpradesh');

-- --------------------------------------------------------

--
-- Table structure for table `tlbsubcategory`
--

CREATE TABLE `tlbsubcategory` (
  `subcate_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `subcate_name` varchar(100) NOT NULL,
  `subcate_des` varchar(500) NOT NULL,
  `subcate_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tlbsubcategory`
--

INSERT INTO `tlbsubcategory` (`subcate_id`, `cate_id`, `subcate_name`, `subcate_des`, `subcate_status`) VALUES
(22, 3, 'Milk', 'Milk', 0),
(23, 3, 'Biscuit', 'Biscuits', 1),
(24, 3, 'Juice', 'Juice', 1),
(25, 4, 'Shirt', 'Shirts', 1),
(26, 4, 'Jeans', 'Jeans', 1),
(27, 5, 'Refrigerator', 'Refrigerators', 1),
(28, 5, 'AC', 'Air Conditionor', 1),
(29, 6, 'Smartphone', 'Smartphones', 1),
(30, 6, 'Laptop', 'Laptops', 1),
(31, 26, 'FaceWash', 'Face Wash', 1),
(32, 26, 'Shampoo', 'Hair Shampoo', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `tblcart_master`
--
ALTER TABLE `tblcart_master`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_product` (`product_id`),
  ADD KEY `fk_cart_user` (`user_id`);

--
-- Indexes for table `tblorder_details`
--
ALTER TABLE `tblorder_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `fk_order_id` (`order_id`),
  ADD KEY `fk_order_product` (`product_id`);

--
-- Indexes for table `tblorder_master`
--
ALTER TABLE `tblorder_master`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_user` (`user_id`),
  ADD KEY `fk_city` (`city`),
  ADD KEY `fk_state` (`state`);

--
-- Indexes for table `tblpayment_master`
--
ALTER TABLE `tblpayment_master`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tblproduct_details`
--
ALTER TABLE `tblproduct_details`
  ADD PRIMARY KEY (`productdetail_id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `tblproduct_image`
--
ALTER TABLE `tblproduct_image`
  ADD PRIMARY KEY (`productimg_id`),
  ADD KEY `fk_product_image` (`product_id`);

--
-- Indexes for table `tblproduct_master`
--
ALTER TABLE `tblproduct_master`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `selleridfk` (`seller_id`),
  ADD KEY `subcateid` (`subcate_id`);

--
-- Indexes for table `tblreview_master`
--
ALTER TABLE `tblreview_master`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `fk_uid` (`user_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `tblseller_master`
--
ALTER TABLE `tblseller_master`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbluser_master`
--
ALTER TABLE `tbluser_master`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `tlbcategory`
--
ALTER TABLE `tlbcategory`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `tlbcity`
--
ALTER TABLE `tlbcity`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id_fk` (`state_id`);

--
-- Indexes for table `tlbcontact`
--
ALTER TABLE `tlbcontact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tlbfaq`
--
ALTER TABLE `tlbfaq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tlbstate`
--
ALTER TABLE `tlbstate`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tlbsubcategory`
--
ALTER TABLE `tlbsubcategory`
  ADD PRIMARY KEY (`subcate_id`),
  ADD KEY `cate_fk` (`cate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcart_master`
--
ALTER TABLE `tblcart_master`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tblorder_details`
--
ALTER TABLE `tblorder_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tblorder_master`
--
ALTER TABLE `tblorder_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tblpayment_master`
--
ALTER TABLE `tblpayment_master`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct_details`
--
ALTER TABLE `tblproduct_details`
  MODIFY `productdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblproduct_image`
--
ALTER TABLE `tblproduct_image`
  MODIFY `productimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblproduct_master`
--
ALTER TABLE `tblproduct_master`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tblreview_master`
--
ALTER TABLE `tblreview_master`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblseller_master`
--
ALTER TABLE `tblseller_master`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbluser_master`
--
ALTER TABLE `tbluser_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tlbcategory`
--
ALTER TABLE `tlbcategory`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tlbcity`
--
ALTER TABLE `tlbcity`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tlbcontact`
--
ALTER TABLE `tlbcontact`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tlbfaq`
--
ALTER TABLE `tlbfaq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tlbstate`
--
ALTER TABLE `tlbstate`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tlbsubcategory`
--
ALTER TABLE `tlbsubcategory`
  MODIFY `subcate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcart_master`
--
ALTER TABLE `tblcart_master`
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `tblproduct_master` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`user_id`) REFERENCES `tbluser_master` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblorder_details`
--
ALTER TABLE `tblorder_details`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `tblorder_master` (`order_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`product_id`) REFERENCES `tblproduct_master` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblorder_master`
--
ALTER TABLE `tblorder_master`
  ADD CONSTRAINT `fk_city` FOREIGN KEY (`city`) REFERENCES `tlbcity` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `tbluser_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_state` FOREIGN KEY (`state`) REFERENCES `tlbstate` (`state_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblproduct_details`
--
ALTER TABLE `tblproduct_details`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `tblproduct_master` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tblproduct_image`
--
ALTER TABLE `tblproduct_image`
  ADD CONSTRAINT `fk_product_image` FOREIGN KEY (`product_id`) REFERENCES `tblproduct_master` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tblproduct_master`
--
ALTER TABLE `tblproduct_master`
  ADD CONSTRAINT `selleridfk` FOREIGN KEY (`seller_id`) REFERENCES `tblseller_master` (`seller_id`),
  ADD CONSTRAINT `subcateid` FOREIGN KEY (`subcate_id`) REFERENCES `tlbsubcategory` (`subcate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblreview_master`
--
ALTER TABLE `tblreview_master`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `tblproduct_master` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`user_id`) REFERENCES `tbluser_master` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbluser_master`
--
ALTER TABLE `tbluser_master`
  ADD CONSTRAINT `stateidfk` FOREIGN KEY (`state_id`) REFERENCES `tlbstate` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tlbcity`
--
ALTER TABLE `tlbcity`
  ADD CONSTRAINT `state_id_fk` FOREIGN KEY (`state_id`) REFERENCES `tlbstate` (`state_id`);

--
-- Constraints for table `tlbsubcategory`
--
ALTER TABLE `tlbsubcategory`
  ADD CONSTRAINT `cate_fk` FOREIGN KEY (`cate_id`) REFERENCES `tlbcategory` (`cate_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
