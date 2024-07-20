-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 02:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfetroc`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `code_adm` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`code_adm`, `nom`, `prenom`, `email`, `telephone`, `password`) VALUES
(3, 'SAMER', 'Rafiq', 'samerrafik4@gmail.com', '0766432378', '$2y$10$cplexgsTzeupw7w3KPM2uOmjMIWbJdMKr5o7.gVVkrBjrJbLLvGHm'),
(4, 'HAKKOU', 'Yassir', 'yassirhakkou@gmail.com', '0699677184', '$2y$10$25fFMki6RUCRvaMuNIBFT.DCXuiAc5c37xeYZQCAKailF2Ui2koTq');

-- --------------------------------------------------------

--
-- Table structure for table `annonce`
--

CREATE TABLE `annonce` (
  `code_anc` int(11) NOT NULL,
  `code_trq` int(11) DEFAULT NULL,
  `code_cat` int(11) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `besoin` varchar(50) DEFAULT NULL,
  `image_1` varchar(250) DEFAULT 'images/Annonces/no-image.jpg',
  `image_2` varchar(250) DEFAULT NULL,
  `image_3` varchar(250) DEFAULT NULL,
  `image_4` varchar(250) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `date_pub` datetime DEFAULT current_timestamp(),
  `ville` varchar(50) DEFAULT NULL,
  `signales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annonce`
--

INSERT INTO `annonce` (`code_anc`, `code_trq`, `code_cat`, `titre`, `besoin`, `image_1`, `image_2`, `image_3`, `image_4`, `description`, `date_pub`, `ville`, `signales`) VALUES
(2, 1, 2, 'tablette', 'un pc', 'images/Annonces/6254d189b3f309.09269744.jpg', 'images/Annonces/6254d189b66141.87242006.jpg', NULL, NULL, 'TABLET ALCATEL 1T (7) 3G8GB ROM1GB RAMAndroid ', '2022-04-12 03:10:33', 'OUJDA', 0),
(5, 1, 2, 'iphone 11', 'un ordinateur i7', 'images/Annonces/6254dbc62fe365.69369694.jpg', NULL, NULL, NULL, ' iPhone 11 64gb bon état sauf une micro fissure a l’arrière du téléphone acheter il y a 3mois', '2022-04-12 03:54:14', 'OUJDA', 1),
(6, 1, 2, 'Macbook air', 'iphone 13 ou bien iphone 11 pro max', 'images/Annonces/6254dd3b1b7225.70735027.jpg', NULL, NULL, NULL, 'Macbook air 11 début 2015. Très bon état. Spécifications sur les photos. Livré avec le chargeur mais le chargeur est anglais (fonctionne très bien avec un adaptateur). ', '2022-04-12 04:00:27', 'OUJDA', 0),
(7, 1, 4, 'chaise de bureau', 'Un lit', 'images/Annonces/6254ddc191a2f7.69170412.jpg', NULL, NULL, NULL, 'Chaise de bureau à nettoyer car stoker dans un garage mais en état de fonctionnement', '2022-04-12 04:02:41', 'OUJDA', 1),
(8, 2, 1, 'Tmax 530 SX', 'serie 5 volkswagen', 'images/Annonces/6254debe965948.42091412.png', 'images/Annonces/6254debe988df3.12913768.png', NULL, NULL, 'Yamaha Tmax 530 SX\r\nSupport de plaque court / dosseret\r\nBulle sport\r\nRévision 10000km effectuée chez Yamaha\r\nInstallation Vario\r\nRien à prévoir\r\nÉtat comme neuf', '2022-04-12 04:06:54', 'OUJDA', 0),
(9, 2, 5, 'Blouson', 'nike stan smith', 'images/Annonces/6254dfd4c8e9d5.23275541.png', 'images/Annonces/6254dfd4ca37e1.98761529.png', NULL, NULL, 'mon Blouson B3 style aviateur, acheté neuf sur amazon (voir photo)\r\nTrès peu porté car trop grand.', '2022-04-12 04:11:32', 'OUJDA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloquer`
--

CREATE TABLE `bloquer` (
  `code_blq` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloquer`
--

INSERT INTO `bloquer` (`code_blq`, `email`) VALUES
(1, 'ex@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `code_cat` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`code_cat`, `titre`) VALUES
(1, 'Véhicules'),
(2, 'Informatique'),
(3, 'Loisirs'),
(4, 'Ameublement'),
(5, 'Vétement'),
(6, 'Electroménager');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `code_cnt` int(11) NOT NULL,
  `code_trq` int(11) DEFAULT NULL,
  `code_anc` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `date_pub` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`code_cnt`, `code_trq`, `code_anc`, `content`, `date_pub`) VALUES
(5, 2, 2, 'stockage svp ?', '2022-04-12 03:40:59'),
(6, 1, 8, 'arnaqueur !! ', '2022-04-12 04:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `code_ctn` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `sujet` varchar(250) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`code_ctn`, `email`, `sujet`, `message`) VALUES
(2, 'samerrafik4@gmail.com', 'Exemple', 'Exemple Exemple Exemple Exemple Exemple Exemple Exemple Exemple Exemple'),
(3, 'troc@gmail.com', 'Sujet ', 'Un tres bon PFE ');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `code_cnv` int(11) NOT NULL,
  `code_annonceur` int(11) DEFAULT NULL,
  `code_trq` int(11) DEFAULT NULL,
  `code_anc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`code_cnv`, `code_annonceur`, `code_trq`, `code_anc`) VALUES
