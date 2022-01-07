SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `exam` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `exam`;

DROP TABLE IF EXISTS `project_setting`;
CREATE TABLE `project_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(255) NOT NULL,
  `setting_value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `project_setting` (`id`, `setting_key`, `setting_value`) VALUES
(1,	'database_connected',	'Database Success Connected, Klik next to continue');
