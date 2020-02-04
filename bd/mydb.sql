-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 04 Février 2020 à 16:41
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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idService` (`id_service`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
