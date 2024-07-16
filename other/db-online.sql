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

USE `demantis_main`;

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` varchar(25) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `areas` */

insert  into `areas`(`id`,`name`,`detail`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,'A1','First Container','2022-06-21 13:39:21','490155','2024-06-28 09:28:53','0'),
(2,'B','Near Door','2022-06-21 13:40:58','490155','2024-06-28 09:29:01','0'),
(3,'C','','2022-06-21 13:41:24','490155','2024-06-04 15:17:26','490155'),
(4,'D','','2022-06-21 13:41:40','490155','2024-06-04 15:17:31','490155'),
(5,'E','','2022-06-21 13:41:55','490155','2024-06-04 15:17:39','490155'),
(6,'F','','2022-06-21 13:44:07','490155','2024-06-04 15:17:57','490155'),
(7,'G','','2022-06-21 13:44:34','490155','2024-06-04 15:18:08','490155'),
(8,'H','','2022-06-30 09:09:01','490155','2024-06-04 15:18:48','490155'),
(9,'I','','2022-10-12 10:03:02','490155','2024-06-04 15:18:37','490155'),
(10,'J','','2024-06-04 15:18:58','490155',NULL,NULL),
(11,'K','','2024-06-28 09:27:01','0',NULL,NULL);

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT 0,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) values 
('7a213de0dc261a5ccc695506ac2fefab','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',1721096759,''),
('c87785376fdf2fbeb0080423449e434a','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',1721103584,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"sess-id\";s:5:\"admin\";s:9:\"sess-name\";s:5:\"Admin\";s:9:\"sess-role\";s:5:\"admin\";s:15:\"sess-personalid\";N;s:13:\"sess-loggedin\";b:1;s:14:\"sess-starttime\";s:19:\"2024-07-16 11:19:48\";}'),
('fc7e9aac2ff8fef2bd028b46a81a0007','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',1721096428,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"sess-id\";s:5:\"admin\";s:9:\"sess-name\";s:5:\"Admin\";s:9:\"sess-role\";s:5:\"admin\";s:15:\"sess-personalid\";N;s:13:\"sess-loggedin\";b:1;s:14:\"sess-starttime\";s:19:\"2024-07-16 08:15:09\";}');

/*Table structure for table `configs` */

DROP TABLE IF EXISTS `configs`;

CREATE TABLE `configs` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(100) DEFAULT NULL,
  `config_value` text DEFAULT NULL,
  `config_type` varchar(25) DEFAULT 'text',
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

/*Data for the table `configs` */

insert  into `configs`(`config_id`,`config_name`,`config_value`,`config_type`,`insert_date`,`update_date`) values 
(1,'app_su',NULL,'json','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(2,'app_name','D\'Mantis - PT Kalimantan Prima Persada','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(3,'app_meta','[{\"charset\":\"UTF-8\"},{\"name\":\"author\",\"content\":\"Hunter Nainggolan\r\n\"},{\"name\":\"title\",\"content\":\"Whats On In Indonesia\"},{\"name\":\"description\",\"content\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\"},{\"name\":\"keywords\",\"content\":\"efaktur, pajak\"},{\"name\":\"viewport\",\"content\":\"width=device-width, initial-scale=1.0\"}]','json','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(4,'app_base_url','https://www.demantis.com/','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(5,'app_assets_path','{app_base_url}assets','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(6,'app_manual','{app_base_url}manuals','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(7,'app_default_timezone','Asia/Jakarta','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(8,'app_title','D\'Mantis - PT Kalimantan Prima Persada','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(9,'app_version','1.0.0','text',NULL,NULL),
(10,'app_codename','development','text',NULL,NULL),
(11,'app_icon','{app_assets_path}/img/fav.ico','text',NULL,NULL),
(12,'paging_rowlimit','20','text',NULL,NULL),
(13,'paging_numlinks','4','text',NULL,NULL),
(14,'app_link','[\r\n{\"href\" : \"{app_icon}\",\"rel\" : \"shortcut icon\"},\r\n{\"href\" : \"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/bootstrap/css/bootstrap.min.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/bootstrap-icons/bootstrap-icons.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/boxicons/css/boxicons.min.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/quill/quill.snow.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/quill/quill.bubble.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/remixicon/remixicon.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/simple-datatables/style.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/css/nucleo.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/css/style.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"}\r\n]','json',NULL,NULL),
(15,'app_script','[{\"src\" : \"{app_assets_path}/plugins/apexcharts/apexcharts.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/bootstrap/js/bootstrap.bundle.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/chart.js/chart.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/echarts/echarts.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/quill/quill.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/simple-datatables/simple-datatables.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/tinymce/tinymce.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/php-email-form/validate.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/js/main.js\",\"type\" : \"text/javascript\"}]\r\n','json',NULL,NULL),
(52,'login_link',NULL,'text',NULL,NULL),
(53,'login_script',NULL,'text',NULL,NULL);

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
  `istatus` tinyint(2) NOT NULL DEFAULT 0,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item` */

