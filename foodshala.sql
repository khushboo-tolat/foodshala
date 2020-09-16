-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 11:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcuisine`
--

CREATE TABLE `tblcuisine` (
  `cuisineId` int(11) NOT NULL,
  `cuisineName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcuisine`
--

INSERT INTO `tblcuisine` (`cuisineId`, `cuisineName`) VALUES
(1, 'Afghan'),
(2, 'American'),
(3, 'Asian'),
(4, 'Bakery'),
(5, 'BBQ'),
(6, 'Beverages'),
(7, 'Biryani'),
(8, 'Burger'),
(9, 'Cafe'),
(10, 'Chinese'),
(11, 'Desserts'),
(12, 'Fast Food'),
(13, 'French'),
(14, 'Gujarati'),
(15, 'Healthy Food'),
(16, 'Ice Cream'),
(17, 'Italian'),
(18, 'Juices'),
(19, 'Kebab'),
(20, 'Korean'),
(21, 'Maharashtrian'),
(22, 'Mexican'),
(23, 'Mithai'),
(24, 'Momos'),
(25, 'Mughlai'),
(26, 'North Indian'),
(27, 'Pizza'),
(28, 'Rajasthani'),
(29, 'Raw Meats'),
(30, 'Salad'),
(31, 'Sandwich'),
(32, 'Seafood'),
(33, 'South Indian'),
(34, 'Street Food'),
(35, 'Sushi'),
(36, 'Tea'),
(37, 'Thai'),
(38, 'Wraps'),
(39, 'Continental');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `custId` int(11) NOT NULL,
  `custName` varchar(50) NOT NULL,
  `emailId` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nonVeg` tinyint(4) NOT NULL COMMENT '0->Veg; 1->NonVeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`custId`, `custName`, `emailId`, `password`, `nonVeg`) VALUES
