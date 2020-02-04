-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 03 Février 2020 à 16:46
-- Version du serveur :  10.3.22-MariaDB-1:10.3.22+maria~bionic-log
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `has-voted`
--

CREATE TABLE `has-voted` (
  `id-utilisateur` int(20) NOT NULL,
  `date_vote` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Humeur`
--

CREATE TABLE `Humeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `emoticone` varchar(45) NOT NULL,
  `Vote_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Humeur`
--

INSERT INTO `Humeur` (`id`, `nom`, `emoticone`, `Vote_id`) VALUES
(1, 'Heureux', '', NULL),
(2, 'Fatigué', '', NULL),
(3, 'Stressé', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Services`
--

CREATE TABLE `Services` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `Utilisateur_id` int(11) DEFAULT NULL,
  `Vote_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Services`
--

INSERT INTO `Services` (`id`, `nom`, `Utilisateur_id`, `Vote_id`) VALUES
(1, 'Production', NULL, NULL),
(2, 'Secretariat', NULL, NULL),
(3, 'Maintenance', NULL, NULL),
(4, 'Informatique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Mot-de-passe` varchar(45) NOT NULL,
  `Role` varchar(45) NOT NULL,
  `idService` int(11) DEFAULT NULL,
  `has-voted_id-utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `Nom`, `Mot-de-passe`, `Role`, `idService`, `has-voted_id-utilisateur`) VALUES
(1, 'Quentin', '9012acs', 'Admin', NULL, NULL),
(2, 'Chahrazed', '9012acs', 'Employer', NULL, NULL),
(3, 'Florent', '9012acs', 'Employer', NULL, NULL),
(4, 'Rodrigue', '9012acs', 'Employer', NULL, NULL),
(5, 'Désirée', '3456acs', 'Employer', NULL, NULL),
(6, 'Franck', '3456acs', 'Employer', NULL, NULL),
(7, 'Fayçal', '3456acs', 'Employer', NULL, NULL),
(8, 'Aurélie', '3456acs', 'Admin', NULL, NULL),
(9, 'Sacha', '5678acs', 'Admin', NULL, NULL),
(10, 'Anthony', '5678acs', 'Employer', NULL, NULL),
(11, 'Eric', '5678acs', 'Emlpoyer', NULL, NULL),
(12, 'Glenn', '5678acs', 'Employer', NULL, NULL),
(13, 'Hugo', '1234acs', 'Admin', NULL, NULL),
(14, 'Sylvain', '1234acs', 'Employer', NULL, NULL),
(15, 'Fiona', '1234acs', 'Employer', NULL, NULL),
(16, 'Rayan', '1234acs', 'Employer', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Vote`
--

CREATE TABLE `Vote` (
  `id` int(11) NOT NULL,
  `id-service` int(11) DEFAULT NULL,
  `id-humeur` int(11) DEFAULT NULL,
  `date_vote` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `has-voted`
--
ALTER TABLE `has-voted`
  ADD PRIMARY KEY (`id-utilisateur`);

--
-- Index pour la table `Humeur`
--
ALTER TABLE `Humeur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Humeur_Vote1_idx` (`Vote_id`);

--
-- Index pour la table `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Services_Utilisateur_idx` (`Utilisateur_id`),
  ADD KEY `fk_Services_Vote1_idx` (`Vote_id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Utilisateur_has-voted1_idx` (`has-voted_id-utilisateur`);

--
-- Index pour la table `Vote`
--
ALTER TABLE `Vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `has-voted`
--
ALTER TABLE `has-voted`
  MODIFY `id-utilisateur` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Humeur`
--
ALTER TABLE `Humeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Services`
--
ALTER TABLE `Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `Vote`
--
ALTER TABLE `Vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Humeur`
--
ALTER TABLE `Humeur`
  ADD CONSTRAINT `fk_Humeur_Vote1` FOREIGN KEY (`Vote_id`) REFERENCES `Vote` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Services`
--
ALTER TABLE `Services`
  ADD CONSTRAINT `fk_Services_Utilisateur` FOREIGN KEY (`Utilisateur_id`) REFERENCES `Utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Services_Vote1` FOREIGN KEY (`Vote_id`) REFERENCES `Vote` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_has-voted1` FOREIGN KEY (`has-voted_id-utilisateur`) REFERENCES `has-voted` (`id-utilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
