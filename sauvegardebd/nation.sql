-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : jeu. 30 nov. 2023 à 21:48
-- Version du serveur : 10.10.2-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nation`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

DROP TABLE IF EXISTS `alerte`;
CREATE TABLE IF NOT EXISTS `alerte` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titre` varchar(191) NOT NULL,
  `Type` varchar(191) NOT NULL,
  `Texte` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Id_user` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_alerte_user` (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_user` int(10) UNSIGNED NOT NULL,
  `Id_concert` int(10) UNSIGNED NOT NULL,
  `Texte` text NOT NULL,
  `Note` int(10) NOT NULL,
  `Date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `commentaire_id_user_index` (`Id_user`),
  KEY `commentaire_id_concert_index` (`Id_concert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

DROP TABLE IF EXISTS `concert`;
CREATE TABLE IF NOT EXISTS `concert` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Groupe` varchar(191) NOT NULL,
  `Horaires` int(10) NOT NULL,
  `Scene` varchar(191) NOT NULL,
  `Descriptif` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Id_lieu` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_concert_lieu` (`Id_lieu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`ID`, `Groupe`, `Horaires`, `Scene`, `Descriptif`, `created_at`, `updated_at`, `Id_lieu`) VALUES
(1, 'tessts', 11, 'B', 'CONCERT', NULL, NULL, NULL),
(2, 'test', 3, 'fdsbdsb', 'fjkdhfdkjhfsk', '2023-11-19 20:18:10', '2023-11-19 20:18:10', NULL),
(3, 'fdslkfsdl', 3, 'dklnfds', 'fjfndsjn', '2023-11-19 20:18:27', '2023-11-19 20:18:27', NULL),
(4, 'jgjhfghgc', 4, 'cghcghdhcg', 'jhvhjvhn', '2023-11-19 20:19:31', '2023-11-19 20:19:31', NULL),
(5, 'fdssd', 3, 'gdfgdfgdf', 'gfdgdfg', '2023-11-20 17:47:29', '2023-11-20 17:47:29', NULL),
(6, 'rjfsdh', 2, 'B', 'Test', '2023-11-21 18:53:37', '2023-11-21 18:53:37', NULL),
(7, 'fkdsnf', 2, 'fdkf', 'fdsfsd', '2023-11-21 18:53:56', '2023-11-21 18:53:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) NOT NULL,
  `Id_concert` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Id_lieu` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_genre_concert_12345` (`Id_concert`),
  KEY `fk_genre_lieu` (`Id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_19_120159_create_alerte_table', 1),
(6, '2023_11_19_120521_create_commentaires_table', 2),
(7, '2023_11_19_120749_create_concert_table', 3),
(8, '2023_11_19_120839_create_lieu_table', 3),
(9, '2023_11_19_120849_create_genre_table', 3),
(10, '2023_11_19_121129_create_partenaire_table', 4),
(11, '2023_11_19_121142_create_preference_table', 4),
(12, '2023_11_19_121151_create_scene_table', 4),
(13, '2023_11_19_121206_create_points_interest_table', 4),
(14, '2023_11_19_121615_create_utilisateur_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

DROP TABLE IF EXISTS `partenaire`;
CREATE TABLE IF NOT EXISTS `partenaire` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Catégories` varchar(191) NOT NULL,
  `Nom` varchar(191) NOT NULL,
  `Logo` int(10) UNSIGNED NOT NULL,
  `Url` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Id_concert` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_partenaire_concert` (`Id_concert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `points_interest`
--

DROP TABLE IF EXISTS `points_interest`;
CREATE TABLE IF NOT EXISTS `points_interest` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Type` varchar(191) NOT NULL,
  `Nom` varchar(191) NOT NULL,
  `Id_lieu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_points_interest_lieu` (`Id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `preference`
--

DROP TABLE IF EXISTS `preference`;
CREATE TABLE IF NOT EXISTS `preference` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_user` int(10) UNSIGNED DEFAULT NULL,
  `Theme` varchar(191) NOT NULL,
  `Genre` varchar(191) NOT NULL,
  `Notification` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `preference_id_user_foreign` (`Id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `scene`
--

DROP TABLE IF EXISTS `scene`;
CREATE TABLE IF NOT EXISTS `scene` (
  `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) NOT NULL,
  `Type` varchar(191) NOT NULL,
  `Id_lieu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `scene_id_lieu_foreign` (`Id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `fk_concert_lieu` FOREIGN KEY (`Id_lieu`) REFERENCES `lieu` (`Id`);

--
-- Contraintes pour la table `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `fk_genre_concert` FOREIGN KEY (`Id_concert`) REFERENCES `concert` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_genre_lieu` FOREIGN KEY (`Id_lieu`) REFERENCES `lieu` (`Id`);

--
-- Contraintes pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD CONSTRAINT `fk_partenaire_concert` FOREIGN KEY (`Id_concert`) REFERENCES `concert` (`ID`);

--
-- Contraintes pour la table `points_interest`
--
ALTER TABLE `points_interest`
  ADD CONSTRAINT `fk_points_interest_lieu` FOREIGN KEY (`Id_lieu`) REFERENCES `lieu` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
