-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 05 Février 2020 à 11:45
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
  `id_utilisateur` int(11) NOT NULL,
  `date_vote` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `has-voted`
--

INSERT INTO `has-voted` (`id_utilisateur`, `date_vote`) VALUES
(1, '2020-02-03'),
(1, '2020-02-04'),
(1, '2020-05-16'),
(2, '2020-02-04'),
(3, '2020-02-03');

-- --------------------------------------------------------

--
-- Structure de la table `humeur`
--

CREATE TABLE `humeur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `emoticone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `humeur`
--

INSERT INTO `humeur` (`id`, `nom`, `emoticone`) VALUES
(1, 'Heureux', '/media/heureux.png'),
(2, 'Fatigué', '/media/fatigue.png'),
(3, 'Stressé', '/media/stresse.png');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `nom`) VALUES
(1, 'Production'),
(2, 'Secretariat'),
(3, 'Maintenance'),
(4, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `id_service` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `password`, `role`, `id_service`) VALUES
(1, 'Quentin', '*6B04811E1EC0C63EBF229C7B9315F201AEFF6850', 'Admin', 1),
(2, 'Chahrazed', '*6B04811E1EC0C63EBF229C7B9315F201AEFF6850', 'Employer', 1),
(3, 'Florent', '*6B04811E1EC0C63EBF229C7B9315F201AEFF6850', 'Employer', 1),
(4, 'Rodrigue', '*6B04811E1EC0C63EBF229C7B9315F201AEFF6850', 'Employer', 1),
(5, 'Désirée', '*730A576D979632423D8402E4ADEA9976808FA954', 'Employer', 2),
(6, 'Franck', '*730A576D979632423D8402E4ADEA9976808FA954', 'Employer', 2),
(7, 'Fayçal', '*730A576D979632423D8402E4ADEA9976808FA954', 'Employer', 2),
(8, 'Aurélie', '*730A576D979632423D8402E4ADEA9976808FA954', 'Admin', 2),
(9, 'Sacha', '*A6CD3F25CB0068895A3B8830575B46AFE49DDC04', 'Admin', 3),
(10, 'Anthony', '*A6CD3F25CB0068895A3B8830575B46AFE49DDC04', 'Employer', 3),
(11, 'Eric', '*A6CD3F25CB0068895A3B8830575B46AFE49DDC04', 'Emlpoyer', 3),
(12, 'Glenn', '*A6CD3F25CB0068895A3B8830575B46AFE49DDC04', 'Employer', 3),
(13, 'Hugo', '*A92C5EBADC58A2160803175FDC8C50A6E33223E2', 'Admin', 4),
(14, 'Sylvain', '*A92C5EBADC58A2160803175FDC8C50A6E33223E2', 'Employer', 4),
(15, 'Fiona', '*A92C5EBADC58A2160803175FDC8C50A6E33223E2', 'Employer', 4),
(16, 'Rayan', '*A92C5EBADC58A2160803175FDC8C50A6E33223E2', 'Employer', 4);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `id_service` int(11) DEFAULT NULL,
  `id_humeur` int(11) DEFAULT NULL,
  `date_vote` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `has-voted`
--
ALTER TABLE `has-voted`
  ADD PRIMARY KEY (`id_utilisateur`,`date_vote`);

--
-- Index pour la table `humeur`
--
ALTER TABLE `humeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idService` (`id_service`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id-service` (`id_service`),
  ADD KEY `id-humeur` (`id_humeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `humeur`
--
ALTER TABLE `humeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `has-voted`
--
ALTER TABLE `has-voted`
  ADD CONSTRAINT `has-voted_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`id_humeur`) REFERENCES `humeur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
