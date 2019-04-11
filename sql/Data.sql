-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 avr. 2019 à 20:15
-- Version du serveur :  10.1.33-MariaDB
-- Version de PHP :  7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mycourse`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(40) NOT NULL,
  `descriptionCategorie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`, `descriptionCategorie`) VALUES
(1, 'Informatique', NULL),
(2, 'Physique', NULL),
(5, 'MathÃ©matique', ''),
(6, 'Automatique', ''),
(7, 'l\'hydraulique', ''),
(8, 'Electronique', ''),
(9, 'Management - Entreprises', ''),
(10, 'Commerce - Marketing', ''),
(11, 'Langues', ''),
(12, 'Droit', ''),
(13, 'Industrie', ''),
(14, 'Tourisme', ''),
(15, 'Sciences Humaines Et Sociales', ''),
(16, 'Ressources Humaines', ''),
(17, 'Psychologie', ''),
(18, 'Biologie, Chimie, Pharmacie', ''),
(19, 'MÃ©dical', '');

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `idChapitre` int(11) NOT NULL,
  `nomChapitre` varchar(100) NOT NULL,
  `descriptionChapitre` varchar(200) DEFAULT NULL,
  `dossierChapitre` varchar(300) NOT NULL,
  `typeSupportChapitre` varchar(10) NOT NULL,
  `idCours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`idChapitre`, `nomChapitre`, `descriptionChapitre`, `dossierChapitre`, `typeSupportChapitre`, `idCours`) VALUES
(57, 'Chapitre II', 'Ce chapitre est une introduction sur l electronique en gï¿½neral', '', '', 74),
(59, 'Chapitre I', 'ce chapitre va vous permettre de vous amÃ©loire ', 'uploads/Chapitre/TD_commande__2018-2019__Part1.pdf', '', 70),
(60, 'Chapitre III', 'mÃ¹dklzkdmlzkmfljkzpofjkklzfzjfkzjfjzfjzjkofg', '', '', 74),
(61, 'Chapitre II', 'mlsojdk,djk,qdk,qdkqikkd,dkvdd', 'uploads/Chapitre/Releve mensuel de compte 2.pdf', '', 70),
(62, 'Chapitre III', 'ddddd', 'uploads/Chapitre/Releve mensuel de compte.pdf', '', 70),
(66, 'Website', 'javacodjij', 'uploads/Chapitre/great.mp4', 'mp4', 78),
(86, ' Introduction', '', 'uploads/Chapitre/01 - Algorithmique II - Introduction.pdf', '', 88),
(87, 'EntrÃ©es Sorties', '', 'uploads/Chapitre/02 - Algorithmique II - EntrÃ©es Sorties .pdf', '', 88),
(88, 'Structures conditionnelles et rÃ©pÃ©titives', '', 'uploads/Chapitre/03 - Algorithmique II - Structures conditionnelles et rÃ©pÃ©titives.pdf', '', 88),
(89, 'Fonctions', '', 'uploads/Chapitre/04 - Algorithmique II - Fonctions.pdf', '', 88),
(90, 'Structures de donnÃ©es - Introduction', '', 'uploads/Chapitre/05 - Algorithmique II - Structures de donnÃ©es - Introduction.pdf', '', 88),
(91, 'Algorithmes de tri', '', 'uploads/Chapitre/06 - Algorithmique II - Algorithmes de tri.pdf', '', 88),
(92, 'Structures de donnÃ©es dynamiques', '', 'uploads/Chapitre/07 - Algorithmique II - Structures de donnÃ©es dynamiques.pdf', '', 88),
(93, 'Structures de donnÃ©es dynamiques - Les piles et files', '', 'uploads/Chapitre/08 - Algorithmique II - Structures de donnÃ©es dynamiques - Les piles et files.pdf', '', 88),
(94, 'Structures de donnÃ©es - Les arbres', '', 'uploads/Chapitre/09 - Algorithmique II - Structures de donnÃ©es - Les arbres.pdf', '', 88),
(95, 'Structures de donnÃ©es - Les tables de symboles et tables de hachage', '', 'uploads/Chapitre/10 - Algorithmique II - Structures de donnÃ©es - Les tables de symboles et tables de hachage.pdf', '', 88),
(96, 'La programmation dynamique', '', 'uploads/Chapitre/11 - Algorithmique II - La programmation dynamique.pdf', '', 88),
(97, 'ComplexitÃ©', '', 'uploads/Chapitre/12 - Algorithmique II - ComplexitÃ©.pdf', '', 88),
(98, 'ksljakjdkj', 'kdjkljkjk', 'uploads/Chapitre/Captjjjure.jpg', 'jpg', 78),
(99, 'chapitre 1', '', 'uploads/Chapitre/12 - Algorithmique II - ComplexitÃ©.pdf', 'pdf', 93),
(100, 'chapitre 2', '', 'uploads/Chapitre/09 - Algorithmique II - Structures de donnÃ©es - Les arbres.pdf', 'pdf', 93);