insert  into `item`(`id`,`name`,`qrcode`,`details`,`icondition`,`filename`,`size`,`area_id`,`istatus`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,'SOKET 3/4','ITM240701083608',NULL,'lost','ITM240701110044.jpg',36,1,0,'2024-07-01 08:36:08',0,'2024-07-01 11:00:44',0),
(2,'SOKET 1 INCI','ITM240701083636',NULL,'broken','ITM240701110106.jpg',38,1,0,'2024-07-01 08:36:36',0,'2024-07-01 11:01:06',0),
(3,'SOKET 1 INCI','ITM240701083649',NULL,'good',NULL,36,1,1,'2024-07-01 08:36:49',0,NULL,NULL),
(4,'SOKET 1 INCI','ITM240701083725',NULL,'incomplete',NULL,60,1,0,'2024-07-01 08:37:25',0,NULL,NULL),
(5,'SOKET 1 INCI','ITM240701083752',NULL,'lost',NULL,41,1,0,'2024-07-01 08:37:52',0,NULL,NULL),
(6,'SOKET 1 1/2 INCI','ITM240701083810',NULL,'broken',NULL,1,1,0,'2024-07-01 08:38:10',0,NULL,NULL),
(7,'BIT SOKET 3/4 SEGI ENAM','ITM240701083822',NULL,'good',NULL,27,1,0,'2024-07-01 08:38:22',0,NULL,NULL),
(8,'BIT SOKET 3/4 SEGI ENAM','ITM240701083832',NULL,'good',NULL,19,1,1,'2024-07-01 08:38:32',0,NULL,NULL),
(9,'BOR ELECTRIK 1/2','ITM240701083925',NULL,'good',NULL,0,1,1,'2024-07-01 08:39:25',0,NULL,NULL),
(10,'TOOLS BLOWBY','ITM240701083937',NULL,'incomplete',NULL,0,1,0,'2024-07-01 08:39:37',0,'2024-07-01 08:48:43',0),
(11,'TOOLS FRONT SEAL HD785','ITM240701083943',NULL,'good',NULL,0,1,1,'2024-07-01 08:39:43',0,NULL,NULL),
(12,'TOOL LEVELING REAR SEAL','ITM240701083957',NULL,'good',NULL,0,1,1,'2024-07-01 08:39:57',0,NULL,NULL),
(13,'TOOL SEAL OUTPUT ENGINE','ITM240701084003',NULL,'good',NULL,0,1,0,'2024-07-01 08:40:03',0,NULL,NULL),
(14,'TOOL CHARGING FIRE SUSPRESSION','ITM240701084009',NULL,'good','ITM240701110130.jpg',0,1,1,'2024-07-01 08:40:09',0,'2024-07-01 11:01:30',0),
(15,'HYTORQUE 1 1/2 INCI','ITM240701084017',NULL,'good',NULL,0,1,1,'2024-07-01 08:40:17',0,NULL,NULL),
(16,'HYTORQUE 1 INCI','ITM240701084023',NULL,'good','ITM240701110219.jpg',0,1,1,'2024-07-01 08:40:23',0,'2024-07-01 11:02:19',0),
(17,'HYTORQUE 3/4 INCI','ITM240701084031',NULL,'good',NULL,0,1,1,'2024-07-01 08:40:31',0,NULL,NULL),
(18,'GAGANG HYTORQUE','ITM240701084039',NULL,'good',NULL,0,1,1,'2024-07-01 08:40:39',0,NULL,NULL),
(19,'TOOLS HARNES CHEKER','ITM240701084043',NULL,'good',NULL,0,1,1,'2024-07-01 08:40:43',0,NULL,NULL),
(20,'RADIATOR CAP TESTER','ITM240701084051',NULL,'good','ITM240701110249.jpg',0,1,0,'2024-07-01 08:40:51',0,'2024-07-01 11:02:49',0),
(21,'TAB AND DIE SET','ITM240701084057',NULL,'good',NULL,0,2,1,'2024-07-01 08:40:57',0,'2024-07-01 08:42:52',0),
(22,'WEBING SLING 4 TON','ITM240701084111',NULL,'good',NULL,0,2,1,'2024-07-01 08:41:11',0,'2024-07-01 08:43:05',0),
(23,'TOOLS CHARGING SUSPENSI','ITM240701084116',NULL,'good',NULL,0,2,1,'2024-07-01 08:41:16',0,'2024-07-01 08:43:21',0),
(24,'TOOLS CHARGING ACCUMULATOR','ITM240701084122',NULL,'incomplete',NULL,0,2,0,'2024-07-01 08:41:22',0,'2024-07-01 08:49:07',0),
(25,'TOOLS TIACKET','ITM240701084227',NULL,'incomplete',NULL,0,2,0,'2024-07-01 08:42:27',0,'2024-07-01 08:49:20',0),
(26,'PRESSURE GAUGE REGULATOR','ITM240701084235',NULL,'good',NULL,0,2,1,'2024-07-01 08:42:35',0,NULL,NULL),
(27,'TORQUE WRENCH 7 - 35 KG','ITM240701084350',NULL,'good',NULL,0,2,0,'2024-07-01 08:43:50',0,NULL,NULL),
(28,'SLUGING WRENCH','ITM240701084405',NULL,'good',NULL,36,6,1,'2024-07-01 08:44:05',0,'2024-07-01 08:45:30',0),
(29,'SLUGING WRENCH','ITM240701084429',NULL,'good',NULL,65,6,1,'2024-07-01 08:44:29',0,'2024-07-01 08:45:41',0),
(30,'SLUGING WRENCH','ITM240701084438',NULL,'good',NULL,85,6,1,'2024-07-01 08:44:38',0,'2024-07-01 08:45:55',0),
(31,'SLUGING WRENCH','ITM240701084447',NULL,'good',NULL,70,6,1,'2024-07-01 08:44:47',0,'2024-07-01 08:46:10',0),
(32,'SLUGING WRENCH','ITM240701084502',NULL,'good',NULL,41,6,1,'2024-07-01 08:45:02',0,'2024-07-01 08:46:21',0),
(33,'SLUGING WRENCH','ITM240701084511',NULL,'good','ITM240701110436.jpg',80,6,1,'2024-07-01 08:45:11',0,'2024-07-01 11:04:36',0),
(34,'BODY HARNES','ITM240701084708',NULL,'good',NULL,0,6,0,'2024-07-01 08:47:08',0,NULL,NULL),
(35,'CHAIN BLOK','ITM240701084725',NULL,'good',NULL,3,5,1,'2024-07-01 08:47:25',0,NULL,NULL),
(36,'CHAIN BLOK','ITM240701084736',NULL,'good',NULL,5,5,1,'2024-07-01 08:47:36',0,NULL,NULL),
(37,'SIMPLEX ALUMUNIUM HYD','ITM240701084751',NULL,'good',NULL,50,5,1,'2024-07-01 08:47:51',0,NULL,NULL),
(38,'SIMPLEX ALUMUNIUM HYD','ITM240701084803',NULL,'good',NULL,25,5,1,'2024-07-01 08:48:03',0,NULL,NULL),
(39,'TRACKER 3 KAKI','ITM240701084813',NULL,'good',NULL,0,5,0,'2024-07-01 08:48:13',0,NULL,NULL),
(40,'TRACKER 3 KAKI','ITM240701084818',NULL,'good',NULL,0,5,1,'2024-07-01 08:48:18',0,NULL,NULL);

