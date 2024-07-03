/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - warehouse
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`warehouse` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `warehouse`;

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` varchar(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `family` varchar(10) DEFAULT NULL,
  `subfamily` varchar(10) DEFAULT NULL,
  `valcl` varchar(10) DEFAULT NULL,
  `pgr` varchar(3) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `item_type` enum('material','goods') DEFAULT NULL,
  `plant` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `items` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
