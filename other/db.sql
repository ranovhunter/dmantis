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

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `areas` */

insert  into `areas`(`id`,`name`,`detail`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,'A1','First Container','2022-06-21 13:39:21',490155,'2024-06-28 09:28:53',0),
(2,'B','Near Door','2022-06-21 13:40:58',490155,'2024-06-28 09:29:01',0),
(3,'C','','2022-06-21 13:41:24',490155,'2024-06-04 15:17:26',490155),
(4,'D','','2022-06-21 13:41:40',490155,'2024-06-04 15:17:31',490155),
(5,'E','','2022-06-21 13:41:55',490155,'2024-06-04 15:17:39',490155),
(6,'F','','2022-06-21 13:44:07',490155,'2024-06-04 15:17:57',490155),
(7,'G','','2022-06-21 13:44:34',490155,'2024-06-04 15:18:08',490155),
(8,'H','','2022-06-30 09:09:01',490155,'2024-06-04 15:18:48',490155),
(9,'I','','2022-10-12 10:03:02',490155,'2024-06-04 15:18:37',490155),
(10,'J','','2024-06-04 15:18:58',490155,NULL,NULL),
(11,'K','','2024-06-28 09:27:01',0,NULL,NULL);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `category` */

insert  into `category`(`id`,`parent_id`,`name`,`detail`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,0,'Office Hardware','Laptop, Desktop','2022-06-21 13:39:21',5,'2022-07-21 11:32:51',5),
(2,1,'Desktop','Bundle Desktop and Monitor','2022-06-21 13:40:58',5,'2022-10-14 15:43:51',5),
(3,1,'Monitor','Monitor Only','2022-06-21 13:41:24',5,NULL,NULL),
(4,1,'Deskphone','Avaya Deskphone','2022-06-21 13:41:40',5,NULL,NULL),
(5,1,'Mobile Phone','Mobile phone support by company','2022-06-21 13:41:55',5,NULL,NULL),
(6,1,'Network','Switch, Router, Access Point, Wifi Router, Cable, Network Wiring Kit','2022-06-21 13:44:07',5,NULL,NULL),
(7,1,'Server','Servers','2022-06-21 13:44:34',5,NULL,NULL),
(8,1,'IT Other','UPS, Webcam, Speaker','2022-06-30 09:09:01',5,NULL,NULL),
(9,0,'Building','Bulding','2022-10-12 10:03:02',5,NULL,NULL);

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
('b658c9dc34ca2573780b27342a822bc9','::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36',1719562067,'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"sess-id\";s:5:\"admin\";s:9:\"sess-name\";s:5:\"Admin\";s:9:\"sess-role\";s:5:\"admin\";s:15:\"sess-personalid\";N;s:13:\"sess-loggedin\";b:1;s:14:\"sess-starttime\";s:19:\"2024-06-28 14:53:56\";}');

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
(4,'app_base_url','http://localhost/kpp/','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
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

/*Table structure for table `configs_old` */

DROP TABLE IF EXISTS `configs_old`;

CREATE TABLE `configs_old` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_name` varchar(100) DEFAULT NULL,
  `config_value` text DEFAULT NULL,
  `config_type` varchar(25) DEFAULT 'text',
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `configs_old` */

insert  into `configs_old`(`config_id`,`config_name`,`config_value`,`config_type`,`insert_date`,`update_date`) values 
(1,'app_su',NULL,'json','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(2,'app_name','Inventory - Younexa Inti Materials','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(3,'app_meta','[{\"charset\":\"UTF-8\"},{\"name\":\"author\",\"content\":\"Hunter Nainggolan\r\n\"},{\"name\":\"title\",\"content\":\"Whats On In Indonesia\"},{\"name\":\"description\",\"content\":\"Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.\"},{\"name\":\"keywords\",\"content\":\"efaktur, pajak\"},{\"name\":\"viewport\",\"content\":\"width=device-width, initial-scale=1.0\"}]','json','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(4,'app_base_url','http://103.75.54.70:8081/yim/inventory/','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(5,'app_assets_path','{app_base_url}assets','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(6,'app_manual','{app_base_url}manuals','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(7,'app_default_timezone','Asia/Jakarta','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(8,'app_title','Inventory - Younexa Inti Materials','text','2014-03-13 11:53:30','2014-03-13 11:53:30'),
(9,'app_version','1.0.0','text',NULL,NULL),
(10,'app_codename','development','text',NULL,NULL),
(11,'app_icon','{app_assets_path}/img/fav.ico','text',NULL,NULL),
(12,'paging_rowlimit','20','text',NULL,NULL),
(13,'paging_numlinks','4','text',NULL,NULL),
(14,'app_link','[{\"href\" : \"{app_icon}\",\"rel\" : \"shortcut icon\"},{\"href\" : \"https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/vendor/nucleo/css/nucleo.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/plugins/vendor/@fortawesome/fontawesome-free/css/all.min.css\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"},\r\n{\"href\" : \"{app_assets_path}/css/argon.css?v=1.2.0\",\"rel\" : \"stylesheet\",\"type\" : \"text/css\"}]','json',NULL,NULL),
(15,'app_script','[{\"src\" : \"{app_assets_path}/plugins/vendor/jquery/dist/jquery.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/vendor/bootstrap/dist/js/bootstrap.bundle.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/vendor/js-cookie/js.cookie.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/vendor/jquery.scrollbar/jquery.scrollbar.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/plugins/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js\",\"type\" : \"text/javascript\"},\r\n{\"src\" : \"{app_assets_path}/js/argon.js?v=1.2.0\",\"type\" : \"text/javascript\"}]','json',NULL,NULL),
(52,'login_link',NULL,'text',NULL,NULL),
(53,'login_script',NULL,'text',NULL,NULL),
(54,'app_base_url_p','http://103.75.54.70:8081/fmd/webfiles/','text','2014-03-13 11:53:30','2014-03-13 11:53:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

/*Data for the table `item` */

insert  into `item`(`id`,`name`,`qrcode`,`details`,`icondition`,`filename`,`size`,`area_id`,`quantity`,`stock`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
(1,'EATON 9SX-8KVA/7.2KW, 1PH, R/T, 6U','ITM220630091411','UPS for Server','lost','ITM220630092557.PNG',0,1,0,0,'2022-07-22 11:08:13',5,'2024-06-27 15:45:55',0),
(2,'Dell Latitude 5320 - DRYKPG3','ITM220630091824','','good','ITM220630094024.PNG',NULL,2,0,0,'2022-07-27 16:46:48',5,NULL,NULL),
(3,'Dell Latitude 5320 - CFWKPG3','ITM220630092254','','good','ITM220630094024.PNG',NULL,3,0,0,'2022-07-27 16:48:59',5,NULL,NULL),
(4,'Dell Latitude 5320 - 8FWKPG3','ITM220630094024','','good','ITM220630094024.PNG',NULL,4,0,0,'2022-06-30 09:40:24',5,NULL,NULL),
(5,'Dell Latitude 5320 - CRYKPG3','ITM220630100736','','good','ITM220630100736.PNG',NULL,5,0,0,'2022-06-30 10:07:36',5,NULL,NULL),
(6,'Dell Latitude 5320 - 1RYKPG3','ITM220630101337','','good','ITM220630100736.PNG',NULL,6,0,0,'2022-06-30 10:13:37',5,NULL,NULL),
(7,'Dell Latitude 5320 - JFWKPG3','ITM220630101405','','good','ITM220630100736.PNG',NULL,7,0,0,'2022-06-30 10:14:05',5,NULL,NULL),
(8,'Dell Latitude 5320 - 8RYKPG3','ITM220630102852','','good','ITM220630100736.PNG',NULL,8,0,0,'2022-06-30 10:28:52',5,NULL,NULL),
(9,'Dell Latitude 5320 - 1QV5PG3','ITM220630102918','','good','ITM220630100736.PNG',NULL,2,0,0,'2022-06-30 10:29:18',5,NULL,NULL),
(10,'Dell Latitude 5320 - HRYKPG3','ITM220630102943','','good','ITM220630100736.PNG',NULL,3,0,0,'2022-06-30 10:29:43',5,NULL,NULL),
(11,'Dell Latitude 5320 - DFWKPG3','ITM220630103018','','good','ITM220630100736.PNG',NULL,4,0,0,'2022-06-30 10:30:18',5,NULL,NULL),
(12,'Dell Latitude 5320 - JRYKPG3','ITM220630103309','','good','ITM220630100736.PNG',NULL,5,0,0,'2022-06-30 10:33:09',5,NULL,NULL),
(13,'Dell Latitude 5320 - HQV5PG3','ITM220630103358','','good','ITM220630100736.PNG',NULL,6,0,0,'2022-06-30 10:33:58',5,NULL,NULL),
(14,'Dell Latitude 7320 - 60RG3J3','ITM220630104520','','good','ITM220630104520.PNG',NULL,7,0,0,'2022-06-30 10:45:20',5,NULL,NULL),
(15,'Dell Latitude 5320 - C6C9QG3','ITM220630104709','','good','ITM220630100736.PNG',NULL,8,0,0,'2022-06-30 10:47:09',5,NULL,NULL),
(16,'Dell Latitude 5320 - 65C9QG3','ITM220630104936','','good','ITM220630104936.PNG',NULL,2,0,0,'2022-06-30 10:49:36',5,NULL,NULL),
(17,'Dell P2421HE - 7504H83','ITM220630105107','','good','ITM220704094724.PNG',NULL,3,0,0,'2022-06-30 10:51:07',5,NULL,NULL),
(18,'Dell P2421HE - H5W3H83','ITM220630105559','','good','ITM220704094724.PNG',NULL,1,0,0,'2022-06-30 10:55:59',5,NULL,NULL),
(19,'Dell P2422HE - 7624H83','ITM220630110842','','good','ITM220704094724.PNG',NULL,5,0,0,'2022-07-04 09:47:24',5,NULL,NULL),
(20,'Dell P2421HE - BW14H83','ITM220630110938','','good','ITM220704094724.PNG',NULL,6,0,0,'2022-06-30 11:09:38',5,NULL,NULL),
(21,'Dell P2421HE- 12Y3H83','ITM220630111002','','good','ITM220704094724.PNG',NULL,7,0,0,'2022-06-30 11:10:02',5,NULL,NULL),
(22,'Dell P2421HE - DCX3H83','ITM220630111050','','good','ITM220704094724.PNG',NULL,4,0,0,'2022-06-30 11:10:50',5,NULL,NULL),
(24,'Dell P2421HE - 2024H83','ITM220704084930','','good','ITM220704094724.PNG',NULL,3,0,0,'2022-07-04 08:49:30',5,NULL,NULL),
(25,'Dell P2421HE - 1C04H83','ITM220704085008','','good','ITM220704094724.PNG',NULL,3,0,0,'2022-07-04 08:50:08',5,NULL,NULL),
(26,'Dell P2421HE - 4P04H83','ITM220704085120','','good','ITM220704094724.PNG',NULL,7,0,0,'2022-07-04 08:51:20',5,NULL,NULL),
(27,'Dell P2421HE - 6Z04H83','ITM220704085211','','good','ITM220704094724.PNG',NULL,8,0,0,'2022-07-04 08:52:11',5,NULL,NULL),
(28,'WD19TBS Docking - 1PPDQH3','ITM220704085238','','good','ITM220704102940.PNG',NULL,3,0,0,'2022-07-04 10:29:40',5,NULL,NULL),
(29,'Dell 2719H - B9FXR83','ITM220704094404','','good','ITM220704094404.PNG',NULL,5,0,0,'2022-07-04 09:44:04',5,NULL,NULL),
(30,'Dell P2422HE - DZZ3H83','ITM220704104939','','good','ITM220704094724.PNG',NULL,4,0,0,'2022-07-04 10:49:39',5,NULL,NULL),
(31,'Dell P2422HE - GK14H83','ITM220704105005','','good','ITM220704094724.PNG',NULL,7,0,0,'2022-07-04 10:50:05',5,NULL,NULL),
(32,'Dell P2422HE - 2924H83','ITM220704105030','','good','ITM220704094724.PNG',NULL,5,0,0,'2022-07-04 10:50:30',5,NULL,NULL),
(33,'Dell P2422HE - 9JY38H3','ITM220704105111','','good','ITM220704094724.PNG',NULL,7,0,0,'2022-07-04 10:51:11',5,NULL,NULL),
(34,'Dell P2422HE - 2WT3H83','ITM220704105130','','good','ITM220704094724.PNG',NULL,3,0,0,'2022-07-04 10:51:30',5,NULL,NULL),
(35,'Latitude 5320 - D3C9QG3','ITM220704112142','','good','ITM220630100736.PNG',NULL,5,0,0,'2022-07-04 11:21:42',5,NULL,NULL),
(36,'Optiplex 5080MT - HYB4SH3','ITM220704112417','','good','ITM220704112417.jpg',NULL,3,0,0,'2022-07-04 11:24:17',5,NULL,NULL),
(37,'Optiplex 5080MT - 65C4SH3','ITM220704112453','','good','ITM220704112453.jpg',NULL,3,0,0,'2022-07-04 11:24:53',5,NULL,NULL),
(38,'Optiplex 5080MT - 6ZB4SH3','ITM220704112517','','good','ITM220704112453.jpg',NULL,3,0,0,'2022-07-04 11:25:17',5,NULL,NULL),
(39,'Optiplex 5090MT - 9WZHDM3','ITM220704112543','','good','ITM220704112453.jpg',NULL,3,0,0,'2022-07-04 11:25:43',5,NULL,NULL),
(40,'WD19TBS Docking - HNPDQH3','ITM220704112659','','good','ITM220704102940.PNG',NULL,3,0,0,'2022-07-04 11:26:59',5,NULL,NULL),
(41,'Cisco Catalyst 9300 24-port PoE+ - FOC2603YECC','ITM220704113312','','good','ITM220704113312.JPG',NULL,3,0,0,'2022-07-04 11:33:12',5,NULL,NULL),
(42,'Cisco Catalyst 9200L 48 port PoE+ - FOC25287VUQ','ITM220704113349','','good','ITM220704113349.jpg',NULL,2,0,0,'2022-07-04 11:33:49',5,NULL,NULL),
(43,'UniFi 6 Long Range - (K)D021F9676DD9','ITM220704113836','','good','ITM220704113836.jpg',NULL,3,0,0,'2022-07-04 11:38:36',5,NULL,NULL),
(44,'UniFi 6 Long Range - (K)D021F967604D','ITM220704113858','','good','ITM220704113836.jpg',NULL,2,0,0,'2022-07-04 11:38:58',5,NULL,NULL),
(45,'UniFi 6 Long Range - (K)D021F9676E0D','ITM220704113915','','good','ITM220704113836.jpg',NULL,5,0,0,'2022-07-04 11:39:15',5,NULL,NULL),
(46,'UniFi 6 Long Range - (K)D021F9676CF9','ITM220704113934','','good','ITM220704113836.jpg',NULL,3,0,0,'2022-07-04 11:39:34',5,NULL,NULL),
(47,'UniFi 6 Long Range - (K)D021F9676159','ITM220704113946','','good','ITM220704113836.jpg',NULL,6,0,0,'2022-07-04 11:39:46',5,NULL,NULL),
(48,'Mac Book Pro 16','ITM220721112649','','good','ITM220721112649.JPG',NULL,5,0,0,'2022-07-21 11:26:49',5,NULL,NULL),
(49,'Redmi Note 11 Pro 5g','ITM220802155808','','good',NULL,NULL,2,0,0,'2022-08-02 15:58:08',5,NULL,NULL);

/*Table structure for table `stock_take` */

DROP TABLE IF EXISTS `stock_take`;

CREATE TABLE `stock_take` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `start_user` int(11) DEFAULT NULL,
  `end_user` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock_take` */

insert  into `stock_take`(`id`,`start_date`,`end_date`,`start_user`,`end_user`,`status`) values 
(1,'2022-10-13 10:27:44',NULL,5,NULL,1);

/*Table structure for table `stock_take_detail` */

DROP TABLE IF EXISTS `stock_take_detail`;

CREATE TABLE `stock_take_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_take_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_qrcode` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `condition` enum('good','lost','broken','service') DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `check_date` datetime DEFAULT NULL,
  `check_user` int(11) DEFAULT NULL,
  `is_checked` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stock_take_detail` */

insert  into `stock_take_detail`(`id`,`stock_take_id`,`item_id`,`item_qrcode`,`status`,`location`,`condition`,`picture`,`check_date`,`check_user`,`is_checked`) values 
(1,1,1,'ITM220630091411',1,'di ruang server','good','ST_ITM221017165143.jpg','2022-10-17 16:51:42',5,1),
(2,1,2,'ITM220630091824',1,'masih di tempat yang sama','good','ST_ITM221014111752.PNG','2022-10-14 11:17:52',5,1),
(3,1,3,'ITM220630092254',NULL,NULL,NULL,NULL,NULL,NULL,0),
(4,1,4,'ITM220630094024',NULL,NULL,NULL,NULL,NULL,NULL,0),
(5,1,5,'ITM220630100736',1,'Aman','good','ST_ITM221014111834.PNG','2022-10-14 11:18:34',5,1),
(6,1,6,'ITM220630101337',NULL,NULL,NULL,NULL,NULL,NULL,0),
(7,1,7,'ITM220630101405',NULL,NULL,NULL,NULL,NULL,NULL,0),
(8,1,8,'ITM220630102852',NULL,NULL,NULL,NULL,NULL,NULL,0),
(9,1,9,'ITM220630102918',NULL,NULL,NULL,NULL,NULL,NULL,0),
(10,1,10,'ITM220630102943',NULL,NULL,NULL,NULL,NULL,NULL,0),
(11,1,11,'ITM220630103018',NULL,NULL,NULL,NULL,NULL,NULL,0),
(12,1,12,'ITM220630103309',NULL,NULL,NULL,NULL,NULL,NULL,0),
(13,1,13,'ITM220630103358',NULL,NULL,NULL,NULL,NULL,NULL,0),
(14,1,14,'ITM220630104520',NULL,NULL,NULL,NULL,NULL,NULL,0),
(15,1,15,'ITM220630104709',NULL,NULL,NULL,NULL,NULL,NULL,0),
(16,1,16,'ITM220630104936',NULL,NULL,NULL,NULL,NULL,NULL,0),
(17,1,17,'ITM220630105107',NULL,NULL,NULL,NULL,NULL,NULL,0),
(18,1,18,'ITM220630105559',NULL,NULL,NULL,NULL,NULL,NULL,0),
(19,1,19,'ITM220630110842',NULL,NULL,NULL,NULL,NULL,NULL,0),
(20,1,20,'ITM220630110938',NULL,NULL,NULL,NULL,NULL,NULL,0),
(21,1,21,'ITM220630111002',NULL,NULL,NULL,NULL,NULL,NULL,0),
(22,1,22,'ITM220630111050',NULL,NULL,NULL,NULL,NULL,NULL,0),
(23,1,24,'ITM220704084930',NULL,NULL,NULL,NULL,NULL,NULL,0),
(24,1,25,'ITM220704085008',NULL,NULL,NULL,NULL,NULL,NULL,0),
(25,1,26,'ITM220704085120',NULL,NULL,NULL,NULL,NULL,NULL,0),
(26,1,27,'ITM220704085211',NULL,NULL,NULL,NULL,NULL,NULL,0),
(27,1,28,'ITM220704085238',NULL,NULL,NULL,NULL,NULL,NULL,0),
(28,1,29,'ITM220704094404',NULL,NULL,NULL,NULL,NULL,NULL,0),
(29,1,30,'ITM220704104939',NULL,NULL,NULL,NULL,NULL,NULL,0),
(30,1,31,'ITM220704105005',NULL,NULL,NULL,NULL,NULL,NULL,0),
(31,1,32,'ITM220704105030',NULL,NULL,NULL,NULL,NULL,NULL,0),
(32,1,33,'ITM220704105111',NULL,NULL,NULL,NULL,NULL,NULL,0),
(33,1,34,'ITM220704105130',NULL,NULL,NULL,NULL,NULL,NULL,0),
(34,1,35,'ITM220704112142',NULL,NULL,NULL,NULL,NULL,NULL,0),
(35,1,36,'ITM220704112417',NULL,NULL,NULL,NULL,NULL,NULL,0),
(36,1,37,'ITM220704112453',NULL,NULL,NULL,NULL,NULL,NULL,0),
(37,1,38,'ITM220704112517',NULL,NULL,NULL,NULL,NULL,NULL,0),
(38,1,39,'ITM220704112543',NULL,NULL,NULL,NULL,NULL,NULL,0),
(39,1,40,'ITM220704112659',NULL,NULL,NULL,NULL,NULL,NULL,0),
(40,1,41,'ITM220704113312',NULL,NULL,NULL,NULL,NULL,NULL,0),
(41,1,42,'ITM220704113349',NULL,NULL,NULL,NULL,NULL,NULL,0),
(42,1,43,'ITM220704113836',NULL,NULL,NULL,NULL,NULL,NULL,0),
(43,1,44,'ITM220704113858',NULL,NULL,NULL,NULL,NULL,NULL,0),
(44,1,45,'ITM220704113915',NULL,NULL,NULL,NULL,NULL,NULL,0),
(45,1,46,'ITM220704113934',NULL,NULL,NULL,NULL,NULL,NULL,0),
(46,1,47,'ITM220704113946',NULL,NULL,NULL,NULL,NULL,NULL,0),
(47,1,48,'ITM220721112649',NULL,NULL,NULL,NULL,NULL,NULL,0),
(48,1,49,'ITM220802155808',NULL,NULL,NULL,NULL,NULL,NULL,0);

/*Table structure for table `user_item` */

DROP TABLE IF EXISTS `user_item`;

CREATE TABLE `user_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `return_user` int(11) DEFAULT NULL,
  `receive_doc` varchar(50) DEFAULT NULL,
  `return_doc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_item` */

insert  into `user_item`(`id`,`item_id`,`user_id`,`detail`,`location`,`received_date`,`return_date`,`insert_date`,`insert_user`,`update_date`,`update_user`,`return_user`,`receive_doc`,`return_doc`) values 
(8,1,154,'','LOC221110110539.png','2022-11-10','2022-11-10','2022-11-10 11:05:39',70005047,'2022-11-10 16:03:19',154,NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(17) NOT NULL,
  `password` char(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(14) DEFAULT NULL,
  `roles` enum('admin','user') DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `insert_user` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`password`,`name`,`phonenumber`,`roles`,`insert_date`,`insert_user`,`update_date`,`update_user`) values 
('123123','fc875e6068515962938edd80704e52994fadc0a0','User',NULL,'user',NULL,NULL,NULL,NULL),
('1231234',NULL,'Test dus','','user','2024-06-26 16:02:29',1,NULL,NULL),
('321321','6293dd28a8c694b631de5fcd56fd85f25c4c93f8','Guest',NULL,'user',NULL,NULL,NULL,NULL),
('4563254',NULL,'Sustrisno Nainggolan','08455545845','user','2024-06-26 15:42:31',1,'2024-06-26 15:59:48',1),
('4569856',NULL,'Sutrisno','0845668541','user','2024-06-26 15:43:48',1,NULL,NULL),
('admin','25d2d1a12f3022baf3938961d3cf76ea1f8b95ec','Admin',NULL,'admin',NULL,NULL,NULL,NULL);

/*Table structure for table `view_item` */

DROP TABLE IF EXISTS `view_item`;

/*!50001 DROP VIEW IF EXISTS `view_item` */;
/*!50001 DROP TABLE IF EXISTS `view_item` */;

/*!50001 CREATE TABLE  `view_item`(
 `id` int(11) ,
 `area_id` int(2) ,
 `area_name` varchar(50) ,
 `name` varchar(50) ,
 `item_size` decimal(10,0) ,
 `quantity` int(2) ,
 `stock` int(2) ,
 `icondition` enum('good','lost','broken','incomplete') ,
 `qrcode` varchar(50) ,
 `insert_date` datetime ,
 `insert_user` int(11) ,
 `update_date` datetime ,
 `update_user` int(11) 
)*/;

/*View structure for view view_item */

/*!50001 DROP TABLE IF EXISTS `view_item` */;
/*!50001 DROP VIEW IF EXISTS `view_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_item` AS (select `i`.`id` AS `id`,`i`.`area_id` AS `area_id`,`a`.`name` AS `area_name`,`i`.`name` AS `name`,`i`.`size` AS `item_size`,`i`.`quantity` AS `quantity`,`i`.`stock` AS `stock`,`i`.`icondition` AS `icondition`,`i`.`qrcode` AS `qrcode`,`i`.`insert_date` AS `insert_date`,`i`.`insert_user` AS `insert_user`,`i`.`update_date` AS `update_date`,`i`.`update_user` AS `update_user` from (`item` `i` left join `areas` `a` on(`i`.`area_id` = `a`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
