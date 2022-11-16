-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 nov. 2022 à 23:32
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hackathon_victor`
--

-- --------------------------------------------------------

--
-- Structure de la table `challenge`
--

DROP TABLE IF EXISTS `challenge`;
CREATE TABLE IF NOT EXISTS `challenge` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `difficulte` varchar(50) NOT NULL,
  `nbPoints` int(11) NOT NULL,
  `niveau` int(11) NOT NULL,
  `thematique` varchar(50) NOT NULL,
  `contenu` text NOT NULL,
  `auteurs` varchar(50) NOT NULL,
  `mailAuteur` varchar(50) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `challenge`
--

INSERT INTO `challenge` (`numero`, `libelle`, `url`, `flag`, `categorie`, `difficulte`, `nbPoints`, `niveau`, `thematique`, `contenu`, `auteurs`, `mailAuteur`) VALUES
(1, 'Challenge 1', 'http://challenge1.com', 'flag1', 'Web', 'Facile', 10, 1, 'Thematique 1', '        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque recusandae dolores voluptatum numquam totam expedita voluptas consectetur architecto cupiditate? Blanditiis laborum facere porro commodi numquam consectetur magni sequi dicta ex sapiente pariatur voluptas ipsum rem qui repellat, delectus nulla eveniet eligendi sunt, aliquid sit suscipit! Illo ut eius hic dignissimos quasi, cum, ipsam, amet corrupti vitae provident nisi expedita? Qui delectus dolorum autem aliquam praesentium omnis molestias, quis optio enim in quasi eius esse dolore nisi libero consectetur, nostrum recusandae iste minus at necessitatibus eveniet nam. Reiciendis id aperiam laborum mollitia modi omnis exercitationem dicta, blanditiis quos sequi suscipit vero, magnam, odit expedita. Magnam nisi laborum dolorum nihil numquam quasi molestias ea sit assumenda enim, ipsum magni sunt in perferendis, cum, aut dicta aliquam iste fuga molestiae ex. Blanditiis ab quasi officia provident atque libero quisquam nihil magni aspernatur expedita, rem debitis magnam recusandae. Impedit, rem non asperiores at, dolores ab laborum illo similique dicta quos voluptatibus a totam reprehenderit consectetur quis obcaecati vero rerum dolorum deserunt quas adipisci maiores doloribus ullam? Placeat excepturi sapiente quidem possimus nobis esse labore, quasi rerum fuga ea beatae, iusto quos quaerat illo exercitationem! Ipsam ipsum quibusdam nulla modi sint obcaecati suscipit eum repellat?\n', 'Auteur 1', 'auteur1@mail.com'),
(2, 'Challenge 2', 'http://challenge2.com', 'flag2', 'Web', 'Moyen', 20, 2, 'Thematique 2', 'Contenu 2', 'Auteur 2', 'auteur2@mail.com'),
(3, 'Challenge 3', 'http://challenge3.com', 'flag3', 'Web', 'Difficile', 30, 3, 'Thematique 3', 'Contenu 3', 'Auteur 3', 'auteur3.mail.com'),
(4, 'Challenge 4', 'http://challenge4.com', 'flag4', 'Web', 'Expert', 40, 4, 'Thematique 4', 'Contenu 4', 'Auteur 4', 'auteur4.mail.com'),
(5, 'Challenge 5', 'http://challenge5.com', 'flag5', 'Web', 'Facile', 10, 1, 'Thematique 5', 'Contenu 5', 'Auteur 5', 'auteur5.mail.com'),
(6, 'Challenge 6', 'http://challenge6.com', 'flag6', 'Web', 'Moyen', 20, 2, 'Thematique 6', 'Contenu 6', 'Auteur 6', 'auteur6.mail.com'),
(7, 'Challenge 7', 'http://challenge7.com', 'flag7', 'Web', 'Difficile', 30, 3, 'Thematique 7', 'Contenu 7', 'Auteur 7', 'auteur7.mail.com'),
(8, 'Challenge 8', 'http://challenge8.com', 'flag8', 'Web', 'Expert', 40, 4, 'Thematique 8', 'Contenu 8', 'Auteur 8', 'auteur8.mail.com'),
(9, 'Challenge 9', 'http://challenge9.com', 'flag9', 'Web', 'Facile', 10, 1, 'Thematique 9', 'Contenu 9', 'Auteur 9', 'auteur9.mail.com'),
(10, 'Challenge 10', 'http://challenge10.com', 'flag10', 'Web', 'Moyen', 20, 2, 'Thematique 10', 'Contenu 10', 'Auteur 10', 'auteur10.mail.com'),
(11, 'Challenge 11', 'http://challenge11.com', 'flag11', 'Web', 'Difficile', 30, 3, 'Thematique 11', 'Contenu 11', 'Auteur 11', 'auteur11.mail.com'),
(12, 'Challenge 12', 'http://challenge12.com', 'flag12', 'Web', 'Expert', 40, 4, 'Thematique 12', 'Contenu 12', 'Auteur 12', 'auteur12.mail.com'),
(13, 'Challenge 13', 'http://challenge13.com', 'flag13', 'Web', 'Facile', 10, 1, 'Thematique 13', 'Contenu 13', 'Auteur 13', 'auteur13.mail.com'),
(14, 'Challenge 14', 'http://challenge14.com', 'flag14', 'Web', 'Moyen', 20, 2, 'Thematique 14', 'Contenu 14', 'Auteur 14', 'auteur14.mail.com'),
(15, 'Challenge 15', 'http://challenge15.com', 'flag15', 'Web', 'Difficile', 30, 3, 'Thematique 15', 'Contenu 15', 'Auteur 15', 'auteur15.mail.com'),
(16, 'Challenge 16', 'http://challenge16.com', 'flag16', 'Web', 'Expert', 40, 4, 'Thematique 16', 'Contenu 16', 'Auteur 16', 'auteur16.mail.com');

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

DROP TABLE IF EXISTS `concerner`;
CREATE TABLE IF NOT EXISTS `concerner` (
  `numChallenge` int(11) NOT NULL,
  `numPartie` int(11) NOT NULL,
  `dateChallenge` datetime NOT NULL,
  `idEquipe` int(11) NOT NULL,
  KEY `fk_ConcernerSession` (`numPartie`),
  KEY `fk_ConcernerChallenge` (`numChallenge`),
  KEY `fk_copncernerEquipe` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déclencheurs `concerner`
--
DROP TRIGGER IF EXISTS `addPoint`;
DELIMITER $$
CREATE TRIGGER `addPoint` AFTER INSERT ON `concerner` FOR EACH ROW BEGIN 
UPDATE equipe set scoreTotal = scoreTotal + (SELECT nbPoints from challenge where numero = NEW.numChallenge) where id = New.idEquipe;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `idEquipe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EleveEquipe` (`idEquipe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `scoreTotal` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id`, `libelle`, `login`, `mdp`, `scoreTotal`) VALUES
(1, 'Team 974', 'team974', '4f21c5e9b6b324780cbc13fdcc07dbde038361dc38540a7435e80bc0c15d6a08e944655dbc3a9033ec001d1ee5ee2e92e7ecae87246b36812c737ecf9e25b9b2', 40),
(2, 'Team Tryhard', 'teamTH', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 60),
(3, 'Team Forest', 'teamforest', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 0),
(4, 'Team 42', 'team42', '39ca7ce9ecc69f696bf7d20bb23dd1521b641f806cc7a6b724aaa6cdbffb3a023ff98ae73225156b2c6c9ceddbfc16f5453e8fa49fc10e5d96a3885546a46ef4', 0);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `infotabscore`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `infotabscore`;
CREATE TABLE IF NOT EXISTS `infotabscore` (
`numPartie` int(11)
,`idEquipe` int(11)
,`libelle` varchar(50)
,`score` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
CREATE TABLE IF NOT EXISTS `parametre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomEvenement` varchar(50) NOT NULL,
  `nomEtablissement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `idEquipe` int(11) NOT NULL,
  PRIMARY KEY (`numero`),
  KEY `fk_SessionEquipe` (`idEquipe`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`numero`, `dateDebut`, `dateFin`, `score`, `idEquipe`) VALUES
