# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: myWebshop
# Generation Time: 2020-08-03 14:52:39 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table items_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items_main`;

CREATE TABLE `items_main` (
  `itemNumber` varchar(50) NOT NULL DEFAULT '',
  `itemName` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL,
  `mass` varchar(50) NOT NULL COMMENT 'W x H x D',
  `weight` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `itemGroup` int(1) NOT NULL,
  PRIMARY KEY (`itemNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `items_main` WRITE;
/*!40000 ALTER TABLE `items_main` DISABLE KEYS */;

INSERT INTO `items_main` (`itemNumber`, `itemName`, `description`, `mass`, `weight`, `status`, `itemGroup`)
VALUES
	('0ef60e4d9de57618e47d15c737f32dcd','new item','new item','12 x 12 x 12','12','Available',3),
	('23a7a845023b7cc22e2f2fceb210959d','shoes','shoes','10 x 7 x 30','500g','Available',2),
	('3d252f89c65e0e1926becfdab9561b15','other tv','tv','1000 x 700 x 30','20000g','Available',1),
	('46a9032dd7ef3ca8acc9c34cff86afd5','Teddy Bear','stuffed bear','30 x 50 x 30','500g','Available',3),
	('4d7b098c8e37b84b31780a6bacd48477','another new item','still more','12 x 12 x 12','12','Available',3),
	('9d2381166b0603e52acc391b99abc37b','tv','tv','2000 x 1000 x 20','10000g','Available',1),
	('d8e741680047e83ba45eb8eb584acb26','blue shoes','blue shoes','12 x 7 x 30','500g','Available',1);

/*!40000 ALTER TABLE `items_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table session
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session` (
  `sessionID` varchar(50) NOT NULL DEFAULT '',
  `sessionOpen` int(15) NOT NULL,
  `userID` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;

INSERT INTO `session` (`sessionID`, `sessionOpen`, `userID`)
VALUES
	('302d3d97b7f89c1931da6165ad1e310d',1596466080,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('3a5e9f6949374ecf4315fe2dade06007',1594137873,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('7da75eb920a798d71520f79a21948668',1596466099,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('841906006b7ade553e8e0f5a5563d9f4',1594137631,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('8f1e2819a34b3bd69e2279bbdf833586',1594137734,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('96d2e8355d40e01d5abb0226bde33036',1594137655,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('bf304c3ef6ab7c9f0235d6ad8a909d14',1596465660,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('c21e28d995ddbdd45cc07a79442881bb',1594138622,'bcd9a3530e52da86a9b7a0e8dd656b95'),
	('e7c3e2b3c3a0fa1e5dfddb24c234eed0',1594205604,'bcd9a3530e52da86a9b7a0e8dd656b95');

/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table session_actions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `session_actions`;

CREATE TABLE `session_actions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `action` longtext NOT NULL,
  `action_time` int(15) NOT NULL,
  `sessionID` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `session_actions` WRITE;
/*!40000 ALTER TABLE `session_actions` DISABLE KEYS */;

INSERT INTO `session_actions` (`id`, `action`, `action_time`, `sessionID`)
VALUES
	(2,'User logged in',1594137631,'841906006b7ade553e8e0f5a5563d9f4'),
	(3,'User logged in',1594137655,'96d2e8355d40e01d5abb0226bde33036'),
	(4,'User logged in',1594137734,'8f1e2819a34b3bd69e2279bbdf833586'),
	(5,'User logged in',1594137873,'3a5e9f6949374ecf4315fe2dade06007'),
	(6,'user has entered Dashboard',1594137873,'3a5e9f6949374ecf4315fe2dade06007'),
	(7,'user has entered Add New User',1594137909,'3a5e9f6949374ecf4315fe2dade06007'),
	(8,'user has entered Add New User',1594138392,'3a5e9f6949374ecf4315fe2dade06007'),
	(9,'user has entered Add New Item',1594138396,'3a5e9f6949374ecf4315fe2dade06007'),
	(10,'user has entered Add New Item',1594138474,'3a5e9f6949374ecf4315fe2dade06007'),
	(11,'item information added',1594138496,'3a5e9f6949374ecf4315fe2dade06007'),
	(12,'user has entered User Overview',1594138510,'3a5e9f6949374ecf4315fe2dade06007'),
	(13,'user deleted',1594138513,'3a5e9f6949374ecf4315fe2dade06007'),
	(14,'user has entered User Overview',1594138529,'3a5e9f6949374ecf4315fe2dade06007'),
	(15,'user edited',1594138545,'3a5e9f6949374ecf4315fe2dade06007'),
	(16,'user edited',1594138552,'3a5e9f6949374ecf4315fe2dade06007'),
	(17,'user has entered User Overview',1594138608,'3a5e9f6949374ecf4315fe2dade06007'),
	(18,'user has entered Dashboard',1594138609,'3a5e9f6949374ecf4315fe2dade06007'),
	(19,'User logged in',1594138622,'c21e28d995ddbdd45cc07a79442881bb'),
	(20,'user has entered Dashboard',1594138623,'c21e28d995ddbdd45cc07a79442881bb'),
	(21,'User logged in',1594205604,'e7c3e2b3c3a0fa1e5dfddb24c234eed0'),
	(22,'user has entered Dashboard',1594205604,'e7c3e2b3c3a0fa1e5dfddb24c234eed0'),
	(23,'user has entered Add New Item',1594205607,'e7c3e2b3c3a0fa1e5dfddb24c234eed0'),
	(24,'item information added',1594205647,'e7c3e2b3c3a0fa1e5dfddb24c234eed0'),
	(25,'User logged in',1596465660,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(26,'user has entered Dashboard',1596465660,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(27,'user has entered Dashboard',1596465711,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(28,'user has entered Dashboard',1596465713,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(29,'user has entered Dashboard',1596466009,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(30,'user has entered Dashboard',1596466010,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(31,'user has entered Dashboard',1596466076,'bf304c3ef6ab7c9f0235d6ad8a909d14'),
	(32,'User logged in',1596466080,'302d3d97b7f89c1931da6165ad1e310d'),
	(33,'user has entered Dashboard',1596466080,'302d3d97b7f89c1931da6165ad1e310d'),
	(34,'user has entered Dashboard',1596466095,'302d3d97b7f89c1931da6165ad1e310d'),
	(35,'User logged in',1596466099,'7da75eb920a798d71520f79a21948668'),
	(36,'user has entered Dashboard',1596466099,'7da75eb920a798d71520f79a21948668');

/*!40000 ALTER TABLE `session_actions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_main`;

CREATE TABLE `users_main` (
  `userID` varchar(50) NOT NULL DEFAULT '',
  `lastName` varchar(100) NOT NULL DEFAULT '',
  `firstName` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0=frozen;1=active;2=deleted',
  `deletedOn` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users_main` WRITE;
/*!40000 ALTER TABLE `users_main` DISABLE KEYS */;

INSERT INTO `users_main` (`userID`, `lastName`, `firstName`, `email`, `status`, `deletedOn`)
VALUES
	('756235a6831418b23e9bceb59ae2c1fd','Jolly','Kristin','kj@kj.com',0,1594043278),
	('bcd9a3530e52da86a9b7a0e8dd656b95','Jolly','Cody','cj@cj.com',1,1594138513);

/*!40000 ALTER TABLE `users_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users_pw
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users_pw`;

CREATE TABLE `users_pw` (
  `userID` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users_pw` WRITE;
/*!40000 ALTER TABLE `users_pw` DISABLE KEYS */;

INSERT INTO `users_pw` (`userID`, `password`)
VALUES
	('756235a6831418b23e9bceb59ae2c1fd','c9zH1D//A1jA6'),
	('bcd9a3530e52da86a9b7a0e8dd656b95','eb89ctWWSx5/Q');

/*!40000 ALTER TABLE `users_pw` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
