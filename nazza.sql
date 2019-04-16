-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 16 avr. 2019 à 02:59
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nazza`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherant`
--

CREATE TABLE `adherant` (
  `id_adh` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL,
  `verif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `mdp`, `status`, `email`, `verif`) VALUES
(2, 'modif', 'modif', 'modif', '$2y$10$htlxkywhahPI/yG0OiVwVuVj3cjvmJI3Co/J3QaKgxsB9qiiIqZoy', 0, 'modif@modif.modif', 1),
(3, 'test1', 'test1', 'test1', '$2y$10$htlxkywhahPI/yG0OiVwVuVj3cjvmJI3Co/J3QaKgxsB9qiiIqZoy', 0, 'test@test.test', 1),
(5, 'fusion', 'fusion', 'fusion', '$2y$10$JZMzZewLUe2yY0d8YCVdWOiTNKPC4m/03DIlcGSW82XBlGANihKLi', 0, 'herve974.30@gmail.com', 0),
(6, 'aa', 'aa', 'aa', '$2y$10$iAI2ftFQVfE70Ve.NP5QQuccITSk2.STjCEOcllqlcfjfG8aJXHRW', 0, 'herve974.30@gmail.com', 0),
(7, 'zz', 'zz', 'zz', '$2y$10$fA18MZr/UbnWSJhC9nM7pOSRRAQx92Io.KWNTx3jENos8kWgGApwa', 0, 'herve974.30@gmail.com', 0),
(8, 'ee', 'ee', 'ee', '$2y$10$9jiXa9/PG08raVL3UNfAtO.35PmURhPw9iIaD9mB.MvDu8Gxx8Kri', 0, 'herve974.30@gmail.com', 0);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `id` int(11) NOT NULL,
  `Filiaire` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `est_passage`
--

CREATE TABLE `est_passage` (
  `id_trajet_est_passage` int(11) NOT NULL,
  `id_adh_Adherant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `Fonction` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE `propose` (
  `id_trajet_Propose` int(11) NOT NULL,
  `id_adh_Adherant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propose`
--

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id_trajet` int(11) NOT NULL,
  `debut` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `dateTrajet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id_trajet`, `debut`, `fin`, `nb_places`, `dateTrajet`) VALUES
(8, 2, 1, 8, '2019-04-15 07:38:24'),
(9, 7, 1, 7, '2019-04-15 07:38:30'),
(10, 4, 1, 4, '2019-04-15 07:44:16'),
(12, 19, 1, 3, '2019-04-15 18:03:55');

-- --------------------------------------------------------

--
-- Structure de la table `verification`
--

CREATE TABLE `verification` (
  `adh` int(11) NOT NULL,
  `code` varchar(64) NOT NULL,
  `dateVerif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `verification`
--

INSERT INTO `verification` (`adh`, `code`, `dateVerif`) VALUES
(5, '5cb18fd0d8d97', '2019-04-13 07:29:20'),
(6, '5cb1913fdec85', '2019-04-13 07:35:27'),
(7, '5cb1a4aadab19', '2019-04-13 08:58:18'),
(8, '5cb1a6c7b7dfd', '2019-04-13 09:07:19');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(50) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom_ville`, `longitude`, `latitude`) VALUES
(1, 'Lycée Pierre Poivre', 0.5, 0.6),
(2, 'Saint-Pierre', 1, 2),
(3, 'Saint-Denis', 121, 1),
(4, 'Saint-André', 1, 1),
(5, 'Le Port', 1, 1),
(6, 'Saint-Louis', 2, 2),
(7, 'Saint-Leu', 3, 3),
(8, 'Le Tampon', 33, 3),
(9, 'La Possession', 4, 4),
(10, 'Sainte-Marie', 2, 2),
(11, 'Sainte-Suzanne', 2, 2),
(12, 'L\'Etang-Salé', 3, 3),
(13, 'Saint-Paul', 2, 2),
(14, 'Cilaos', 2, 2),
(15, 'Entre-Deux', 2, 2),
(16, 'Salazie', 22, 22),
(17, 'Les Avirons', 2, 2),
(18, 'Saint-Philippe', 2, 2),
(19, 'Petit-Ile', 2, 2),
(20, 'Bras-Panon', 2, 2),
(21, 'Sainte-Rose', 2, 2),
(22, 'Trois Bassins', 2, 2),
(23, 'La Plaine Des Palmistes', 2, 2),
(24, 'Saint-Benoît', 2, 2),
(25, 'Saint-Gilles les Bains', 2, 2),
(26, 'Sainte-Clotilde', 1, 2),
(28, 'Saint-Joseph', 3, 8),
(29, 'Sainte-Anne', 1, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherant`
--
ALTER TABLE `adherant`
  ADD PRIMARY KEY (`id_adh`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD KEY `Eleve_adh_FK` (`id`);

--
-- Index pour la table `est_passage`
--
ALTER TABLE `est_passage`
  ADD KEY `est_passage_Trajet_FK` (`id_trajet_est_passage`),
  ADD KEY `est_passage_Adherant0_FK` (`id_adh_Adherant`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD KEY `Perso_adh_FK` (`id`);

--
-- Index pour la table `propose`
--
ALTER TABLE `propose`
  ADD KEY `Propose_Trajet_FK` (`id_trajet_Propose`),
  ADD KEY `Propose_Adherant0_FK` (`id_adh_Adherant`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id_trajet`),
  ADD KEY `deb_vil_FK` (`debut`),
  ADD KEY `fin_vil_FK` (`fin`);

--
-- Index pour la table `verification`
--
ALTER TABLE `verification`
  ADD KEY `Verif_adh_FK` (`adh`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherant`
--
ALTER TABLE `adherant`
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `Eleve_adh_FK` FOREIGN KEY (`id`) REFERENCES `adherant` (`id_adh`);

--
-- Contraintes pour la table `est_passage`
--
ALTER TABLE `est_passage`
  ADD CONSTRAINT `est_passage_Adherant0_FK` FOREIGN KEY (`id_adh_Adherant`) REFERENCES `adherant` (`id_adh`),
  ADD CONSTRAINT `est_passage_Trajet_FK` FOREIGN KEY (`id_trajet_est_passage`) REFERENCES `trajet` (`id_trajet`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `Perso_adh_FK` FOREIGN KEY (`id`) REFERENCES `adherant` (`id_adh`);

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `Propose_Adherant0_FK` FOREIGN KEY (`id_adh_Adherant`) REFERENCES `adherant` (`id_adh`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `deb_vil_FK` FOREIGN KEY (`debut`) REFERENCES `ville` (`id_ville`),
  ADD CONSTRAINT `fin_vil_FK` FOREIGN KEY (`fin`) REFERENCES `ville` (`id_ville`);

--
-- Contraintes pour la table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `Verif_adh_FK` FOREIGN KEY (`adh`) REFERENCES `adherant` (`id_adh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