-- --------------------------------------------------------

--
-- Structure de la table `correction`
--

CREATE TABLE `correction` (
  `idCorrection` int(11) NOT NULL,
  `nomCorrection` varchar(30) NOT NULL,
  `descriptionCorrection` varchar(200) DEFAULT NULL,
  `dossierCorrection` varchar(100) NOT NULL,
  `typeSupportCorrection` varchar(10) NOT NULL,
  `idExercice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `correction`
--

INSERT INTO `correction` (`idCorrection`, `nomCorrection`, `descriptionCorrection`, `dossierCorrection`, `typeSupportCorrection`, `idExercice`) VALUES
(1, 'correction III', 'addhazkodhkoazjhdfklz', '', '', 4),
(2, 'nnnnnn', '', '', '', 5),
(3, '  vvvvvvvvvvv', '', '', '', 6),
(4, 'pppppp', '', '', '', 7),
(5, 'Solution 1', '', 'uploads/Correction/Solution 1-ex2.pdf', '', 9),
(6, 'Solution 1', '', 'uploads/Correction/Solution 1-ex3.pdf', '', 10),
(7, 'Solution 2', '', 'uploads/Correction/Solution 2-ex3.pdf', '', 10),
(8, 'Solution 1', '', 'uploads/Correction/Solution 1-ex1.pdf', '', 12),
(9, 'Solution 4', 'n,ktydsrfgh', 'uploads/Correction/SOL_EXAM_AUTOMATIQUE_2018-2019.pdf', '', 15);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `nomCours` varchar(50) NOT NULL,
  `descriptionCours` varchar(2000) DEFAULT NULL,
  `volumeHoraire` int(11) DEFAULT NULL,
  `langueCours` varchar(50) NOT NULL,
  `dossierImage` varchar(100) DEFAULT NULL,
  `publier` tinyint(1) NOT NULL,
  `dateLancement` date DEFAULT NULL,
  `emailProfesseur` varchar(40) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `nomCours`, `descriptionCours`, `volumeHoraire`, `langueCours`, `dossierImage`, `publier`, `dateLancement`, `emailProfesseur`, `idCategorie`) VALUES
(70, 'JAVA', 'Java est un langage extrÃªmement populaire utilisÃ© dans un grand nombre d\'entreprises. TrÃ¨s structurÃ© et mature, il permet de crÃ©er aussi bien des programmes que des applications web. Sa grande force ? ', 45, 'Anglais', 'uploads/Cours/JAVA_Logo.png', 1, '2018-12-21', 'm.el_outmani@mundiapolis.ma', 1),
(74, 'Electronic', 'Electronics from Georgia Institute of Technology. This course introduces students to the basic components of electronics: diodes, transistors, and ', 24, 'Anglais', 'uploads/Cours/Arduino_ftdi_chip-1.jpg', 1, '2018-12-29', 'm.el_outmani@mundiapolis.ma', 1),
(78, 'aaqqq', 'qxsdqd', 11, 'Anglais', 'uploads/Cours/32191894_2085271951747684_163255349053227008_n.jpg', 1, '2019-01-11', 'm.el_outmani@mundiapolis.ma', 1),
(88, 'Algorithmique II', '', 48, 'FranÃ§ais', 'uploads/Cours/tÃ©lÃ©chargÃ©.jpg', 1, '2019-01-14', 's.mouchawrab@mundiapolis.ma', 1),
(93, 'Base de donnÃ©es', 'cest un cours de base de donnÃ©es', 54, 'Anglais', 'uploads/Cours/base-de-donnees-sql.jpg', 1, '2019-01-16', 'mostapha99@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `coursetudiant`
--

CREATE TABLE `coursetudiant` (
  `idCours` int(11) NOT NULL,
  `emailEtudiant` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coursetudiant`
--

INSERT INTO `coursetudiant` (`idCours`, `emailEtudiant`) VALUES
(70, 'hafid@gmail.com'),
(70, 'nn@gmail.com'),
(74, 'hafid@gmail.com'),
(74, 'nn@gmail.com'),
(78, 'hafid@gmail.com'),
(78, 'o.chihab@mundiapolis.ma'),
(88, 'hafid@gmail.com'),
(88, 'o.chihab@mundiapolis.ma'),
(93, 'hassan@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `emailEtudiant` varchar(40) NOT NULL,
  `passwordEtudiant` varchar(50) NOT NULL,
  `nomEtudiant` varchar(30) NOT NULL,
  `prenomEtudiant` varchar(30) NOT NULL,
  `sexeEtudiant` varchar(10) NOT NULL,
  `dateNaissanceEtudiant` date NOT NULL,
  `nomUniversite` varchar(30) DEFAULT NULL,
  `dateLogin` date DEFAULT NULL,
  `dateLastLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`emailEtudiant`, `passwordEtudiant`, `nomEtudiant`, `prenomEtudiant`, `sexeEtudiant`, `dateNaissanceEtudiant`, `nomUniversite`, `dateLogin`, `dateLastLogin`) VALUES
('a.tahiri@gmail.com', '2094f685081accceb967bb2c9c93c620', 'tahiri', 'abdelali', 'Homme', '1998-10-13', NULL, '2018-12-26', '2018-12-26'),
('etudiant12@gmail.com', '123123', 'hhhhhh', 'hhhh', 'Homme', '2019-01-17', NULL, '2019-01-04', '2019-01-04'),
('etudiant1@gmail.com', '000000', 'Anass', 'Achik', 'Homme', '2000-02-16', 'Mundiapolis', '2018-12-22', '2018-12-23'),
('etudiant2@gmail.com', '000000', 'Ayoub', 'Aitlachgar', 'Homme', '2000-03-16', 'Mundiapolis', '2018-12-22', '2018-12-23'),
('fifito_out@hotmail.com', '670b14728ad9902aecba32e22fa4f6bd', 'Abdelaoui', 'Hamid', 'Homme', '1998-12-14', NULL, '2018-12-26', '2018-12-26'),
('hafid@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', 'moha', 'hafid', 'Homme', '2019-01-02', NULL, '2019-01-16', '2019-01-16'),
('hassan@gmail.com', '4297f44b13955235245b2497399d7a93', 'hassan', 'hassan', 'Homme', '2019-01-11', NULL, '2019-01-16', '2019-01-16'),
('nn@gmail.com', '$2y$10$nm8IkwK0/G2I1.ndIEPby.qqijaweKPzZUu9I4guUnm', 'el baz', 'soumia', 'Femme', '2019-01-10', NULL, '2019-01-03', '2019-01-03'),
('o.chihab@mundiapolis.ma', 'e10adc3949ba59abbe56e057f20f883e', 'CHIHAB', 'othman', 'Homme', '1996-08-14', NULL, '2019-01-16', '2019-01-16'),
('tahiriabdo131@gmail.com', '2094f685081accceb967bb2c9c93c620', 'tahiri', 'abdelali', 'Homme', '1998-10-13', NULL, '2018-12-26', '2018-12-26'),
('TEST@GMAIL.COM', '4a7d1ed414474e4033ac29ccb8653d9b', 'out', 'fifito', 'Homme', '2019-03-22', NULL, '2019-03-22', '2019-03-22'),
('w@gmail.com', '$2y$10$aJu2Vjj.ssUE2KKtH3y0g.3BfKBzoof0pDfOuMsp.dG', 'ssaaa', 'assaaaaaaa', 'Homme', '2019-01-17', NULL, '2019-01-04', '2019-01-04'),
('xxaa@gmail.com', '$2y$10$.7ey8GBBkSk4yF7JBqZQ0ujTDVv1eSyxKk/HRKK2dxL', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'Homme', '2019-01-04', NULL, '2019-01-04', '2019-01-04');

-- --------------------------------------------------------

--
-- Structure de la table `exercice`
--

CREATE TABLE `exercice` (
  `idExercice` int(11) NOT NULL,
  `nomExercice` varchar(40) NOT NULL,
  `descriptionExercice` varchar(200) DEFAULT NULL,
  `dossierExercice` varchar(100) NOT NULL,
  `typeSupportExercice` varchar(10) NOT NULL,
  `idChapitre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exercice`
--

INSERT INTO `exercice` (`idExercice`, `nomExercice`, `descriptionExercice`, `dossierExercice`, `typeSupportExercice`, `idChapitre`) VALUES
(1, 'exercice1', 'zfkljzjhfziojhfzioshkozsfgiohzjhfizjhjfzjfizh', '', '', 57),
(4, 'exercice1', 'qzklfhjozqshfkhziofhzf', '', '', 60),
(5, 'jnbnjnjkbn', 'jnjnjnj', '', '', 59),
(6, 'kjjhjj', 'nnklnknk', '', '', 59),
(7, 'jkhhuigyufgftdnn', 'nbb', '', '', 61),
(8, 'Exercice 1', '', 'uploads/Exercice/Exercice 1.pdf', '', 89),
(9, 'Exercice 2', '', 'uploads/Exercice/Exercice 2.pdf', '', 89),
(10, 'Exercice 3', '', 'uploads/Exercice/Exercice 3.pdf', '', 89),
(12, 'Exercice 1', '', 'uploads/Exercice/Exercice 1.pdf', '', 88),
(13, 'Exercice 2', '', 'uploads/Exercice/Exercice 2.pdf', '', 88),
(14, 'Exercice 3', '', 'uploads/Exercice/Exercice 3.pdf', '', 88),
(15, 'Exercice 4', '', 'uploads/Exercice/Exercice 4.pdf', '', 88),
(16, 'exercice1', '', 'uploads/Exercice/06 - Algorithmique II - Algorithmes de tri.pdf', 'pdf', 100);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `emailProfesseur` varchar(40) NOT NULL,
  `passwordProfesseur` varchar(50) NOT NULL,
  `nomProfesseur` varchar(30) NOT NULL,
  `prenomProfesseur` varchar(30) NOT NULL,
  `sexeProfesseur` varchar(10) NOT NULL,
  `dateNaissanceProfesseur` date NOT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `dateLogin` date DEFAULT NULL,
  `dateLastLogin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`emailProfesseur`, `passwordProfesseur`, `nomProfesseur`, `prenomProfesseur`, `sexeProfesseur`, `dateNaissanceProfesseur`, `profession`, `dateLogin`, `dateLastLogin`) VALUES
('etudiant1s@gmail.com', '$2y$10$hvBwYqq9kOrcC/NSMHKSCOJIU.n9cy5Nymv6hLtU74K', 'ssss', 'sss', 'Homme', '0111-01-12', NULL, '2019-01-02', '2019-01-02'),
('fifito2_out@hotmail.com', '670b14728ad9902aecba32e22fa4f6bd', 'el baz', 'mayssam', 'Homme', '1998-12-04', NULL, '2018-12-26', '2018-12-26'),
('m.el_outmani@mundiapolis.ma', 'd0970714757783e6cf17b26fb8e2298f', 'El Outmani', 'Moustapha', 'Homme', '1998-05-18', 'Programmer', '2018-12-21', '2018-12-21'),
('m.el_yousfi@mundiapolis.ma', 'f6606b92d6e970621b19cddbde4de987', 'El Yousfi', 'Mohammed', 'Homme', '1998-06-15', 'Designer', '2018-12-21', '2018-12-21'),
('mohammedelyousfi19@gmail.com', '5f6973b7825ae15902eb62cdc79630d6', 'El yousfi', 'Mohammed', 'Homme', '1996-04-04', NULL, '2019-01-16', '2019-01-16'),
('mostapha99@gmail.com', '4297f44b13955235245b2497399d7a93', 'polis', 'mundia', 'Homme', '2019-01-10', NULL, '2019-01-16', '2019-01-16'),
('s.mouchawrab@mundiapolis.ma', 'd0970714757783e6cf17b26fb8e2298f', 'Mouchawrab', 'Samar', 'Femme', '1975-06-12', NULL, '2019-01-13', '2019-01-13'),
('single@gmail.com', '$2y$10$CiJ5SbeEwnNz/4TRUFz7NOZH7RcJjLL6fZ5o4URmVIz', 'single', 'asinglerider', 'Homme', '2019-01-10', NULL, '2019-01-04', '2019-01-04'),
('xx@gmail.com', 'd0970714757783e6cf17b26fb8e2298f', 'sasasass', 'aaqqaqqaq', 'Homme', '2019-01-24', NULL, '2019-01-15', '2019-01-15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`idChapitre`),
  ADD KEY `FK_chapitre_idCours` (`idCours`);

--
-- Index pour la table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`idCorrection`),
  ADD KEY `FK_Correction_idExercice` (`idExercice`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`),
  ADD KEY `FK_Cours_emailProfesseur` (`emailProfesseur`),
  ADD KEY `FK_Cours_idCategorie` (`idCategorie`);

--
-- Index pour la table `coursetudiant`
--
ALTER TABLE `coursetudiant`
  ADD PRIMARY KEY (`idCours`,`emailEtudiant`),
  ADD KEY `FK_ligneCours_emailEtudiant` (`emailEtudiant`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`emailEtudiant`);

--
-- Index pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD PRIMARY KEY (`idExercice`),
  ADD KEY `FK_Exercice_idChapitre` (`idChapitre`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`emailProfesseur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `idChapitre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `correction`
--
ALTER TABLE `correction`
  MODIFY `idCorrection` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `exercice`
--
ALTER TABLE `exercice`
  MODIFY `idExercice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD CONSTRAINT `FK_chapitre_idCours` FOREIGN KEY (`idCours`) REFERENCES `cours` (`idCours`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `FK_Correction_idExercice` FOREIGN KEY (`idExercice`) REFERENCES `exercice` (`idExercice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_Cours_emailProfesseur` FOREIGN KEY (`emailProfesseur`) REFERENCES `professeur` (`emailProfesseur`),
  ADD CONSTRAINT `FK_Cours_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `coursetudiant`
--
ALTER TABLE `coursetudiant`
  ADD CONSTRAINT `FK_ligneCours_emailEtudiant` FOREIGN KEY (`emailEtudiant`) REFERENCES `etudiant` (`emailEtudiant`),
  ADD CONSTRAINT `FK_ligneCours_idCours` FOREIGN KEY (`idCours`) REFERENCES `cours` (`idCours`);

--
-- Contraintes pour la table `exercice`
--
ALTER TABLE `exercice`
  ADD CONSTRAINT `FK_Exercice_idChapitre` FOREIGN KEY (`idChapitre`) REFERENCES `chapitre` (`idChapitre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
