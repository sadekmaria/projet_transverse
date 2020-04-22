-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 22 Avril 2020 à 18:55
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
  PRIMARY KEY (`equipeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `membreId` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` int(11) DEFAULT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `numTel` int(10) NOT NULL,
  `villeMembre` varchar(255) NOT NULL,
  PRIMARY KEY (`membreId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`membreId`, `pseudo`, `email`, `mdp`, `admin`, `prenom`, `nom`, `numTel`, `villeMembre`) VALUES
(1, 'foot', 'foot@gmail.com', '32cb9138ce24c9c5d1917211aec19ba409d84f98', NULL, '', '', 0, ''),
(2, 'foot', 'foot@d.fr', '32cb9138ce24c9c5d1917211aec19ba409d84f98', NULL, '', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