/*Table structure for table `rent` */

DROP TABLE IF EXISTS `rent`;

CREATE TABLE `rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `rstatus` tinyint(1) DEFAULT NULL,
  `icondition` enum('good','lost','broken','incomplete') DEFAULT NULL,
  `rent_date` datetime DEFAULT NULL,
  `rent_user` varchar(25) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `approve_user` varchar(25) DEFAULT NULL,
  `approve_date` datetime DEFAULT NULL,
  `return_user` varchar(25) DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `reject_user` varchar(25) DEFAULT NULL,
  `reject_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rent` */

insert  into `rent`(`id`,`item_id`,`rstatus`,`icondition`,`rent_date`,`rent_user`,`request_date`,`approve_user`,`approve_date`,`return_user`,`return_date`,`reject_user`,`reject_date`) values 
(1,3,0,'good','2024-07-12 08:42:57','1231234','2024-07-12 08:42:40','admin','2024-07-12 08:42:47','admin','2024-07-15 08:31:09',NULL,NULL),
(2,4,0,'good','2024-07-12 08:42:58','1231234','2024-07-12 08:42:40','admin','2024-07-12 08:42:47',NULL,NULL,NULL,NULL),
(3,6,0,'good','2024-07-12 08:43:00','1231234','2024-07-12 08:42:40','admin','2024-07-12 08:42:47',NULL,NULL,NULL,NULL),
(4,5,0,'good','2024-07-12 08:43:03','1231234','2024-07-12 08:42:40','admin','2024-07-12 08:42:47',NULL,NULL,NULL,NULL),
(5,7,1,'good','2024-07-16 09:21:43','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL),
(6,13,1,'good','2024-07-16 09:21:42','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL),
(7,20,1,'good','2024-07-16 09:21:48','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL),
(8,27,1,'good','2024-07-16 09:21:50','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL),
(9,34,1,'good','2024-07-16 09:21:51','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL),
(10,39,1,'good','2024-07-16 09:21:40','4569856','2024-07-16 08:18:50','admin','2024-07-16 09:20:55',NULL,NULL,NULL,NULL);

/*Table structure for table `report` */

DROP TABLE IF EXISTS `report`;

CREATE TABLE `report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rent_id` int(11) DEFAULT NULL,
  `reason` enum('incomplete','broken','lost') DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `charged` varchar(255) DEFAULT NULL,
  `determined` varchar(50) DEFAULT NULL,
  `dposition` varchar(50) DEFAULT NULL,
  `acknowledge` varchar(50) DEFAULT NULL,
  `aposition` varchar(50) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `report_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `report` */

