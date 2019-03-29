-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 29 mars 2019 à 05:53
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
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `mdp`, `status`, `email`) VALUES
(1, 'test', 'test', 'test', 'test', 0, ''),
(2, 'oui', 'non', 'ui', 'oiuygtrf', 0, ''),
(3, 'az', 'az', 'az', 'az', 0, ''),
(4, 'azderg', 'aefgaegaeg', 'aegeagae', 'aaaaa', 0, 'a@a.a');

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
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'pierre', 12, 12);

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
  ADD PRIMARY KEY (`id_trajet_est_passage`,`id_adh_Adherant`),
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
  ADD PRIMARY KEY (`id_trajet_Propose`,`id_adh_Adherant`),
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
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
