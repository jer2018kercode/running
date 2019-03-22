-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 mars 2019 à 16:00
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `certif_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `firstname`, `lastname`, `mail`, `cellphone`, `city`, `postcode`) VALUES
(1, 'Frederico', 'toto', 'Frédéric', 'Mansturio', 'fred.mansturio@gmail.com', '0625289471', 'Toulouse', '31000'),
(2, 'Lolita', 'senora', 'Lolita', 'Vaguina', 'lolita@v.com', '0673132545', 'Sevilla', '004'),
(3, 'Achille', 'Cornet', 'Achille', 'Cornet', 'achille.cornet@gmail.com', '0612326565', 'Orléans', '45'),
(4, 'Mario', 'Mario', 'Mario', 'Mario', 'Mario.paquito@gmail.com', '0673454567', 'Barcelona', '002'),
(5, 'Pedro', 'Pedro', 'Pedro', 'Paquito', 'pedro.paquito@gmail.com', '0673454567', 'Séville', '009'),
(6, 'Corneto', 'Corneto', 'Corneto', 'Paquito', 'Corneto.paquito@gmail.com', '0673454567', 'Orsay', '91'),
(7, 'gg', 'gg', 'gg', 'gg', 'gg', NULL, NULL, NULL),
(8, 'yfg', '$2y$10$bIn/zL..l24iXFqytb7JGO4mcJaxVtfmgBdQpRUOsQK502qW.l28C', 'a', 'a', 'a', NULL, NULL, NULL),
(9, 'Jerome', '$2y$10$bEm9mFtJGOi9IdU8af6bjOtmVGbjQ.ZfJkC9fjlbaAxtmYakGpWmK', 'jer', 'vas', 'jer@jer.fr', NULL, NULL, NULL),
(10, 'Coraline', '$2y$10$m0NyQWSv2PmDGdHpwDBVweWAJ5rB6SD5gSKBvgQCsK4TotWasxoKa', 'Coraline', 'Coco', 'coco@coco.fr', NULL, NULL, NULL),
(11, 'Petit', '$2y$10$zW7iPdAalMEnYoCa/6jSD.IoNHPcJL6gu5F3onFW9o0zK8RYkhycm', 'Pepito', 'Popota', 'pepito@gmail.com', NULL, NULL, NULL),
(12, 'Tiphanie', '$2y$10$SgXt0pmtYBv2hEmas0jRdeAax0GaM8.tx0cvKNFcPU9.hFNnp7pgq', 'Tiphanie', 'Titi', 'titi@titi.fr', NULL, NULL, NULL),
(13, 'art', '$2y$10$pKi62KXYOyDpwMqurI4N2.rlEk5JhonrmH/6rQGsvNMFr2EUjS1nK', 'Arthur', 'Amanio', 'a@a.fr', NULL, NULL, NULL),
(14, 'b', '$2y$10$v5MgEWUhFfkuPCZMmzr6S.bbkL5iMkH3AIfUVCENTDS3W7nrG9lyi', 'b', 'b', 'b', NULL, NULL, NULL),
(15, 'c', '$2y$10$/Q0nr7vB4d6OxiY3FMaTJuGTH0y.mjY3lu8qQcaOz8kYvPQtBsWVG', 'c', 'c', 'c', NULL, NULL, NULL),
(16, 'd', '$2y$10$2VO1UV1i3/Au9h923u0pT.LV5FikpyBAni2Dg5XIg3m20RtHpcBLq', 'd', 'd', 'd', NULL, NULL, NULL),
(17, 'Alta', '$2y$10$7hQpmg6jRNjcyfIEbK31meGewKs6YjB/ibq19SwJCeM1ynT39yO5m', 'Alta', 'Beta', 'alta@beta.com', NULL, NULL, NULL),
(18, 'Alta', '$2y$10$fs5UgwrOPVLtIJ6/tw1ScuDn1Caciesbf01re7uBz2foi4VmU1ptK', 'Alta', 'Beta', 'alta@beta.com', NULL, NULL, NULL),
(19, 'Alta', '$2y$10$fIIYJbZpXqX88F2AqVhXRu3aRfT90Smu7TCpIrCorXC/8hQQ1gQbe', 'Alta', 'Beta', 'alta@beta.com', NULL, NULL, NULL),
(20, 'Alta', '$2y$10$JQ1.4QfLjvownPiQ9C9CX.GvA3iHjkHALUy916Wv2WKG.F.Yl5EuS', 'Alta', 'Beta', 'alta@beta.com', NULL, NULL, NULL),
(21, 'Alta', '$2y$10$EXYLqpM4rxvRaTHBnWa18uAEAN0kyC3YHXMm7iybqv53SmNiXn4gy', 'Alta', 'Beta', 'alta@beta.com', NULL, NULL, NULL),
(22, 'Bernardo', '$2y$10$JgFgyFZyRYbOH3.USb12YOHJvOJ2ow2ya8nKsl/QYCntu6DR15ocG', 'Bernardo', 'Bernardo', 'Bernardo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `outdoor`
--

CREATE TABLE `outdoor` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `race` tinyint(1) NOT NULL,
  `id_Member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `outdoor`
