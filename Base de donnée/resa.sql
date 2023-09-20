-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 10:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resa`
--

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `USER` char(8) NOT NULL,
  `MDP` char(10) DEFAULT NULL,
  `NOMCPTE` char(40) DEFAULT NULL,
  `PRENOMCPTE` char(30) DEFAULT NULL,
  `DATEINSCRIP` date DEFAULT NULL,
  `DATEFERME` date DEFAULT NULL,
  `TYPECOMPTE` char(3) DEFAULT NULL,
  `ADRMAILCPTE` char(60) DEFAULT NULL,
  `NOTELCPTE` char(15) DEFAULT NULL,
  `NOPORTCPTE` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`USER`, `MDP`, `NOMCPTE`, `PRENOMCPTE`, `DATEINSCRIP`, `DATEFERME`, `TYPECOMPTE`, `ADRMAILCPTE`, `NOTELCPTE`, `NOPORTCPTE`) VALUES
('admin', 'admin1234', 'ADMIN', 'admin', '2023-09-09', '0000-00-00', 'adm', 'admin@gmail.com', '01 89 78 56 34', '07 89 78 56 34'),
('gest', 'gest1234', 'Gestionnaire', 'GestionnaireTest', '2023-09-20', '0000-00-00', 'ges', 'gestionnaire@gmail.com', '09 82 58 56 34', '06 82 58 56 34'),
('vac', 'vac1234', 'Vacancier', 'Olivier', '2023-09-20', NULL, 'vac', 'vacancier@gmail.com', '0633165334', '0138169424');

-- --------------------------------------------------------

--
-- Table structure for table `etat_resa`
--

CREATE TABLE `etat_resa` (
  `CODEETATRESA` char(2) NOT NULL,
  `NOMETATRESA` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hebergement`
--

CREATE TABLE `hebergement` (
  `NOHEB` int(4) NOT NULL,
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMHEB` char(40) DEFAULT NULL,
  `NBPLACEHEB` int(2) DEFAULT NULL,
  `SURFACEHEB` int(3) DEFAULT NULL,
  `INTERNET` tinyint(1) DEFAULT NULL,
  `ANNEEHEB` int(4) DEFAULT NULL,
  `SECTEURHEB` char(15) DEFAULT NULL,
  `ORIENTATIONHEB` char(5) DEFAULT NULL,
  `ETATHEB` char(32) DEFAULT NULL,
  `DESCRIHEB` char(200) DEFAULT NULL,
  `PHOTOHEB` char(50) DEFAULT NULL,
  `TARIFSEMHEB` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hebergement`
--

INSERT INTO `hebergement` (`NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES
(3, '1', 'azertyd', 8, 7, 1, 1413, 'TEST', 'TEST', 'TEST', '', 'ethics-947576_1280.jpg', 0.09),
(14, '5', 'Domingos', 4, 15, 1, 2024, 'Paris', 'Est', 'Neuf', 'gsg', NULL, 2000.00),
(53, '2', 'maison', 4, 15, 1, 2024, 'Paris', 'Est', 'Neuf', NULL, NULL, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `resa`
--

CREATE TABLE `resa` (
  `NORESA` int(5) NOT NULL,
  `USER` char(8) NOT NULL,
  `DATEDEBSEM` date NOT NULL,
  `NOHEB` int(4) NOT NULL,
  `CODEETATRESA` char(2) NOT NULL,
  `DATERESA` date DEFAULT NULL,
  `DATEARRHES` date DEFAULT NULL,
  `MONTANTARRHES` decimal(7,2) DEFAULT NULL,
  `NBOCCUPANT` int(2) DEFAULT NULL,
  `TARIFSEMRESA` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semaine`
--

CREATE TABLE `semaine` (
  `DATEDEBSEM` date NOT NULL,
  `DATEFINSEM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_heb`
--

CREATE TABLE `type_heb` (
  `CODETYPEHEB` char(5) NOT NULL,
  `NOMTYPEHEB` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_heb`
--

INSERT INTO `type_heb` (`CODETYPEHEB`, `NOMTYPEHEB`) VALUES
('1', 'Appartement'),
('2', 'Bungalow'),
('3', 'Mobil Home'),
('4', 'Chalet'),
('5', 'Autres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`USER`);

--
-- Indexes for table `etat_resa`
--
ALTER TABLE `etat_resa`
  ADD PRIMARY KEY (`CODEETATRESA`);

--
-- Indexes for table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`NOHEB`),
  ADD KEY `I_FK_HEBERGEMENT_TYPE_HEB` (`CODETYPEHEB`);

--
-- Indexes for table `resa`
--
ALTER TABLE `resa`
  ADD PRIMARY KEY (`NORESA`),
  ADD KEY `I_FK_RESA_COMPTE` (`USER`),
  ADD KEY `I_FK_RESA_SEMAINE` (`DATEDEBSEM`),
  ADD KEY `I_FK_RESA_HEBERGEMENT` (`NOHEB`),
  ADD KEY `I_FK_RESA_ETAT_RESA` (`CODEETATRESA`);

--
-- Indexes for table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`DATEDEBSEM`);

--
-- Indexes for table `type_heb`
--
ALTER TABLE `type_heb`
  ADD PRIMARY KEY (`CODETYPEHEB`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hebergement`
--
ALTER TABLE `hebergement`
  ADD CONSTRAINT `FK_HEBERGEMENT_TYPE_HEB` FOREIGN KEY (`CODETYPEHEB`) REFERENCES `type_heb` (`CODETYPEHEB`);

--
-- Constraints for table `resa`
--
ALTER TABLE `resa`
  ADD CONSTRAINT `FK_RESA_COMPTE` FOREIGN KEY (`USER`) REFERENCES `compte` (`USER`),
  ADD CONSTRAINT `FK_RESA_ETAT_RESA` FOREIGN KEY (`CODEETATRESA`) REFERENCES `etat_resa` (`CODEETATRESA`),
  ADD CONSTRAINT `FK_RESA_HEBERGEMENT` FOREIGN KEY (`NOHEB`) REFERENCES `hebergement` (`NOHEB`),
  ADD CONSTRAINT `FK_RESA_SEMAINE` FOREIGN KEY (`DATEDEBSEM`) REFERENCES `semaine` (`DATEDEBSEM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
