-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 12 avr. 2023 à 15:09
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rapports_gsb_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaborateur`
--

DROP TABLE IF EXISTS `collaborateur`;
CREATE TABLE IF NOT EXISTS `collaborateur` (
  `COL_MATRICULE` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `COL_NOM` varchar(25) COLLATE utf8mb3_bin DEFAULT NULL,
  `COL_PRENOM` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `COL_ADRESSE` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `COL_CP` varchar(5) COLLATE utf8mb3_bin DEFAULT NULL,
  `COL_VILLE` varchar(30) COLLATE utf8mb3_bin DEFAULT NULL,
  `COL_DATEEMBAUCHE` datetime DEFAULT NULL,
  `HAB_ID` int(11) DEFAULT NULL,
  `LOG_ID` int(11) DEFAULT NULL,
  `SEC_CODE` varchar(1) COLLATE utf8mb3_bin DEFAULT NULL,
  `REG_CODE` varchar(2) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`COL_MATRICULE`),
  UNIQUE KEY `collaborateur_login0_AK` (`LOG_ID`),
  KEY `collaborateur_habilitation0_FK` (`HAB_ID`),
  KEY `collaborateur_secteur0_FK` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `collaborateur`
--

INSERT INTO `collaborateur` (`COL_MATRICULE`, `COL_NOM`, `COL_PRENOM`, `COL_ADRESSE`, `COL_CP`, `COL_VILLE`, `COL_DATEEMBAUCHE`, `HAB_ID`, `LOG_ID`, `SEC_CODE`, `REG_CODE`) VALUES
('a131', 'Villechalane', 'Louis', '8 cours Lafontaine', '29000', 'BREST', '1992-12-11 00:00:00', 1, 1, 'E', 'BN'),
('a17', 'Andre', 'David', '1 r Aimon de Chissée', '38100', 'GRENOBLE', '1991-08-26 00:00:00', 1, 2, NULL, 'RA'),
('a55', 'Bedos', 'Christian', '1 r Bénédictins', '65000', 'TARBES', '1987-07-17 00:00:00', 2, 3, NULL, 'RO'),
('a93', 'Tusseau', 'Louis', '22 r Renou', '86000', 'POITIERS', '1999-01-02 00:00:00', 2, 4, NULL, 'PC'),
('b13', 'Bentot', 'Pascal', '11 av 6 Juin', '67000', 'STRASBOURG', '1996-03-11 00:00:00', 1, NULL, NULL, NULL),
('b16', 'Bioret', 'Luc', '1 r Linne', '35000', 'RENNES', '1997-03-21 00:00:00', 1, NULL, NULL, NULL),
('b19', 'Bunisset', 'Francis', '10 r Nicolas Chorier', '85000', 'LA ROCHE SUR YON', '1999-01-31 00:00:00', 1, NULL, NULL, NULL),
('b25', 'Bunisset', 'Denise', '1 r Lionne', '49100', 'ANGERS', '1994-07-03 00:00:00', 1, NULL, NULL, NULL),
('b28', 'Cacheux', 'Bernard', '114 r Authie', '34000', 'MONTPELLIER', '2000-08-02 00:00:00', 1, NULL, NULL, NULL),
('b34', 'Cadic', 'Eric', '123 r Caponière', '41000', 'BLOIS', '1993-12-06 00:00:00', 1, NULL, 'P', NULL),
('b4', 'Charoze', 'Catherine', '100 pl Géants', '33000', 'BORDEAUX', '1997-09-25 00:00:00', 1, NULL, NULL, NULL),
('b50', 'Clepkens', 'Christophe', '12 r Fédérico Garcia Lorca', '13000', 'MARSEILLE', '1998-01-18 00:00:00', 1, NULL, NULL, NULL),
('b59', 'Cottin', 'Vincenne', '36 sq Capucins', '5000', 'GAP', '1995-10-21 00:00:00', 1, NULL, NULL, NULL),
('c14', 'Daburon', 'François', '13 r Champs Elysées', '6000', 'NICE', '1989-02-01 00:00:00', 1, NULL, NULL, NULL),
('c3', 'De', 'Philippe', '13 r Charles Peguy', '10000', 'TROYES', '1992-05-05 00:00:00', 1, NULL, NULL, NULL),
('c54', 'Debelle', 'Michel', '181 r Caponière', '88000', 'EPINAL', '1991-04-09 00:00:00', 1, NULL, NULL, NULL),
('d13', 'Debelle', 'Jeanne', '134 r Stalingrad', '44000', 'NANTES', '1991-12-05 00:00:00', 1, NULL, NULL, NULL),
('d51', 'Debroise', 'Michel', '2 av 6 Juin', '70000', 'VESOUL', '1997-11-18 00:00:00', 1, NULL, 'E', NULL),
('e22', 'Desmarquest', 'Nathalie', '14 r Fédérico Garcia Lorca', '54000', 'NANCY', '1989-03-24 00:00:00', 1, NULL, NULL, NULL),
('e24', 'Desnost', 'Pierre', '16 r Barral de Montferrat', '55000', 'VERDUN', '1993-05-17 00:00:00', 1, NULL, 'E', NULL),
('e39', 'Dudouit', 'Frédéric', '18 quai Xavier Jouvin', '75000', 'PARIS', '1988-04-26 00:00:00', 1, NULL, NULL, NULL),
('e49', 'Duncombe', 'Claude', '19 av Alsace Lorraine', '9000', 'FOIX', '1996-02-19 00:00:00', 1, NULL, NULL, NULL),
('e5', 'Enault-Pascreau', 'Céline', '25B r Stalingrad', '40000', 'MONT DE MARSAN', '1990-11-27 00:00:00', 1, NULL, NULL, NULL),
('e52', 'Eynde', 'Valérie', '3 r Henri Moissan', '76000', 'ROUEN', '1991-10-31 00:00:00', 1, NULL, NULL, NULL),
('f21', 'Finck', 'Jacques', 'rte Montreuil Bellay', '74000', 'ANNECY', '1993-06-08 00:00:00', 1, NULL, NULL, NULL),
('f39', 'Frémont', 'Fernande', '4 r Jean Giono', '69000', 'LYON', '1997-02-15 00:00:00', 1, NULL, NULL, NULL),
('f4', 'Gest', 'Alain', '30 r Authie', '46000', 'FIGEAC', '1994-05-03 00:00:00', 1, NULL, NULL, NULL),
('g19', 'Gheysen', 'Galassus', '32 bd Mar Foch', '75000', 'PARIS', '1996-01-18 00:00:00', 1, NULL, NULL, NULL),
('g30', 'Girard', 'Yvon', '31 av 6 Juin', '80000', 'AMIENS', '1999-03-27 00:00:00', 1, NULL, 'N', NULL),
('g53', 'Gombert', 'Luc', '32 r Emile Gueymard', '56000', 'VANNES', '1985-10-02 00:00:00', 1, NULL, NULL, NULL),
('g7', 'Guindon', 'Caroline', '40 r Mar Montgomery', '87000', 'LIMOGES', '1996-01-13 00:00:00', 1, NULL, NULL, NULL),
('h13', 'Guindon', 'François', '44 r Picotière', '19000', 'TULLE', '1993-05-08 00:00:00', 1, NULL, NULL, NULL),
('h30', 'Igigabel', 'Guy', '33 gal Arlequin', '94000', 'CRETEIL', '1998-04-26 00:00:00', 1, NULL, NULL, NULL),
('h35', 'Jourdren', 'Pierre', '34 av Jean Perrot', '15000', 'AURRILLAC', '1993-08-26 00:00:00', 1, NULL, NULL, NULL),
('h40', 'Juttard', 'Pierre-Raoul', '34 cours Jean Jaurès', '8000', 'SEDAN', '1992-11-01 00:00:00', 1, NULL, NULL, NULL),
('j45', 'Labouré-Morel', 'Saout', '38 cours Berriat', '52000', 'CHAUMONT', '1998-02-25 00:00:00', 1, NULL, 'N', NULL),
('j50', 'Landré', 'Philippe', '4 av Gén Laperrine', '59000', 'LILLE', '1992-12-16 00:00:00', 1, NULL, NULL, NULL),
('j8', 'Langeard', 'Hugues', '39 av Jean Perrot', '93000', 'BAGNOLET', '1998-06-18 00:00:00', 1, NULL, 'P', NULL),
('k4', 'Lanne', 'Bernard', '4 r Bayeux', '30000', 'NIMES', '1996-11-21 00:00:00', 1, NULL, NULL, NULL),
('k53', 'Le', 'Noël', '4 av Beauvert', '68000', 'MULHOUSE', '1983-03-23 00:00:00', 1, NULL, NULL, NULL),
('l14', 'Le', 'Jean', '39 r Raspail', '53000', 'LAVAL', '1995-02-02 00:00:00', 1, NULL, NULL, NULL),
('l23', 'Leclercq', 'Servane', '11 r Quinconce', '18000', 'BOURGES', '1995-06-05 00:00:00', 1, NULL, NULL, NULL),
('l46', 'Lecornu', 'Jean-Bernard', '4 bd Mar Foch', '72000', 'LA FERTE BERNARD', '1997-01-24 00:00:00', 1, NULL, NULL, NULL),
('l56', 'Lecornu', 'Ludovic', '4 r Abel Servien', '25000', 'BESANCON', '1996-02-27 00:00:00', 1, NULL, NULL, NULL),
('m35', 'Lejard', 'Agnès', '4 r Anthoard', '82000', 'MONTAUBAN', '1987-10-06 00:00:00', 1, NULL, NULL, NULL),
('m45', 'Lesaulnier', 'Pascal', '47 r Thiers', '57000', 'METZ', '1990-10-13 00:00:00', 1, NULL, NULL, NULL),
('n42', 'Letessier', 'Stéphane', '5 chem Capuche', '27000', 'EVREUX', '1996-03-06 00:00:00', 1, NULL, NULL, NULL),
('n58', 'Loirat', 'Didier', 'Les Pêchers cité Bourg la Croix', '45000', 'ORLEANS', '1992-08-30 00:00:00', 1, NULL, NULL, NULL),
('n59', 'Maffezzoli', 'Thibaud', '5 r Chateaubriand', '2000', 'LAON', '1994-12-19 00:00:00', 1, NULL, NULL, NULL),
('o26', 'Mancini', 'Anne', '5 r D\'Agier', '48000', 'MENDE', '1995-01-05 00:00:00', 1, NULL, NULL, NULL),
('p32', 'Marcouiller', 'Gérard', '7 pl St Gilles', '91000', 'ISSY LES MOULINEAUX', '1992-12-24 00:00:00', 1, NULL, NULL, NULL),
('p40', 'Michel', 'Jean-Claude', '5 r Gabriel Péri', '61000', 'FLERS', '1992-12-14 00:00:00', 1, NULL, 'O', NULL),
('p41', 'Montecot', 'Françoise', '6 r Paul Valéry', '17000', 'SAINTES', '1998-07-27 00:00:00', 1, NULL, NULL, NULL),
('p42', 'Notini', 'Veronique', '5 r Lieut Chabal', '60000', 'BEAUVAIS', '1994-12-12 00:00:00', 1, NULL, NULL, NULL),
('p49', 'Onfroy', 'Den', '5 r Sidonie Jacolin', '37000', 'TOURS', '1977-10-03 00:00:00', 1, NULL, NULL, NULL),
('p7', 'Pernot', 'Claude-Noël', '6 r Alexandre 1 de Yougoslavie', '11000', 'NARBONNE', '1990-03-01 00:00:00', 1, NULL, NULL, NULL),
('p8', 'Perrier', 'Maître', '6 r Aubert Dubayet', '71000', 'CHALON SUR SAONE', '1991-06-23 00:00:00', 1, NULL, NULL, NULL),
('q17', 'Petit', 'Jean-Louis', '7 r Ernest Renan', '50000', 'SAINT LO', '1997-09-06 00:00:00', 1, NULL, NULL, NULL),
('r24', 'Piquery', 'Patrick', '9 r Vaucelles', '14000', 'CAEN', '1984-07-29 00:00:00', 1, NULL, 'O', NULL),
('r58', 'Quiquandon', 'Joël', '7 r Ernest Renan', '29000', 'QUIMPER', '1990-06-30 00:00:00', 1, NULL, NULL, NULL),
('s10', 'Retailleau', 'Josselin', '88Bis r Saumuroise', '39000', 'DOLE', '1995-11-14 00:00:00', 1, NULL, NULL, NULL),
('s21', 'Retailleau', 'Pascal', '32 bd Ayrault', '23000', 'MONTLUCON', '1992-09-25 00:00:00', 1, NULL, NULL, NULL),
('t43', 'Souron', 'Maryse', '7B r Gay Lussac', '21000', 'DIJON', '1995-03-09 00:00:00', 1, NULL, NULL, NULL),
('t47', 'Tiphagne', 'Patrick', '7B r Gay Lussac', '62000', 'ARRAS', '1997-08-29 00:00:00', 1, NULL, NULL, NULL),
('t55', 'Tréhet', 'Alain', '7D chem Barral', '12000', 'RODEZ', '1994-11-29 00:00:00', 1, NULL, NULL, NULL),
('t60', 'Tusseau', 'Josselin', '63 r Bon Repos', '28000', 'CHARTRES', '1991-03-29 00:00:00', 3, 67, NULL, 'RO'),
('zzz', 'swiss', 'bourdin', NULL, NULL, NULL, '2003-06-18 00:00:00', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `NoDEPT` int(11) NOT NULL,
  `Departement` varchar(30) NOT NULL,
  `REG_CODE` varchar(2) NOT NULL,
  PRIMARY KEY (`NoDEPT`),
  KEY `REG_CODE` (`REG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `departement`