--

INSERT INTO `outdoor` (`id`, `title`, `description`, `city`, `postcode`, `date`, `race`, `id_Member`) VALUES
(1, 'Le plaisir de la course', 'Vous pouvez rejoindre notre course officielle qui se déroule à Toulouse. Nos participants l\'ont toujours trouvé très agréable, et nous vous conseillons vivement de vous lancer dans cette aventure formidable..', 'Toulouse', '31000', '2019-02-11', 1, 1),
(2, 'La course folle, prêts à bouger votre corps ?', 'Vous pouvez venir nous rejoindre pour bouger votre corps et cultiver votre adrénaline. La course se déroule à Perpignan.', 'Perpignan', '66', '2019-02-18', 1, 2),
(3, 'La nouvelle sortie pour vous !', 'Je vous propose une sortie running entre débutants.', 'Limoges', '91', '2018-03-04', 0, 3),
(4, 'Ok lets go', 'Pour les affamés de course à pied, je vous donne rdv pour bien courir à fond..', 'Rennes', '45', '2019-02-10', 0, 2),
(10, 'Bonjour', 'Venez avec moi courir et vous amuser', '', '', '2019-03-30', 0, 1),
(15, 'Non ne venez pas', 'La sortie bizarre ', '', '', '2019-03-02', 0, 7),
(16, 'Une nouvelle sortie', 'La description', '', '', '2019-04-07', 0, 8),
(17, 'Encore une sortie', 'Je vous propose une nouvelle sortie pour se remettre au sport', '', '', '2019-07-07', 0, 3),
(21, 'Try it now', 'Je vous propose la sortie miracle', 'Coulommiers', '', '2018-10-17', 0, 10),
(22, 'Encore une sortie', 'Je vous propose une sortie dans les bois de ma ville', 'Marseille', '', '2019-03-11', 0, 9),
(23, 'Un soleil pour tout le monde', '', '', '', '2019-03-10', 1, 2),
(24, 'Le chemin qui dort', '', '', '', '2019-01-09', 1, 11),
(26, 'try', 'Venez me rejoindre pour courir et profitez un peu du soleil ', 'Rambouillet', '', '2019-03-09', 0, 1),
(27, 'Les bois déserts', '', 'Montargis', '', '2019-05-16', 1, 2),
(28, 'again', '', '', '', '2019-02-06', 0, 7),
(29, 'La course inattendue', 'Personne ne l\'attendait...', 'Inconnue', '', '2030-12-11', 1, 3),
(38, 'Youp yi', '', '', '', '2019-03-15', 0, 3),
(40, 'Petite sortie aimable', 'Je vous convie à ma sortie de l\'amitié', '', '', '2019-03-03', 0, 8),
(41, 'Une sortie en plein air', 'Rendez-vousu dans le parc à côté de la gare pour se défouler !', '', '', '2019-07-07', 0, 8),
(44, 'Je fais une nouvelle course', 'Elle est toute nouvelle', 'Camembert', '', '0000-00-00', 0, 9),
(45, 'Bonjour', 'Je vous convie à ma course', 'Coulommiers', '', '2018-01-11', 0, 5),
(46, 'La course de la jungle', 'Venez défier les lois de la jungle !', 'Bornéo', '', '2017-02-02', 0, 5),
(48, 'GO course courir', 'babababa', 'Sarzeau', '', '2019-03-03', 0, 9),
(49, 'Bonjour cc', 'bbbbbbbb', 'Barcelone', '', '2019-04-07', 0, 9),
(50, 'baba', 'babababa', 'bababa', '', '0000-00-00', 0, 9),
(52, 'Hello', 'hhgfh', 'hh', '', '0000-00-00', 0, 3),
(53, 'gg', 'gg', 'gg', '', '0000-00-00', 0, 3),
(54, 'bbb', 'bbb', 'bbb', '', '0000-00-00', 0, 3),
(55, 'aa', 'aa', 'aa', '', '0000-00-00', 0, 3),
(56, 'cc', 'cc', 'cc', '', '0000-00-00', 0, 3),
(57, 'aaa', 'aaa', 'aa', '', '0000-00-00', 0, 3),
(59, 'Hello', 'The sortie sss', '', '', '0000-00-00', 0, 8),
(60, 'test', 'test', 'test', '', '0000-00-00', 0, 3),
(61, 'aa', 'aa', 'aa', '', '0000-00-00', 0, 3),
(62, 'La course de l\'admin', 'Ceci est une course d\'un admin', 'Amien', '', '2019-10-03', 0, 3);

