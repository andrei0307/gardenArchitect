-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 09:52 PM
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
-- Database: `gardenarchitect`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `email` varchar(255) NOT NULL,
  `orderlist` varchar(1000) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`email`, `orderlist`, `price`) VALUES
('ionescu33@yahoo.com', ' Crin Miss Feya 1; Hamac 2 persoane 2; Etajera Flori Lemn 1;', 67.98),
('mitoia01@yahoo.com', ' Crin Miss Feya 1; Brad Alb 1; Leagan Perna Suspendat 1; Pitic De Gradina 35cm 1; Balansoar Cadru Metalic 3;', 712.95),
('ionescu04@yahoo.com', ' Brad Alb 1; Masa Sticla 4 Persoane 1; Scoarta Din Lemn Decorativa 500g 4; Lalele 1;', 173.93),
('radulescu04@yahoo.com', ' Frezie Double Mix 1; Chiparos De California 1; Scoarta Din Lemn Decorativa 500g 1; Fantana Ornamentala Panou Solar 4;', 291.97),
('andreiratundu07@yahoo.com', ' Frezie Double Mix 1; Brad Alb 5;', 230.94);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `image`, `price`) VALUES
(1, 'Crin Miss Feya', 'flower', './images/flowers/crin1.jpg', 5.99),
(2, 'Frezie Double Mix', 'flower', './images/flowers/frezie.jpg', 5.99),
(3, 'Magnolia Galaxy', 'flower', './images/flowers/magnolia.jpg', 3.99),
(4, 'Trandafir Teahibrid Queen Elizabeth', 'flower', './images/flowers/trandafir1.jpg', 9.99),
(5, 'Trandafir Red Berlin', 'flower', './images/flowers/trandafir2.jpg', 7.99),
(6, 'Trandafir teahibrid Casanova', 'flower', './images/flowers/trandafir3.jpg', 5.99),
(7, 'Lalele', 'flower', './images/flowers/lalele.jpg', 4.99),
(8, 'Orhidee', 'flower', './images/flowers/orhidee.jpg', 7.99),
(9, 'Artar Norvegian Purpuriu', 'tree', './images/arbori-arbusti/artar-norvegian-purpuriu.jpg', 179.99),
(10, 'Brad Alb', 'tree', './images/arbori-arbusti/brad-alb.jpg', 44.99),
(11, 'Chiparos De California', 'tree', './images/arbori-arbusti/chiparos-de-california.jpg', 69.99),
(12, 'Ienupar Bluearrow', 'tree', './images/arbori-arbusti/ienupar-bluearrow.jpg', 51.99),
(13, 'Tuia Columnara', 'tree', './images/arbori-arbusti/tuia-columnara.jpg', 32.99),
(14, 'Molid Pitic Little Gem', 'tree', './images/arbori-arbusti/molid-pitic-little-gem.jpg', 44.00),
(15, 'Castan Rosu Briottii', 'tree', './images/arbori-arbusti/castan-rosu-briottii.jpg', 85.00),
(16, 'Molid Argintiu Sanders Blue', 'tree', './images/arbori-arbusti/molid-argintiu-sanders-blue.jpg', 120.00),
(17, 'Cort 3 Persoane', 'furniture', './images/mobilier/cort.jpg', 49.99),
(18, 'Hamac 2 persoane', 'furniture', './images/mobilier/hamac.jpg', 20.00),
(19, 'Balansoar Cadru Metalic', 'furniture', './images/mobilier/leagan-balansoar.jpg', 199.99),
(20, 'Leagan Gradina', 'furniture', './images/mobilier/leagan-gradin1.jpg', 30.99),
(21, 'Leagan Simplu O Persoana', 'furniture', './images/mobilier/leagan-simplu.jpg', 32.99),
(22, 'Molid Pitic Little Gem', 'furniture', './images/arbori-arbusti/molid-pitic-little-gem.jpg', 19.99),
(23, 'Leagan Perna Suspendat', 'furniture', './images/mobilier/leagan-suspendat.jpg', 30.00),
(24, 'Masa Sticla 4 Persoane', 'furniture', './images/mobilier/masa1.jpg', 59.99),
(25, 'Ciuperci Din Ceramica 16cm', 'ornaments', './images/ornamente/ciuperci-ceramica.jpg', 15.99),
(26, 'Etajera Flori Lemn', 'ornaments', './images/ornamente/etajera-flori-din-lemn.jpg', 21.99),
(27, 'Fantana Ornamentala Panou Solar', 'ornaments', './images/ornamente/fantana-arteziana.jpg', 50.00),
(28, 'Fantana Decorativa Led', 'ornaments', './images/ornamente/fantana-decorativa-led.jpg', 39.99),
(29, 'Pietre Decorative 1Kg', 'ornaments', './images/ornamente/pietre-decorative.jpg', 12.99),
(30, 'Pitic De Gradina 35cm', 'ornaments', './images/ornamente/pitic-ceramica.jpg', 32.00),
(31, 'Scoarta Din Lemn Decorativa 500g', 'ornaments', './images/ornamente/scoarta-lemn-decorativa.jpg', 15.99),
(32, 'Set Placi Lemn 1m', 'ornaments', './images/ornamente/set-placi-lemn.jpg', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `email`, `password`, `user_type`) VALUES
(3, 'Andrei', 'Ratundu', 'andreiratundu07@yahoo.com', '$2y$10$GwM1HSHczQl5pDsyGCTGOOfnHO6EYzVp5ZW7HFYfy5vDyX9OPD.ra', 'admin'),
(4, 'Mihai', 'Ionescu', 'ionescu33@yahoo.com', '$2y$10$G9OOqkRNlYTwkI2FCGn8OOK0vNOYIhku7wmtsyIbmvWQ12oXosyR.', 'user'),
(5, 'Valentin', 'Popescu', 'popescu17@yahoo.com', '$2y$10$GkfoVBQX1ajz.TdBLo/dV.9gO/JEwbIHZDMySp6MBO1MxeN5JThua', 'user'),
(8, 'Matei', 'Vasilescu', 'vasilescu04@yahoo.com', '$2y$10$i2EvS82jnNHkhscdUIzjaOV3d10rdtUkW7Pn3.wzObNReeBOqdfsC', 'user'),
(10, 'Ionut', 'Moldovean', 'moldovean04@yahoo.com', '$2y$10$wblYB1.wu2SJm6rmvOfvO.fxMlCSF.gSd08H/H0Pdt/yM1X4OPa8e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
