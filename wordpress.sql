-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 oct. 2023 à 08:48
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wordpress`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `image`, `contenu`, `date`, `categorie`, `statut`) VALUES
(9, '\"Voyage au cœur de la nature sauvage\"', '651539ad66009.png', '\"Partez à l\'aventure à travers les merveilles de la nature sauvage. Explorez des forêts anciennes, gravissez des sommets imposants et découvrez la faune fascinante qui habite ces régions reculées. Cette expérience unique vous rapprochera de la beauté brute de notre planète.\"', '2019-08-29', ' \"Voyages et Aventures\"', '\"Publié\"'),
(8, ' \"Œuvre artistique Y2K\"', '6514361768e2e.png', '\"Découvrez cette magnifique œuvre artistique avec une esthétique Y2K unique. Les couleurs rouges et bleues se mélangent pour créer une expérience visuelle captivante.\"', '2023-09-14', '\"Art contemporain\"', '\"Publié\"'),
(10, '\"Les avancées technologiques de l\'IA en 2023\"', '65153a8010e01.png', '\"L\'intelligence artificielle continue de révolutionner notre monde en 2023. Explorez les dernières avancées technologiques dans le domaine de l\'IA, des assistants virtuels aux véhicules autonomes en passant par les soins de santé intelligents. Découvrez comment cette technologie évolue et façonne notre avenir.\"', '2023-09-27', '\"Technologie\"', '\"Publié\"'),
(14, ' \"Les secrets de la cuisine méditerranéenne\"', '65153e06c24d1.png', '\"La cuisine méditerranéenne est célèbre pour sa délicieuse combinaison de saveurs fraîches et d\'ingrédients sains. Explorez les secrets de cette cuisine, des recettes traditionnelles aux astuces de préparation. Découvrez comment vous pouvez intégrer les bienfaits de la diète méditerranéenne dans votre alimentation pour une vie saine et savoureuse.\"', '2022-01-28', ' \"Cuisine et Gastronomie\"', '\"Publié\"'),
(12, ' \"Les secrets de la méditation pour la gestion du stress\"', '65153bec4a795.png', ' \"La méditation est une pratique ancienne qui offre d\'innombrables avantages pour la gestion du stress et le bien-être mental. Plongez dans les secrets de la méditation, apprenez différentes techniques de méditation et découvrez comment elle peut vous aider à trouver la paix intérieure, à réduire le stress et à améliorer votre qualité de vie.\"', '2010-10-23', '\"Bien-être\"', '\"Publié\"'),
(13, '\"L\'avenir de l\'énergie verte : les énergies renouvelables\"', '65153ca7cf664.png', ' \"Les énergies renouvelables sont au cœur de la transition vers un avenir plus durable. Explorez les différentes sources d\'énergie renouvelable, telles que l\'énergie solaire, éolienne, hydraulique et géothermique. Découvrez comment ces technologies propres contribuent à réduire notre empreinte carbone et à préserver notre planète pour les générations futures.\"', '2023-09-14', ' \"Environnement et Écologie\"', '\"Publié\"');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `titre`, `contenu`, `statut`) VALUES
(1, 'rr', 'fghj', 'Publié'),
(2, 'rr', 'fghj', 'Publié'),
(3, 'rr', 'fghj', 'Publié');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pseudo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `niveau_compte` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `pseudo`, `mdp`, `avatar`, `niveau_compte`) VALUES
(11, 'chainey', 'remi', 'remi@mail.com', 'elypse', '$2y$10$27P.mHbMqeE5fjPmv8HlW.cDDPQ/02Wikmjfk4nUOo0X4H4CJyvBy', '', 'administrateur'),
(98, 'zammit', 'laure', 'laure@mail.com', 'lolo', '$2y$10$U7.j25gCybxngW8pF.KCMOcr.zDxJKAPEnT7hsR.HxfN9/IYWmdky', '', 'membre'),
(99, 'puggioni', 'anthony', 'anthony@mail.com', 'anto', '$2y$10$.Zzasd0cMrT131BEKckeYuoxxhfMmdCSASEkTfbWD2JanyGrPl3/G', '', 'membre');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
