-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 27 avr. 2019 à 10:52
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

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
  `verif` tinyint(1) NOT NULL DEFAULT '0',
  `tel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherant`
--

INSERT INTO `adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `mdp`, `status`, `email`, `verif`, `tel`) VALUES
(9, 'test', 'test', 'test', '$2y$10$z48AxHzvHloovyty6EahJ.RFX8jpAWVcrTNtl7yj2nugJp73hZ0Pm', 0, 'herve974.30@gmail.com', 1, '0692001186'),
(10, 'testtel', 'testtel', 'testtel', '$2y$10$R2.c0VqF8wsNjbY/mMBWQuTtA9280H8m90VJLgbSIO7QOBEUWlQr2', 0, 'herve974.30@gmail.com', 0, '692000000'),
(11, 'aze', 'aze', 'aze', '$2y$10$VB0KMxmm.NTcZ0JhRxrpt.9hCJmSlnmpvLg33Kh166oL4Vo665IVS', 0, 'herve974.30@gmail.com', 0, '692111111'),
(12, 'qsd', 'qsd', 'qsd', '$2y$10$OOazk9tNz/xSdPawgXoCDu6iizeOPWSQ/voQKp/.HY1qE9TOTA35O', 0, 'herve974.30@gmail.com', 0, '692111111'),
(13, 'uio', 'uio', 'uio', '$2y$10$B0sYuKObHO1Ya5PMmJr6vO8v8sn9t6LkHZzMP7miA2O3AZN.CcL56', 0, 'herve974.30@gmail.com', 0, '0692111111');

--
-- Déclencheurs `adherant`
--
DELIMITER $$
CREATE TRIGGER `delete-verif` BEFORE DELETE ON `adherant` FOR EACH ROW BEGIN
    DELETE FROM verification WHERE adh=OLD.id_adh;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historique-adh` AFTER INSERT ON `adherant` FOR EACH ROW BEGIN
	INSERT INTO `alt-adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `email`,`tel`) VALUES
(NEW.id_adh, NEW.nom, NEW.prenom, NEW.pseudo, NEW.email, NEW.tel);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `alt-adherant`
--

CREATE TABLE `alt-adherant` (
  `id_adh` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tel` int(10) DEFAULT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alt-adherant`
--

INSERT INTO `alt-adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `email`, `tel`, `DateCreation`) VALUES
(9, 'test', 'test', 'test', 'herve974.30@gmail.com', NULL, '2019-04-26 14:13:25'),
(10, 'testtel', 'testtel', 'testtel', 'herve974.30@gmail.com', 692000000, '2019-04-27 07:03:48'),
(11, 'aze', 'aze', 'aze', 'herve974.30@gmail.com', 692111111, '2019-04-27 07:11:22'),
(12, 'qsd', 'qsd', 'qsd', 'herve974.30@gmail.com', 692111111, '2019-04-27 07:14:28'),
(13, 'uio', 'uio', 'uio', 'herve974.30@gmail.com', 692111111, '2019-04-27 07:16:24'),
(14, 'uio', 'uio', 'uio', 'herve974.30@gmail.com', 692111111, '2019-04-27 07:21:47');

-- --------------------------------------------------------

--
-- Structure de la table `alt-est_passage`
--

