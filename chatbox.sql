-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 03 Janvier 2020 à 16:30
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
(1, 'user', '2020-01-02 12:17:28', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(2, 'user', '2020-01-02 12:17:38', '<p>#sob</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(3, 'user', '2020-01-02 16:04:37', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(4, 'user', '2020-01-02 16:05:16', '<p>testdeux</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(5, 'user', '2020-01-02 16:21:51', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(6, 'user', '2020-01-02 16:22:00', '<p>aieu</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(7, 'user', '2020-01-02 16:22:54', '<p>aieu</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(8, 'user', '2020-01-02 16:23:08', '<p>pouff</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(9, 'user', '2020-01-02 16:26:46', '<p>:D</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(10, 'user', '2020-01-02 16:39:36', '<p>hi</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(11, 'user', '2020-01-02 16:50:08', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(12, 'user', '2020-01-02 16:50:28', '<p>oups</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(13, 'user', '2020-01-02 16:50:58', '<p>poyo</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(14, 'user', '2020-01-02 16:52:32', '<p>poyo</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(15, 'user', '2020-01-02 16:52:39', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(16, 'user', '2020-01-02 16:52:47', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(17, 'user', '2020-01-02 16:54:40', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(18, 'user', '2020-01-02 16:54:58', '<p>:p</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(19, 'user', '2020-01-02 16:55:36', '<p>pooop</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(20, 'user', '2020-01-02 16:56:21', '<p>pooop</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(21, 'user', '2020-01-02 16:58:52', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(22, 'user', '2020-01-02 16:59:06', '<p>prout</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(23, 'user', '2020-01-02 17:27:34', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(24, 'user', '2020-01-02 17:30:21', '<p>:p</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(25, 'user', '2020-01-02 17:30:30', '<p>#rolf</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(26, 'user', '2020-01-02 18:57:48', '<p>trololo</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(27, 'test', '2020-01-02 18:59:53', '<p>bouh</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(28, 'test', '2020-01-02 19:00:56', '<p>bouh</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(29, 'test', '2020-01-02 19:01:08', '<p>aieuh</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(30, 'test', '2020-01-02 19:01:43', '<p>bouh</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(31, 'user', '2020-01-02 19:02:09', '<p>hum</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(32, 'test', '2020-01-02 19:28:42', '<p>test</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(33, 'test', '2020-01-02 19:29:04', '<p>hello</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(34, 'test', '2020-01-02 19:30:14', '<p>lol</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(35, 'test', '2020-01-02 19:31:20', '<p>test</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(36, 'test', '2020-01-02 19:32:54', '<p>plop</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(37, 'user', '2020-01-02 19:36:10', '<p>test</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(38, 'user', '2020-01-02 19:38:27', '<p>aie</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(39, 'user', '2020-01-02 19:39:53', '<p>plop</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(40, 'user', '2020-01-02 19:40:18', '<p>plop</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(41, 'user', '2020-01-02 19:40:27', '<p>prout</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(42, 'user', '2020-01-02 19:41:02', '<p>prout</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(43, 'test', '2020-01-02 19:44:43', '<p>hihihi</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(44, 'test', '2020-01-02 19:46:53', '<p>hihi :D</p>', 'https://i.skyrock.net/9942/86329942/pics/3162033098_1_2_KbstGfNs.gif'),
(45, 'user', '2020-01-02 19:49:44', '<p>retest xD</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(46, 'user', '2020-01-02 19:57:13', '<p>gloup</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(52, 'user', '2020-01-03 10:37:56', '<p>efdsqff</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(53, 'user', '2020-01-03 12:14:33', '<p>pour</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(54, 'user', '2020-01-03 12:21:15', '<p>plop</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(55, 'user', '2020-01-03 14:25:38', '<p>udfqsdmifuqsdmilfuqsdmlifuqsd</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(56, 'user', '2020-01-03 16:27:00', '<p>chat\r\n</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(57, 'user', '2020-01-03 16:27:13', '<p>miaou</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(58, 'user', '2020-01-03 16:27:21', '<p>miaou</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(59, 'user', '2020-01-03 16:27:34', '<p>poio</p>', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1'),
(60, 'Matheo', '2020-01-03 16:28:04', '<p>chut</p>', 'https://cdn.futura-sciences.com/buildsv6/images/mediumoriginal/e/1/5/e15c3c9bd7_80148_album-faune-juvenile8.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `user` varchar(22) NOT NULL,
  `email` varchar(55) NOT NULL,
  `psw` varchar(55) NOT NULL,
  `avatar` varchar(2083) CHARACTER SET ascii NOT NULL,
  `online` varchar(25) NOT NULL,
  `statut` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `user`, `email`, `psw`, `avatar`, `online`, `statut`, `grade`) VALUES
(2, 'user', 'user@user.com', '12dea96fec20593566ab75692c9949596833adc9', 'https://cdn1.booknode.com/avatarpic/custom/870/sa.php?idperso=870036&w=200&h=200&respectRatio=1', 'yes', 'En ligne', 'Admin'),
(3, 'Estelle', 'estelle@daubry.be', '12dea96fec20593566ab75692c9949596833adc9', 'https://cdn1.booknode.com/avatarpic/custom/1105/sa.php?idperso=1104741&w=200&h=200&respectRatio=1', 'no', '', 'Utilisateur'),
(4, 'Matheo', 'matheo@daubry.be', '12dea96fec20593566ab75692c9949596833adc9', 'https://cdn.futura-sciences.com/buildsv6/images/mediumoriginal/e/1/5/e15c3c9bd7_80148_album-faune-juvenile8.jpg', 'yes', 'En ligne', 'Utilisateur'),
(5, 'john', 'john@doe.com', '12dea96fec20593566ab75692c9949596833adc9', 'https://www.google.com/search?q=image&client=ubuntu&hs=Tdg&channel=fs&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjGgprthufmAhUPZVAKHWceCmIQ_AUoAXoECA0QAw&biw=1317&bih=639#imgrc=rQTDgjlYUmwEsM', 'no', 'En ligne', 'Utilisateur'),
(35, 'mama', 'mama', '99df988b77e60a1718e9e6fecdaf22552047be28', 'mama', 'no', 'En ligne', 'Utilisateur'),
(36, 'lol', 'lol', '403926033d001b5279df37cbbe5287b7c7c267fa', 'lol', 'no', 'En ligne', 'Utilisateur'),
(37, 'mop', 'dfqdfqsd', '636117b25f17da7e91194e091cdb8dc49769a815', 'dfsqdfq', 'no', 'En ligne', 'Utilisateur');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
