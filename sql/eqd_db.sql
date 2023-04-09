-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 08 avr. 2023 à 18:57
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eqd_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(75) DEFAULT NULL,
  `contenu` text,
  `datePublication` datetime DEFAULT NULL,
  `auteur` varchar(40) DEFAULT NULL,
  `miniature` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `datePublication`, `auteur`, `miniature`) VALUES
(1, 'Sportez-vous !', 'Sportez-vous au féminin. Les participantes ont eu la chance de participer de nombreuses activités comme le zodiac, la pirogue et le tchoukball.', '2017-10-08 00:00:00', 'Marie LENFANT', 'img/inaugurationMS2R.jpg'),
(2, 'Inauguration de la MS2R', 'Inauguration de la nouvelle Maison des Sports Régionale de la Réunion en présence de M. le maire de Saint Denis', '2016-11-07 00:00:00', 'Marie LENFANT', 'img/semaineolymp-1.jpg'),
(3, 'Semaine Olympique et paralympique', 'Semaine Olympique et paralympique. Des manifestations diverses et variées où on retrouvait des disciplines traditionnelles et des sports innovants.', '2009-02-24 00:00:00', 'Marie LENFANT', 'img/sportezvous-1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

DROP TABLE IF EXISTS `contenir`;
CREATE TABLE IF NOT EXISTS `contenir` (
  `IdPoste` varchar(5) NOT NULL,
  `IdLogiciel` varchar(5) NOT NULL,
  `dateInstallation` date NOT NULL,
  PRIMARY KEY (`IdPoste`,`IdLogiciel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logiciel`
--

DROP TABLE IF EXISTS `logiciel`;
CREATE TABLE IF NOT EXISTS `logiciel` (
  `Id` varchar(5) NOT NULL,
  `Editeur` varchar(20) NOT NULL,
  `Version` varchar(40) NOT NULL,
  `Licence` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logiciel`
--

INSERT INTO `logiciel` (`Id`, `Editeur`, `Version`, `Licence`) VALUES
('10', 'Microsoft', 'Windows 7', 'site'),
('100', 'Kaspersky', 'Small Office Security', '25 postes'),
('110', 'Microsoft Corporatio', 'Microsoft Edge 84.0.522.52', 'freeware'),
('120', 'Mozilla', 'Mozilla Thunderbird 91.3.2', 'freeware'),
('20', 'Microsoft', 'Windows 10', 'site'),
('200', 'Microsoft', 'Office 2016', '50 postes'),
('210', 'pfSense', '2.2.0', 'libre'),
('220', 'Opera', 'Opera Mail v1.0', 'freeware'),
('30', 'Debian', 'Squeeze 6.0.6', 'libre'),
('40', 'Microsoft', 'Windows Server 2008', 'site'),
('50', 'Ubuntu', 'Precise Pangolin 12.04', 'libre'),
('60', 'Apple', 'OS X 10.8', '5 postes'),
('70', 'Debian', 'Wheezy 7.4', 'libre'),
('80', 'Ubuntu', 'Utopic Unicorn 14.10', 'libre'),
('90', 'The Document Foundat', 'LibreOffice 7.2.3.2', 'libre');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` varchar(5) NOT NULL DEFAULT '',
  `nom` varchar(15) DEFAULT NULL,
  `prenom` varchar(15) DEFAULT NULL,
  `qualifications` varchar(90) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `idService` varchar(15) DEFAULT NULL,
  `photos` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Membres` (`idService`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `qualifications`, `mail`, `tel`, `idService`, `photos`) VALUES
('1', 'Nicolas', 'FAYDE', 'Directeur', 'N.FAYDE@M2SR.COM', '0262102003', 'ServAdm', 'img/Membres/leonardo.jpg'),
('2', 'Christelle', 'THIEUMA', 'Directeur', 'C.THIEUMA@M2SR.COM', '0262102001', 'ServAdm', 'img/Membres/christelle.jpg'),
('3', 'Kevin', 'GNAPACHAMPS', 'Directrice Adjointe Responsable suivi du Plan Impact Emploi Association', 'K.GNAPACHAMPS@M2SR.COM', '0262102008', 'ServAdm', 'img/Membres/Deniro.jpg'),
('4', 'Sylvie', 'SKIMALKOS', 'Formation Communication Secretariat', 'S.SKIMALKOS@M2SR.COM', '0262102004', 'ServAdm', 'img/Membres/lara.jpg'),
('5', 'Barbara', 'LAIGLE', 'Responsable Saphir', 'B.AIGLE@MS2R.com', '0262102005', 'ServAdm', 'img/Membres/barbara.jpg'),
('6', 'Adriana', 'MANEQUIN', 'Infographisme et Gestion des photocopieurs numeriques ', 'A.MANEQUIN@MS2R.COM', '0262102006', 'ServProj', 'img/Membres/adriana.jpg'),
('7', 'Marie', 'LENFANT', 'Accueil', 'M.LENFANT@MS2R.COM', '0262102007', 'ServAdm', 'img/Membres/marie.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `Id` varchar(5) NOT NULL,
  `Marque` varchar(20) NOT NULL,
  `Processeur` varchar(20) NOT NULL,
  `TailleMemoire` varchar(10) NOT NULL,
  `DisqueDur` varchar(15) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `CarteGraphique` varchar(50) NOT NULL,
  `Garantie` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`Id`, `Marque`, `Processeur`, `TailleMemoire`, `DisqueDur`, `IP`, `CarteGraphique`, `Garantie`) VALUES
('P1', 'Acer', 'Intel i5', '4 Go', '500 Go', '172.18.159.101', 'NVIDIA Quadro 1000M', 1),
('P10', 'Compaq', 'Athlon II P360', '8 Go', '600 Go', '172.18.159.210', 'ATI Mobility Radeon HD 4250', 1),
('P2', 'Acer', 'Intel i5', '4 Go', '500 Go', '172.18.159.102', 'NVIDIA Quadro 1000M', 1),
('P3', 'Acer', 'Intel i5', '4 Go', '500 Go', '172.18.159.103', 'NVIDIA Quadro 1000M', 0),
('P4', 'Asus', 'Intel i5', '6 Go', '500 Go', '172.18.159.114', 'Mobile Intel HM77', 0),
('P5', 'Asus', 'Intel i5', '6 Go', '500 Go', '172.18.159.115', 'Mobile Intel HM77', 1),
('P6', 'Acer', 'Intel i7', '6 Go', '1 To', '172.18.159.156', 'NVIDIA GeForce GTX550Ti ', 1),
('P7', 'Acer', 'Intel i7', '10 Go', '2 To', '172.18.159.157', 'NVIDIA GeForce GTX570', 1),
('P8', 'Apple', 'A6X', '6 Go', '64 Go', '172.18.159.208', 'Puce graphique', 1),
('P9', 'Compaq', 'Athlon II P360', '4 Go', '320 Go', '172.181.159.209', 'ATI Mobility Radeon HD 425', 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `Identifiant` varchar(15) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `batiment` varchar(1) DEFAULT NULL,
  `NumeroEtage` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Identifiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`Identifiant`, `nom`, `batiment`, `NumeroEtage`) VALUES
('ServAdm', 'Administration', 'A', 1),
('ServEco', 'Economie', 'C', 4),
('ServLog', 'Logistique', 'A', 2),
('ServProj', 'Projet', 'B', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `mdp` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mdp`) VALUES
(1, 'SKIMALKOS', 'Sylvie', 'SKIMALKOS', '$2y$10$9fjSB/JteGSsYq9N9zxtPucUAFQSd08Kf4BeVGW0cSldpATr4cyFS'),
(2, 'LENFANT', 'Marie', 'LENFANT', '$2y$10$j5sRD52UaEoE..uSnTVCIewnIGsO/mzwHnvgyMLcXeCDEqdjOpE0K');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `FK_Membres` FOREIGN KEY (`idService`) REFERENCES `service` (`Identifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
