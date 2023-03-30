-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 30 mars 2023 à 14:22
-- Version du serveur :  10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_sae`
--
USE projet_sae
-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

CREATE TABLE `enfant` (
  `Id_Enfant` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date_Naissance` date NOT NULL,
  `Lien_Jeton` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lier`
--

CREATE TABLE `lier` (
  `Id_Objectif` int(11) NOT NULL,
  `Id_Recompense` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `Id_Membre` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Code_Postal` char(5) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `Courriel` varchar(50) DEFAULT NULL,
  `Date_Naissance` date NOT NULL,
  `Mdp` varchar(250) DEFAULT NULL,
  `Compte_Valide` tinyint(1) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`Id_Membre`, `Nom`, `Prenom`, `Adresse`, `Code_Postal`, `Ville`, `Courriel`, `Date_Naissance`, `Mdp`, `Compte_Valide`, `Role`) VALUES
(19, 'Admin', 'Admin', 'Adresse testons', '31460', 'Albiac', 'admin@admin.com', '2023-03-16', '$2y$10$XsWtUuCUh8FU34H0GZkyuOOgsYoZZydkhL6JV7vMVFwGfOyTWxuRG', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `Id_Message` int(11) NOT NULL,
  `Sujet` varchar(50) DEFAULT NULL,
  `Corps` text DEFAULT NULL,
  `Date_Heure` datetime DEFAULT NULL,
  `Id_Objectif` int(11) NOT NULL,
  `Id_Membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `objectif`
--

CREATE TABLE `objectif` (
  `Id_Objectif` int(11) NOT NULL,
  `Intitule` varchar(50) DEFAULT NULL,
  `Nb_Jetons` tinyint(4) DEFAULT NULL,
  `Duree` double DEFAULT NULL,
  `Lien_Image` varchar(50) DEFAULT NULL,
  `Travaille` tinyint(1) DEFAULT NULL,
  `Nb_Jetons_Places` int(11) DEFAULT 0,
  `Id_Membre` int(11) DEFAULT NULL,
  `Id_Enfant` int(11) NOT NULL,
  `Temps_Debut` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `placer_jeton`
--

CREATE TABLE `placer_jeton` (
  `Id_Objectif` int(11) NOT NULL,
  `Date_Heure` int(11) NOT NULL,
  `Id_Membre` int(11) NOT NULL,
  `Temps_Debut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recompense`
--

CREATE TABLE `recompense` (
  `Id_Recompense` int(11) NOT NULL,
  `Intitule` varchar(50) DEFAULT NULL,
  `Lien_Image` varchar(50) DEFAULT NULL,
  `Descriptif` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `Id_Enfant` int(11) NOT NULL,
  `Id_Membre` int(11) NOT NULL,
  `Date_Demande_Equipe` date DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD PRIMARY KEY (`Id_Enfant`);

--
-- Index pour la table `lier`
--
ALTER TABLE `lier`
  ADD PRIMARY KEY (`Id_Objectif`,`Id_Recompense`),
  ADD KEY `Id_Recompense` (`Id_Recompense`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`Id_Membre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id_Message`),
  ADD KEY `Id_Objectif` (`Id_Objectif`),
  ADD KEY `Id_Membre` (`Id_Membre`);

--
-- Index pour la table `objectif`
--
ALTER TABLE `objectif`
  ADD PRIMARY KEY (`Id_Objectif`),
  ADD KEY `Id_Membre` (`Id_Membre`),
  ADD KEY `Id_Enfant` (`Id_Enfant`);

--
-- Index pour la table `placer_jeton`
--
ALTER TABLE `placer_jeton`
  ADD PRIMARY KEY (`Id_Objectif`,`Date_Heure`),
  ADD KEY `Id_Membre` (`Id_Membre`);

--
-- Index pour la table `recompense`
--
ALTER TABLE `recompense`
  ADD PRIMARY KEY (`Id_Recompense`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`Id_Enfant`,`Id_Membre`),
  ADD KEY `Id_Membre` (`Id_Membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `enfant`
--
ALTER TABLE `enfant`
  MODIFY `Id_Enfant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `Id_Membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `Id_Message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `objectif`
--
ALTER TABLE `objectif`
  MODIFY `Id_Objectif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `recompense`
--
ALTER TABLE `recompense`
  MODIFY `Id_Recompense` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `lier`
--
ALTER TABLE `lier`
  ADD CONSTRAINT `lier_ibfk_1` FOREIGN KEY (`Id_Objectif`) REFERENCES `objectif` (`Id_Objectif`) ON DELETE CASCADE,
  ADD CONSTRAINT `lier_ibfk_2` FOREIGN KEY (`Id_Recompense`) REFERENCES `recompense` (`Id_Recompense`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`Id_Objectif`) REFERENCES `objectif` (`Id_Objectif`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`Id_Membre`) REFERENCES `membre` (`Id_Membre`) ON DELETE CASCADE;

--
-- Contraintes pour la table `objectif`
--
ALTER TABLE `objectif`
  ADD CONSTRAINT `objectif_ibfk_1` FOREIGN KEY (`Id_Membre`) REFERENCES `membre` (`Id_Membre`),
  ADD CONSTRAINT `objectif_ibfk_2` FOREIGN KEY (`Id_Enfant`) REFERENCES `enfant` (`Id_Enfant`) ON DELETE CASCADE;

--
-- Contraintes pour la table `placer_jeton`
--
ALTER TABLE `placer_jeton`
  ADD CONSTRAINT `placer_jeton_ibfk_1` FOREIGN KEY (`Id_Objectif`) REFERENCES `objectif` (`Id_Objectif`) ON DELETE CASCADE,
  ADD CONSTRAINT `placer_jeton_ibfk_2` FOREIGN KEY (`Id_Membre`) REFERENCES `membre` (`Id_Membre`) ON DELETE CASCADE;

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `suivre_ibfk_1` FOREIGN KEY (`Id_Enfant`) REFERENCES `enfant` (`Id_Enfant`) ON DELETE CASCADE,
  ADD CONSTRAINT `suivre_ibfk_2` FOREIGN KEY (`Id_Membre`) REFERENCES `membre` (`Id_Membre`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
