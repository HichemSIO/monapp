-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.1.34-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour annuaire
DROP DATABASE IF EXISTS `annuaire`;
CREATE DATABASE IF NOT EXISTS `annuaire` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `annuaire`;

-- Listage de la structure de la table annuaire. membres
DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(59) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table annuaire.membres : ~16 rows (environ)
DELETE FROM `membres`;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` (`id`, `nom`, `prenom`) VALUES
	(4, 'Quatre', 'Quart'),
	(5, 'Cinq', 'Cinq'),
	(6, 'Six', 'Six'),
	(7, 'Sept', 'Sept'),
	(8, 'Huit', 'Huit'),
	(9, 'Neuf', 'Neuf'),
	(10, 'Dix', 'Dix');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
