-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2026 at 11:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superheroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `id_universe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `real_name`, `gender`, `id_universe`) VALUES
(1, 'Spider-Man', 'Peter Benjamin Parker', 'Masculino', 4),
(2, 'Hulk', 'Robert Bruce Banner', 'Masculino', 4),
(3, 'Captain America', 'Steven Rogers', 'Masculino', 4),
(4, 'Superman', 'Clark Kent', 'Masculino', 2),
(5, 'Batman', 'Bruce Wayne', 'Masculino', 1),
(6, 'Scarlet Spider', 'Ben Reilly', 'Masculino', 5),
(7, 'Wonder Woman', 'Diana Prince', 'Femenino', 1),
(8, 'Doomsday', 'No aplica', 'Masculino', 3),
(9, 'Scarlet Witch', 'Wanda Maximoff', 'Femenino', 5),
(10, 'Night Wing', 'Dick Grayson', 'Masculino', 3);

-- --------------------------------------------------------

--
-- Table structure for table `universes`
--

CREATE TABLE `universes` (
  `id` int(11) NOT NULL,
  `universe` varchar(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universes`
--

INSERT INTO `universes` (`id`, `universe`, `company`, `age`) VALUES
(1, 'U1', 'DC', 'plateada'),
(2, 'U2', 'DC', 'dorada'),
(3, 'U3', 'DC', 'moderna'),
(4, 'U4', 'Marvel', 'plateada'),
(5, 'U5', 'Marvel', 'moderna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_universe` (`id_universe`);

--
-- Indexes for table `universes`
--
ALTER TABLE `universes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `universes`
--
ALTER TABLE `universes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `fk_universe` FOREIGN KEY (`id_universe`) REFERENCES `universes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
