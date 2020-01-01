-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 01 Janvier 2020 à 15:49
-- Version du serveur :  5.7.28-0ubuntu0.18.04.4
-- Version de PHP :  7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chatbox`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user` varchar(22) NOT NULL,
  `date` datetime NOT NULL,
  `message` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(2083) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `user`, `date`, `message`, `avatar`) VALUES
(1, 'user', '2020-01-01 14:52:06', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(2, 'user', '2020-01-01 14:52:10', '<p>aie</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(3, 'user', '2020-01-01 14:52:37', '<p>aie</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(4, 'user', '2020-01-01 15:24:36', '<p>ouille</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(5, 'user', '2020-01-01 15:24:40', '<p>oups</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(6, 'user', '2020-01-01 15:24:55', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `user` varchar(22) NOT NULL,
  `email` varchar(55) NOT NULL,
  `psw` varchar(55) NOT NULL,
  `avatar` varchar(2083) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `user`, `email`, `psw`, `avatar`) VALUES
(1, 'test', 'test@test.be', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(2, 'user', 'plop@plop.be', '12dea96fec20593566ab75692c9949596833adc9', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(3, 'Estelle', 'estelle@daubry.be', '12dea96fec20593566ab75692c9949596833adc9', 'https://cdn1.booknode.com/avatarpic/custom/1105/sa.php?idperso=1104741&w=200&h=200&respectRatio=1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