CREATE TABLE `alt-est_passage` (
  `id_trajet_est_passage` int(11) NOT NULL,
  `id_adh_Adherant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déclencheurs `alt-est_passage`
--
DELIMITER $$
CREATE TRIGGER `historique-rejoindre-trajet` BEFORE INSERT ON `alt-est_passage` FOR EACH ROW INSERT INTO `historique_trajet` (`adh`, `trajet`, `action`) VALUES
(NEW.id_adh_Adherant , NEW.id_trajet_est_passage , "Rejoindre")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `alt-propose`
--

CREATE TABLE `alt-propose` (
  `id_trajet_Propose` int(11) NOT NULL,
  `id_adh_Adherant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alt-propose`
--

INSERT INTO `alt-propose` (`id_trajet_Propose`, `id_adh_Adherant`) VALUES
(41, 9),
(42, 9);

--
-- Déclencheurs `alt-propose`
--
DELIMITER $$
CREATE TRIGGER `historique-ajout-trajet` AFTER INSERT ON `alt-propose` FOR EACH ROW INSERT INTO `historique_trajet` (`adh`, `trajet`, `action`) VALUES
(NEW.id_adh_Adherant , NEW.id_trajet_Propose, "Création")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `alt-trajet`
--

CREATE TABLE `alt-trajet` (
  `id_trajet` int(11) NOT NULL,
  `debut` int(11) NOT NULL,
  `fin` int(11) NOT NULL,
  `nb_places` int(11) NOT NULL,
  `dateTrajet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alt-trajet`
--

INSERT INTO `alt-trajet` (`id_trajet`, `debut`, `fin`, `nb_places`, `dateTrajet`) VALUES
(41, 1, 2, 1, '2019-04-27 07:34:48'),
(42, 28, 1, 1, '2019-04-27 07:42:57');

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

--
-- Déclencheurs `est_passage`
--
DELIMITER $$
CREATE TRIGGER `historique-est_passage` AFTER INSERT ON `est_passage` FOR EACH ROW INSERT INTO `alt-est_passage` (`id_trajet_est_passage`, `id_adh_Adherant`) VALUES
(NEW.id_trajet_est_passage, NEW.id_adh_Adherant)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `historique_trajet`
--

CREATE TABLE `historique_trajet` (
  `adh` int(11) NOT NULL,
  `trajet` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `dateAction` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique_trajet`
--

INSERT INTO `historique_trajet` (`adh`, `trajet`, `action`, `dateAction`) VALUES
(9, 41, 'Création', '2019-04-27 07:34:56'),
(9, 41, 'Suppression', '2019-04-27 07:41:09'),
(9, 42, 'Création', '2019-04-27 07:43:04');

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

INSERT INTO `propose` (`id_trajet_Propose`, `id_adh_Adherant`) VALUES
(42, 9);

--
-- Déclencheurs `propose`
--
DELIMITER $$
CREATE TRIGGER `historique-propose` AFTER INSERT ON `propose` FOR EACH ROW INSERT INTO `alt-propose` (`id_trajet_Propose`, `id_adh_Adherant`) VALUES
(NEW.id_trajet_Propose, NEW.id_adh_Adherant)
$$
DELIMITER ;

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
(42, 28, 1, 1, '2019-04-27 07:42:57');

--
-- Déclencheurs `trajet`
--
DELIMITER $$
CREATE TRIGGER `delTraj` BEFORE DELETE ON `trajet` FOR EACH ROW BEGIN
    DELETE FROM propose WHERE id_trajet_Propose=OLD.id_trajet;
    DELETE FROM est_passage WHERE id_trajet_est_passage=OLD.id_trajet;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historique_trajet` AFTER INSERT ON `trajet` FOR EACH ROW BEGIN
	INSERT INTO `alt-trajet` (`id_trajet`, `debut`, `fin`, `nb_places`, `dateTrajet`) VALUES
(NEW.id_trajet, NEW.debut, NEW.fin, NEW.nb_places, NEW.dateTrajet);
END
$$
DELIMITER ;

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
(9, '5cc3120574fe3', '2019-04-26 14:13:25'),
(10, '5cc3fed485b33', '2019-04-27 07:03:48'),
(11, '5cc4009a4f9ff', '2019-04-27 07:11:22'),
(12, '5cc4015496e3b', '2019-04-27 07:14:28'),
(13, '5cc401c87712e', '2019-04-27 07:16:24'),
(13, '5cc4030b45ac4', '2019-04-27 07:21:47');

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
(1, 'Lycée Pierre Poivre', 55.624, -21.3737),
(2, 'Saint-Pierre', 55.4833, -21.3167),
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
(28, 'Saint-Joseph', 55.6167, -21.3667),
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
-- Index pour la table `alt-adherant`
--
ALTER TABLE `alt-adherant`
  ADD PRIMARY KEY (`id_adh`);

--
-- Index pour la table `alt-est_passage`
--
ALTER TABLE `alt-est_passage`
  ADD KEY `alt-est_passage_Adherant0_FK` (`id_adh_Adherant`),
  ADD KEY `alt-est_passage_Trajet_FK` (`id_trajet_est_passage`);

--
-- Index pour la table `alt-propose`
--
ALTER TABLE `alt-propose`
  ADD KEY `alt-Propose_Adherant0_FK` (`id_adh_Adherant`),
  ADD KEY `adh_propose_FK` (`id_trajet_Propose`);

--
-- Index pour la table `alt-trajet`
--
ALTER TABLE `alt-trajet`
  ADD PRIMARY KEY (`id_trajet`),
  ADD KEY `alt-deb_vil_FK` (`debut`),
  ADD KEY `alt-fin_vil_FK` (`fin`);

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
-- Index pour la table `historique_trajet`
--
ALTER TABLE `historique_trajet`
  ADD KEY `hist_adh_FK` (`adh`),
  ADD KEY `hist_trajet_FK` (`trajet`);

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
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alt-est_passage`
--
ALTER TABLE `alt-est_passage`
  ADD CONSTRAINT `alt-est_passage_Adherant0_FK` FOREIGN KEY (`id_adh_Adherant`) REFERENCES `alt-adherant` (`id_adh`),
  ADD CONSTRAINT `alt-est_passage_Trajet_FK` FOREIGN KEY (`id_trajet_est_passage`) REFERENCES `alt-trajet` (`id_trajet`);

--
-- Contraintes pour la table `alt-propose`
--
ALTER TABLE `alt-propose`
  ADD CONSTRAINT `adh_propose_FK` FOREIGN KEY (`id_trajet_Propose`) REFERENCES `alt-trajet` (`id_trajet`),
  ADD CONSTRAINT `alt-Propose_Adherant0_FK` FOREIGN KEY (`id_adh_Adherant`) REFERENCES `alt-adherant` (`id_adh`);

--
-- Contraintes pour la table `alt-trajet`
--
ALTER TABLE `alt-trajet`
  ADD CONSTRAINT `alt-deb_vil_FK` FOREIGN KEY (`debut`) REFERENCES `ville` (`id_ville`),
  ADD CONSTRAINT `alt-fin_vil_FK` FOREIGN KEY (`fin`) REFERENCES `ville` (`id_ville`);

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
-- Contraintes pour la table `historique_trajet`
--
ALTER TABLE `historique_trajet`
  ADD CONSTRAINT `hist_adh_FK` FOREIGN KEY (`adh`) REFERENCES `alt-adherant` (`id_adh`),
  ADD CONSTRAINT `hist_trajet_FK` FOREIGN KEY (`trajet`) REFERENCES `alt-trajet` (`id_trajet`);

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

--
-- Contraintes pour la table `verification`
--
ALTER TABLE `verification`
  ADD CONSTRAINT `Verif_adh_FK` FOREIGN KEY (`adh`) REFERENCES `adherant` (`id_adh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