insert  into `report`(`id`,`rent_id`,`reason`,`filename`,`detail`,`location`,`charged`,`determined`,`dposition`,`acknowledge`,`aposition`,`report_date`,`report_user`) values 
(1,2,'incomplete','R_240715150630.PNG','jadi kan, diapakan dia lah apanya itu, terus kenalah ininya. Padahal sudah kubilang jangan lah kau ikut beperang, sekarang mati kau. dimakan cacing','W/S LANGAP','Hanna Nahampun;Gita Nahampun','Jeremy Nainggolan','Plant Planner','Hunter Nainggolan','Plant Group Leader','2024-07-15','admin'),
(2,3,'broken','R_240715151130.PNG','Biawak','Samudera','Ronaldo','Messi','Plant Planner','Pep Guardiola','Plant Group Leader','2024-07-15','admin'),
(3,4,'lost','R_240715151245.PNG','Masuk paret','Lubang Buaya','N\'Golo Kante','Buffon','Plant Planner','Wayne Rooney','Plant Group Leader','2024-07-15','admin');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(17) NOT NULL,
  `password` char(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(14) DEFAULT NULL,
  `jobposition` varchar(52) DEFAULT NULL,
  `roles` enum('admin','user') DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` varchar(25) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`password`,`name`,`phonenumber`,`jobposition`,`roles`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
('1231234',NULL,'Test dus','','Mekanik','user','2024-06-26 16:02:29','1',NULL,NULL),
('321321',NULL,'Guest',NULL,NULL,'user',NULL,NULL,NULL,NULL),
('4563254',NULL,'Sustrisno Nainggolan','08455545845',NULL,'user','2024-06-26 15:42:31','1','2024-06-26 15:59:48','1'),
('4569856',NULL,'Sutrisno','0845668541',NULL,'user','2024-06-26 15:43:48','1',NULL,NULL),
('admin','d033e22ae348aeb5660fc2140aec35850c4da997','Admin',NULL,NULL,'admin',NULL,NULL,NULL,NULL),
('uaser1','d033e22ae348aeb5660fc2140aec35850c4da997','User','0852369741',NULL,'user',NULL,NULL,'2024-06-28 16:09:41','0');

/* Procedure structure for procedure `get_active_rent` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_active_rent` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `get_active_rent`()
BEGIN
	SELECT
  rent_user AS userid,
  rent_user_name AS user_name,
  phonenumber,
  rent_date,
  count(id) AS total
FROM
  view_rent where rstatus = 1
GROUP BY rent_user;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `get_approved_rent` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_approved_rent` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `get_approved_rent`()
BEGIN
	SELECT
  rent_user AS userid,
  rent_user_name AS user_name,
  phonenumber,
  request_date,
  COUNT(id) AS total
FROM
  view_rent where rstatus = 2
GROUP BY rent_user;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `get_request_rent` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_request_rent` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `get_request_rent`()
BEGIN
	SELECT
  rent_user AS userid,
  rent_user_name AS user_name,
  phonenumber,
  request_date,
  count(id) AS total
FROM
  view_rent where rstatus = 3
GROUP BY rent_user;

	END */$$
DELIMITER ;

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
 `istatus` tinyint(2) ,
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
 `rstatus` tinyint(1) ,
 `icondition` enum('good','lost','broken','incomplete') ,
 `request_date` datetime ,
 `rent_date` datetime ,
 `return_date` datetime ,
 `approve_date` datetime ,
 `rent_user` varchar(25) ,
 `item_name` varchar(50) ,
 `item_size` decimal(10,0) ,
 `qrcode` varchar(50) ,
 `filename` varchar(255) ,
 `area_name` varchar(50) ,
 `rent_user_name` varchar(255) ,
 `phonenumber` varchar(14) ,
 `jobposition` varchar(52) 
)*/;