(2, 1, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `code_anc` int(11) NOT NULL,
  `code_trq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoris`
--

INSERT INTO `favoris` (`code_anc`, `code_trq`) VALUES
(6, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `code_msg` int(11) NOT NULL,
  `code_trq` int(11) DEFAULT NULL,
  `code_cnv` int(11) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `date_pub` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`code_msg`, `code_trq`, `code_cnv`, `content`, `date_pub`) VALUES
(4, 2, 2, 'Bonjour ', '2022-04-12 04:20:02'),
(5, 1, 2, 'Bonjour monsieur yassir ', '2022-04-12 04:20:53'),
(7, 2, 2, 'j ai un PC Portable ASUS ', '2022-04-12 04:23:51'),
(8, 2, 2, 'ces caracteristique : Intel Core i7-1165G7 - RAM 16Go - Stockage SSD 512Go - Windows 11 - AZERTY', '2022-04-12 04:24:25'),
(9, 1, 2, 'Oui c est j accepte ça  ', '2022-04-12 04:25:20'),
(10, 1, 2, 'on fix un rendez-vous alors ?', '2022-04-12 04:25:49'),
(11, 2, 2, 'que pensez-vous demain a 10h prés de ESTO? ', '2022-04-12 04:27:48'),
(12, 1, 2, 'Oui c est parfait.', '2022-04-12 04:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `signals`
--

CREATE TABLE `signals` (
  `code_anc` int(11) NOT NULL,
  `code_trq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signals`
--

INSERT INTO `signals` (`code_anc`, `code_trq`) VALUES
(5, 2),
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `troqueur`
--

CREATE TABLE `troqueur` (
  `code_trq` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT 'images/Profiles/no-image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `troqueur`
--

INSERT INTO `troqueur` (`code_trq`, `nom`, `prenom`, `email`, `telephone`, `password`, `ville`, `photo`) VALUES
(1, 'SAMER', 'Rafiq', 'samerrafik@gmail.com', NULL, '$2y$10$zfmm05jzesU6wsZZUKoQmeos4Ad8vUYuiWejGbB4Y5UlVx/TZFiGe', 'Paris', 'images/Profiles/no-image.png'),
(2, 'HAKKOU', 'Yassir', 'Yassir@gmail.fr', NULL, '$2y$10$N.k4z17Ro8oFh6xTR7hA1.IcpjXWjz0ZjISpocoChpr0nfF1Tpxze', '', 'images/Profiles/no-image.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`code_adm`);

--
-- Indexes for table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`code_anc`),
  ADD KEY `code_trq` (`code_trq`),
  ADD KEY `code_cat` (`code_cat`);

--
-- Indexes for table `bloquer`
--
ALTER TABLE `bloquer`
  ADD PRIMARY KEY (`code_blq`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`code_cat`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`code_cnt`),
  ADD KEY `code_trq` (`code_trq`),
  ADD KEY `code_anc` (`code_anc`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`code_ctn`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`code_cnv`),
  ADD KEY `code_anc` (`code_anc`),
  ADD KEY `code_trq` (`code_trq`),
  ADD KEY `code_annonceur` (`code_annonceur`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`code_anc`,`code_trq`),
  ADD KEY `code_trq` (`code_trq`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`code_msg`),
  ADD KEY `code_cnv` (`code_cnv`),
  ADD KEY `code_trq` (`code_trq`);

--
-- Indexes for table `signals`
--
ALTER TABLE `signals`
  ADD PRIMARY KEY (`code_anc`,`code_trq`),
  ADD KEY `code_trq` (`code_trq`);

--
-- Indexes for table `troqueur`
--
ALTER TABLE `troqueur`
  ADD PRIMARY KEY (`code_trq`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `code_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `code_anc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bloquer`
--
ALTER TABLE `bloquer`
  MODIFY `code_blq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `code_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `code_cnt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `code_ctn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `code_cnv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `code_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `troqueur`
--
ALTER TABLE `troqueur`
  MODIFY `code_trq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE,
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`code_cat`) REFERENCES `categorie` (`code_cat`) ON DELETE CASCADE;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`code_anc`) REFERENCES `annonce` (`code_anc`) ON DELETE CASCADE;

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`code_anc`) REFERENCES `annonce` (`code_anc`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE,
  ADD CONSTRAINT `conversation_ibfk_3` FOREIGN KEY (`code_annonceur`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE;

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`code_anc`) REFERENCES `annonce` (`code_anc`) ON DELETE CASCADE,
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`code_cnv`) REFERENCES `conversation` (`code_cnv`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE;

--
-- Constraints for table `signals`
--
ALTER TABLE `signals`
  ADD CONSTRAINT `signals_ibfk_1` FOREIGN KEY (`code_anc`) REFERENCES `annonce` (`code_anc`) ON DELETE CASCADE,
  ADD CONSTRAINT `signals_ibfk_2` FOREIGN KEY (`code_trq`) REFERENCES `troqueur` (`code_trq`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
