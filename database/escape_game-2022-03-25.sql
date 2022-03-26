-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : sam. 26 mars 2022 à 16:04
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
-- Base de données : `escape_game`
--

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `nb_player` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`room_id`,`schedule_id`,`date`),
  KEY `customer_id` (`customer_id`),
  KEY `fk_schedule_booking` (`schedule_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`id`, `room_id`, `customer_id`, `schedule_id`, `date`, `nb_player`, `total_price`) VALUES
(11, 1, 3, 2, '2022-02-22', 10, 200),
(9, 1, 1, 3, '2022-02-26', 5, 120),
(7, 1, 6, 4, '2022-02-24', 6, 80),
(5, 1, 10, 7, '2022-02-18', 2, 40),
(4, 2, 9, 1, '2022-02-25', 6, 134),
(12, 2, 5, 2, '2022-04-01', 12, 260),
(8, 2, 13, 3, '2022-02-19', 8, 160),
(13, 2, 9, 4, '2022-04-01', 4, 80),
(14, 2, 10, 6, '2022-04-01', 6, 120),
(10, 2, 2, 8, '2022-02-21', 3, 60),
(15, 2, 6, 8, '2022-04-01', 12, 240),
(6, 3, 4, 6, '2022-02-18', 12, 220),
(1, 4, 16, 1, '2022-03-01', 12, 240),
(3, 4, 7, 4, '2022-02-25', 5, 120),
(2, 4, 16, 5, '2022-03-01', 12, 240);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Elon', 'Musk', 'elo.musk@yahoo.fr'),
(2, 'Bob', 'Leponge', 'bob.leponge@ocean.com'),
(3, 'Bob', 'Marley', 'bob.marley@reggae.com'),
(4, 'Thomas', 'Pesquet', 'thomas.pesquet@iss.com'),
(5, 'Michael', 'Jackson', 'mj@neverland.com'),
(6, 'Lapin', 'Cretin', 'lapincretin@madworld.com'),
(7, 'Georges', 'Michael', 'gmichael@free.fr'),
(8, 'Georges', 'Michael', 'gmichael@gmail.com'),
(9, 'Alexandre', 'Astier', 'aastier@space.com'),
(10, 'Jean-claude', 'Duss', 'jcduss@yopmail.com'),
(11, 'Michael', 'Cain', 'mcain@blairwirtch.com'),
(13, 'Bruce', 'Willis', 'bwillis@gmail.com'),
(16, 'Jeremy', 'Iron', 'jiron@gmail.com'),
(32, 'fsdgd', 'dfhdh', 'sfdhsg');

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 60,
  `forbidden18yearOld` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'interdit aux moin de 18 ans',
  `niveau` enum('Facile','Normal','Difficile') NOT NULL DEFAULT 'Normal' COMMENT 'niveau de difficulté',
  `min_player` int(11) NOT NULL DEFAULT 2,
  `max_player` int(11) NOT NULL DEFAULT 12,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `age` int(11) NOT NULL DEFAULT 16,
  `alt_text` text DEFAULT NULL,
  `img_css` enum('roomCard1Img','roomCard2Img','roomCard3Img','roomCard4Img') NOT NULL DEFAULT 'roomCard2Img',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COMMENT='tables des salles';

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `duration`, `forbidden18yearOld`, `niveau`, `min_player`, `max_player`, `new`, `age`, `alt_text`, `img_css`) VALUES
(1, 'Le chateau ambulant', 'Dans cette épreuve, vous vous réveillez dans la chambre de HOWL, où vous devez trouver un moyen de sortir avant qu\'il ne revienne !\r\nDéjouez les pièges et les sortilèges, utilisez des objets magiques et enchantés pour vous délivrer.', 70, 0, 'Facile', 4, 12, 0, 16, 'Laissez-vous guider par CALCIFER, les novices en énigmes passeront un agréable moment et s\'amuseront dans un univers coloré et magique!\r\nAccessible à tous.', 'roomCard1Img'),
(2, 'Chucky', 'Rejouez une des scènes culte du film CHUCKY, échappez à cette poupée maléfique au travers de casse-têtes macabres et sanglants !', 60, 1, 'Difficile', 4, 12, 0, 17, 'Ames sensibles s\'abstenir, frissons garantis, cette épreuve s\'adresse aux amateurs de frissons et de sensations fortes !\r\nAccessible à tous.', 'roomCard2Img'),
(3, 'Star Wars', 'Dans cette nouvelle aventure, incarnez des rebelles prisonniers dans l\'Etoile Noire.\r\nEchappez-vous avant que vos alliés ne la fassent exploser.\r\nLaissez-vous guider par la voix des JEDI ou des SITH, à vous de choisir !\r\nLe compte à rebours commence !', 60, 0, 'Normal', 6, 8, 1, 16, 'Cette épreuve s\'adresse aux Jedi aguerris et aux joueurs expérimentés.\r\nToutefois libre à vous de tenter de défier l\'Empire, la force saura vous guider !\r\nAccessible à tous.', 'roomCard4Img'),
(4, 'Les souterrains de Bordeaux', 'Les souterrains de Bordeaux regorgent de mystères et attendant d\'être explorés.\r\nPartez à l\'aventure, lancez-vous dans ce labyrinthe, et trouvez le trésor de la ville.\r\nEscaladez, rampez et déjouez les pièges, mais attention, la porte se referme au fur et à mesure, ne restez pas enfermés !', 70, 1, 'Difficile', 5, 7, 0, 18, 'Cette épreuve nécessite d\'avoir une certaine condition physique et peut ne pas convenir à tous mais nous pouvons vous proposer un parcours type.', 'roomCard3Img');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heure` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `schedule`
--

INSERT INTO `schedule` (`id`, `heure`) VALUES
(1, '10:30:00'),
(2, '12:00:00'),
(3, '13:30:00'),
(4, '15:00:00'),
(5, '16:30:00'),
(6, '18:00:00'),
(7, '19:30:00'),
(8, '21:00:00'),
(9, '22:30:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_customers_booking` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `fk_rooms_booking` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `fk_schedule_booking` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