(1, '2019-01-01 11:00:00', '2019-01-01 13:00:00', 10, 1),
(2, '2019-01-01 11:00:00', '2019-01-01 13:00:00', 21, 2),
(3, '2019-01-01 11:00:00', '2019-01-01 13:00:00', 14, 3),
(4, '2019-01-01 11:00:00', '2019-01-01 13:00:00', 5, 4);

-- --------------------------------------------------------

--
-- Structure de la vue `infotabscore`
--
DROP TABLE IF EXISTS `infotabscore`;

DROP VIEW IF EXISTS `infotabscore`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `infotabscore`  AS SELECT `concerner`.`numPartie` AS `numPartie`, `concerner`.`idEquipe` AS `idEquipe`, `equipe`.`libelle` AS `libelle`, sum(`challenge`.`nbPoints`) AS `score` FROM (((`concerner` join `challenge` on((`concerner`.`numChallenge` = `challenge`.`numero`))) join `equipe` on((`concerner`.`idEquipe` = `equipe`.`id`))) join `session` on((`session`.`numero` = `concerner`.`numPartie`))) WHERE (`concerner`.`numPartie` = '1') GROUP BY `concerner`.`idEquipe` ORDER BY `score` DESC ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `fk_ConcernerChallenge` FOREIGN KEY (`numChallenge`) REFERENCES `challenge` (`numero`),
  ADD CONSTRAINT `fk_ConcernerSession` FOREIGN KEY (`numPartie`) REFERENCES `session` (`numero`),
  ADD CONSTRAINT `fk_copncernerEquipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`);

--
-- Contraintes pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD CONSTRAINT `fk_EleveEquipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `fk_SessionEquipe` FOREIGN KEY (`idEquipe`) REFERENCES `equipe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
