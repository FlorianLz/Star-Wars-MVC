-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 03 fév. 2023 à 10:04
-- Version du serveur :  10.6.11-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wlfy3366_starwarsmvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `name`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'Natalie Portman', 'public/images/actors/63dc22114ba401.08693453.jpeg', '2023-02-02 21:50:24', NULL),
(3, 'Daisy Ridley', 'public/images/actors/63dc2227d8d1c5.71893805.jpeg', '2023-02-02 21:50:47', NULL),
(4, 'Harrison Ford', 'public/images/actors/63dc2242e37cd1.49881392.jpeg', '2023-02-02 21:51:14', NULL),
(5, 'Hayden Christensen', 'public/images/actors/63dc225e4d4082.57924186.jpeg', '2023-02-02 21:51:41', NULL),
(6, 'Adam Driver', 'public/images/actors/63dc22729a6e25.67661133.jpeg', '2023-02-02 21:52:02', NULL),
(7, 'Carrie Fisher', 'public/images/actors/63dc2692cb55d6.38230989.jpeg', '2023-02-02 22:09:38', NULL),
(8, 'Mark Hamill', 'public/images/actors/63dc270e3fbc13.57080750.jpg', '2023-02-02 22:11:41', NULL),
(9, 'Diego Luna', 'public/images/actors/63dc27f89d1979.15117589.jpeg', '2023-02-02 22:15:36', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_name`, `created_at`, `updated_at`) VALUES
(1, 'Super film, je recommande !', 'Dark', '2023-02-02 21:36:28', NULL),
(2, 'Top !', 'Dark', '2023-02-03 09:32:26', NULL),
(3, 'Super', 'Flo', '2023-02-03 09:32:26', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `resume` text NOT NULL,
  `release_date` date NOT NULL,
  `banner` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id`, `name`, `cover`, `synopsis`, `resume`, `release_date`, `banner`, `trailer`, `created_at`, `updated_at`) VALUES
