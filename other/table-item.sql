/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - dmantis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dmantis` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `dmantis`;

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `qrcode` varchar(50) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  `icondition` enum('good','lost','broken','incomplete') DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `size` decimal(10,0) DEFAULT NULL,
  `area_id` int(2) DEFAULT NULL,
  `quantity` int(2) NOT NULL DEFAULT 0,
  `stock` int(2) NOT NULL DEFAULT 0,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item` */

insert  into `item`(`id`,`name`,`qrcode`,`details`,`icondition`,`filename`,`size`,`area_id`,`quantity`,`stock`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,'SOKET 3/4','ITM240701083608',NULL,'good','ITM240701110044.jpg',36,1,1,0,'2024-07-01 08:36:08',0,'2024-07-01 11:00:44',0),
(2,'SOKET 1 INCI','ITM240701083636',NULL,'good','ITM240701110106.jpg',38,1,1,1,'2024-07-01 08:36:36',0,'2024-07-01 11:01:06',0),
(3,'SOKET 1 INCI','ITM240701083649',NULL,'good',NULL,36,1,1,0,'2024-07-01 08:36:49',0,NULL,NULL),
(4,'SOKET 1 INCI','ITM240701083725',NULL,'good',NULL,60,1,1,1,'2024-07-01 08:37:25',0,NULL,NULL),
(5,'SOKET 1 INCI','ITM240701083752',NULL,'good',NULL,41,1,8,2,'2024-07-01 08:37:52',0,NULL,NULL),
(6,'SOKET 1 1/2 INCI','ITM240701083810',NULL,'good',NULL,1,1,60,35,'2024-07-01 08:38:10',0,NULL,NULL),
(7,'BIT SOKET 3/4 SEGI ENAM','ITM240701083822',NULL,'good',NULL,27,1,1,0,'2024-07-01 08:38:22',0,NULL,NULL),
(8,'BIT SOKET 3/4 SEGI ENAM','ITM240701083832',NULL,'good',NULL,19,1,1,0,'2024-07-01 08:38:32',0,NULL,NULL),
(9,'BOR ELECTRIK 1/2','ITM240701083925',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:39:25',0,NULL,NULL),
(10,'TOOLS BLOWBY','ITM240701083937',NULL,'incomplete',NULL,0,1,1,1,'2024-07-01 08:39:37',0,'2024-07-01 08:48:43',0),
(11,'TOOLS FRONT SEAL HD785','ITM240701083943',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:39:43',0,NULL,NULL),
(12,'TOOL LEVELING REAR SEAL','ITM240701083957',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:39:57',0,NULL,NULL),
(13,'TOOL SEAL OUTPUT ENGINE','ITM240701084003',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:40:03',0,NULL,NULL),
(14,'TOOL CHARGING FIRE SUSPRESSION','ITM240701084009',NULL,'good','ITM240701110130.jpg',0,1,1,1,'2024-07-01 08:40:09',0,'2024-07-01 11:01:30',0),
(15,'HYTORQUE 1 1/2 INCI','ITM240701084017',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:40:17',0,NULL,NULL),
(16,'HYTORQUE 1 INCI','ITM240701084023',NULL,'good','ITM240701110219.jpg',0,1,1,1,'2024-07-01 08:40:23',0,'2024-07-01 11:02:19',0),
(17,'HYTORQUE 3/4 INCI','ITM240701084031',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:40:31',0,NULL,NULL),
(18,'GAGANG HYTORQUE','ITM240701084039',NULL,'good',NULL,0,1,1,0,'2024-07-01 08:40:39',0,NULL,NULL),
(19,'TOOLS HARNES CHEKER','ITM240701084043',NULL,'good',NULL,0,1,1,1,'2024-07-01 08:40:43',0,NULL,NULL),
(20,'RADIATOR CAP TESTER','ITM240701084051',NULL,'good','ITM240701110249.jpg',0,1,1,0,'2024-07-01 08:40:51',0,'2024-07-01 11:02:49',0),
(21,'TAB AND DIE SET','ITM240701084057',NULL,'good',NULL,0,2,3,3,'2024-07-01 08:40:57',0,'2024-07-01 08:42:52',0),
(22,'WEBING SLING 4 TON','ITM240701084111',NULL,'good',NULL,0,2,1,1,'2024-07-01 08:41:11',0,'2024-07-01 08:43:05',0),
(23,'TOOLS CHARGING SUSPENSI','ITM240701084116',NULL,'good',NULL,0,2,1,1,'2024-07-01 08:41:16',0,'2024-07-01 08:43:21',0),
(24,'TOOLS CHARGING ACCUMULATOR','ITM240701084122',NULL,'incomplete',NULL,0,2,1,1,'2024-07-01 08:41:22',0,'2024-07-01 08:49:07',0),
(25,'TOOLS TIACKET','ITM240701084227',NULL,'incomplete',NULL,0,2,1,1,'2024-07-01 08:42:27',0,'2024-07-01 08:49:20',0),
(26,'PRESSURE GAUGE REGULATOR','ITM240701084235',NULL,'good',NULL,0,2,3,3,'2024-07-01 08:42:35',0,NULL,NULL),
(27,'TORQUE WRENCH 7 - 35 KG','ITM240701084350',NULL,'good',NULL,0,2,2,2,'2024-07-01 08:43:50',0,NULL,NULL),
(28,'SLUGING WRENCH','ITM240701084405',NULL,'good',NULL,36,6,1,1,'2024-07-01 08:44:05',0,'2024-07-01 08:45:30',0),
(29,'SLUGING WRENCH','ITM240701084429',NULL,'good',NULL,65,6,1,1,'2024-07-01 08:44:29',0,'2024-07-01 08:45:41',0),
(30,'SLUGING WRENCH','ITM240701084438',NULL,'good',NULL,85,6,1,1,'2024-07-01 08:44:38',0,'2024-07-01 08:45:55',0),
(31,'SLUGING WRENCH','ITM240701084447',NULL,'good',NULL,70,6,1,1,'2024-07-01 08:44:47',0,'2024-07-01 08:46:10',0),
(32,'SLUGING WRENCH','ITM240701084502',NULL,'good',NULL,41,6,1,1,'2024-07-01 08:45:02',0,'2024-07-01 08:46:21',0),
(33,'SLUGING WRENCH','ITM240701084511',NULL,'good','ITM240701110436.jpg',80,6,1,1,'2024-07-01 08:45:11',0,'2024-07-01 11:04:36',0),
(34,'BODY HARNES','ITM240701084708',NULL,'good',NULL,0,6,1,0,'2024-07-01 08:47:08',0,NULL,NULL),
(35,'CHAIN BLOK','ITM240701084725',NULL,'good',NULL,3,5,1,0,'2024-07-01 08:47:25',0,NULL,NULL),
(36,'CHAIN BLOK','ITM240701084736',NULL,'good',NULL,5,5,1,1,'2024-07-01 08:47:36',0,NULL,NULL),
(37,'SIMPLEX ALUMUNIUM HYD','ITM240701084751',NULL,'good',NULL,50,5,1,0,'2024-07-01 08:47:51',0,NULL,NULL),
(38,'SIMPLEX ALUMUNIUM HYD','ITM240701084803',NULL,'good',NULL,25,5,1,1,'2024-07-01 08:48:03',0,NULL,NULL),
(39,'TRACKER 3 KAKI','ITM240701084813',NULL,'good',NULL,0,5,1,1,'2024-07-01 08:48:13',0,NULL,NULL),
(40,'TRACKER 3 KAKI','ITM240701084818',NULL,'good',NULL,0,5,1,1,'2024-07-01 08:48:18',0,NULL,NULL);

/*Table structure for table `rent` */

DROP TABLE IF EXISTS `rent`;

CREATE TABLE `rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `icondition` enum('good','lost','broken','incomplete') DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `rent_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `rent_user` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rent` */

insert  into `rent`(`id`,`item_id`,`status`,`icondition`,`request_date`,`rent_date`,`return_date`,`rent_user`,`quantity`) values 
(1,6,2,'good','2024-07-02 11:26:28',NULL,NULL,4563254,25),
(2,5,2,'good','2024-07-02 11:26:28',NULL,NULL,4563254,6),
(3,7,2,'good','2024-07-02 11:26:28',NULL,NULL,4563254,1),
(4,35,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(5,34,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(6,37,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(7,20,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(8,18,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(9,8,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(10,1,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1),
(11,3,2,'good','2024-07-02 13:44:22',NULL,NULL,1231234,1);

/*Table structure for table `view_item` */

DROP TABLE IF EXISTS `view_item`;

/*!50001 DROP VIEW IF EXISTS `view_item` */;
/*!50001 DROP TABLE IF EXISTS `view_item` */;

/*!50001 CREATE TABLE  `view_item`(
 `id` int(11) ,
 `area_id` int(2) ,
 `area_name` varchar(50) ,
 `name` varchar(50) ,
 `size` decimal(10,0) ,
 `quantity` int(2) ,
 `stock` int(2) ,
 `icondition` enum('good','lost','broken','incomplete') ,
 `filename` varchar(255) ,
 `qrcode` varchar(50) ,
 `insert_date` datetime ,
 `insert_user` int(11) ,
 `update_date` datetime ,
 `update_user` int(11) 
)*/;

/*Table structure for table `view_rent` */

DROP TABLE IF EXISTS `view_rent`;

/*!50001 DROP VIEW IF EXISTS `view_rent` */;
/*!50001 DROP TABLE IF EXISTS `view_rent` */;

/*!50001 CREATE TABLE  `view_rent`(
 `id` int(11) ,
 `item_id` int(11) ,
 `status` tinyint(1) ,
 `icondition` enum('good','lost','broken','incomplete') ,
 `request_date` datetime ,
 `rent_date` datetime ,
 `return_date` datetime ,
 `rent_user` int(11) ,
 `quantity` int(11) ,
 `item_name` varchar(50) ,
 `item_size` decimal(10,0) ,
 `qrcode` varchar(50) ,
 `filename` varchar(255) ,
 `area_name` varchar(50) ,
 `rent_user_name` varchar(255) 
)*/;

/*View structure for view view_item */

/*!50001 DROP TABLE IF EXISTS `view_item` */;
/*!50001 DROP VIEW IF EXISTS `view_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_item` AS (select `i`.`id` AS `id`,`i`.`area_id` AS `area_id`,`a`.`name` AS `area_name`,`i`.`name` AS `name`,`i`.`size` AS `size`,`i`.`quantity` AS `quantity`,`i`.`stock` AS `stock`,`i`.`icondition` AS `icondition`,`i`.`filename` AS `filename`,`i`.`qrcode` AS `qrcode`,`i`.`insert_date` AS `insert_date`,`i`.`insert_user` AS `insert_user`,`i`.`update_date` AS `update_date`,`i`.`update_user` AS `update_user` from (`item` `i` left join `areas` `a` on(`i`.`area_id` = `a`.`id`))) */;

/*View structure for view view_rent */

/*!50001 DROP TABLE IF EXISTS `view_rent` */;
/*!50001 DROP VIEW IF EXISTS `view_rent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rent` AS (select `r`.`id` AS `id`,`r`.`item_id` AS `item_id`,`r`.`status` AS `status`,`r`.`icondition` AS `icondition`,`r`.`request_date` AS `request_date`,`r`.`rent_date` AS `rent_date`,`r`.`return_date` AS `return_date`,`r`.`rent_user` AS `rent_user`,`r`.`quantity` AS `quantity`,`v`.`name` AS `item_name`,`v`.`size` AS `item_size`,`v`.`qrcode` AS `qrcode`,`v`.`filename` AS `filename`,`v`.`area_name` AS `area_name`,`u`.`name` AS `rent_user_name` from ((`rent` `r` left join `view_item` `v` on(`r`.`item_id` = `v`.`id`)) left join `users` `u` on(`r`.`rent_user` = `u`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