--

INSERT INTO `departement` (`NoDEPT`, `Departement`, `REG_CODE`) VALUES
(1, 'Ain', 'AA'),
(2, 'Aisne', 'PI'),
(3, 'Allier', 'AA'),
(4, 'Alpes-de-Haute-Provence', 'PA'),
(5, 'Hautes-Alpes', 'PA'),
(6, 'Alpes-Maritimes', 'PA'),
(7, 'Ardeche', 'AA'),
(8, 'Ardennes', 'GE'),
(9, 'Ariege', 'LG'),
(10, 'Aube', 'GE'),
(11, 'Aude', 'RO'),
(12, 'Aveyron', 'RO'),
(13, 'Bouches-du-Rhone', 'PA'),
(14, 'Calvados', 'NO'),
(15, 'Cantal', 'AA'),
(16, 'Charente', 'NA'),
(17, 'Charente-Maritime', 'NA'),
(18, 'Cher', 'CE'),
(19, 'Correze', 'NA'),
(22, 'Cotes-du-Nord', 'BG'),
(23, 'Creuse', 'NA'),
(24, 'Dordogne', 'NA'),
(25, 'Doubs', 'BC'),
(26, 'Drome', 'AA'),
(27, 'Eure', 'NO'),
(28, 'Eure-et-Loir', 'CE'),
(29, 'Finistere', 'BG'),
(30, 'Gard', 'MP'),
(31, 'Haute-Garonne', 'MP'),
(32, 'Gers', 'MP'),
(33, 'Gironde', 'NA'),
(34, 'Herault', 'RO'),
(35, 'Ille-et-Vilaine', 'BG'),
(36, 'Indre', 'CE'),
(37, 'Indre-et-Loire', 'CE'),
(38, 'Isere', 'AA'),
(39, 'Jura', 'BC'),
(40, 'Landes', 'NA'),
(41, 'Loir-et-Cher', 'CE'),
(42, 'Loire', 'AA'),
(43, 'Haute-Loire', 'AA'),
(44, 'Loire-Atlantique', 'PL'),
(45, 'Loiret', 'CE'),
(46, 'Lot', 'LG'),
(47, 'Lot-et-Garonne', 'NA'),
(48, 'Lozere', 'MP'),
(49, 'Maine-et-Loire', 'PL'),
(50, 'Manche', 'NO'),
(51, 'Marne', 'GE'),
(52, 'Haute-Marne', 'GE'),
(53, 'Mayenne', 'PL'),
(54, 'Meurthe-et-Moselle', 'GE'),
(55, 'Meuse', 'GE'),
(56, 'Morbihan', 'BG'),
(57, 'Moselle', 'GE'),
(58, 'Nievre', 'BC'),
(59, 'Nord', 'NP'),
(60, 'Oise', 'PI'),
(61, 'Orne', 'NO'),
(62, 'Pas-de-Calais', 'NP'),
(63, 'Puy-de-Dome', 'AA'),
(64, 'Pyrenees-Atlantiques', 'NA'),
(65, 'Hautes-Pyrenees', 'MP'),
(66, 'Pyrenees-Orientales', 'MP'),
(67, 'Bas-Rhin', 'GE'),
(68, 'Haut-Rhin', 'GE'),
(69, 'Rhone', 'AA'),
(70, 'Haute-Saone', 'BC'),
(71, 'Saone-et-Loire', 'BC'),
(72, 'Sarthe', 'PL'),
(73, 'Savoie', 'AA'),
(74, 'Haute-Savoie', 'AA'),
(75, 'Paris', 'IF'),
(76, 'Seine-Maritime', 'NO'),
(77, 'Seine-et-Marne', 'IF'),
(78, 'Yvelines', 'IF'),
(79, 'Deux-Sevres', 'NA'),
(80, 'Somme', 'PI'),
(81, 'Tarn', 'MP'),
(82, 'Tarn-et-Garonne', 'MP'),
(83, 'Var', 'PA'),
(84, 'Vaucluse', 'PA'),
(85, 'Vendee', 'PL'),
(86, 'Vienne', 'NA'),
(87, 'Haute-Vienne', 'NA'),
(88, 'Vosges', 'GE'),
(89, 'Yonne', 'BC'),
(90, 'Territoire-de-Belfort', 'BC'),
(91, 'Essonne', 'IF'),
(92, 'Hauts-de-Seine', 'IF'),
(93, 'Seine-St-Denis', 'IF'),
(94, 'Val-de-Marne', 'IF'),
(95, 'Val-d-Oise', 'IF');

