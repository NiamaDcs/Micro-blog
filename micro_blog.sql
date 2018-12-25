-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 sep. 2018 à 11:21
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `micro_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenue` text CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `contenue`, `date`) VALUES
(1, 'Vestibulum non metus quis neque facilisis sodales. Donec cursus diam at lacinia egestas. Suspendisse nulla dolor, convallis eget auctor vel, tempus nec sem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed faucibus aliquam arcu, at auctor erat. Sed nibh ligula, scelerisque non vestibulum a, maximus sit amet metus. Phasellus nec placerat leo, ut pellentesque sapien.\r\n\r\n', 1536155601),
(2, 'Mauris interdum massa vel neque varius tempus. Quisque cursus, metus ut convallis lobortis, nibh felis sollicitudin quam, vitae pharetra velit ipsum et arcu. Duis tincidunt lacus hendrerit ornare blandit. Curabitur ac mauris mi. Cras hendrerit, orci ut varius pretium, orci eros varius nunc, at molestie dolor nibh quis nibh. Etiam sed efficitur mi. Fusce nisi sem, volutpat nec consectetur at, lacinia et velit. Etiam lacinia gravida erat, in mattis mauris venenatis vel.', 1536155601),
(3, 'okokok', 1536163268),
(4, 'oui oui oui !!!', 1536163336),
(5, '444', 1537355228);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