-- --------------------------------------------------------

--
-- Structure de la table `participates`
--

CREATE TABLE `participates` (
  `id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_outdoor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participates`
--

INSERT INTO `participates` (`id`, `id_member`, `id_outdoor`) VALUES
(1, 9, 10),
(2, 9, 26),
(3, 9, 50),
(4, 9, 4),
(5, 9, 4),
(6, 9, 41);

-- --------------------------------------------------------

--
-- Structure de la table `participates_to`
--

CREATE TABLE `participates_to` (
  `id` int(11) NOT NULL,
  `id_Member` int(11) NOT NULL,
  `id_Outdoor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participates_to`
--

INSERT INTO `participates_to` (`id`, `id_Member`, `id_Outdoor`) VALUES
(1, 1, 6),
(2, 9, 7),
(3, 2, 11);

-- --------------------------------------------------------

--
-- Structure de la table `progression`
--

CREATE TABLE `progression` (
  `id` int(11) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `speed` varchar(50) NOT NULL,
  `calorieburn` varchar(50) NOT NULL,
  `id_Member` int(11) NOT NULL,
  `id_Outdoor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `progression`
--

INSERT INTO `progression` (`id`, `distance`, `time`, `speed`, `calorieburn`, `id_Member`, `id_Outdoor`) VALUES
(1, '20km', '2h06m', '9km/h', '420', 11, 1),
(2, '20 miles', '2h56m', '10km/h', '684', 9, 2),
(3, '20km', '2h57m', '10km/h', '430', 11, 22);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `outdoor`
--
ALTER TABLE `outdoor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Race_Member_FK` (`id_Member`);

--
-- Index pour la table `participates`
--
ALTER TABLE `participates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_outdoor` (`id_outdoor`);

--
-- Index pour la table `participates_to`
--
ALTER TABLE `participates_to`
  ADD PRIMARY KEY (`id`,`id_Member`),
  ADD KEY `partcipates_to_Member0_FK` (`id_Member`);

--
-- Index pour la table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Progression_Member_FK` (`id_Member`),
  ADD KEY `Progression_Race0_FK` (`id_Outdoor`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `outdoor`
--
ALTER TABLE `outdoor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `participates`
--
ALTER TABLE `participates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `progression`
--
ALTER TABLE `progression`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `outdoor`
--
ALTER TABLE `outdoor`
  ADD CONSTRAINT `Race_Member_FK` FOREIGN KEY (`id_Member`) REFERENCES `member` (`id`);

--
-- Contraintes pour la table `participates`
--
ALTER TABLE `participates`
  ADD CONSTRAINT `participates_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `participates_ibfk_2` FOREIGN KEY (`id_outdoor`) REFERENCES `outdoor` (`id`);

--
-- Contraintes pour la table `participates_to`
--
ALTER TABLE `participates_to`
  ADD CONSTRAINT `partcipates_to_Member0_FK` FOREIGN KEY (`id_Member`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `partcipates_to_Race_FK` FOREIGN KEY (`id`) REFERENCES `outdoor` (`id`);

--
-- Contraintes pour la table `progression`
--
ALTER TABLE `progression`
  ADD CONSTRAINT `Progression_Member_FK` FOREIGN KEY (`id_Member`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `Progression_Race0_FK` FOREIGN KEY (`id_Outdoor`) REFERENCES `outdoor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
