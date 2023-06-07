-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 07 Juin 2023 à 09:56
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_findyourbike`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_bike`
--

CREATE TABLE `t_bike` (
  `idBike` int(11) NOT NULL,
  `bikPicture` char(50) NOT NULL COMMENT 'Sert a stocker le nom du fichier',
  `bikEBike` tinyint(1) NOT NULL COMMENT 'Definit si le vélo est un ebike ou non',
  `bikColor` varchar(25) NOT NULL COMMENT 'Definit la couleur du vélo',
  `bikSize` int(10) NOT NULL,
  `bikFrameNo` bigint(65) NOT NULL,
  `bikState` tinyint(1) NOT NULL DEFAULT '1',
  `bikDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idEvent` int(11) DEFAULT NULL,
  `idBrand` int(11) NOT NULL,
  `idCity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_bike`
--

INSERT INTO `t_bike` (`idBike`, `bikPicture`, `bikEBike`, `bikColor`, `bikSize`, `bikFrameNo`, `bikState`, `bikDate`, `idEvent`, `idBrand`, `idCity`) VALUES
(1, 'purple.png', 0, 'violet', 1, 384526791, 0, '2021-09-23 19:12:35', NULL, 1, 1),
(2, 'red.png', 0, 'rouge', 2, 597438162, 1, '2021-08-17 08:35:12', NULL, 2, 2),
(3, 'eYellow.png', 1, 'jaune', 3, 910754826, 0, '2023-02-22 14:56:27', NULL, 3, 3),
(4, 'eBlue.png', 1, 'bleu', 4, 268579431, 0, '2021-11-09 21:43:59', NULL, 4, 4),
(5, 'orange.png', 0, 'orange', 5, 742693158, 0, '2021-12-18 06:27:41', NULL, 5, 5),
(6, 'eGreen', 1, 'vert', 6, 513276849, 1, '2021-09-13 11:05:47', NULL, 6, 1),
(7, 'purple.png', 0, 'violet', 7, 926185743, 0, '2022-11-30 08:39:03', NULL, 7, 2),
(8, 'eRed.png', 1, 'rouge', 8, 407831695, 0, '2022-03-15 16:20:18', NULL, 8, 3),
(9, 'yellow.png', 0, 'jaune', 9, 653217489, 1, '2021-11-28 09:47:54', NULL, 9, 4),
(10, 'eBlue.png', 1, 'bleu', 10, 862940751, 1, '2023-04-30 20:54:21', NULL, 10, 5),
(11, 'orange.png', 0, 'orange', 11, 158437629, 0, '2022-05-26 13:08:35', NULL, 11, 1),
(12, 'eGreen.png', 1, 'vert', 12, 740852961, 1, '2022-07-16 22:17:49', NULL, 12, 2),
(13, 'ePurple.png', 1, 'violet', 13, 623945817, 1, '2022-02-01 05:10:27', NULL, 13, 3),
(14, 'red.png', 0, 'rouge', 14, 931274568, 1, '2022-06-12 12:45:59', NULL, 14, 4),
(15, 'eYellow.png', 1, 'jaune', 15, 759318246, 0, '2023-04-19 19:38:01', NULL, 15, 5),
(16, 'blue.png', 0, 'bleu', 16, 486793125, 1, '2022-01-09 03:21:17', NULL, 16, 1),
(17, 'eOrange.png', 1, 'orange', 17, 815429367, 1, '2023-01-02 10:59:47', NULL, 17, 2),
(18, 'eGreen.png', 1, 'vert', 18, 394651728, 1, '2022-09-05 17:33:12', NULL, 18, 3),
(19, 'purple.png', 0, 'violet', 19, 257431869, 1, '2022-04-25 02:44:56', NULL, 19, 4),
(20, 'eRed.png', 1, 'rouge', 20, 619843257, 1, '2022-08-08 09:56:30', NULL, 20, 5),
(21, 'eYellow.png', 1, 'jaune', 21, 526914387, 0, '2022-03-17 14:02:45', NULL, 1, 1),
(22, 'eBlue.png', 1, 'bleu', 22, 739425816, 1, '2023-05-01 18:29:57', NULL, 2, 2),
(23, 'eOrange.png', 1, 'orange', 23, 842156739, 0, '2022-08-23 09:47:22', NULL, 3, 3),
(24, 'green.png', 0, 'vert', 24, 368497215, 1, '2022-07-01 16:54:38', NULL, 4, 4),
(25, 'purple.png', 0, 'violet', 25, 975382461, 1, '2023-03-05 12:10:19', NULL, 5, 5),
(26, 'eRed.png', 1, 'rouge', 26, 624173985, 1, '2022-11-11 21:34:56', NULL, 6, 1),
(27, 'yellow.png', 0, 'jaune', 27, 932186547, 1, '2022-03-26 08:17:43', NULL, 7, 2),
(28, 'eBlue.ng', 1, 'bleu', 28, 417692583, 0, '2022-04-30 17:52:10', NULL, 8, 3),
(29, 'orange.png', 0, 'orange', 29, 865927431, 0, '2023-02-10 09:30:56', NULL, 9, 4),
(30, 'green.png', 0, 'vert', 30, 593781264, 1, '2022-07-26 14:45:38', NULL, 10, 5),
(31, 'purple.png', 0, 'violet', 31, 381946257, 1, '2022-08-15 06:27:49', NULL, 11, 1),
(32, 'eRed.png', 1, 'rouge', 32, 926537814, 1, '2022-10-18 13:54:12', NULL, 12, 2),
(33, 'yellow.png', 0, 'jaune', 33, 517849623, 0, '2023-01-07 20:37:29', NULL, 13, 3),
(34, 'blue.png', 0, 'bleu', 34, 742195386, 1, '2022-05-29 09:12:56', NULL, 14, 4),
(35, 'orange.png', 0, 'orange', 35, 913682457, 1, '2022-10-09 18:34:21', NULL, 15, 5),
(36, 'eGreeb.png', 1, 'vert', 36, 625314789, 0, '2023-06-01 11:28:46', NULL, 16, 1),
(37, 'purple.png', 0, 'violet', 37, 841729563, 0, '2023-04-05 16:51:02', NULL, 17, 2),
(38, 'eRed.png', 1, 'rouge', 38, 397246815, 0, '2022-11-22 23:44:37', NULL, 18, 3),
(39, 'yellow.png', 0, 'jaune', 39, 528716439, 0, '2022-06-13 10:57:54', NULL, 19, 4),
(40, 'eBlue.png', 1, 'bleu', 40, 714583926, 1, '2023-03-18 06:19:21', NULL, 20, 5),
(41, 'eOrange.png', 1, 'orange', 41, 819264573, 1, '2022-09-05 14:37:59', NULL, 1, 1),
(42, 'eGreen.png', 1, 'vert', 42, 536172948, 0, '2023-01-22 19:54:27', NULL, 2, 2),
(43, 'ePurple.png', 1, 'violet', 43, 927435618, 1, '2022-12-08 08:21:43', NULL, 3, 3),
(44, 'eRed.png', 1, 'rouge', 44, 641859327, 1, '2023-05-10 16:48:19', NULL, 4, 4),
(45, 'yellow.png', 0, 'jaune', 45, 378526914, 0, '2022-07-27 11:03:56', NULL, 5, 5),
(46, 'eBlue.png', 1, 'bleu', 46, 941263875, 1, '2022-06-15 20:29:34', NULL, 6, 1),
(47, 'orange.png', 0, 'orange', 47, 615792483, 0, '2023-02-01 09:47:12', NULL, 7, 2),
(48, 'eGreen.png', 1, 'vert', 48, 457936128, 1, '2022-09-18 15:12:37', NULL, 8, 3),
(49, 'purple.png', 0, 'violet', 49, 782514639, 0, '2023-04-12 07:39:04', NULL, 9, 4),
(50, 'eRed.png', 1, 'rouge', 50, 593678241, 0, '2022-12-27 13:56:22', NULL, 10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `t_brand`
--

CREATE TABLE `t_brand` (
  `idBrand` int(11) NOT NULL,
  `braName` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_brand`
--

INSERT INTO `t_brand` (`idBrand`, `braName`) VALUES
(1, 'BH BIKES'),
(2, 'BIANCHI'),
(3, 'CAMPAGNOLO'),
(4, 'CANNONDALE'),
(5, 'FOCUS'),
(6, 'GIANT'),
(7, 'KTM'),
(8, 'LAPIERRE'),
(9, 'LIGHTWEIGHT'),
(10, 'LOOK'),
(11, 'MAVIC'),
(12, 'ORBEA'),
(13, 'PINARELLO'),
(14, 'RIESE MULLER'),
(15, 'SCOTT'),
(16, 'SHIMANO'),
(17, 'SPECIALIZED'),
(18, 'TIME'),
(19, 'TREK'),
(20, 'WILIER');

-- --------------------------------------------------------

--
-- Structure de la table `t_city`
--

CREATE TABLE `t_city` (
  `idCity` int(11) NOT NULL,
  `citName` char(30) NOT NULL,
  `citLogo` char(50) NOT NULL,
  `citState` tinyint(1) NOT NULL DEFAULT '0',
  `citAccUsername` char(33) NOT NULL,
  `citAccPassword` char(255) NOT NULL,
  `citAccLastName` char(40) NOT NULL,
  `citAccFirstName` char(60) NOT NULL,
  `citAccAddress` char(255) NOT NULL,
  `citAccEmail` char(255) NOT NULL,
  `citAccPhone` char(15) NOT NULL,
  `idRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_city`
--

INSERT INTO `t_city` (`idCity`, `citName`, `citLogo`, `citState`, `citAccUsername`, `citAccPassword`, `citAccLastName`, `citAccFirstName`, `citAccAddress`, `citAccEmail`, `citAccPhone`, `idRole`) VALUES
(1, 'Penthaz', '20230605155740penthaz.png', 1, 'fybpenthaz', '$2y$10$xUcKsFOVqNGXzmAnTPC3cOhlNnYybLSR/iF5uBXyMV6r.qwwgu7fq', 'Narducci', 'Cyril', 'Chemin du Montillier 22', 'cyril.narducci@gmail.com', '077 481 42 52', 1),
(2, 'Penthalaz', '20230605160010penthalaz.png', 0, 'fybpenthalaz', '$2y$10$RAjcpjDLgDb4d7NdmUtyX.739EQlaBDnDTaWYCJ./xh2SYijs5i.i', 'Narducci', 'Mathias', 'Ch. du Montillier', 'mathias.narducci@gmail.com', '077 493 94 93', 2),
(3, 'Cossonay', '20230605160211cossonay.png', 0, 'fybcossonay', '$2y$10$cSVbEPZq/r9coVMiIlgAy.7GQOjXghc/nYxC1Z5vz8AKsCARg0Kee', 'Mellal', 'Ali', 'Ch. DerriÃ¨re-Le-Bourg 4', 'ali.mellal@gmail.com', '012 345 67 89', 3),
(4, 'Vufflens', '20230605160414vufflens.png', 0, 'fybvufflens', '$2y$10$Zov3myl6724p2eDU0/CZ8uPCHdz7ioB1HxkT1JhFdLOkuepE/1Pyu', 'Waeber', 'Sonia', 'Larzillier 12', 'sonia.waeber@gmail.com', '012 345 67 89', 4),
(5, 'Sarraz', '20230605160531sarraz.png', 0, 'fybsarraz', '$2y$10$VGiT/wO2FWh1z1BYMnrkB.AnKNvYBsUeZ7Pkh38ufU.JQIXHbATBu', 'Maeder', 'Ivan', 'Ch. du Record', 'ivan.maeder@gmail.com', '012 345 67 89', 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_consultacc`
--

CREATE TABLE `t_consultacc` (
  `idConsultAcc` int(11) NOT NULL,
  `coaUsername` char(10) NOT NULL,
  `coaPassword` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_consultacc`
--

INSERT INTO `t_consultacc` (`idConsultAcc`, `coaUsername`, `coaPassword`) VALUES
(1, 'consultacc', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `t_event`
--

CREATE TABLE `t_event` (
  `idEvent` int(11) NOT NULL,
  `eveProof` char(255) NOT NULL,
  `eveDate` date NOT NULL,
  `idPersons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_persons`
--

CREATE TABLE `t_persons` (
  `idPersons` int(11) NOT NULL,
  `perLastname` char(40) NOT NULL,
  `perFirstname` char(40) NOT NULL,
  `perEmail` char(255) NOT NULL,
  `perPhone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_place`
--

CREATE TABLE `t_place` (
  `idPlace` int(11) NOT NULL,
  `plaInfos` char(255) DEFAULT NULL,
  `idCity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_role`
--

CREATE TABLE `t_role` (
  `idRole` int(11) NOT NULL,
  `rolName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_role`
--

INSERT INTO `t_role` (`idRole`, `rolName`) VALUES
(1, 'Syndic'),
(2, 'Municipal'),
(3, 'Greffe'),
(4, 'Bourse'),
(6, 'Employe');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_bike`
--
ALTER TABLE `t_bike`
  ADD PRIMARY KEY (`idBike`),
  ADD UNIQUE KEY `idBike` (`idBike`),
  ADD KEY `ID_t_bike_IND` (`idBike`),
  ADD KEY `FKUPDATE_IND` (`idEvent`),
  ADD KEY `FKDEFINE_IND` (`idBrand`),
  ADD KEY `FKCONTROL_IND` (`idCity`);

--
-- Index pour la table `t_brand`
--
ALTER TABLE `t_brand`
  ADD PRIMARY KEY (`idBrand`),
  ADD UNIQUE KEY `idBrand` (`idBrand`),
  ADD KEY `ID_t_brand_IND` (`idBrand`);

--
-- Index pour la table `t_city`
--
ALTER TABLE `t_city`
  ADD PRIMARY KEY (`idCity`),
  ADD UNIQUE KEY `idCity` (`idCity`),
  ADD KEY `ID_t_city_IND` (`idCity`);

--
-- Index pour la table `t_consultacc`
--
ALTER TABLE `t_consultacc`
  ADD PRIMARY KEY (`idConsultAcc`),
  ADD UNIQUE KEY `idConsultAcc` (`idConsultAcc`),
  ADD KEY `ID_t_consultAcc_IND` (`idConsultAcc`);

--
-- Index pour la table `t_event`
--
ALTER TABLE `t_event`
  ADD PRIMARY KEY (`idEvent`),
  ADD UNIQUE KEY `idEvent` (`idEvent`),
  ADD KEY `ID_t_event_IND` (`idEvent`),
  ADD KEY `FKREQUEST_IND` (`idPersons`);

--
-- Index pour la table `t_persons`
--
ALTER TABLE `t_persons`
  ADD PRIMARY KEY (`idPersons`),
  ADD UNIQUE KEY `idPersons` (`idPersons`),
  ADD KEY `ID_t_persons_IND` (`idPersons`);

--
-- Index pour la table `t_place`
--
ALTER TABLE `t_place`
  ADD PRIMARY KEY (`idPlace`),
  ADD UNIQUE KEY `idPlace` (`idPlace`),
  ADD UNIQUE KEY `idCity` (`idCity`),
  ADD UNIQUE KEY `plaInfos` (`plaInfos`),
  ADD KEY `ID_t_place_IND` (`idPlace`);

--
-- Index pour la table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`idRole`),
  ADD UNIQUE KEY `idRole` (`idRole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_bike`
--
ALTER TABLE `t_bike`
  MODIFY `idBike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `t_brand`
--
ALTER TABLE `t_brand`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `t_city`
--
ALTER TABLE `t_city`
  MODIFY `idCity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `t_consultacc`
--
ALTER TABLE `t_consultacc`
  MODIFY `idConsultAcc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_event`
--
ALTER TABLE `t_event`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_persons`
--
ALTER TABLE `t_persons`
  MODIFY `idPersons` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_place`
--
ALTER TABLE `t_place`
  MODIFY `idPlace` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_role`
--
ALTER TABLE `t_role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
