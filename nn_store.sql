-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 07:44 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nn_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `ID` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Describtion` varchar(1000) NOT NULL DEFAULT '-- No describtion --',
  `Amount` int(11) NOT NULL,
  `Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`ID`, `Name`, `Price`, `Describtion`, `Amount`, `Image`) VALUES
(3, 'Asus ROG Strix G502VM', 59000, '- Intel Core i7-7700HQ (2.80 - 3.80 GHz) \r\n- NVIDIA GeForce GTX 1060 (6GB GDDR5)\r\n- 8 GB DDR4\r\n- 1 TB 7200 RPM + 128 GB SSD\r\n- 15.6 inch (1920x1080) Full HD IPS\r\n- Endless OS', 5, 'goods_img/3.jpg'),
(4, 'Acer Aspire F5-573G', 19900, '- Intel Core i5-7200U (2.5 - 2.70 GHz) \r\n- NVIDIA GeForce GTX 950M (4GB GDDR5)\r\n- 4 GB DDR4\r\n- 1 TB 5400 RPM\r\n- 15.6 inch (1366x768) HD\r\n- DOS Operating System', 9, 'goods_img/4.jpg'),
(5, 'Acer Swift 3 SF314-52G', 23400, '- Intel Core i5-7200U (2.5 - 2.70 GHz) \r\n- NVIDIA GeForce MX150 (2GB GDDR5)\r\n- 8 GB DDR4\r\n- 256 GB SSD\r\n- 14.0 inch (1920 x 1080) Full HD IPS\r\n- Linpus Linux', 10, 'goods_img/5.jpg'),
(6, 'HP OMEN 17', 68900, '- Intel Core i7-7700HQ (2.80 - 3.80 GHz) \r\n- NVIDIA GeForce GTX 1070 (8GB GDDR5)\r\n- 16 GB DDR4\r\n- 2 TB 5400rpm + 128GB SSD\r\n- 17.3 inch (1920x1080) Full HD IPS\r\n- Windows 10 Home (64 Bit)', 1, 'goods_img/6.jpg'),
(7, 'MSI PL62 7RC', 26900, '- Intel Core i7-7700HQ (2.80 - 3.80 GHz) \r\n- NVIDIA GeForce MX150 (2GB GDDR5)\r\n- 4 GB DDR4\r\n- 1 TB 5400 RPM\r\n- 15.6 inch (1366x768) HD\r\n- DOS Operating System\r\n', 3, 'goods_img/7.jpg'),
(8, 'Asus ROG Strix GL553VD', 37500, '- Intel Core i7-7700HQ (2.80 - 3.80 GHz) \r\n- NVIDIA GeForce GTX 1050 (4GB GDDR5)\r\n- 8 GB DDR4\r\n- 1 TB 7200 RPM + 128 GB SSD\r\n- 15.6 inch (1920x1080) Full HD IPS\r\n- Endless OS', 11, 'goods_img/8.jpg'),
(9, 'ASUS VIVOBOOK FLIP TP301UJ', 20900, '- Intel Core i5-6200U (2.3 - 2.80 GHz) \r\n- NVIDIA GeForce 920M (2GB GDDR3)\r\n- 4 GB DDR3L\r\n- 1 TB 5400 RPM\r\n- 13.3 inch (1920x1080) Full HD\r\n- Windows 10 Home (64 Bit)', 3, 'goods_img/9.jpg'),
(10, 'Acer Aspire ES1-421', 8900, '- AMD E1-6010 (1.35 GHz) \r\n- AMD Radeon R2 (Mullins/Beema)\r\n- 2 GB DDR3L\r\n- 500 GB 5400 RPM\r\n- 14 inch (1366x768) HD\r\n- Linpus Linux', 8, 'goods_img/10.jpg'),
(11, 'DELL Inspiron 3567', 17800, '- Intel Core i5-7200U (2.5 - 2.70 GHz) \r\n- AMD Radeon R5 M430 (2GB GDDR3)\r\n- 4 GB DDR4\r\n- 500 GB 5400 RPM\r\n- 15.6 inch WXGA (1366x768) LED\r\n- Ubuntu', 10, 'goods_img/11.jpg'),
(12, 'Acer Aspire E5-553G', 15900, '- AMD A12-9700P (2.5GHz up to 3.4GHz) \r\n- AMD Radeon R7 M440 (2GB GDDR3)\r\n- 8 GB DDR4\r\n- 1 TB 5400 RPM\r\n- 15.6 inch (1366x768) HD\r\n- Linpus Linux', 7, 'goods_img/12.jpg'),
(13, 'Lenovo MIIX 510', 31900, '- Intel Core i5-7200U (2.5 - 2.70 GHz) \r\n- Intel HD Graphics 620\r\n- 8 GB DDR4\r\n- 256 GB SSD\r\n- 12.2 inch (1920 x 1200) Full HD+ IPS 10-Point Multitouch Screen\r\n- Windows 10 Home (64 Bit)', 13, 'goods_img/13.jpg'),
(14, 'DELL Alienware 15 R3', 79900, '- Intel Core i7-6700HQ (2.60 - 3.50 GHz) \r\n- NVIDIA GeForce GTX 1070 (8GB GDDR5)\r\n- 16 GB DDR4\r\n- 1 TB 7200 RPM + 256 GB SSD\r\n- 15.6 inch (1920x1080) Full HD IPS\r\n- Windows 10 Home (64 Bit)', 3, 'goods_img/14.jpg'),
(15, 'DELL Alienware 15 R4', 89990, '- Intel Core i7-6700HQ (2.60 - 3.50 GHz) \r\n- NVIDIA GeForce GTX 1070 (8GB GDDR5)\r\n- 16 GB DDR4\r\n- 1 TB 7200 RPM + 256 GB SSD\r\n- 17.3 inch (1920x1080) Full HD IPS\r\n- Windows 10 Home (64 Bit)', 1, 'goods_img/15.jpg'),
(16, 'Lenovo V110', 16500, '- Intel Core i7-6700HQ (2.60 - 3.50 GHz) \r\n- NVIDIA GeForce GTX 1070 (8GB GDDR5)\r\n- 16 GB DDR4\r\n- 1 TB 7200 RPM + 256 GB SSD\r\n- 17.3 inch (1920x1080) Full HD IPS\r\n- Windows 10 Home (64 Bit)', 4, 'goods_img/16.jpg'),
(17, 'HP15', 16900, '- Intel Core i5-7200U (2.5 - 2.70 GHz) \r\n- AMD Radeon R5 M430 (2GB GDDR3)\r\n- 4 GB DDR4\r\n- 500 GB 5400 RPM\r\n- 15.6 inch (1366x768) HD\r\n- DOS Operating System', 6, 'goods_img/17.jpg'),
(18, 'Acer Aspire Es1-132', 9990, '- Intel Pentium N4200 (1.1 - 2.50 GHz) \r\n- Intel HD Graphics\r\n- 4 GB DDR3L\r\n- 500 GB 5400 RPM\r\n- 11.6 inch (1366x768) HD\r\n- Linpus Linux', 9, 'goods_img/18.jpg'),
(19, 'DELL Inspiron 3567', 23400, '- Intel Core i7-7500U (2.70 - 3.50 GHz) \r\n- AMD Radeon R5 M430 (2GB GDDR3)\r\n- 8 GB DDR4\r\n- 1 TB 5400 RPM\r\n- 15.6 inch WXGA (1366x768) LED\r\n- Ubuntu', 15, 'goods_img/19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(20) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Image` varchar(80) DEFAULT NULL,
  `Authorize_level` int(11) NOT NULL,
  `Last_login` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Firstname`, `Lastname`, `Password`, `Address`, `Image`, `Authorize_level`, `Last_login`) VALUES
('admin', 'root', '@ppstore', 'password', 'ppstore.com', '/ppstorage/img/profile.png', 0, '09/10/2018 15:45:03'),
('pawanp', 'Pawan', 'Panphinit', 'password', '1221 Klongnueng, Klongluang, Patumthani 10210', '/ppstorage/img/profile.png', 1, '08/10/2018 07:28:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