(1, 'Star Wars, épisode IV : Un nouvel espoir', 'public/images/covers/63dbff765cc101.52530089.jpeg', 'La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire.', 'La guerre civile fait rage entre l\'Empire galactique et l\'Alliance rebelle. Capturée par les troupes de choc de l\'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l\'Etoile Noire.', '1977-10-19', 'public/images/banners/63dc1183c6d732.04300048.jpg', 'https://www.youtube.com/embed/HKQgMXvgxsM', '2023-01-06 11:45:46', '2023-02-02 20:55:57'),
(2, 'Star Wars, épisode V : L\'Empire contre-attaque', 'public/images/covers/63dbff8ccf88b7.80738437.jpeg', 'Malgré la destruction de l\'Étoile noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales.', 'Malgré la destruction de l\'Étoile noire, l\'Empire maintient son emprise sur la galaxie, et poursuit sans relâche sa lutte contre l\'Alliance rebelle. Basés sur la planète glacée de Hoth, les rebelles essuient un assaut des troupes impériales.', '1980-08-20', 'public/images/banners/63dc11346a01c5.43330142.jpg', 'https://www.youtube.com/embed/mdrcnZNXmTM', '2023-01-06 11:45:46', '2023-02-02 19:39:18'),
(3, 'Star Wars, épisode VI : Le Retour du Jedi', 'public/images/covers/63dbff976a0e57.70508084.jpeg', 'L\'empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l\'étoile de la mort, menace l\'univers tout entier... Han Solo est remis à l\'ignoble contrebandier Jabba le Hutt par le chasseur de primes Boba Fett. après l\'échec d\'une première tentative d\'évasion menée par la princesse Leia, également arrêtée par Jabba, Luke Skywalker et Lando parviennent à libérer leurs amis.', 'L\'empire galactique est plus puissant que jamais : la construction de la nouvelle arme, l\'étoile de la mort, menace l\'univers tout entier... Han Solo est remis à l\'ignoble contrebandier Jabba le Hutt par le chasseur de primes Boba Fett. après l\'échec d\'une première tentative d\'évasion menée par la princesse Leia, également arrêtée par Jabba, Luke Skywalker et Lando parviennent à libérer leurs amis.', '1983-10-19', 'public/images/banners/63dc10d92eb0f6.87304164.jpg', 'https://www.youtube.com/embed/VUgIH6fyDvs', '2023-01-06 11:45:46', '2023-02-02 19:37:04'),
(4, 'Star Wars, épisode I : La Menace fantôme', 'public/images/covers/63dbffa7e6ab93.33332427.jpeg', 'Avant de devenir un célèbre chevalier Jedi, et bien avant de se révéler l\'âme la plus noire de la galaxie, Anakin Skywalker est un jeune esclave sur la planète Tatooine. La Force est déjà puissante en lui et il est un remarquable pilote de Podracer. Le maître Jedi Qui-Gon Jinn le découvre et entrevoit alors son immense potentiel. Pendant ce temps, l\'armée de droïdes de l\'insatiable Fédération du Commerce a envahi Naboo dans le cadre d\'un plan secret des Sith visant à accroître leur pouvoir.', 'Le Jedi Qui-Gon Jinn (Liam Neeson) et son apprenti Obi-Wan Kenobi  (Ewan McGregor) sont envoyés à la rescousse par le chancelier Valorum (Terence Stamp) pour régler un litige avec la Fédération du commerce. Une fois sur place, ils se rendent compte que les intentions de la Fédération sont expansionnistes. Nute Gunray (Silas Carson) et Sidious (Ian McDiarmid) veulent conquérir Naboo.\r\nBien aidé par le Gungan Jar Jar Binks, Qui-Gon et Obi-Wan se rendent sur Theed pour délivrer la reine des Naboos Padmé Amidala (Natalie Portman). Le vaisseau doit se poser en catastrophe sur la planète Tatooine où Qui-Gon rencontre par hasard le jeune Anakin Skywalker (Jake Lloyd) qu’il soupçonne d’être l’élu (cf Matrix). Rien que ça. Il veut en faire un Jedi.', '1999-10-13', 'public/images/banners/63dc109233b1b8.73368467.jpg', 'https://www.youtube.com/embed/ACvjzXOj-Dc', '2023-01-06 11:45:46', '2023-02-02 19:35:46'),
(5, 'Star Wars, épisode II : L\'Attaque des clones', 'public/images/covers/63dbffb2d8eed7.22064874.jpeg', 'Depuis le blocus de la planète Naboo, la République, gouvernée par le Chancelier Palpatine, connaît une crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement. Le Sénat et la population intergalactique se montrent pour leur part inquiets. Certains sénateurs demandent à ce que la République soit dotée d\'une armée pour empêcher que la situation ne se détériore. Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe à un attentat.', 'Depuis le blocus de la planète Naboo, la République, gouvernée par le Chancelier Palpatine, connaît une crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement. Le Sénat et la population intergalactique se montrent pour leur part inquiets. Certains sénateurs demandent à ce que la République soit dotée d\'une armée pour empêcher que la situation ne se détériore. Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe à un attentat.', '2002-05-17', 'public/images/banners/63dc1038570b41.53960461.jpg', 'https://www.youtube.com/embed/x1ZeDI-SOPY', '2023-01-06 11:45:46', '2023-02-02 19:34:16'),
(6, 'Star Wars, épisode III : La Revanche des Sith', 'public/images/covers/63dbffba86aed6.90867944.jpeg', 'La Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d\'un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.Les Seigneurs Sith s\'unissent alors pour préparer leur revanche, qui commence par l\'extermination des Jedi.', 'La Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d\'un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.Les Seigneurs Sith s\'unissent alors pour préparer leur revanche, qui commence par l\'extermination des Jedi.', '2005-05-18', 'public/images/banners/63dc0fc1e3e122.74464064.jpg', 'https://www.youtube.com/embed/IRE3T_VTeLM', '2023-01-06 11:45:46', '2023-02-02 19:32:17'),
(7, 'Star Wars: le réveil de la force', 'public/images/covers/63dbffc262fac4.37932735.jpeg', 'Plus de 30 ans après la bataille d\'Endor, la galaxie n\'en a pas fini avec la tyrannie et l\'oppression. Les membres de l\'Alliance rebelle, devenus la ', 'Plus de 30 ans après la bataille d\'Endor, la galaxie n\'en a pas fini avec la tyrannie et l\'oppression. Les membres de l\'Alliance rebelle, devenus la ', '2015-12-16', 'public/images/banners/63dc0f371c64c2.65139446.jpg', 'https://www.youtube.com/embed/mH9Ygfs5avo', '2023-01-06 11:45:46', '2023-02-02 19:29:59'),
(8, 'Rogue One: A Star Wars Story', 'public/images/covers/63dbffcac422a4.30776165.jpeg', 'Situé entre les épisodes III et IV de la saga Star Wars, des individus ordinaires, pour rester fidèles à leurs valeurs, vont tester l\'impossible au péril de leur vie.', 'Situé entre les épisodes III et IV de la saga Star Wars, des individus ordinaires, pour rester fidèles à leurs valeurs, vont tester l\'impossible au péril de leur vie.', '2016-12-14', 'public/images/banners/default.jpg', 'https://www.youtube.com/embed/ox6Dsbvp7ng', '2023-01-06 11:45:46', '2023-02-02 19:28:29'),
(9, 'Star Wars, épisode VIII : Les Derniers Jedi', 'public/images/covers/63dbffd22ca7f1.52433899.jpeg', 'Le Premier Ordre étend ses tentacules aux confins de l\'univers, poussant la Résistance dans ses retranchements. Il est impossible de se sauver à la vitesse de la lumière avec cet ennemi continuellement aux trousses. Cela n\'empêche pas Finn et ses camarades de tenter d\'identifier une brèche chez leur adversaire. Pendant ce temps, Rey se trouve toujours sur la planète Ahch-To pour convaincre Luke Skywalker de lui enseigner les rudiments de la Force.', 'Le Premier Ordre étend ses tentacules aux confins de l\'univers, poussant la Résistance dans ses retranchements. Il est impossible de se sauver à la vitesse de la lumière avec cet ennemi continuellement aux trousses. Cela n\'empêche pas Finn et ses camarades de tenter d\'identifier une brèche chez leur adversaire. Pendant ce temps, Rey se trouve toujours sur la planète Ahch-To pour convaincre Luke Skywalker de lui enseigner les rudiments de la Force.', '2017-12-13', 'public/images/banners/63dc0de9a55488.42079647.jpg', 'https://www.youtube.com/embed/wY708Ky2SG8', '2023-01-06 11:45:46', '2023-02-02 19:24:31'),
(10, 'Star Wars, épisode IX : L\'Ascension de Skywalker', 'public/images/covers/63dbffda56c103.80415375.jpeg', 'Un an a passé depuis que Kylo Ren a tué Snoke, le Leader suprême et pris sa place. Bien que largement décimée, la Résistance est prête à renaître de ses cendres. Rey, Poe, Leia et leurs alliés se préparent à reprendre le combat. Mais ils vont devoir faire face à un vieil ennemi : l\'empereur Palpatine.', 'Un an a passé depuis que Kylo Ren a tué Snoke, le Leader suprême et pris sa place. Bien que largement décimée, la Résistance est prête à renaître de ses cendres. Rey, Poe, Leia et leurs alliés se préparent à reprendre le combat. Mais ils vont devoir faire face à un vieil ennemi : l\'empereur Palpatine.', '2019-12-18', 'public/images/banners/63dc092b79fab0.57608883.jpg', 'https://www.youtube.com/embed/pHgwf2eMFnA', '2023-01-06 11:45:46', '2023-02-02 19:16:56');

