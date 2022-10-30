-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 30 oct. 2022 à 20:49
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogue`
--
CREATE DATABASE IF NOT EXISTS `blogue` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `blogue`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `img_url` varchar(240) NOT NULL,
  `categorie_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `FK_articles_category` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `content`, `img_url`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'NFT', 'Un jeton non fongible est une donnée valorisée composée d\'un type de jeton cryptographique qui représente un objet, auquel est rattachée une identité numérique. Cette donnée est stockée et authentifiée grâce à un protocole de chaîne de blocs, qui lui accorde par là même sa première valeur.', 'https://pic.clubic.com/v1/images/1958388/raw?fit=max&width=1200&hash=d3303963ba52a5bc5c1f350f3c681c1c4e4078f2', 0, '2022-10-30 01:41:21', NULL),
(2, 'Elon musk', 'Elon Musk, né le 28 juin 1971 à Pretoria, est un entrepreneur, chef d\'entreprises et milliardaire sud-africano-canado-américain. Il est cofondateur et président-directeur général de la société astronautique SpaceX, directeur général de la société automobile Tesla', 'https://images.radio-canada.ca/q_auto,w_960/v1/ici-info/16x9/elon-musk-met-gala.jpg', 1, '2022-10-30 01:41:21', NULL),
(3, 'Le dodgcoin', 'Dogecoin est une crypto-monnaie avec une image du Shiba Inu chien du m&egrave;me &laquo; Doge &raquo; comme logo. Pr&eacute;sent&eacute; comme une blague le 6 d&eacute;cembre 2013, le Dogecoin a rapidement d&eacute;velopp&eacute; sa propre communaut&eacute; en ligne et a atteint une capitalisation de 60 millions de dollars en janvier 2014.', 'https://cdn.coingape.com/wp-content/uploads/2022/09/23115041/Dogecoin-1.jpeg', 2, '2022-10-30 10:34:36', '2022-10-30 14:48:59'),
(4, 'Les ordinateurs quantiques', 'Un calculateur quantique utilise les propriétés quantiques de la matière, telles que la superposition et l\'intrication afin d\'effectuer des opérations sur des données.', 'https://img-0.journaldunet.com/eegw2Q4WljXHIUrz3Zm4JV-lS8Y=/1500x/smart/2bdadb9329f64cfd9cc804a06af8e13a/ccmcms-jdn/10212428-un-ordinateur-quantique-serait-100-millions-de-fois-plus-rapide-qu-un-ordinateur-conventionnel.jpg', 2, '2022-10-30 13:29:27', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `name`) VALUES
(1, 'Front-end'),
(2, 'Crypto-monnaie'),
(3, 'Back-end'),
(4, 'Framework');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
