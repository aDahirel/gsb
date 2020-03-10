-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 10 mars 2020 à 11:24
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `gsbv6`
--

-- --------------------------------------------------------

--
-- Structure de la table `Etat`
--

CREATE TABLE `Etat` (
  `id` varchar(2) NOT NULL,
  `libelle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Etat`
--

INSERT INTO `Etat` (`id`, `libelle`) VALUES
('CL', 'Saisie clôturée'),
('CR', 'Fiche créée, saisie en cours'),
('RB', 'Remboursée'),
('VA', 'Validée et mise en paiement');

-- --------------------------------------------------------

--
-- Structure de la table `FicheFrais`
--

CREATE TABLE `FicheFrais` (
  `idVisiteur` varchar(4) NOT NULL,
  `mois` varchar(20) NOT NULL,
  `nbJustificatifs` int(255) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` varchar(4) NOT NULL,
  `forfaitEtape` int(6) DEFAULT NULL,
  `fraisKm` int(6) DEFAULT NULL,
  `nuiteHotel` int(6) DEFAULT NULL,
  `restaurant` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FicheFrais`
--

INSERT INTO `FicheFrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `dateModif`, `idEtat`, `forfaitEtape`, `fraisKm`, `nuiteHotel`, `restaurant`) VALUES
('a131', 'Janvier', 3, '2020-03-10', 'CR', 35, 35, 35, 35);

-- --------------------------------------------------------

--
-- Structure de la table `FraisForfait`
--

CREATE TABLE `FraisForfait` (
  `id` varchar(3) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `montant` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FraisForfait`
--

INSERT INTO `FraisForfait` (`id`, `libelle`, `montant`) VALUES
('ETP', 'Forfait Etape', 110.00),
('KM', 'Frais Kilométrique', 0.62),
('NUI', 'Nuitée Hôtel', 80.00),
('REP', 'Repas Restaurant', 25.00);

-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisForfait`
--

CREATE TABLE `LigneFraisForfait` (
  `idVisiteur` varchar(4) NOT NULL,
  `mois` varchar(20) NOT NULL,
  `idFraisForfait` varchar(255) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `LigneFraisHorsForfait`
--

CREATE TABLE `LigneFraisHorsForfait` (
  `id` varchar(4) NOT NULL,
  `idVisiteur` varchar(4) NOT NULL,
  `mois` varchar(20) DEFAULT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `dateFHF` date DEFAULT NULL,
  `montant` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Visiteur`
--

CREATE TABLE `Visiteur` (
  `id` varchar(4) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `dateEmbauche` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Visiteur`
--

INSERT INTO `Visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`) VALUES
('a131', 'Villechalane', 'Louis', 'kilian', '1234', '8 rue des Charmes', 46000, 'Cahors', '2005-12-21'),
('a17', 'Andre', 'David', 'dandre', 'oppg5', '1 rue Petit', 46200, 'Lalbenque', '1998-11-23'),
('a55', 'Bedos', 'Christian', 'cbedos', 'gmhxd', '1 rue Peranud', 46250, 'Montcuq', '1995-01-12'),
('a93', 'Tusseau', 'Louis', 'ltusseau', 'ktp3s', '22 rue des Ternes', 46123, 'Gramat', '2000-05-01'),
('b13', 'Bentot', 'Pascal', 'pbentot', 'doyw1', '11 allée des Cerises', 46512, 'Bessines', '1992-07-09'),
('b16', 'Bioret', 'Luc', 'lbioret', 'hrjfs', '1 Avenue gambetta', 46000, 'Cahors', '1998-05-11'),
('b19', 'Bunisset', 'Francis', 'fbunisset', '4vbnd', '10 rue des Perles', 93100, 'Montreuil', '1987-10-21'),
('b25', 'Bunisset', 'Denise', 'dbunisset', 's1y1r', '23 rue Manin', 75019, 'paris', '2010-12-05'),
('b28', 'Cacheux', 'Bernard', 'bcacheux', 'uf7r3', '114 rue Blanche', 75017, 'Paris', '2009-11-12'),
('b34', 'Cadic', 'Eric', 'ecadic', '6u8dc', '123 avenue de la République', 75011, 'Paris', '2008-09-23'),
('b4', 'Charoze', 'Catherine', 'ccharoze', 'u817o', '100 rue Petit', 75019, 'Paris', '2005-11-12'),
('b50', 'Clepkens', 'Christophe', 'cclepkens', 'bw1us', '12 allée des Anges', 93230, 'Romainville', '2003-08-11'),
('b59', 'Cottin', 'Vincenne', 'vcottin', '2hoh9', '36 rue Des Roches', 93100, 'Monteuil', '2001-11-18'),
('c14', 'Daburon', 'François', 'fdaburon', '7oqpv', '13 rue de Chanzy', 94000, 'Créteil', '2002-02-11'),
('c3', 'De', 'Philippe', 'pde', 'gk9kx', '13 rue Barthes', 94000, 'Créteil', '2010-12-14'),
('c54', 'Debelle', 'Michel', 'mdebelle', 'od5rt', '181 avenue Barbusse', 93210, 'Rosny', '2006-11-23'),
('d13', 'Debelle', 'Jeanne', 'jdebelle', 'nvwqq', '134 allée des Joncs', 44000, 'Nantes', '2000-05-11'),
('d51', 'Debroise', 'Michel', 'mdebroise', 'sghkb', '2 Bld Jourdain', 44000, 'Nantes', '2001-04-17'),
('e22', 'Desmarquest', 'Nathalie', 'ndesmarquest', 'f1fob', '14 Place d Arc', 45000, 'Orléans', '2005-11-12'),
('e24', 'Desnost', 'Pierre', 'pdesnost', '4k2o5', '16 avenue des Cèdres', 23200, 'Guéret', '2001-02-05'),
('e39', 'Dudouit', 'Frédéric', 'fdudouit', '44im8', '18 rue de l église', 23120, 'GrandBourg', '2000-08-01'),
('e49', 'Duncombe', 'Claude', 'cduncombe', 'qf77j', '19 rue de la tour', 23100, 'La souteraine', '1987-10-10'),
('e5', 'Enault-Pascreau', 'Céline', 'cenault', 'y2qdu', '25 place de la gare', 23200, 'Gueret', '1995-09-01'),
('e52', 'Eynde', 'Valérie', 'veynde', 'i7sn3', '3 Grand Place', 13015, 'Marseille', '1999-11-01'),
('f21', 'Finck', 'Jacques', 'jfinck', 'mpb3t', '10 avenue du Prado', 13002, 'Marseille', '2001-11-10'),
('f39', 'Frémont', 'Fernande', 'ffremont', 'xs5tq', '4 route de la mer', 13012, 'Allauh', '1998-10-01'),
('f4', 'Gest', 'Alain', 'agest', 'dywvt', '30 avenue de la mer', 13025, 'Berre', '1985-11-01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Etat`
--
ALTER TABLE `Etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `FicheFrais`
--
ALTER TABLE `FicheFrais`
  ADD PRIMARY KEY (`idVisiteur`,`mois`),
  ADD KEY `idEtat` (`idEtat`);

--
-- Index pour la table `FraisForfait`
--
ALTER TABLE `FraisForfait`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `LigneFraisForfait`
--
ALTER TABLE `LigneFraisForfait`
  ADD PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  ADD KEY `idFraisForfait` (`idFraisForfait`);

--
-- Index pour la table `LigneFraisHorsForfait`
--
ALTER TABLE `LigneFraisHorsForfait`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVisiteur` (`idVisiteur`,`mois`);

--
-- Index pour la table `Visiteur`
--
ALTER TABLE `Visiteur`
  ADD PRIMARY KEY (`id`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `FicheFrais`
--
ALTER TABLE `FicheFrais`
  ADD CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `Etat` (`id`),
  ADD CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `Visiteur` (`id`);

--
-- Contraintes pour la table `LigneFraisForfait`
--
ALTER TABLE `LigneFraisForfait`
  ADD CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`),
  ADD CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `FraisForfait` (`id`);

--
-- Contraintes pour la table `LigneFraisHorsForfait`
--
ALTER TABLE `LigneFraisHorsForfait`
  ADD CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idVisiteur`,`mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`);
