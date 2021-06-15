-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 15 juin 2021 à 12:20
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `application badges`
--

-- --------------------------------------------------------

--
-- Structure de la table `badge_bleu`
--

CREATE TABLE `badge_bleu` (
  `Id_Badge_Bleu` varchar(10) NOT NULL,
  `Status` enum('ACTIF','PERDU','PRET') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_bleu`
--

INSERT INTO `badge_bleu` (`Id_Badge_Bleu`, `Status`, `Id_Identité`) VALUES
('1234567890', 'PERDU', 1),
('azertyuiop', 'ACTIF', 2),
('C412190E', 'ACTIF', 2),
('C412190F', 'ACTIF', 1),
('C412190G', 'PRET', 3),
('C412190H', 'ACTIF', NULL),
('htrhr', 'ACTIF', 30);

-- --------------------------------------------------------

--
-- Structure de la table `badge_noir`
--

CREATE TABLE `badge_noir` (
  `Id_Badge_Noir` varchar(10) NOT NULL,
  `Status` enum('ACTIF','PERDU','PRET') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_noir`
--

INSERT INTO `badge_noir` (`Id_Badge_Noir`, `Status`, `Id_Identité`) VALUES
('0378002187', 'ACTIF', 3),
('0378002188', 'ACTIF', 1),
('0378002189', 'PRET', 2),
('0378002190', 'ACTIF', NULL),
('0378002191', 'PRET', 1);

-- --------------------------------------------------------

--
-- Structure de la table `café`
--

CREATE TABLE `café` (
  `Id_Café` varchar(8) NOT NULL,
  `Status` enum('ACTIF','PERDU','PRET') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `café`
--

INSERT INTO `café` (`Id_Café`, `Status`, `Id_Identité`) VALUES
('45er84r5', 'ACTIF', 1),
('61973202', 'ACTIF', 2),
('61973203', 'ACTIF', 3),
('61973204', 'ACTIF', 1),
('61973205', 'PRET', NULL),
('a78z5685', 'PERDU', 1),
('rthth', 'PERDU', 30);

-- --------------------------------------------------------

--
-- Structure de la table `identités`
--

CREATE TABLE `identités` (
  `Id_Identité` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Alarme` enum('OUI','NON') NOT NULL,
  `Parking` enum('OUI','NON') NOT NULL,
  `Pass` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Accès_Bureau` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Bureau_FZ` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Période` enum('Du Lundi au Vendredi','Du Lundi au Dimanche') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `identités`
--

INSERT INTO `identités` (`Id_Identité`, `Nom`, `Prénom`, `Alarme`, `Parking`, `Pass`, `Accès_Bureau`, `Bureau_FZ`, `Période`) VALUES
(1, 'aaa', 'aaa', 'OUI', 'NON', 'OUI', 'OUI', 'OUI', 'Du Lundi au Vendredi'),
(2, 'bbb', 'bbb', 'NON', 'NON', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(3, 'ccc', 'ccc', 'OUI', 'OUI', 'OUI', 'OUI', 'NON', 'Du Lundi au Dimanche'),
(7, 'ddd', 'ddd', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(8, 'eee', 'eee', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(9, 'fff', 'fff', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(10, 'ggg', 'ggg', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(11, 'hhh', 'hhh', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(12, 'iii', 'iii', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(13, 'jjj', 'jjj', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(14, 'kkk', 'kkk', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(15, 'lll', 'lll', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(16, 'mmm', 'mmm', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(17, 'nnn', 'nnn', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(18, 'ooo', 'ooo', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(19, 'ppp', 'ppp', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(20, 'qqq', 'qqq', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(21, 'rrr', 'rrr', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(22, 'sss', 'sss', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(23, 'ttt', 'ttt', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(24, 'uuu', 'uuu', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(25, 'vvv', 'vvv', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(26, 'www', 'www', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(27, 'xxx', 'xxx', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(28, 'yyy', 'yyy', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(29, 'zzz', 'zzz', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(30, 'moi', 'moi', 'OUI', 'OUI', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `télécommande`
--

CREATE TABLE `télécommande` (
  `Id_Télécommande` varchar(12) NOT NULL,
  `Status` enum('ACTIF','PERDU','PRET') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `télécommande`
--

INSERT INTO `télécommande` (`Id_Télécommande`, `Status`, `Id_Identité`) VALUES
('A3702E6885J2', 'PERDU', 2),
('A3702E6885J3', 'PRET', 3),
('azertyuiopqs', 'ACTIF', 2),
('htfhrh', 'ACTIF', 30),
('trh', 'PRET', 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Login` varchar(20) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Rôle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Login`, `mdp`, `Nom`, `Prénom`, `Rôle`) VALUES
('admin', 'admin', 'ADMIN', 'Admin', 'Administrateur'),
('essai', 'essai', 'ESSAI', 'Essai', 'Utilisateur'),
('moi', 'moi', 'moi', 'moi', 'Utilisateur'),
('user', 'user', 'USER', 'User', 'Utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `badge_bleu`
--
ALTER TABLE `badge_bleu`
  ADD PRIMARY KEY (`Id_Badge_Bleu`),
  ADD KEY `relation identité-badge bleu` (`Id_Identité`);

--
-- Index pour la table `badge_noir`
--
ALTER TABLE `badge_noir`
  ADD PRIMARY KEY (`Id_Badge_Noir`),
  ADD KEY `relation identité-badge noir` (`Id_Identité`);

--
-- Index pour la table `café`
--
ALTER TABLE `café`
  ADD PRIMARY KEY (`Id_Café`),
  ADD KEY `relation identité-badge café` (`Id_Identité`);

--
-- Index pour la table `identités`
--
ALTER TABLE `identités`
  ADD PRIMARY KEY (`Id_Identité`);

--
-- Index pour la table `télécommande`
--
ALTER TABLE `télécommande`
  ADD PRIMARY KEY (`Id_Télécommande`),
  ADD KEY `relation identité-télécommande` (`Id_Identité`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `identités`
--
ALTER TABLE `identités`
  MODIFY `Id_Identité` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `badge_bleu`
--
ALTER TABLE `badge_bleu`
  ADD CONSTRAINT `relation identité-badge bleu` FOREIGN KEY (`Id_Identité`) REFERENCES `identités` (`Id_Identité`);

--
-- Contraintes pour la table `badge_noir`
--
ALTER TABLE `badge_noir`
  ADD CONSTRAINT `relation identité-badge noir` FOREIGN KEY (`Id_Identité`) REFERENCES `identités` (`Id_Identité`);

--
-- Contraintes pour la table `café`
--
ALTER TABLE `café`
  ADD CONSTRAINT `relation identité-badge café` FOREIGN KEY (`Id_Identité`) REFERENCES `identités` (`Id_Identité`);

--
-- Contraintes pour la table `télécommande`
--
ALTER TABLE `télécommande`
  ADD CONSTRAINT `relation identité-télécommande` FOREIGN KEY (`Id_Identité`) REFERENCES `identités` (`Id_Identité`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
