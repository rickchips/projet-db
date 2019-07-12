-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 juil. 2019 à 13:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet-db`
--

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'Ressuscité'),
(2, 'Boss des films'),
(3, 'Saiyan pur'),
(4, 'Puissance maximale'),
(5, 'Arc enfant'),
(6, 'Saga de Boo'),
(7, 'Dragon maléfique'),
(9, 'Potalas'),
(10, 'Super Saiyan 3'),
(11, 'Transformation fortifiante'),
(12, 'Forces jointes'),
(13, 'Chercheur des Dragons Balls'),
(14, 'Commando Ginyu'),
(15, 'Héros des films'),
(16, 'Représentants de l\'Univers 7'),
(17, 'Forme de vie artificielles'),
(18, 'Famille de Vegeta'),
(19, 'Namek'),
(20, 'Enfant'),
(21, 'Super Saiyan'),
(22, 'Famille de Goku');

--
-- Déchargement des données de la table `liens`
--

INSERT INTO `liens` (`id`, `nom_liens`, `nb_ki_liens`) VALUES
(2, 'L’origine des Saiyans', 1),
(5, 'Âme vs âme', 1),
(7, 'Ami', 1),
(8, 'Aventure incroyable', 2),
(9, 'Briser la limite', 2),
(10, 'Champion du monde', 1),
(11, 'Combat décisif', 3),
(12, 'Tournoi du pouvoir', 3),
(13, 'Absorbeur d\'énergie', 2),
(14, 'Agrandissement', 2),
(15, 'Amélioration cybernétique', 2),
(18, 'Déesse de la guerre', 2),
(19, 'Énergie infinie', 2),
(20, 'Famille Hera', 2),
(21, 'Forme ultime', 2),
(22, 'Fusion', 2),
(23, 'Gentleman', 2),
(24, 'GT', 2),
(25, 'Guerriers de l\'Univers 6', 2),
(26, 'Guerrier de Mamie Voyante', 2),
(27, 'Guerrier fusionné', 2),
(28, 'Guerrier Z doré', 2),
(29, 'Haine des Saiyans', 2),
(30, 'Jumeaux', 2),
(31, 'Le plus puissant peuple', 2),
(32, 'Liens familiaux', 2),
(33, 'Lien inébranlable', 2),
(34, 'Paré au combat', 2),
(35, 'Patrouille', 2),
(36, 'Peur et désespoir', 2),
(37, 'Pose du commando', 2),
(38, 'Récupération', 2),
(39, 'Regard respectueux', 2),
(40, 'Résurrection du démon', 2),
(41, 'Savant', 2),
(42, 'Vitesse époustouflante', 2),
(45, 'Copie', 1),
(46, 'Courage', 1),
(47, 'Démon', 1),
(48, 'Équipe Bardock', 1),
(49, 'Équipe Bardock', 1),
(50, 'Futur désespéré', 1),
(51, 'Guerrier suprême', 1),
(52, 'L\'armée de Thalès', 1),
(53, 'Lâche', 1),
(54, 'Leader maléfique', 1),
(55, 'Lignée royale', 1),
(56, 'Loyauté', 1),
(57, 'Maître-élève', 1),
(58, 'Mécanique', 1),
(59, 'Père-fille Satan', 1),
(60, 'Rancune renforcée', 1),
(61, 'Riche', 1),
(62, 'Sbire de Cooler', 1),
(63, 'Unisson parfait', 1),
(64, 'Visiteur d\'ailleurs', 1),
(65, 'Guerrier doré', 1);

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190708114739', '2019-07-08 11:48:05'),
('20190709132500', '2019-07-09 13:25:30'),
('20190711102747', '2019-07-11 10:28:58');

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`id`, `nom_perso`, `apt_leader_perso`, `apt_pass_perso`, `image`, `date_creation_perso`, `date_modif_perso`) VALUES
(1, 'Broly Super Saiyan Légendaire', 'PV, ATT et DÉF + 90 % et Ki +3 sur le type PUI', 'ATT +80000 et DÉF personnelle -20000 lors d\'une attaque spéciale, lance une attaque spéciale supplémentaire', 'Brolylssjlrpui.webp', '2019-07-08 00:00:00', NULL),
(2, 'Broly Super Saiyan', 'Ki +4, PV, ATT et DÉF +130 % pour la Catégorie - Ressuscité ou Ki +4, PV, ATT et DÉF +100 % pour le type Extrêmetec', 'ATT et DÉF +90 % lors d\'une attaque spéciale, ATT +50 % supplémentaires lors d\'une attaque spéciale ultime. Attaque spéciale supplémentaire garantie en face de 2 ennemis ou plus. Si les conditions[3] sont remplies, provoque \"Transformation\".', 'Brolyssjlrtec.webp', '2019-07-08 00:00:00', '2019-07-12 12:39:41'),
(3, 'Broly (furieux)', 'Ki +3, PV, ATT et DÉF +100 % pour le type ExtrêmeAGI', 'ATT et DÉF +60 %. DÉF +20 % à chaque attaque portée (max. 60 %). ATT +20 % chaque fois qu\'une attaque est encaissée (max. 60 %).', 'Brolyturagi.png', '2019-07-08 00:00:00', '2019-07-12 12:38:41'),
(6, 'Broly Super Saiyan Légendaire', 'Ki +3, PV, ATT et DÉF +70% sur le type PUI', 'Dégâts massifs à tous les ennemis Inflige des dégâts colossaux à tous les ennemis et augmente l\'ATT[1] pendant 3 tours', 'Brolylssjturpui.png', '2019-07-09 14:14:39', '2019-07-12 12:38:18'),
(7, 'Paragus & Broly', 'Ki +3, PV, ATT et DÉF +100 % pour le type Extrêmeint', 'Ki +2, ATT et DÉF +40 % pour les alliés de Catégorie - Saiyan pur ou Catégorie - Forces jointes  ATT +130 % s\'il y a 1 ennemi de Catégorie - Saiyan pur', 'ParagusBrolyturint.webp', '2019-07-09 14:26:11', '2019-07-12 12:37:36'),
(8, 'Broly Super Saiyan', 'Ki +3, ATT +170 %, PV et DÉF +150 % pour la Catégorie - Boss des films ou  ki +3, ATT +170 %, PV et DÉF +130 % pour la Catégorie - Puissance maximale', 'Ki +6, ATT +130 % et DÉF +100 %  Si les conditions sont remplies, provoque \"Transformation\"[1]', 'Brolyssjturend.png', '2019-07-09 14:28:43', '2019-07-12 12:39:53'),
(9, 'Son Goku Super Saiyan 4', 'Ki +3, PV et ATT +170 %, DÉF +130 % pour la Catégorie - Famille de Son Goku ou  Ki +3, PV, ATT et DÉF +120 % pour le type Superagi', '\"ATT +80 %, DÉF +20 % à chaque début de tour (max. 80 %)   Ki +2 supplémentaires à chaque sph. de ki Rainbow ou AGI obtenue  Chance moyenne d\'esquive de l\'attaque spéciale ennemie et de contre-attaque surpuissante (300%)', 'GokuSSJ4lragi.webp', '2019-07-12 12:41:56', '2019-07-12 12:42:33'),
(10, 'Vegeta Super Saiyan 4', 'Ki +3, PV +130 %, ATT et DÉF +170 % pour la Catégorie - Famille de Vegeta ou  Ki +3, PV, ATT et DÉF +120 % pour le type Superpui', 'DÉF +80 %, ATT +20 % à chaque début de tour (max. 80 %)   Ki +2 supplémentaires à chaque sph. de ki Rainbow ou PUI obtenue  Chance moyenne d\'esquive de l\'attaque spéciale ennemie et de contre-attaque surpuissante (300%)', 'Vegetassj4lrpui.webp', '2019-07-12 12:43:32', '2019-07-12 12:43:32'),
(11, 'Son Goku Super Saiyan & Vegeta Super Saiyan', 'Ki +3, DÉF +130 %, PV et ATT +170 % pour la Catégorie - Potalas ou  ki +3, PV, ATT et DÉF +90 % pour le type INT', 'ATT et DÉF +120 % au début du tour   Ki +2 en plus à chaque sph. de ki Rainbow obtenue Si les conditions[1] sont remplies, provoque \"Fusion grâce aux Potalas\"\"', 'GokussjVegetassjint.webp', '2019-07-12 12:44:30', '2019-07-12 12:45:30');

--
-- Déchargement des données de la table `personnage_categorie`
--

INSERT INTO `personnage_categorie` (`personnage_id`, `categorie_id`) VALUES
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 11),
(3, 2),
(3, 3),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 3),
(7, 12),
(8, 2),
(8, 3),
(8, 4),
(8, 11),
(8, 21),
(9, 3),
(9, 7),
(9, 22),
(10, 3),
(10, 7),
(10, 18),
(11, 6),
(11, 9),
(11, 12),
(11, 21);

--
-- Déchargement des données de la table `personnage_liens`
--

INSERT INTO `personnage_liens` (`personnage_id`, `liens_id`) VALUES
(1, 2),
(2, 2),
(2, 34),
(6, 2),
(7, 2),
(8, 2),
(8, 34),
(9, 24),
(9, 34),
(10, 24),
(10, 34),
(11, 2),
(11, 34);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `roles`, `password`) VALUES
(11, 'admin', 'admin@admin.fr', '[\"ROLE_ADMIN\"]', '$argon2i$v=19$m=1024,t=2,p=2$ZEtxaUhWQ3FTRjM1ai5sSA$2V2EMnTZxuejBd8z6hFQMnGnpSohwmZ8YkB2RtFI65s'),
(12, 'user', 'user@user.fr', '[]', '$argon2i$v=19$m=1024,t=2,p=2$b1hueVVPSzdWSmlocldGSA$PpInUBTc4ViXrn6H016CqugAoUBhfLL/mSo27ya4LvA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
