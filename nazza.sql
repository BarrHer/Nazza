-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 10 avr. 2019 à 00:40
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
  `mdp` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `mdp`, `status`, `email`) VALUES
(1, 'test', 'test', 'test', 'test', 0, 'test@test.test'),
(2, 'modif', 'modif', 'modif', 'modif', 0, 'modif@modif.modif');

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
(2, 1, 2, 2, '2019-03-27 10:22:59'),
(3, 1, 2, 3, '2019-06-20 02:30:00');

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
(1, 'ghhggf', 3, 8),
(2, 'ghgfgg', 1, 2);

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
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `Propose_Adherant0_FK` FOREIGN KEY (`id_adh_Adherant`) REFERENCES `adherant` (`id_adh`),
  ADD CONSTRAINT `Propose_Trajet_FK` FOREIGN KEY (`id_trajet_Propose`) REFERENCES `trajet` (`id_trajet`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `deb_vil_FK` FOREIGN KEY (`debut`) REFERENCES `ville` (`id_ville`),
  ADD CONSTRAINT `fin_vil_FK` FOREIGN KEY (`fin`) REFERENCES `ville` (`id_ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