-- --------------------------------------------------------

--
-- Structure de la table `dosage`
--

DROP TABLE IF EXISTS `dosage`;
CREATE TABLE IF NOT EXISTS `dosage` (
  `DOS_CODE` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `DOS_QUANTITE` varchar(10) COLLATE utf8mb3_bin DEFAULT NULL,
  `DOS_UNITE` varchar(10) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`DOS_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `FAM_CODE` varchar(3) COLLATE utf8mb3_bin NOT NULL,
  `FAM_LIBELLE` varchar(80) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`FAM_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`FAM_CODE`, `FAM_LIBELLE`) VALUES
('AA', 'Antalgiques en association'),
('AAA', 'Antalgiques antipyrétiques en association'),
('AAC', 'Antidépresseur d\'action centrale'),
('AAH', 'Antivertigineux antihistaminique H1'),
('ABA', 'Antibiotique antituberculeux'),
('ABC', 'Antibiotique antiacnéique local'),
('ABP', 'Antibiotique de la famille des béta-lactamines (pénicilline A)'),
('AFC', 'Antibiotique de la famille des cyclines'),
('AFM', 'Antibiotique de la famille des macrolides'),
('AH', 'Antihistaminique H1 local'),
('AIM', 'Antidépresseur imipraminique (tricyclique)'),
('AIN', 'Antidépresseur inhibiteur sélectif de la recapture de la sérotonine'),
('ALO', 'Antibiotique local (ORL)'),
('ANS', 'Antidépresseur IMAO non sélectif'),
('AO', 'Antibiotique ophtalmique'),
('AP', 'Antipsychotique normothymique'),
('AUM', 'Antibiotique urinaire minute'),
('CRT', 'Corticoïde, antibiotique et antifongique à  usage local'),
('HYP', 'Hypnotique antihistaminique'),
('PSA', 'Psychostimulant, antiasthénique');

-- --------------------------------------------------------

--
-- Structure de la table `formuler`
--

DROP TABLE IF EXISTS `formuler`;
CREATE TABLE IF NOT EXISTS `formuler` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `PRE_CODE` varchar(2) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`,`PRE_CODE`),
  KEY `FORMULER_presentation1_FK` (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `habilitation`
--

DROP TABLE IF EXISTS `habilitation`;
CREATE TABLE IF NOT EXISTS `habilitation` (
  `HAB_ID` int(11) NOT NULL,
  `HAB_LIB` varchar(30) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`HAB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `habilitation`
--

INSERT INTO `habilitation` (`HAB_ID`, `HAB_LIB`) VALUES
(1, 'Visiteur'),
(2, 'Délégué Régional'),
(3, 'Responsable Secteur');

-- --------------------------------------------------------

--
-- Structure de la table `interagir`
--

