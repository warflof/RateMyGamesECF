-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : mar. 31 jan. 2023 à 14:46
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ratemygames`
--

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(55) NOT NULL,
  `Descrition` text NOT NULL,
  `Image` varchar(55) DEFAULT NULL,
  `Statut` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`ID`, `Titre`, `Descrition`, `Image`, `Statut`) VALUES
(1, 'A plague tale: Requiem', 'a plague tale lorem tameripsum a plague tale lorem tameripsuma plague tale lorem tameripsuma plague tale lorem tameripsuma plague tale lorem tameripsuma plague tale lorem tameripsuma plague tale lorem tameripsuma plague tale lorem tameripsum', 'urlimg', 1),
(2, 'New world', 'New world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissumNew world lorep pissum', 'urlimg', 2),
(3, 'Horizon Forbiden West', 'Horizon borem pisae liputas machinox', 'ImgUrl', 1);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `ID` int NOT NULL,
  `Statut` varchar(55) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`ID`, `Statut`) VALUES
(0, 'En cours de développement'),
(1, 'Jouable');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
