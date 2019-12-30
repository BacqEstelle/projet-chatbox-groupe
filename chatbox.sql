-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 30 Décembre 2019 à 16:11
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
  `message` varchar(255) NOT NULL,
  `avatar` varchar(2083) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `user`, `date`, `message`, `avatar`) VALUES
(7, 'user', '2019-12-30 14:59:47', 'je test ', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(8, 'test', '2019-12-30 15:01:32', 'flut', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(9, 'test', '2019-12-30 15:25:17', 'hahahah', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(10, 'Estelle', '2019-12-30 15:47:58', 'Je test ca !', 'https://cdn1.booknode.com/avatarpic/custom/1105/sa.php?idperso=1104741&w=200&h=200&respectRatio=1');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