-- --------------------------------------------------------

--
-- Structure de la table `films_actors`
--

CREATE TABLE `films_actors` (
  `id_film` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `played_character` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `films_actors`
--

INSERT INTO `films_actors` (`id_film`, `id_actor`, `played_character`, `created_at`, `updated_at`) VALUES
(1, 4, 'Han Solo', '2023-02-02 21:55:57', '2023-02-02 21:55:57'),
(5, 5, 'Anakin Skywalker', '2023-02-02 21:59:22', NULL),
(6, 2, 'Padme', '2023-02-02 22:00:16', NULL),
(9, 3, 'Rey', '2023-02-02 22:01:42', NULL),
(10, 6, 'Kylo Ren', '2023-02-02 22:02:13', NULL),
(7, 4, 'Han Solo', '2023-02-02 22:06:26', NULL),
(4, 2, 'Padmé Amidala', '2023-02-02 22:07:40', NULL),
(2, 4, 'Han Solo', '2023-02-02 22:08:28', NULL),
(3, 7, 'Leia Organa', '2023-02-02 22:12:46', NULL),
(8, 9, 'Cassian Andor', '2023-02-02 22:17:07', NULL),
(10, 8, 'Luke Skywalker', '2023-02-02 22:17:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `films_comments`
--

CREATE TABLE `films_comments` (
  `id_film` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `films_comments`
--

INSERT INTO `films_comments` (`id_film`, `id_comment`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-02-02 21:36:28', NULL),
(10, 2, '2023-02-03 09:32:26', NULL),
(1, 3, '2023-02-03 09:32:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `films_gallery`
--

CREATE TABLE `films_gallery` (
  `id_film` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `films_gallery`
--

INSERT INTO `films_gallery` (`id_film`, `id_gallery`, `created_at`, `updated_at`) VALUES
(10, 18, '2023-02-02 20:09:31', NULL),
(9, 36, '2023-02-02 20:24:25', NULL),
(9, 37, '2023-02-02 20:24:25', NULL),
(8, 40, '2023-02-02 20:28:20', NULL),
(8, 41, '2023-02-02 20:28:20', NULL),
(8, 42, '2023-02-02 20:28:21', NULL),
(7, 43, '2023-02-02 20:29:59', NULL),
(7, 44, '2023-02-02 20:29:59', NULL),
(7, 45, '2023-02-02 20:29:59', NULL),
(7, 46, '2023-02-02 20:29:59', NULL),
(6, 47, '2023-02-02 20:32:17', NULL),
(6, 48, '2023-02-02 20:32:18', NULL),
(6, 49, '2023-02-02 20:32:18', NULL),
(6, 50, '2023-02-02 20:32:18', NULL),
(5, 51, '2023-02-02 20:34:16', NULL),
(5, 52, '2023-02-02 20:34:16', NULL),
(5, 53, '2023-02-02 20:34:16', NULL),
(5, 54, '2023-02-02 20:34:17', NULL),
(4, 55, '2023-02-02 20:35:46', NULL),
(4, 56, '2023-02-02 20:35:46', NULL),
(4, 57, '2023-02-02 20:35:46', NULL),
(4, 58, '2023-02-02 20:35:46', NULL),
(3, 59, '2023-02-02 20:36:57', NULL),
(3, 61, '2023-02-02 20:36:57', NULL),
(3, 62, '2023-02-02 20:36:57', NULL),
(3, 63, '2023-02-02 20:36:58', NULL),
(2, 64, '2023-02-02 20:38:28', NULL),
(2, 65, '2023-02-02 20:38:28', NULL),
(2, 66, '2023-02-02 20:38:29', NULL),
(1, 68, '2023-02-02 20:39:47', NULL),
(1, 69, '2023-02-02 20:39:48', NULL),
(1, 70, '2023-02-02 20:39:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(18, '63dc0a6b7518b8.14426073.jpg', 'public/images/gallery/63dc0a6b7518b8.14426073.jpg', '2023-02-02 20:09:31', NULL),
(32, '63dc0ccaebf749.91240796.jpg', 'public/images/gallery/63dc0ccaebf749.91240796.jpg', '2023-02-02 20:19:38', NULL),
(33, '63dc0ccb27c387.05550750.jpg', 'public/images/gallery/63dc0ccb27c387.05550750.jpg', '2023-02-02 20:19:38', NULL),
(34, '63dc0ccb5ebeb0.20792376.jpg', 'public/images/gallery/63dc0ccb5ebeb0.20792376.jpg', '2023-02-02 20:19:39', NULL),
(36, '63dc0de9a58e81.80505302.jpg', 'public/images/gallery/63dc0de9a58e81.80505302.jpg', '2023-02-02 20:24:25', NULL),
(37, '63dc0de9d96088.95380653.jpg', 'public/images/gallery/63dc0de9d96088.95380653.jpg', '2023-02-02 20:24:25', NULL),
(40, '63dc0ed4ac1b29.41516278.jpg', 'public/images/gallery/63dc0ed4ac1b29.41516278.jpg', '2023-02-02 20:28:20', NULL),
(41, '63dc0ed4df78c4.67927627.jpg', 'public/images/gallery/63dc0ed4df78c4.67927627.jpg', '2023-02-02 20:28:20', NULL),
(42, '63dc0ed51f8018.86532601.jpg', 'public/images/gallery/63dc0ed51f8018.86532601.jpg', '2023-02-02 20:28:21', NULL),
(43, '63dc0f371c9ec5.44027891.jpg', 'public/images/gallery/63dc0f371c9ec5.44027891.jpg', '2023-02-02 20:29:59', NULL),
(44, '63dc0f3749be50.77972965.jpg', 'public/images/gallery/63dc0f3749be50.77972965.jpg', '2023-02-02 20:29:59', NULL),
(45, '63dc0f377b1a97.30537384.jpg', 'public/images/gallery/63dc0f377b1a97.30537384.jpg', '2023-02-02 20:29:59', NULL),
(46, '63dc0f37abbe61.07531647.jpg', 'public/images/gallery/63dc0f37abbe61.07531647.jpg', '2023-02-02 20:29:59', NULL),
(47, '63dc0fc1e419d4.33900044.jpg', 'public/images/gallery/63dc0fc1e419d4.33900044.jpg', '2023-02-02 20:32:17', NULL),
(48, '63dc0fc2251741.40023460.jpg', 'public/images/gallery/63dc0fc2251741.40023460.jpg', '2023-02-02 20:32:18', NULL),
(49, '63dc0fc2555896.91330311.jpg', 'public/images/gallery/63dc0fc2555896.91330311.jpg', '2023-02-02 20:32:18', NULL),
(50, '63dc0fc2889923.23026278.jpg', 'public/images/gallery/63dc0fc2889923.23026278.jpg', '2023-02-02 20:32:18', NULL),
(51, '63dc1038573ba8.10217773.jpg', 'public/images/gallery/63dc1038573ba8.10217773.jpg', '2023-02-02 20:34:16', NULL),
(52, '63dc10388b1ef1.81769525.jpg', 'public/images/gallery/63dc10388b1ef1.81769525.jpg', '2023-02-02 20:34:16', NULL),
(53, '63dc1038c09824.41022440.jpg', 'public/images/gallery/63dc1038c09824.41022440.jpg', '2023-02-02 20:34:16', NULL),
(54, '63dc1039027ad3.50951762.jpg', 'public/images/gallery/63dc1039027ad3.50951762.jpg', '2023-02-02 20:34:16', NULL),
(55, '63dc109233f643.96677352.jpg', 'public/images/gallery/63dc109233f643.96677352.jpg', '2023-02-02 20:35:46', NULL),
(56, '63dc10926288f1.31262310.jpg', 'public/images/gallery/63dc10926288f1.31262310.jpg', '2023-02-02 20:35:46', NULL),
(57, '63dc10929736d0.32754747.jpg', 'public/images/gallery/63dc10929736d0.32754747.jpg', '2023-02-02 20:35:46', NULL),
(58, '63dc1092d01121.34526090.jpg', 'public/images/gallery/63dc1092d01121.34526090.jpg', '2023-02-02 20:35:46', NULL),
(59, '63dc10d92ee9b9.86301231.jpg', 'public/images/gallery/63dc10d92ee9b9.86301231.jpg', '2023-02-02 20:36:57', NULL),
(61, '63dc10d99584f5.42874782.jpg', 'public/images/gallery/63dc10d99584f5.42874782.jpg', '2023-02-02 20:36:57', NULL),
(62, '63dc10d9c71966.62375910.jpg', 'public/images/gallery/63dc10d9c71966.62375910.jpg', '2023-02-02 20:36:57', NULL),
(63, '63dc10da041909.22160327.jpg', 'public/images/gallery/63dc10da041909.22160327.jpg', '2023-02-02 20:36:57', NULL),
(64, '63dc11346a3f14.20909184.jpg', 'public/images/gallery/63dc11346a3f14.20909184.jpg', '2023-02-02 20:38:28', NULL),
(65, '63dc1134a46748.31427190.jpg', 'public/images/gallery/63dc1134a46748.31427190.jpg', '2023-02-02 20:38:28', NULL),
(66, '63dc1134deffe8.72060815.jpg', 'public/images/gallery/63dc1134deffe8.72060815.jpg', '2023-02-02 20:38:28', NULL),
(68, '63dc1183c70545.99252884.jpg', 'public/images/gallery/63dc1183c70545.99252884.jpg', '2023-02-02 20:39:47', NULL),
(69, '63dc118400f7b5.94320942.jpg', 'public/images/gallery/63dc118400f7b5.94320942.jpg', '2023-02-02 20:39:47', NULL),
(70, '63dc1184368976.63539250.jpg', 'public/images/gallery/63dc1184368976.63539250.jpg', '2023-02-02 20:39:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `admin`, `timestamp`) VALUES
(10, 'Admin', 'Admin', 'admin@admin.fr', '$2y$10$7QiN0ITMI/l.tBMzzhk58.zHZiwZ.imMB/gFPHgGKnJH5D/w2VVfC', 1, '2023-02-02 19:02:11');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `films_actors`
--
ALTER TABLE `films_actors`
  ADD KEY `FK_FILM` (`id_film`),
  ADD KEY `FK_ACTOR` (`id_actor`);

--
-- Index pour la table `films_comments`
--
ALTER TABLE `films_comments`
  ADD KEY `FK_FILMCOMMENTS` (`id_film`),
  ADD KEY `FK_COMMENTSFILM` (`id_comment`);

--
-- Index pour la table `films_gallery`
--
ALTER TABLE `films_gallery`
  ADD KEY `FK_FILMGALLERY` (`id_film`),
  ADD KEY `FK_GALLERYFILM` (`id_gallery`);

--
-- Index pour la table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `films_actors`
--
ALTER TABLE `films_actors`
  ADD CONSTRAINT `FK_ACTOR` FOREIGN KEY (`id_actor`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `FK_FILM` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`);

--
-- Contraintes pour la table `films_comments`
--
ALTER TABLE `films_comments`
  ADD CONSTRAINT `FK_COMMENTSFILM` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `FK_FILMCOMMENTS` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`);

--
-- Contraintes pour la table `films_gallery`
--
ALTER TABLE `films_gallery`
  ADD CONSTRAINT `FK_FILMGALLERY` FOREIGN KEY (`id_film`) REFERENCES `films` (`id`),
  ADD CONSTRAINT `FK_GALLERYFILM` FOREIGN KEY (`id_gallery`) REFERENCES `gallery` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
