-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 08 mai 2019 à 12:57
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

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
(1, 'Yuhki', 'Rib', 'rib', '$2y$10$9b5O4jI57al1PUzMwmsJj.tAgGJyCzoNavB4LEfWxdWrDj.gy/1H.', 0, 'clnticaa4@gmail.com', 1, '0692112233'),
(2, 'test', 'test', 'test', '$2y$10$h2qBkv0sQoj1emXQAv5aceCDIoTf1qDtH3DwI.oGvtHnxqka1Rcgm', 0, 'test@test.t', 0, '1122334455'),
(3, 'test1', 'test1', 'test1', '$2y$10$GCsShawf5AbgDOtbxUJ/Ve/ApKa7S8P6iAIwnotoynYD9EC7Aqa32', 0, 'test1@t.t', 1, '1122334455'),
(5, 'test3', 'test3', 'test3', '$2y$10$YmTGzYGpmgDPv4qaqQP4XuWlRXxl7lKNcAhW1Ucb4X5PGGhS9CkEu', 0, 'test3@t.t', 1, '1122334455');

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
  `tel` varchar(10) DEFAULT NULL,
  `DateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alt-adherant`
--

INSERT INTO `alt-adherant` (`id_adh`, `nom`, `prenom`, `pseudo`, `email`, `tel`, `DateCreation`) VALUES
(1, 'Yuhki', 'Rib', 'rib', 'clnticaa4@gmail.com', '0692112233', '2019-05-08 09:42:14'),
(2, 'test', 'test', 'test', 'test@test.t', '1122334455', '2019-05-08 09:48:02'),
(3, 'test1', 'test1', 'test1', 'test1@t.t', '1122334455', '2019-05-08 09:58:50'),
(4, 'test2', 'test2', 'test2', 'test2@t.t', '1122334455', '2019-05-08 10:05:35'),
(5, 'test3', 'test3', 'test3', 'test3@t.t', '1122334455', '2019-05-08 10:17:54');

-- --------------------------------------------------------

--
-- Structure de la table `alt-est_passage`
--

CREATE TABLE `alt-est_passage` (
  `id_trajet_est_passage` int(11) NOT NULL,
  `id_adh_Adherant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alt-est_passage`
--

INSERT INTO `alt-est_passage` (`id_trajet_est_passage`, `id_adh_Adherant`) VALUES
(2, 3),
(2, 3),
(2, 3),
(5, 5),
(6, 5);

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 5);

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
(1, 2, 1, 2, '2019-05-08 09:48:58'),
(2, 4, 1, 2, '2019-05-08 09:49:03'),
(3, 2, 1, 5, '2019-05-08 10:24:53'),
(4, 12, 1, 6, '2019-05-08 10:24:57'),
(5, 12, 1, 5, '2019-05-08 10:25:01'),
(6, 12, 1, 2, '2019-05-08 10:25:04'),
(7, 5, 1, 2, '2019-05-08 10:31:10');

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
-- Déchargement des données de la table `est_passage`
--

INSERT INTO `est_passage` (`id_trajet_est_passage`, `id_adh_Adherant`) VALUES
(5, 5);

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
(1, 1, 'Création', '2019-05-08 09:49:03'),
(1, 2, 'Création', '2019-05-08 09:49:08'),
(1, 1, 'Suppression', '2019-05-08 09:49:26'),
(3, 2, 'Rejoindre', '2019-05-08 10:22:10'),
(3, 2, 'Quitte', '2019-05-08 10:22:12'),
(3, 2, 'Rejoindre', '2019-05-08 10:22:15'),
(3, 2, 'Quitte', '2019-05-08 10:22:18'),
(3, 2, 'Rejoindre', '2019-05-08 10:22:33'),
(1, 2, 'Suppression', '2019-05-08 10:23:55'),
(1, 3, 'Création', '2019-05-08 10:24:57'),
(1, 4, 'Création', '2019-05-08 10:25:01'),
(1, 5, 'Création', '2019-05-08 10:25:03'),
(1, 6, 'Création', '2019-05-08 10:25:07'),
(5, 5, 'Rejoindre', '2019-05-08 10:31:01'),
(5, 7, 'Création', '2019-05-08 10:31:14'),
(5, 6, 'Rejoindre', '2019-05-08 10:55:14'),
(5, 6, 'Quitte', '2019-05-08 10:55:15');

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
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 5);

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
(3, 2, 1, 5, '2019-05-08 10:24:53'),
(4, 12, 1, 6, '2019-05-08 10:24:57'),
(5, 12, 1, 5, '2019-05-08 10:25:01'),
(6, 12, 1, 2, '2019-05-08 10:25:04'),
(7, 5, 1, 2, '2019-05-08 10:31:10');

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
(2, '5cd2a5d2e4706', '2019-05-08 09:48:02');

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
(2, 'Saint-Pierre', 55.4777, -21.342),
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
  MODIFY `id_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id_trajet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
