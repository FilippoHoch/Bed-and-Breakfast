
CREATE DATABASE IF NOT EXISTS `b&b` 
USE `b&b`;

CREATE TABLE IF NOT EXISTS `soggiornare` (
  `nStanza` tinyint(4) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `inizio` date NOT NULL,
  `fine` date NOT NULL,
  `nPersone` tinyint(4) DEFAULT NULL,
  `colazione` bit(1) DEFAULT NULL,
  PRIMARY KEY (`nStanza`,`id_utente`,`inizio`,`fine`),
  KEY `FK_soggiornare_utenti` (`id_utente`),
  CONSTRAINT `FK_soggiornare_stanze` FOREIGN KEY (`nStanza`) REFERENCES `stanze` (`nStanza`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_soggiornare_utenti` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id_utente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


REPLACE INTO `soggiornare` (`nStanza`, `id_utente`, `inizio`, `fine`, `nPersone`, `colazione`) VALUES
	(1, 7, '2022-04-21', '2022-04-23', 2, b'0'),
	(2, 7, '2022-04-19', '2022-04-19', 2, b'1'),
	(3, 7, '2022-04-19', '2022-04-30', 1, b'1'),
	(3, 7, '2022-04-22', '2022-04-24', 1, b'1');


CREATE TABLE IF NOT EXISTS `stanze` (
  `nStanza` tinyint(4) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `posti` tinyint(4) NOT NULL,
  `piano` enum('Terra','Seminterrato','Primo') NOT NULL,
  PRIMARY KEY (`nStanza`)
) ENGINE=InnoDB;


REPLACE INTO `stanze` (`nStanza`, `nome`, `posti`, `piano`) VALUES
	(1, NULL, 2, 'Terra'),
	(2, NULL, 3, 'Seminterrato'),
	(3, NULL, 4, 'Terra');


CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `nome` varchar(20) NOT NULL DEFAULT '',
  `cognome` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB;


REPLACE INTO `utenti` (`id_utente`, `email`, `nome`, `cognome`, `password`) VALUES
	(7, 'hoch.filippo@gmail.com', 'Filippo', 'Hoch', 'sus'),
	(8, 'admin@gmail.com', 'admin', 'admin', 'admin');
