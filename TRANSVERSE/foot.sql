-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 05 Mai 2020 à 03:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `foot`
--

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `equipeId` int(11) NOT NULL AUTO_INCREMENT,
  `villeEquipe` varchar(255) NOT NULL,
  `five` varchar(255) NOT NULL,
  `nbrManquant` int(11) NOT NULL DEFAULT '9',
  `createur` varchar(255) NOT NULL,
  `dateEquipe` date NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `equipe_nom` varchar(255) NOT NULL,
  PRIMARY KEY (`equipeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`equipeId`, `villeEquipe`, `five`, `nbrManquant`, `createur`, `dateEquipe`, `valide`, `equipe_nom`) VALUES
(3, 'Sucy en Brie', 'stade de Sucy', 4, 'Nassim', '2020-05-09', 1, ''),
(4, 'Villejuif', 'LÃ©o Lagrange', 8, 'Emile', '2020-06-04', 0, ''),
(5, 'CrÃ©teil', 'Stade de CrÃ©teil', 2, 'Nathan', '2020-04-27', 0, ''),
(6, 'Vitry', 'stade de Vitry', 5, 'Alex', '2020-04-25', 0, ''),
(7, 'Paris', 'Stade Emile Antoine', 8, 'Moha', '2020-04-26', 0, ''),
(8, 'Beyrouth', 'stade', 3, 'anoush', '2020-05-16', 0, ''),
(9, 'Sucy en Brie', 'stade de Vitry', 5, '2', '2020-05-17', 0, 'BARCELONE'),
(16, 'Sucy en Brie', 'stade de Vitry', 5, '2', '2020-05-10', 0, 'PARIS');

-- --------------------------------------------------------

--
-- Structure de la table `equipe_membre_pair`
--

CREATE TABLE IF NOT EXISTS `equipe_membre_pair` (
  `equipeId` int(11) NOT NULL DEFAULT '0',
  `membreId` int(11) NOT NULL DEFAULT '0',
  `capitaine` tinyint(4) NOT NULL,
  PRIMARY KEY (`equipeId`,`membreId`),
  KEY `membreId` (`membreId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `equipe_membre_pair`
--

INSERT INTO `equipe_membre_pair` (`equipeId`, `membreId`, `capitaine`) VALUES
(9, 2, 1),
(16, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `membreId` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT '0',
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numTel` int(10) NOT NULL,
  `villeMembre` varchar(255) NOT NULL,
  PRIMARY KEY (`membreId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`membreId`, `pseudo`, `email`, `mdp`, `admin`, `prenom`, `nom`, `numTel`, `villeMembre`) VALUES
(1, 'Mbappe', 'foot@gmail.com', '32cb9138ce24c9c5d1917211aec19ba409d84f98', 0, 'Kylian', 'Mbappé', 655443322, 'Paris'),
(2, 'foot', 'foot@d.fr', '32cb9138ce24c9c5d1917211aec19ba409d84f98', 0, 'Kylian', 'Mbappe', 655332211, 'Paris'),
(3, 'microbe', 'a@a.c', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 0, '', '', 0, ''),
(4, 'microbe', 'maria94370@hotmail.fr', 'c1c93f88d273660be5358cd4ee2df2c2f3f0e8e7', 0, 'd', 'Silver Dress', 8992288, 'Sucy en Brie'),
(5, 'Admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'Admin', 'istrateur', 146464646, 'Villejuif'),
(6, 'maria', 'maria@hotmail.fr', 'e21fc56c1a272b630e0d1439079d0598cf8b8329', 0, 'maria', 'sadek', 654321222, 'Sucy en Brie');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `equipe_membre_pair`
--
ALTER TABLE `equipe_membre_pair`
  ADD CONSTRAINT `equipe_membre_pair_ibfk_1` FOREIGN KEY (`equipeId`) REFERENCES `equipe` (`equipeId`),
  ADD CONSTRAINT `equipe_membre_pair_ibfk_2` FOREIGN KEY (`membreId`) REFERENCES `membre` (`membreId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