(1, 'Khushboo Tolat', 'temp1234@gmail.com', '12345', 0),
(2, 'Zoya Tolat', 'zoya123@gmail.com', 'qwerty', 1),
(3, 'admin', 'admin@abc.com', 'admin', 1),
(4, 'temp temp', 'temp@abc.com', 'temp1234', 0),
(5, 'abcd xyz', 'abcd@abc.com', 'qwerty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenuitem`
--

CREATE TABLE `tblmenuitem` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `nonVeg` tinyint(4) NOT NULL,
  `cuisineId` int(11) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'default.jpg',
  `restId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenuitem`
--

INSERT INTO `tblmenuitem` (`itemId`, `itemName`, `price`, `description`, `nonVeg`, `cuisineId`, `image`, `restId`) VALUES
(1, 'Barbeque in a Box (Non Veg)', '799', 'Celebration time with banquet of delicacies from the house of Barbeque Nation:| 4 Non Appetizers of your Choice | Angara Tangadi-1 Pc, Kalami Chicken Kebab - 3Pcs, Mutton Muglai Seekh-1 Pc, Chef\'s Special Amritsari Fish Fry -5Pcs, Coastal BBQ Prawns- 6Pcs |2 Veg Appetizers of your choice| Hara Bara Kebab-3 Pcs, Tandoori Paneer Tikka-5Pcs, BBQ Fruits(Pineapple/pears/Watermelon)|2 Curries of Your Choice| Butter Chicken, Mutton Rogan Josh, Malabar Fish Curry |Dal Makhani & Chicken Dum Biryani||3 Desserts| Kesari Phirni, Angoori Gulab Jamun & Brownie[Accompanied by Choice of Indian Bread (2Nos) , Garden Green Salad ,Raita, & Dips]', 1, 5, 'bbq_nv.jpg', 2),
(2, 'Barbeque in a Box (Veg)', '699', 'Celebration time with banquet of delicacies from the house of Barbeque Nation: | 6 Appetizers| Tandoori Paneer Tikka -5Pcs, Lemon Chilly Garlic Mushroom-6 Pcs, Burnt Garlic Grilled Veg- 6Pcs, Hara Bara Kabab -6Pcs, Dahi Ke Sholey-3Pcs, BBQ Fruits(Pineapple/pears/Watermelon)| 3 Curries & Biryani | Paneer Lazeez, Mix Veg Kofta Curry, Dal Makhani & Veg Dum Biryani | 3 Desserts | Kesari Phirni, Brownie, Angoori Gulab Jamun[Accompanied by Choice of Indian Bread (2Nos) , Garden Green Salad ,Raita, & Dips]', 0, 5, 'bbq_veg.jpg', 2),
(3, 'Create Your Own Pasta', '400', NULL, 0, 17, 'pasta.jpg', 1),
(4, 'Three Cheese Margherita Pizza', '350', 'Classic margherita with three cheese and basil leaves.', 0, 27, 'pizza_margherita.jpg', 1),
(8, 'Test test', '999', 'asdfg qwerty', 0, 6, 'default.jpg', 1),
(11, 'Test test', '600', 'qwerty', 1, 14, 'default.jpg', 3),
(12, 'Margarita Pizza', '110', 'qwerty asdfgh', 0, 27, 'pizza.jpg', 12),
(13, 'Paneer Special Pizza', '200', 'asdfgh zxcvbn', 0, 27, 'pizza.jpg', 12),
(14, 'Chicken Dum Biryani', '400', 'asdfgh zxcvbnm', 1, 7, 'chicken_briyani.jpg', 6),
(15, 'Hot Chocolate', '200', 'asdfgh qwertyu', 0, 6, 'hot_chocolate.jpg', 7),
(16, 'Biriyani-ala-Fozzies', '300', 'asdfg Zxcvbn', 0, 7, 'briyani.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderId` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `restId` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0->None; 1->Accepted; 2->Completed',
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderId`, `custId`, `restId`, `address`, `status`, `dateTime`) VALUES
(2, 3, 1, 'qwerty asdfghj', 2, '2020-09-01 14:49:27'),
(3, 3, 1, 'asdfgh qwertyui', 1, '2020-09-01 14:50:09'),
(4, 3, 1, 'qwerty', 0, '2020-09-01 20:00:21'),
(5, 3, 2, 'qwertyu', 2, '2020-09-01 20:08:41'),
(6, 3, 2, 'qwertyu', 1, '2020-09-01 20:08:44'),
(7, 3, 2, 'qwertyu', 0, '2020-09-01 20:08:52'),
(8, 3, 2, 'asdfgh zxcvbn', 0, '2020-09-01 20:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderitem`
--

CREATE TABLE `tblorderitem` (
  `orderItemId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderitem`
--

INSERT INTO `tblorderitem` (`orderItemId`, `itemId`, `orderId`, `quantity`, `total`) VALUES
(1, 3, 2, 0, '0'),
(2, 3, 3, 0, '0'),
(3, 4, 4, 3, '1050'),
(4, 1, 5, 3, '2397'),
(5, 1, 6, 3, '2397'),
(6, 1, 7, 3, '2397'),
(7, 2, 8, 3, '2097');

-- --------------------------------------------------------

--
-- Table structure for table `tblrestaurant`
--

CREATE TABLE `tblrestaurant` (
  `restId` int(11) NOT NULL,
  `restName` varchar(100) NOT NULL,
  `restEmail` varchar(100) NOT NULL,
  `restContactNo` varchar(10) NOT NULL,
  `restWebsite` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nonVeg` tinyint(4) NOT NULL COMMENT '0->Veg; 1->NonVeg; 2-> Both',
  `ownerName` varchar(100) NOT NULL,
  `ownerEmail` varchar(100) NOT NULL,
  `ownerContactNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrestaurant`
--

INSERT INTO `tblrestaurant` (`restId`, `restName`, `restEmail`, `restContactNo`, `restWebsite`, `password`, `nonVeg`, `ownerName`, `ownerEmail`, `ownerContactNo`) VALUES
(1, 'Mocha', 'login@mocha.com', '9876543210', 'www.mocha.com', 'temp1234', 0, 'Abcd Xyz', 'abcd@gmail.com', '1234567890'),
(2, 'BBQ Nation', 'login@bbqnation.com', '1234567890', 'www.bbqnation.com', 'qwerty', 1, 'qwertyuiop', 'qwerty@yahoo.com', '1234567890'),
(3, 'abcd temp', 'login@abcd.com', '1234567890', 'www.abcd.com', 'qwerty', 2, 'Xyz temp', 'xyz@abcd.com', '9876543210'),
(6, 'Fozzie\'s Pizzaiolo. Cafe. Deli', 'login@fozzie.com', '1234567890', 'www.fozzie.com', 'qwerty', 2, 'temp temp', 'temp@fozzie.com', '1234567890'),
(7, 'Huber & Holly', 'login@hnh.com', '9876543210', 'www.hnh.com', 'qwerty', 0, 'qwerty asdfgh', 'qwerty@hnh.com', '1234567890'),
(8, 'Brick Kitchen - Five Petals', 'login@brick.com', '1234567890', 'www.brick.com', 'qwerty', 1, 'zxcvbn asdfg', 'zxcvbn@brick.com', '1234567890'),
(9, 'Nini\'s Kitchen', 'login@nini.com', '1234567890', 'www.nini.com', 'qwerty', 0, 'qwerty asdfgh', 'qwerty@nini.com', '1234567890'),
(10, '650 - The Global Kitchen', 'login@650gk.com', '1234567890', 'www.650gk.com', 'qwerty', 2, 'qwerty', 'qwerty@650gk.com', '1234567890'),
(11, 'Little French House', 'login@lfh.in', '1234567890', 'www.lfh.in', 'qwerty', 1, 'qwerty', 'qwerty@lfk.in', '1234567890'),
(12, 'La Pino\'z Pizza', 'login@lapinoz.com', '1234567890', 'www.lapinoz.com', 'qwerty', 2, 'qwerty', 'qwerty@lapinoz.com', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcuisine`
--
ALTER TABLE `tblcuisine`
  ADD PRIMARY KEY (`cuisineId`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `tblmenuitem`
--
ALTER TABLE `tblmenuitem`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `fk_cuisine_item` (`cuisineId`),
  ADD KEY `fk_rest_item` (`restId`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `fk_cust_order` (`custId`),
  ADD KEY `fk_rest_order` (`restId`);

--
-- Indexes for table `tblorderitem`
--
ALTER TABLE `tblorderitem`
  ADD PRIMARY KEY (`orderItemId`),
  ADD KEY `fk_order_item` (`itemId`),
  ADD KEY `fk_order_order` (`orderId`);

--
-- Indexes for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  ADD PRIMARY KEY (`restId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcuisine`
--
ALTER TABLE `tblcuisine`
  MODIFY `cuisineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmenuitem`
--
ALTER TABLE `tblmenuitem`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblorderitem`
--
ALTER TABLE `tblorderitem`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblrestaurant`
--
ALTER TABLE `tblrestaurant`
  MODIFY `restId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblmenuitem`
--
ALTER TABLE `tblmenuitem`
  ADD CONSTRAINT `fk_cuisine_item` FOREIGN KEY (`cuisineId`) REFERENCES `tblcuisine` (`cuisineId`),
  ADD CONSTRAINT `fk_rest_item` FOREIGN KEY (`restId`) REFERENCES `tblrestaurant` (`restId`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `fk_cust_order` FOREIGN KEY (`custId`) REFERENCES `tblcustomer` (`custId`),
  ADD CONSTRAINT `fk_rest_order` FOREIGN KEY (`restId`) REFERENCES `tblrestaurant` (`restId`);

--
-- Constraints for table `tblorderitem`
--
ALTER TABLE `tblorderitem`
  ADD CONSTRAINT `fk_order_item` FOREIGN KEY (`itemId`) REFERENCES `tblmenuitem` (`itemId`),
  ADD CONSTRAINT `fk_order_order` FOREIGN KEY (`orderId`) REFERENCES `tblorder` (`orderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