DROP TABLE IF EXISTS `interagir`;
CREATE TABLE IF NOT EXISTS `interagir` (
  `MED_DEPOTLEGAL_perturbe` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `MED_DEPOTLEGAL_perturbateur` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL_perturbe`,`MED_DEPOTLEGAL_perturbateur`),
  KEY `FK_interagir_medicament_perturbateur` (`MED_DEPOTLEGAL_perturbateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `LOG_ID` int(11) NOT NULL,
  `LOG_LOGIN` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  `LOG_MOTDEPASSE` varchar(255) COLLATE utf8mb3_bin NOT NULL,
  `COL_MATRICULE` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`LOG_ID`),
  UNIQUE KEY `login_collaborateur0_AK` (`COL_MATRICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`LOG_ID`, `LOG_LOGIN`, `LOG_MOTDEPASSE`, `COL_MATRICULE`) VALUES
(1, 'villou', '6cf17e0501b8078722f316f094e230341b4f1b2d4d14cc082c41494d6b462024f031beff6fc25145ed02a58181fc90a7fca58f0d879b349638df19dca85efa7f', 'a131'),
(2, 'anddav', 'ff781e873746adf59e3165b217034477ca29d4f2322720e05492ea90d21010378252a85f2d66025874647c6d162d45df2766e8003f33c885bbc3c4dbbe92141f', 'a17'),
(3, 'bedchr', 'dbb65dd51a8348771883fae9cd7cc40ce1cf33e3756b4ca798bfcdcc37499b7e7236af7bd16d469bdaf8b039f3d5f414cb8a840d3675862675c0dc4a18fb5946', 'a55'),
(4, 'tuslou', 'd0f2a12b1928e2a54043a3e360b2f9ed7df27b780f668b066ed9de61e0007898a07ff05fbf2f062348d55cb4bf824c8c96e9102050271204713f228034ce709c', 'a93'),
(67, 'tusjos', 'd49fe42f1ce6ebd4d2f147ed3e14fc5816c6ef735c2a3cd7b60e143cafa30db0d835fe37bac1340b7fc6f7cb6f34b307ba869cdf341c2c09e216b21021104d84', 't60');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

DROP TABLE IF EXISTS `medicament`;
CREATE TABLE IF NOT EXISTS `medicament` (
  `MED_DEPOTLEGAL` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `MED_NOMCOMMERCIAL` varchar(25) COLLATE utf8mb3_bin DEFAULT NULL,
  `MED_COMPOSITION` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `MED_EFFETS` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `MED_CONTREINDIC` varchar(255) COLLATE utf8mb3_bin DEFAULT NULL,
  `MED_PRIXECHANTILLON` float DEFAULT NULL,
  `FAM_CODE` varchar(3) COLLATE utf8mb3_bin NOT NULL,
  `PRE_CODE` varchar(2) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`MED_DEPOTLEGAL`),
  KEY `medicament_famille0_FK` (`FAM_CODE`),
  KEY `FK_medicament_presentation` (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `medicament`
--

INSERT INTO `medicament` (`MED_DEPOTLEGAL`, `MED_NOMCOMMERCIAL`, `MED_COMPOSITION`, `MED_EFFETS`, `MED_CONTREINDIC`, `MED_PRIXECHANTILLON`, `FAM_CODE`, `PRE_CODE`) VALUES
('3MYC7', 'TRIMYCINE', 'Triamcinolone (acétonide) + Néomycine + Nystatine', 'Ce médicament est un corticoïde à  activité forte ou très forte associé à  un antibiotique et un antifongique, utilisé en application locale dans certaines atteintes cutanées surinfectées.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'infections de la peau ou de parasitisme non traités, d\'acné. Ne pas appliquer sur une plaie, ni sous un pansement occlusif.', 78.99, 'CRT', NULL),
('ADIMOL9', 'ADIMOL', 'Amoxicilline + Acide clavulanique', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines ou aux céphalosporines.', 40.99, 'ABP', NULL),
('AMOPIL7', 'AMOPIL', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', 29.99, 'ABP', NULL),
('AMOX45', 'AMOXAR', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'La prise de ce médicament peut rendre positifs les tests de dépistage du dopage.', 24.99, 'ABP', NULL),
('AMOXIG12', 'AMOXI Gé', 'Amoxicilline', 'Ce médicament, plus puissant que les pénicillines simples, est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux pénicillines. Il doit être administré avec prudence en cas d\'allergie aux céphalosporines.', 25.99, 'ABP', NULL),
('APATOUX22', 'APATOUX Vitamine C', 'Tyrothricine + Tétracaïne + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, en cas de phénylcétonurie et chez l\'enfant de moins de 6 ans.', 89.99, 'ALO', NULL),
('BACTIG10', 'BACTIGEL', 'Erythromycine', 'Ce médicament est utilisé en application locale pour traiter l\'acné et les infections cutanées bactériennes associées.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques de la famille des macrolides ou des lincosanides.', 46.99, 'ABC', NULL),
('BACTIV13', 'BACTIVIL', 'Erythromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', 34.99, 'AFM', NULL),
('BITALV', 'BIVALIC', 'Dextropropoxyphène + Paracétamol', 'Ce médicament est utilisé pour traiter les douleurs d\'intensité modérée ou intense.', 'Ce médicament est contre-indiqué en cas d\'allergie aux médicaments de cette famille, d\'insuffisance hépatique ou d\'insuffisance rénale.', 87.99, 'AAA', NULL),
('CARTION6', 'CARTION', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas de troubles de la coagulation (tendances aux hémorragies), d\'ulcère gastroduodénal, maladies graves du foie.', 50.99, 'AAA', NULL),
('CLAZER6', 'CLAZER', 'Clarithromycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques. Il est également utilisé dans le traitement de l\'ulcère gastro-duodénal, en association avec d\'autres médicaments.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', 46.99, 'AFM', NULL),
('DEPRIL9', 'DEPRAMIL', 'Clomipramine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères, certaines douleurs rebelles, les troubles obsessionnels compulsifs et certaines énurésies chez l\'enfant.', 'Ce médicament est contre-indiqué en cas de glaucome ou d\'adénome de la prostate, d\'infarctus récent, ou si vous avez reà§u un traitement par IMAO durant les 2 semaines précédentes ou en cas d\'allergie aux antidépresseurs imipraminiques.', 96.99, 'AIM', NULL),
('DIMIRTAM6', 'DIMIRTAM', 'Mirtazapine', 'Ce médicament est utilisé pour traiter les épisodes dépressifs sévères.', 'La prise de ce produit est contre-indiquée en cas de d\'allergie à  l\'un des constituants.', 74.99, 'AAC', NULL),
('DOLRIL7', 'DOLORIL', 'Acide acétylsalicylique (aspirine) + Acide ascorbique (Vitamine C) + Paracétamol', 'Ce médicament est utilisé dans le traitement symptomatique de la douleur ou de la fièvre.', 'Ce médicament est contre-indiqué en cas d\'allergie au paracétamol ou aux salicylates.', 22.99, 'AAA', NULL),
('DORNOM8', 'NORMADOR', 'Doxylamine', 'Ce médicament est utilisé pour traiter l\'insomnie chez l\'adulte.', 'Ce médicament est contre-indiqué en cas de glaucome, de certains troubles urinaires (rétention urinaire) et chez l\'enfant de moins de 15 ans.', 79.99, 'HYP', NULL),
('EQUILARX6', 'EQUILAR', 'Méclozine', 'Ce médicament est utilisé pour traiter les vertiges et pour prévenir le mal des transports.', 'Ce médicament ne doit pas être utilisé en cas d\'allergie au produit, en cas de glaucome ou de rétention urinaire.', 66.99, 'AAH', NULL),
('EVILR7', 'EVEILLOR', 'Adrafinil', 'Ce médicament est utilisé pour traiter les troubles de la vigilance et certains symptomes neurologiques chez le sujet agé.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', 41.99, 'PSA', NULL),
('INSXT5', 'INSECTIL', 'Diphénydramine', 'Ce médicament est utilisé en application locale sur les piqûres d\'insecte et l\'urticaire.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antihistaminiques.', 19.99, 'AH', NULL),
('JOVAI8', 'JOVENIL', 'Josamycine', 'Ce médicament est utilisé pour traiter des infections bactériennes spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie aux macrolides (dont le chef de file est l\'érythromycine).', 63.99, 'AFM', NULL),
('LIDOXY23', 'LIDOXYTRACINE', 'Oxytétracycline +Lidocaïne', 'Ce médicament est utilisé en injection intramusculaire pour traiter certaines infections spécifiques.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants. Il ne doit pas être associé aux rétinoïdes.', 74.99, 'AFC', NULL),
('LITHOR12', 'LITHORINE', 'Lithium', 'Ce médicament est indiqué dans la prévention des psychoses maniaco-dépressives ou pour traiter les états maniaques.', 'Ce médicament ne doit pas être utilisé si vous êtes allergique au lithium. Avant de prendre ce traitement, signalez à  votre médecin traitant si vous souffrez d\'insuffisance rénale, ou si vous avez un régime sans sel.', 84.99, 'AP', NULL),
('PARMOL16', 'PARMOCODEINE', 'Codéine + Paracétamol', 'Ce médicament est utilisé pour le traitement des douleurs lorsque des antalgiques simples ne sont pas assez efficaces.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, chez l\'enfant de moins de 15 Kg, en cas d\'insuffisance hépatique ou respiratoire, d\'asthme, de phénylcétonurie et chez la femme qui allaite.', 54.99, 'AA', NULL),
('PHYSOI8', 'PHYSICOR', 'Sulbutiamine', 'Ce médicament est utilisé pour traiter les baisses d\'activité physique ou psychique, souvent dans un contexte de dépression.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants.', 67.99, 'PSA', NULL),
('PIRIZ8', 'PIRIZAN', 'Pyrazinamide', 'Ce médicament est utilisé, en association à  d\'autres antibiotiques, pour traiter la tuberculose.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants, d\'insuffisance rénale ou hépatique, d\'hyperuricémie ou de porphyrie.', 72.99, 'ABA', NULL),
('POMDI20', 'POMADINE', 'Bacitracine', 'Ce médicament est utilisé pour traiter les infections oculaires de la surface de l\'oeil.', 'Ce médicament est contre-indiqué en cas d\'allergie aux antibiotiques appliqués localement.', 46.99, 'AO', NULL),
('TROXT21', 'TROXADET', 'Paroxétine', 'Ce médicament est utilisé pour traiter la dépression et les troubles obsessionnels compulsifs. Il peut également être utilisé en prévention des crises de panique avec ou sans agoraphobie.', 'Ce médicament est contre-indiqué en cas d\'allergie au produit.', 37.99, 'AIN', NULL),
('TXISOL22', 'TOUXISOL Vitamine C', 'Tyrothricine + Acide ascorbique (Vitamine C)', 'Ce médicament est utilisé pour traiter les affections de la bouche et de la gorge.', 'Ce médicament est contre-indiqué en cas d\'allergie à  l\'un des constituants et chez l\'enfant de moins de 6 ans.', 57.99, 'ALO', NULL),
('URIEG6', 'URIREGUL', 'Fosfomycine trométamol', 'Ce médicament est utilisé pour traiter les infections urinaires simples chez la femme de moins de 65 ans.', 'La prise de ce médicament est contre-indiquée en cas d\'allergie à  l\'un des constituants et d\'insuffisance rénale.', 42.99, 'AUM', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `motifs`
--

DROP TABLE IF EXISTS `motifs`;
CREATE TABLE IF NOT EXISTS `motifs` (
  `MOT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MOT_LIBELLE` varchar(255) NOT NULL,
  PRIMARY KEY (`MOT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `motifs`
--

INSERT INTO `motifs` (`MOT_ID`, `MOT_LIBELLE`) VALUES
(1, 'Périodicité'),
(2, 'Nouveautés / Actualisations'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

DROP TABLE IF EXISTS `offrir`;
CREATE TABLE IF NOT EXISTS `offrir` (
  `COL_MATRICULE` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `MED_DEPOTLEGAL` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `OFF_QTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`COL_MATRICULE`,`RAP_NUM`,`MED_DEPOTLEGAL`),
  KEY `MED_DEPOTLEGAL` (`MED_DEPOTLEGAL`),
  KEY `COL_MATRICULE` (`COL_MATRICULE`,`RAP_NUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `offrir`
--

INSERT INTO `offrir` (`COL_MATRICULE`, `RAP_NUM`, `MED_DEPOTLEGAL`, `OFF_QTE`) VALUES
('a55', 1, 'BACTIV13', 3),
('a55', 1, 'DOLRIL7', 1),
('t60', 11, 'ADIMOL9', 4),
('t60', 11, 'BACTIG10', 5),
('t60', 11, 'DORNOM8', 1),
('t60', 11, 'INSXT5', 3);

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `PRA_NUM` int(11) NOT NULL,
  `SPE_CODE` varchar(5) NOT NULL,
  `POS_DIPLOME` varchar(10) DEFAULT NULL,
  `POS_COEFPRESCRIPTION` float DEFAULT NULL,
  PRIMARY KEY (`PRA_NUM`,`SPE_CODE`),
  KEY `PRA_NUM` (`PRA_NUM`),
  KEY `SPE_CODE` (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
CREATE TABLE IF NOT EXISTS `praticien` (
  `PRA_NUM` int(11) NOT NULL,
  `PRA_NOM` varchar(25) DEFAULT NULL,
  `PRA_PRENOM` varchar(30) DEFAULT NULL,
  `PRA_ADRESSE` varchar(50) DEFAULT NULL,
  `PRA_CP` varchar(5) DEFAULT NULL,
  `PRA_VILLE` varchar(25) DEFAULT NULL,
  `PRA_COEFNOTORIETE` float DEFAULT NULL,
  `TYP_CODE` varchar(3) NOT NULL,
  `PRA_COEFFCONFIANCE` float NOT NULL DEFAULT 0,
  `PRA_COEFPRESCRIPTION` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`PRA_NUM`),
  KEY `TYP_CODE` (`TYP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `praticien`
--

INSERT INTO `praticien` (`PRA_NUM`, `PRA_NOM`, `PRA_PRENOM`, `PRA_ADRESSE`, `PRA_CP`, `PRA_VILLE`, `PRA_COEFNOTORIETE`, `TYP_CODE`, `PRA_COEFFCONFIANCE`, `PRA_COEFPRESCRIPTION`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', '85000', 'LA ROCHE SUR YON', 290.03, 'MH', 0, 0),
(2, 'Gosselin', 'Albert', '13 r Devon', '41000', 'BLOIS', 307.49, 'MV', 0, 0),
(3, 'Delahaye', 'André', '36 av 6 Juin', '25000', 'BESANCON', 185.79, 'PS', 0, 0),
(4, 'Leroux', 'André', '47 av Robert Schuman', '60000', 'BEAUVAIS', 172.04, 'PH', 0, 0),
(5, 'Desmoulins', 'Anne', '31 r St Jean', '30000', 'NIMES', 94.75, 'PO', 0, 0),
(6, 'Mouel', 'Anne', '27 r Auvergne', '80000', 'AMIENS', 45.2, 'MH', 0, 0),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', '29000', 'MORLAIX', 20.07, 'MV', 0, 0),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', '68000', 'MULHOUSE', 396.52, 'PS', 0, 0),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', '34000', 'MONTPELLIER', 395.66, 'PH', 0, 0),
(10, 'Lerat', 'Bernard', '31 r St Jean', '59000', 'LILLE', 257.79, 'PO', 0, 0),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', '67000', 'STRASBOURG', 450.96, 'MH', 0, 0),
(12, 'Boscher', 'Bruno', '94 r Falaise', '10000', 'TROYES', 356.14, 'MV', 0, 0),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', '75000', 'PARIS', 379.57, 'PS', 0, 0),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', '45000', 'ORLEANS', 114.56, 'PH', 0, 0),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', '6000', 'NICE', 222.06, 'PO', 0, 0),
(16, 'Rossa', 'Claire', '14 av Thiès', '6000', 'NICE', 529.78, 'MH', 0, 0),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', '11000', 'NARBONNE', 458.82, 'MV', 0, 0),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', '35000', 'RENNES', 213.4, 'PS', 0, 0),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', '44000', 'NANTES', 175.89, 'PH', 0, 0),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', '87000', 'LIMOGES', 151.36, 'PO', 0, 0),
(21, 'Houchard', 'Eliane', '9 r Demolombe', '49100', 'ANGERS', 436.96, 'MH', 0, 0),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', '29000', 'QUIMPER', 281.17, 'MV', 0, 0),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', '35000', 'RENNES', 315.6, 'PS', 0, 0),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', '41000', 'BLOIS', 40.72, 'PH', 0, 0),
(25, 'Desprez', 'Eric', '9 r Vaucelles', '33000', 'BORDEAUX', 406.85, 'PO', 0, 0),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', '19000', 'TULLE', 441.87, 'MH', 0, 0),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', '55000', 'VERDUN', 573.63, 'MV', 0, 0),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', '56000', 'VANNES', 326.4, 'PS', 0, 0),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', '70000', 'VESOUL', 506.06, 'PH', 0, 0),
(30, 'Marie', 'Frédérique', '172 r Caponière', '70000', 'VESOUL', 313.31, 'PO', 0, 0),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', '75000', 'PARIS', 366.82, 'MH', 0, 0),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', '86000', 'POITIERS', 265.58, 'MV', 0, 0),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', '64000', 'PAU', 184.97, 'PS', 0, 0),
(34, 'Blanchais', 'Guy', '30 r Authie', '8000', 'SEDAN', 502.48, 'PH', 0, 0),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', '62000', 'ARRAS', 7.39, 'PO', 0, 0),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', '76000', 'ROUEN', 77.1, 'MH', 0, 0),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', '38100', 'VIENNE', 92.62, 'MV', 0, 0),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', '69000', 'LYON', 120.1, 'PS', 0, 0),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', '71000', 'CHALON SUR SAONE', 13.73, 'PH', 0, 0),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', '28000', 'CHARTRES', 550.69, 'PO', 0, 0),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', '2000', 'LAON', 5.59, 'MH', 0, 0),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', '14000', 'CAEN', 396.58, 'MV', 0, 0),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', '18000', 'BOURGES', 340.35, 'PS', 0, 0),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', '29000', 'BREST', 71.76, 'PH', 0, 0),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', '79000', 'NIORT', 451.61, 'PO', 0, 0),
(46, 'Riou', 'Line', '43 bd Gén Vanier', '77000', 'MARNE LA VALLEE', 193.25, 'MH', 0, 0),
(47, 'Chubilleau', 'Louis', '46 r Eglise', '17000', 'SAINTES', 202.07, 'MV', 0, 0),
(48, 'Lebrun', 'Lucette', '178 r Auge', '54000', 'NANCY', 410.41, 'PS', 0, 0),
(49, 'Goessens', 'Marc', '6 av 6 Juin', '39000', 'DOLE', 548.57, 'PH', 0, 0),
(50, 'Laforge', 'Marc', '5 résid Prairie', '50000', 'SAINT LO', 265.05, 'PO', 0, 0),
(51, 'Millereau', 'Marc', '36 av 6 Juin', '72000', 'LA FERTE BERNARD', 430.42, 'MH', 0, 0),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', '21000', 'DIJON', 281.05, 'MV', 0, 0),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', '94000', 'BOISSY SAINT LEGER', 356.23, 'PS', 0, 0),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', '52000', 'CHAUMONT', 107, 'PH', 0, 0),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', '86000', 'CHATELLEREAULT', 369.94, 'PO', 0, 0),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', '15000', 'AURRILLAC', 290.75, 'MH', 0, 0),
(57, 'Robert', 'Pascal', '31 r St Jean', '93000', 'BOBIGNY', 162.41, 'MV', 0, 0),
(58, 'Jean', 'Pascale', '114 r Authie', '49100', 'SAUMUR', 375.52, 'PS', 0, 0),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', '13000', 'MARSEILLE', 478.01, 'PH', 0, 0),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', '54000', 'NANCY', 239.66, 'PO', 0, 0),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', '37000', 'TOURS', 599.06, 'MH', 0, 0),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', '74000', 'ANNECY', 458.42, 'MV', 0, 0),
(63, 'Boireaux', 'Philippe', '14 av Thiès', '10000', 'CHALON EN CHAMPAGNE', 454.48, 'PS', 0, 0),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', '12000', 'RODEZ', 164.16, 'PH', 0, 0),
(65, 'Duhamel', 'Philippe', '114 r Authie', '34000', 'MONTPELLIER', 98.62, 'PO', 0, 0),
(66, 'Grigy', 'Philippe', '15 r Mélingue', '44000', 'CLISSON', 285.1, 'MH', 0, 0),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', '81000', 'ALBI', 486.3, 'MV', 0, 0),
(68, 'Lozier', 'Philippe', '8 r Gaillon', '31000', 'TOULOUSE', 48.4, 'PS', 0, 0),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', '23000', 'MONTLUCON', 253.75, 'PH', 0, 0),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', '40000', 'MONT DE MARSAN', 426.19, 'PO', 0, 0),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', '57000', 'METZ', 118.7, 'MH', 0, 0),
(72, 'Née', 'Pierre', '39 av 6 Juin', '82000', 'MONTAUBAN', 72.54, 'MV', 0, 0),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', '48000', 'MENDE', 352.31, 'PS', 0, 0),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', '13000', 'MARSEILLE', 552.19, 'PH', 0, 0),
(75, 'Mabire', 'Roland', '11 r Boutiques', '67000', 'STRASBOURG', 422.39, 'PO', 0, 0),
(76, 'Leroy', 'Soazig', '45 r Boutiques', '61000', 'ALENCON', 570.67, 'MH', 0, 0),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', '46000', 'FIGEAC', 28.85, 'MV', 0, 0),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', '27000', 'DREUX', 292.01, 'PS', 0, 0),
(79, 'Rault', 'Sylvie', '15 bd Richemond', '2000', 'SOISSON', 526.6, 'PH', 0, 0),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', '88000', 'EPINAL', 425.24, 'PO', 0, 0),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', '7000', 'PRIVAS', 451.31, 'MH', 0, 0),
(82, 'Bayard', 'Thierry', '92 r Falaise', '42000', 'SAINT ETIENNE', 271.71, 'MV', 0, 0),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', '38100', 'GRENOBLE', 406.1, 'PS', 0, 0),
(84, 'Bobichon', 'Tristan', '219 r Caponière', '9000', 'FOIX', 218.36, 'PH', 0, 0),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', '33000', 'LIBOURNE', 265.61, 'PO', 0, 0),
(86, 'Laurent', 'Younès', '34 r Demolombe', '53000', 'MAYENNE', 496.1, 'MH', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `prescrire`
--

DROP TABLE IF EXISTS `prescrire`;
CREATE TABLE IF NOT EXISTS `prescrire` (
  `TIN_CODE` varchar(5) COLLATE utf8mb3_bin NOT NULL,
  `DOS_CODE` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `MED_DEPOTLEGAL` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `PRE_POSOLOGIE` varchar(50) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`TIN_CODE`,`DOS_CODE`,`MED_DEPOTLEGAL`),
  KEY `FK_prescrire_dosage` (`DOS_CODE`),
  KEY `FK_prescrire_medicament` (`MED_DEPOTLEGAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `presentation`
--

DROP TABLE IF EXISTS `presentation`;
CREATE TABLE IF NOT EXISTS `presentation` (
  `PRE_CODE` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `PRE_LIBELLE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PRE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `rapport_visite`
--

DROP TABLE IF EXISTS `rapport_visite`;
CREATE TABLE IF NOT EXISTS `rapport_visite` (
  `COL_MATRICULE` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `RAP_NUM` int(11) NOT NULL,
  `PRA_NUM` int(11) NOT NULL,
  `RAP_DATEVISITE` date DEFAULT NULL,
  `RAP_BILAN` varchar(255) DEFAULT NULL,
  `RAP_MOTIFAUTRE` varchar(255) DEFAULT NULL,
  `RAP_DATESAISIE` date NOT NULL,
  `MOT_ID` int(11) NOT NULL,
  `PRA_NUM_REMP` int(11) DEFAULT NULL,
  `MED_DEPOTLEGAL_1` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `MED_DEPOTLEGAL_2` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `STATUS` char(1) NOT NULL,
  `RAP_ETAT` char(1) DEFAULT NULL,
  PRIMARY KEY (`COL_MATRICULE`,`RAP_NUM`),
  KEY `PRA_NUM` (`PRA_NUM`),
  KEY `COL_MATRICULE` (`COL_MATRICULE`),
  KEY `FK_rapport_visite_praticien_remp` (`PRA_NUM_REMP`),
  KEY `FK_rapport_visite_medicament` (`MED_DEPOTLEGAL_1`),
  KEY `FK_rapport_visite_medicament2` (`MED_DEPOTLEGAL_2`),
  KEY `FK_rapport_visite_motif` (`MOT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `rapport_visite`
--

INSERT INTO `rapport_visite` (`COL_MATRICULE`, `RAP_NUM`, `PRA_NUM`, `RAP_DATEVISITE`, `RAP_BILAN`, `RAP_MOTIFAUTRE`, `RAP_DATESAISIE`, `MOT_ID`, `PRA_NUM_REMP`, `MED_DEPOTLEGAL_1`, `MED_DEPOTLEGAL_2`, `STATUS`, `RAP_ETAT`) VALUES
('a131', 3, 23, '2002-04-18', 'Médecin curieux, à recontacer en décembre pour réunion', 'Actualisation annuelle', '2022-10-12', 3, NULL, NULL, NULL, 'D', 'N'),
('a131', 7, 41, '2003-03-23', 'RAS\r\nChangement de tel : 05 89 89 89 89', 'Rapport Annuel', '2022-10-12', 3, NULL, NULL, NULL, 'D', 'N'),
('a17', 4, 4, '2003-05-21', 'Changement de direction, redéfinition de la politique médicamenteuse, recours au générique', 'Baisse activité', '2022-10-12', 3, NULL, NULL, NULL, 'D', 'N'),
('a55', 1, 8, '2023-04-12', NULL, 'test', '2023-04-12', 3, NULL, 'BACTIV13', 'DOLRIL7', 'D', NULL),
('t60', 5, 52, '2022-11-29', 'RAS', NULL, '2022-11-30', 1, NULL, 'BITALV', NULL, 'D', 'N'),
('t60', 6, 52, '2022-11-29', 'RAS doublon', NULL, '2022-11-30', 1, NULL, 'BITALV', NULL, 'D', 'N'),
('t60', 7, 8, NULL, NULL, NULL, '2022-12-07', 2, NULL, NULL, NULL, 'A', 'N'),
('t60', 8, 38, '2023-01-09', NULL, 'Baisse activité', '2023-01-10', 3, NULL, NULL, NULL, 'A', 'N'),
('t60', 9, 9, '2023-04-12', 'ras', 'test', '2023-04-12', 3, NULL, 'BITALV', NULL, 'A', 'N'),
('t60', 10, 37, '2023-04-12', 'ras', 'test', '2023-04-12', 3, NULL, 'DORNOM8', 'APATOUX22', 'D', 'N'),
('t60', 11, 70, '2023-04-12', 'SUPER', 'qsdfghjklmù', '2023-04-12', 3, NULL, 'BACTIV13', 'TXISOL22', 'D', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `REG_CODE` varchar(2) COLLATE utf8mb3_bin NOT NULL,
  `REG_NOM` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  `SEC_CODE` varchar(1) COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`REG_CODE`),
  KEY `region_secteur0_FK` (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`REG_CODE`, `REG_NOM`, `SEC_CODE`) VALUES
('AL', 'Alsace Lorraine', 'E'),
('AQ', 'Aquitaine', 'S'),
('AU', 'Auvergne', 'P'),
('BG', 'Bretagne', 'O'),
('BN', 'Basse Normandie', 'O'),
('BO', 'Bourgogne', 'E'),
('CA', 'Champagne Ardennes', 'N'),
('CE', 'Centre', 'P'),
('FC', 'Franche Comté', 'E'),
('HN', 'Haute Normandie', 'N'),
('IF', 'Ile de France', 'P'),
('LG', 'Languedoc', 'S'),
('LI', 'Limousin', 'P'),
('MP', 'Midi Pyrénée', 'S'),
('NP', 'Nord Pas de Calais', 'N'),
('PA', 'Provence Alpes Cote d\'Azur', 'S'),
('PC', 'Poitou Charente', 'O'),
('PI', 'Picardie', 'N'),
('PL', 'Pays de Loire', 'O'),
('RA', 'Rhone Alpes', 'E'),
('RO', 'Roussilon', 'S'),
('VD', 'Vendée', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `SEC_CODE` varchar(1) COLLATE utf8mb3_bin NOT NULL,
  `SEC_LIBELLE` varchar(15) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`SEC_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`SEC_CODE`, `SEC_LIBELLE`) VALUES
('E', 'Est'),
('N', 'Nord'),
('O', 'Ouest'),
('P', 'Paris centre'),
('S', 'Sud');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `SPE_CODE` varchar(5) NOT NULL,
  `SPE_LIBELLE` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`SPE_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`SPE_CODE`, `SPE_LIBELLE`) VALUES
('ACP', 'anatomie et cytologie pathologiques'),
('AMV', 'angéiologie, médecine vasculaire'),
('ARC', 'anesthésiologie et réanimation chirurgicale'),
('BM', 'biologie médicale'),
('CAC', 'cardiologie et affections cardio-vasculaires'),
('CCT', 'chirurgie cardio-vasculaire et thoracique'),
('CG', 'chirurgie générale'),
('CMF', 'chirurgie maxillo-faciale'),
('COM', 'cancérologie, oncologie médicale'),
('COT', 'chirurgie orthopédique et traumatologie'),
('CPR', 'chirurgie plastique reconstructrice et esthétique'),
('CU', 'chirurgie urologique'),
('CV', 'chirurgie vasculaire'),
('DN', 'diabétologie-nutrition, nutrition'),
('DV', 'dermatologie et vénéréologie'),
('EM', 'endocrinologie et métabolismes'),
('ETD', 'évaluation et traitement de la douleur'),
('GEH', 'gastro-entérologie et hépatologie (appareil digestif)'),
('GMO', 'gynécologie médicale, obstétrique'),
('GO', 'gynécologie-obstétrique'),
('HEM', 'maladies du sang (hématologie)'),
('MBS', 'médecine et biologie du sport'),
('MDT', 'médecine du travail'),
('MMO', 'médecine manuelle - ostéopathie'),
('MN', 'médecine nucléaire'),
('MPR', 'médecine physique et de réadaptation'),
('MTR', 'médecine tropicale, pathologie infectieuse et tropicale'),
('NEP', 'néphrologie'),
('NRC', 'neurochirurgie'),
('NRL', 'neurologie'),
('ODM', 'orthopédie dento maxillo-faciale'),
('OPH', 'ophtalmologie'),
('ORL', 'oto-rhino-laryngologie'),
('PEA', 'psychiatrie de l\'enfant et de l\'adolescent'),
('PME', 'pédiatrie maladies des enfants'),
('PNM', 'pneumologie'),
('PSC', 'psychiatrie'),
('RAD', 'radiologie (radiodiagnostic et imagerie médicale)'),
('RDT', 'radiothérapie (oncologie option radiothérapie)'),
('RGM', 'reproduction et gynécologie médicale'),
('RHU', 'rhumatologie'),
('STO', 'stomatologie'),
('SXL', 'sexologie'),
('TXA', 'toxicomanie et alcoologie');

-- --------------------------------------------------------

--
-- Structure de la table `travailler`
--

DROP TABLE IF EXISTS `travailler`;
CREATE TABLE IF NOT EXISTS `travailler` (
  `COL_MATRICULE` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `REG_CODE` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `TRA_ROLE` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`COL_MATRICULE`,`REG_CODE`),
  KEY `COL_MATRICULE` (`COL_MATRICULE`),
  KEY `REG_CODE` (`REG_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `travailler`
--

INSERT INTO `travailler` (`COL_MATRICULE`, `REG_CODE`, `TRA_ROLE`) VALUES
('a131', 'BN', 'COLLABORATEUR'),
('a17', 'RA', 'COLLABORATEUR'),
('a55', 'MP', 'COLLABORATEUR'),
('a93', 'PC', 'COLLABORATEUR'),
('b13', 'AL', 'COLLABORATEUR'),
('b16', 'BG', 'COLLABORATEUR'),
('b19', 'PL', 'COLLABORATEUR'),
('b28', 'LG', 'COLLABORATEUR'),
('b34', 'CE', 'Délégué'),
('b4', 'AQ', 'COLLABORATEUR'),
('b50', 'PA', 'COLLABORATEUR'),
('b59', 'RA', 'COLLABORATEUR'),
('c14', 'PA', 'COLLABORATEUR'),
('c3', 'CA', 'COLLABORATEUR'),
('c54', 'AL', 'COLLABORATEUR'),
('d13', 'PL', 'COLLABORATEUR'),
('d51', 'FC', 'Délégué'),
('e22', 'AL', 'COLLABORATEUR'),
('e24', 'AL', 'Délégué'),
('e39', 'IF', 'COLLABORATEUR'),
('e49', 'MP', 'COLLABORATEUR'),
('e5', 'AQ', 'Responsable'),
('e52', 'HN', 'COLLABORATEUR'),
('f21', 'RA', 'COLLABORATEUR'),
('f39', 'RA', 'COLLABORATEUR'),
('f4', 'MP', 'COLLABORATEUR'),
('g19', 'IF', 'COLLABORATEUR'),
('g30', 'PI', 'Délégué'),
('g53', 'BG', 'COLLABORATEUR'),
('g7', 'LI', 'COLLABORATEUR'),
('h13', 'LI', 'COLLABORATEUR'),
('h30', 'IF', 'COLLABORATEUR'),
('h35', 'AU', 'COLLABORATEUR'),
('h40', 'CA', 'COLLABORATEUR'),
('j45', 'CA', 'Responsable'),
('j50', 'NP', 'COLLABORATEUR'),
('j8', 'IF', 'Responsable'),
('k4', 'LG', 'COLLABORATEUR'),
('k53', 'AL', 'Délégué'),
('l14', 'PL', 'COLLABORATEUR'),
('l23', 'PC', 'COLLABORATEUR'),
('l46', 'PL', 'COLLABORATEUR'),
('l56', 'FC', 'COLLABORATEUR'),
('m35', 'MP', 'COLLABORATEUR'),
('m45', 'AL', 'Délégué'),
('n42', 'HN', 'COLLABORATEUR'),
('n58', 'CE', 'COLLABORATEUR'),
('n59', 'PI', 'COLLABORATEUR'),
('o26', 'LG', 'COLLABORATEUR'),
('p32', 'IF', 'COLLABORATEUR'),
('p40', 'BN', 'Responsable'),
('p41', 'PC', 'COLLABORATEUR'),
('p42', 'PI', 'COLLABORATEUR'),
('p49', 'CE', 'COLLABORATEUR'),
('p7', 'RO', 'COLLABORATEUR'),
('p8', 'BO', 'COLLABORATEUR'),
('q17', 'BN', 'COLLABORATEUR'),
('r24', 'BN', 'Responsable'),
('r58', 'BG', 'COLLABORATEUR'),
('s10', 'FC', 'COLLABORATEUR'),
('s21', 'LI', 'COLLABORATEUR'),
('t43', 'BO', 'COLLABORATEUR'),
('t47', 'PI', 'COLLABORATEUR'),
('t55', 'MP', 'COLLABORATEUR'),
('t60', 'CE', 'COLLABORATEUR');

-- --------------------------------------------------------

--
-- Structure de la table `type_individu`
--

DROP TABLE IF EXISTS `type_individu`;
CREATE TABLE IF NOT EXISTS `type_individu` (
  `TIN_CODE` varchar(5) COLLATE utf8mb3_bin NOT NULL,
  `TIN_LIBELLE` varchar(50) COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`TIN_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- --------------------------------------------------------

--
-- Structure de la table `type_praticien`
--

DROP TABLE IF EXISTS `type_praticien`;
CREATE TABLE IF NOT EXISTS `type_praticien` (
  `TYP_CODE` varchar(3) NOT NULL,
  `TYP_LIBELLE` varchar(25) DEFAULT NULL,
  `TYP_LIEU` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`TYP_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `type_praticien`
--

INSERT INTO `type_praticien` (`TYP_CODE`, `TYP_LIBELLE`, `TYP_LIEU`) VALUES
('MH', 'Médecin Hospitalier', 'Hopital ou clinique'),
('MV', 'Médecine de Ville', 'Cabinet'),
('PH', 'Pharmacien Hospitalier', 'Hopital ou clinique'),
('PO', 'Pharmacien Officine', 'Pharmacie'),
('PS', 'Personnel de santé', 'Centre paramédical');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collaborateur`
--
ALTER TABLE `collaborateur`
  ADD CONSTRAINT `FK_collaborateur_habilitation` FOREIGN KEY (`HAB_ID`) REFERENCES `habilitation` (`HAB_ID`),
  ADD CONSTRAINT `FK_collaborateur_login` FOREIGN KEY (`LOG_ID`) REFERENCES `login` (`LOG_ID`),
  ADD CONSTRAINT `FK_collaborateur_secteur` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`);

--
-- Contraintes pour la table `formuler`
--
ALTER TABLE `formuler`
  ADD CONSTRAINT `FORMULER_medicament0_FK` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `interagir`
--
ALTER TABLE `interagir`
  ADD CONSTRAINT `FK_interagir_medicament_perturbateur` FOREIGN KEY (`MED_DEPOTLEGAL_perturbateur`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FK_interagir_medicament_perturbe` FOREIGN KEY (`MED_DEPOTLEGAL_perturbe`) REFERENCES `medicament` (`MED_DEPOTLEGAL`);

--
-- Contraintes pour la table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_collaborateur0_FK` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`);

--
-- Contraintes pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD CONSTRAINT `FK_medicament_presentation` FOREIGN KEY (`PRE_CODE`) REFERENCES `presentation` (`PRE_CODE`),
  ADD CONSTRAINT `medicament_famille0_FK` FOREIGN KEY (`FAM_CODE`) REFERENCES `famille` (`FAM_CODE`);

--
-- Contraintes pour la table `offrir`
--
ALTER TABLE `offrir`
  ADD CONSTRAINT `FK_offrir_medicament` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FK_offrir_rapport_visite` FOREIGN KEY (`COL_MATRICULE`,`RAP_NUM`) REFERENCES `rapport_visite` (`COL_MATRICULE`, `RAP_NUM`);

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `FK_posseder_praticien` FOREIGN KEY (`PRA_NUM`) REFERENCES `praticien` (`PRA_NUM`),
  ADD CONSTRAINT `FK_posseder_specialite` FOREIGN KEY (`SPE_CODE`) REFERENCES `specialite` (`SPE_CODE`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `FK_praticien_type_praticien` FOREIGN KEY (`TYP_CODE`) REFERENCES `type_praticien` (`TYP_CODE`);

--
-- Contraintes pour la table `prescrire`
--
ALTER TABLE `prescrire`
  ADD CONSTRAINT `FK_prescrire_dosage` FOREIGN KEY (`DOS_CODE`) REFERENCES `dosage` (`DOS_CODE`),
  ADD CONSTRAINT `FK_prescrire_medicament` FOREIGN KEY (`MED_DEPOTLEGAL`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FK_prescrire_type_individu` FOREIGN KEY (`TIN_CODE`) REFERENCES `type_individu` (`TIN_CODE`);

--
-- Contraintes pour la table `rapport_visite`
--
ALTER TABLE `rapport_visite`
  ADD CONSTRAINT `FK_rapport_visite_collaborateur` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`),
  ADD CONSTRAINT `FK_rapport_visite_medicament` FOREIGN KEY (`MED_DEPOTLEGAL_1`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FK_rapport_visite_medicament2` FOREIGN KEY (`MED_DEPOTLEGAL_2`) REFERENCES `medicament` (`MED_DEPOTLEGAL`),
  ADD CONSTRAINT `FK_rapport_visite_motif` FOREIGN KEY (`MOT_ID`) REFERENCES `motifs` (`MOT_ID`),
  ADD CONSTRAINT `FK_rapport_visite_praticien` FOREIGN KEY (`PRA_NUM`) REFERENCES `praticien` (`PRA_NUM`),
  ADD CONSTRAINT `FK_rapport_visite_praticien_remp` FOREIGN KEY (`PRA_NUM_REMP`) REFERENCES `praticien` (`PRA_NUM`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `FK_region_secteur` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`),
  ADD CONSTRAINT `region_secteur0_FK` FOREIGN KEY (`SEC_CODE`) REFERENCES `secteur` (`SEC_CODE`);

--
-- Contraintes pour la table `travailler`
--
ALTER TABLE `travailler`
  ADD CONSTRAINT `FK_travailler_collaborateur` FOREIGN KEY (`COL_MATRICULE`) REFERENCES `collaborateur` (`COL_MATRICULE`),
  ADD CONSTRAINT `FK_travailler_region` FOREIGN KEY (`REG_CODE`) REFERENCES `region` (`REG_CODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