/*Table structure for table `view_report` */

DROP TABLE IF EXISTS `view_report`;

/*!50001 DROP VIEW IF EXISTS `view_report` */;
/*!50001 DROP TABLE IF EXISTS `view_report` */;

/*!50001 CREATE TABLE  `view_report`(
 `id` int(11) ,
 `item_name` varchar(50) ,
 `item_size` decimal(10,0) ,
 `rent_id` int(11) ,
 `reason` enum('incomplete','broken','lost') ,
 `filename` varchar(255) ,
 `detail` text ,
 `location` varchar(50) ,
 `report_date` date ,
 `report_user` varchar(255) ,
 `request_date` datetime ,
 `rent_user_name` varchar(255) ,
 `jobposition` varchar(52) ,
 `determined` varchar(50) ,
 `dposition` varchar(50) ,
 `acknowledge` varchar(50) ,
 `aposition` varchar(50) ,
 `charged` varchar(255) 
)*/;

/*View structure for view view_item */

/*!50001 DROP TABLE IF EXISTS `view_item` */;
/*!50001 DROP VIEW IF EXISTS `view_item` */;

/*!50001 CREATE VIEW `view_item` AS (select `i`.`id` AS `id`,`i`.`area_id` AS `area_id`,`a`.`name` AS `area_name`,`i`.`name` AS `name`,`i`.`size` AS `size`,`i`.`istatus` AS `istatus`,`i`.`icondition` AS `icondition`,`i`.`filename` AS `filename`,`i`.`qrcode` AS `qrcode`,`i`.`insert_date` AS `insert_date`,`i`.`insert_user` AS `insert_user`,`i`.`update_date` AS `update_date`,`i`.`update_user` AS `update_user` from (`item` `i` left join `areas` `a` on(`i`.`area_id` = `a`.`id`))) */;

/*View structure for view view_rent */

/*!50001 DROP TABLE IF EXISTS `view_rent` */;
/*!50001 DROP VIEW IF EXISTS `view_rent` */;

/*!50001 CREATE VIEW `view_rent` AS (select `r`.`id` AS `id`,`r`.`item_id` AS `item_id`,`r`.`rstatus` AS `rstatus`,`r`.`icondition` AS `icondition`,`r`.`request_date` AS `request_date`,`r`.`rent_date` AS `rent_date`,`r`.`return_date` AS `return_date`,`r`.`approve_date` AS `approve_date`,`r`.`rent_user` AS `rent_user`,`v`.`name` AS `item_name`,`v`.`size` AS `item_size`,`v`.`qrcode` AS `qrcode`,`v`.`filename` AS `filename`,`v`.`area_name` AS `area_name`,`u`.`name` AS `rent_user_name`,`u`.`phonenumber` AS `phonenumber`,`u`.`jobposition` AS `jobposition` from ((`rent` `r` left join `view_item` `v` on(`r`.`item_id` = `v`.`id`)) left join `users` `u` on(`r`.`rent_user` = `u`.`id`))) */;

/*View structure for view view_report */

/*!50001 DROP TABLE IF EXISTS `view_report` */;
/*!50001 DROP VIEW IF EXISTS `view_report` */;

/*!50001 CREATE VIEW `view_report` AS (select `r`.`id` AS `id`,`vr`.`item_name` AS `item_name`,`vr`.`item_size` AS `item_size`,`r`.`rent_id` AS `rent_id`,`r`.`reason` AS `reason`,`r`.`filename` AS `filename`,`r`.`detail` AS `detail`,`r`.`location` AS `location`,`r`.`report_date` AS `report_date`,`r`.`report_user` AS `report_user`,`vr`.`request_date` AS `request_date`,`vr`.`rent_user_name` AS `rent_user_name`,`vr`.`jobposition` AS `jobposition`,`r`.`determined` AS `determined`,`r`.`dposition` AS `dposition`,`r`.`acknowledge` AS `acknowledge`,`r`.`aposition` AS `aposition`,`r`.`charged` AS `charged` from (`report` `r` left join `view_rent` `vr` on(`r`.`rent_id` = `vr`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
