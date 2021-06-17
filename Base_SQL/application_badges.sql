-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 17 juin 2021 à 09:59
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
-- Base de données : `application_badges`
--

-- --------------------------------------------------------

--
-- Structure de la table `alarme`
--

CREATE TABLE `alarme` (
  `Id_Alarme` enum('Noir-1','Noir-2','Noir-3','Noir-4','Noir-5','Noir-6','Noir-7','Noir-8','Noir-9','Blanc-1','Blanc-2','Blanc-3','Blanc-4','Blanc-5','Blanc-6','Blanc-7','Blanc-8','Blanc-9','Bleu-1','Bleu-2','Bleu-3','Bleu-4','Bleu-5','Bleu-6','Bleu-7','Bleu-8','Bleu-9','Vert-1','Vert-2','Vert-3','Vert-4','Vert-5','Vert-6','Vert-7','Vert-8','Vert-9','Rouge-1','Rouge-2','Rouge-3','Rouge-4','Rouge-5','Rouge-6','Rouge-7','Rouge-8','Rouge-9','OUI','NON') NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alarme`
--

INSERT INTO `alarme` (`Id_Alarme`, `Statut`, `Id_Identité`) VALUES
('Noir-4', 'ACTIF', 2),
('Noir-5', 'ACTIF', NULL),
('Vert-5', 'PRET', 1);

-- --------------------------------------------------------

--
-- Structure de la table `badge_bleu`
--

CREATE TABLE `badge_bleu` (
  `Id_Badge_Bleu` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_bleu`
--

INSERT INTO `badge_bleu` (`Id_Badge_Bleu`, `Statut`, `Id_Identité`) VALUES
('1234567890', 'PERDU', 1),
('azertyuiop', 'ACTIF', 2),
('C412190E', 'RENDU', 1),
('C412190F', 'ACTIF', 1),
('C412190G', 'PRET', NULL),
('C412190H', 'ACTIF', NULL),
('htrhr', 'ACTIF', 30);

-- --------------------------------------------------------

--
-- Structure de la table `badge_noir`
--

CREATE TABLE `badge_noir` (
  `Id_Badge_Noir` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_noir`
--

INSERT INTO `badge_noir` (`Id_Badge_Noir`, `Statut`, `Id_Identité`) VALUES
('0378002187', 'RENDU', NULL),
('0378002188', 'ACTIF', 1),
('0378002189', 'RENDU', 2),
('0378002190', 'ACTIF', NULL),
('0378002191', 'PRET', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cafe`
--

CREATE TABLE `cafe` (
  `Id_Café` varchar(8) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cafe`
--

INSERT INTO `cafe` (`Id_Café`, `Statut`, `Id_Identité`) VALUES
('45er84r5', 'ACTIF', 1),
('61973202', 'ACTIF', 2),
('61973203', 'PERDU', 1),
('61973204', 'RENDU', NULL),
('61973205', 'PRET', NULL),
('a78z5685', 'PERDU', 1),
('rthth', 'PERDU', 30);

-- --------------------------------------------------------

--
-- Structure de la table `identites`
--

CREATE TABLE `identites` (
  `Id_Identité` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Pass` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Accès_Bureau` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Bureau_FZ` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Période` enum('Du Lundi au Vendredi','Du Lundi au Dimanche') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `identites`
--

INSERT INTO `identites` (`Id_Identité`, `Nom`, `Prénom`, `Pass`, `Accès_Bureau`, `Bureau_FZ`, `Période`) VALUES
(1, 'aaa', 'aaa', 'OUI', 'OUI', 'OUI', 'Du Lundi au Vendredi'),
(2, 'bbb', 'bbb', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(7, 'ddd', 'ddd', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(8, 'eee', 'eee', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(9, 'fff', 'fff', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(10, 'ggg', 'ggg', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(11, 'hhh', 'hhh', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(12, 'iii', 'iii', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(13, 'jjj', 'jjj', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(14, 'kkk', 'kkk', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(15, 'lll', 'lll', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(16, 'mmm', 'mmm', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(17, 'nnn', 'nnn', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(18, 'ooo', 'ooo', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(19, 'ppp', 'ppp', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(20, 'qqq', 'qqq', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(21, 'rrr', 'rrr', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(22, 'sss', 'sss', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(23, 'ttt', 'ttt', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(24, 'uuu', 'uuu', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(25, 'vvv', 'vvv', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(26, 'www', 'www', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(27, 'xxx', 'xxx', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(28, 'yyy', 'yyy', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(29, 'zzz', 'zzz', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(30, 'moi', 'moi', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(31, 'ccc', 'ccc', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `parking`
--

CREATE TABLE `parking` (
  `Id_Parking` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parking`
--

INSERT INTO `parking` (`Id_Parking`, `Statut`, `Id_Identité`) VALUES
('vdds', 'PRET', 1),
('zerfdg', 'RENDU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `telecommande`
--

CREATE TABLE `telecommande` (
  `Id_Télécommande` varchar(12) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `telecommande`
--

INSERT INTO `telecommande` (`Id_Télécommande`, `Statut`, `Id_Identité`) VALUES
('A3702E6885J2', 'PERDU', 2),
('A3702E6885J3', 'PERDU', 31),
('azerty', 'ACTIF', NULL),
('azertyuiopqs', 'ACTIF', 2),
('baba', 'ACTIF', 1),
('fdsg', 'PRET', 1),
('htfhrh', 'ACTIF', 30),
('trh', 'RENDU', 1);

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
-- Index pour la table `alarme`
--
ALTER TABLE `alarme`
  ADD PRIMARY KEY (`Id_Alarme`),
  ADD KEY `relation identité-badge alarme` (`Id_Identité`);

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
-- Index pour la table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`Id_Café`),
  ADD KEY `relation identité-badge café` (`Id_Identité`);

--
-- Index pour la table `identites`
--
ALTER TABLE `identites`
  ADD PRIMARY KEY (`Id_Identité`);

--
-- Index pour la table `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`Id_Parking`),
  ADD KEY `relation identité-badge parking` (`Id_Identité`);

--
-- Index pour la table `telecommande`
--
ALTER TABLE `telecommande`
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
-- AUTO_INCREMENT pour la table `identites`
--
ALTER TABLE `identites`
  MODIFY `Id_Identité` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alarme`
--
ALTER TABLE `alarme`
  ADD CONSTRAINT `relation identité-badge alarme` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `badge_bleu`
--
ALTER TABLE `badge_bleu`
  ADD CONSTRAINT `relation identité-badge bleu` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `badge_noir`
--
ALTER TABLE `badge_noir`
  ADD CONSTRAINT `relation identité-badge noir` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `cafe`
--
ALTER TABLE `cafe`
  ADD CONSTRAINT `relation identité-badge café` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `relation identité-badge parking` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `telecommande`
--
ALTER TABLE `telecommande`
  ADD CONSTRAINT `relation identité-télécommande` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
