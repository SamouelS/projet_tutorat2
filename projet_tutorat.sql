-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 avr. 2019 à 21:44
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_tutorat`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `getEnseignements`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getEnseignements` (IN `id` INT)  SELECT cours.*
FROM cours, mener 
WHERE mener.id_etudiant = id$$

DROP PROCEDURE IF EXISTS `getParticipations`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getParticipations` (IN `id` INT)  SELECT c.* 
FROM cours c, participer p
where p.id_etudiant = id$$

DROP PROCEDURE IF EXISTS `insertEtudiant`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEtudiant` (IN `nom` VARCHAR(45), IN `prenom` VARCHAR(45), IN `username` VARCHAR(45), IN `mdp` VARCHAR(64) CHARSET utf8, IN `discord` VARCHAR(45), IN `idClasse` INT)  INSERT INTO etudiant(nom,prenom,username,mdp,discord,idClasse,admin) VALUES 
(nom,prenom,username,mdp,discord,idClasse,0)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL,
  `niveau` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `numClasse` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `etudiantRef` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `niveau`, `numClasse`, `etudiantRef`) VALUES
(1, 'B1', 'C1', 'lorenzo.borda'),
(2, 'B1', 'C2', 'flavyen.tonnelier'),
(3, 'B2', 'C1', 'adrien.parra'),
(4, 'B2', 'C2', 'cedric.menanteau');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMatiere` int(11) NOT NULL,
  `niveau` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `theme` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `salle` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `statut` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dateTime` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`,`idMatiere`),
  KEY `fk_cours_matiere_idx` (`idMatiere`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `idMatiere`, `niveau`, `theme`, `description`, `salle`, `statut`, `dateTime`) VALUES
(1, 1, 'B1', 'theme', 'desc', '201', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `date`
--

DROP TABLE IF EXISTS `date`;
CREATE TABLE IF NOT EXISTS `date` (
  `date` date NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `demander`
--

DROP TABLE IF EXISTS `demander`;
CREATE TABLE IF NOT EXISTS `demander` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMatiere` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `theme` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`,`idMatiere`,`idEtudiant`),
  KEY `fk_demander_etudiant_idx` (`idEtudiant`),
  KEY `fk_demander_matiere` (`idMatiere`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `demander`
--

INSERT INTO `demander` (`id`, `idMatiere`, `idEtudiant`, `theme`, `description`) VALUES
(1, 1, 9, 'un theme', 'une desc'),
(2, 1, 9, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `mdp` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `discord` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bts` tinyint(1) DEFAULT NULL,
  `idClasse` int(11) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etudiant_classe_idx` (`idClasse`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `username`, `mdp`, `discord`, `bts`, `idClasse`, `admin`) VALUES
(9, 'root', 'root', 'root', '799824ba3560d3955f302c392de50e2232991ffaeca6f24200cf46571b523489', 'root', NULL, 1, 1),
(10, 'user1', 'user1', 'user1', 'f4a392170dcf3809250666b629b973fe0fc40b1a983a84723759e111c5d4764c', 'user1', NULL, 1, 0),
(21, 'nom1', 'prenom1', 'username1', '0b14d501a594442a01c6859541bcb3e8164d183d32937b851835442f69d5c94e', 'discord1', NULL, 1, 0),
(27, 'nom2', 'prenom2', 'username2', '6cf615d5bcaac778352a8f1f3360d23f02f34ec182e259897fd6ce485d7870d4', 'discord2', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `libelle`) VALUES
(1, 'Algo/C'),
(2, 'Maths'),
(3, 'Réseau'),
(4, 'C#'),
(5, 'Windows'),
(6, 'Linux'),
(7, 'SQL'),
(8, 'Synfony'),
(9, 'GIT'),
(10, 'Infra'),
(11, 'C++');

-- --------------------------------------------------------

--
-- Structure de la table `mener`
--

DROP TABLE IF EXISTS `mener`;
CREATE TABLE IF NOT EXISTS `mener` (
  `id_cours` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`,`id_etudiant`),
  KEY `fk_mener_etudiant_idx` (`id_etudiant`),
  KEY `fk_mener_cours_idx` (`id_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `mener`
--

INSERT INTO `mener` (`id_cours`, `id_etudiant`) VALUES
(1, 9);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `id_cours` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`,`id_etudiant`),
  KEY `fk_participer_etudiant_idx` (`id_etudiant`),
  KEY `fk_participer_cours_idx` (`id_cours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`id_cours`, `id_etudiant`) VALUES
(1, 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `fk_cours_matiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `demander`
--
ALTER TABLE `demander`
  ADD CONSTRAINT `fk_demander_etudiant` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demander_matiere` FOREIGN KEY (`idMatiere`) REFERENCES `matiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `fk_etudiant_classe` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mener`
--
ALTER TABLE `mener`
  ADD CONSTRAINT `fk_mener_cours` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mener_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `fk_participer_cours` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_participer_etudiant` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
