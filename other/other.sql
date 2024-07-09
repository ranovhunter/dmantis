
/*!50003 DROP PROCEDURE IF EXISTS  `get_active_rent` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `get_active_rent`()
BEGIN
	SELECT
  rent_user AS userid,
  rent_user_name AS user_name,
  phonenumber,
  rent_date,
  SUM(quantity) AS total
FROM
  view_rent where status = 1
GROUP BY rent_user;

	END */$$
DELIMITER ;

/* Procedure structure for procedure `get_request_rent` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_request_rent` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `get_request_rent`()
BEGIN
	SELECT
  rent_user AS userid,
  rent_user_name AS user_name,
  phonenumber,
  request_date,
  SUM(quantity) AS total
FROM
  view_rent where status = 2
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
 `rent_user_name` varchar(255) ,
 `phonenumber` varchar(14) 
)*/;

/*View structure for view view_item */

/*!50001 DROP TABLE IF EXISTS `view_item` */;
/*!50001 DROP VIEW IF EXISTS `view_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_item` AS (select `i`.`id` AS `id`,`i`.`area_id` AS `area_id`,`a`.`name` AS `area_name`,`i`.`name` AS `name`,`i`.`size` AS `size`,`i`.`quantity` AS `quantity`,`i`.`stock` AS `stock`,`i`.`icondition` AS `icondition`,`i`.`filename` AS `filename`,`i`.`qrcode` AS `qrcode`,`i`.`insert_date` AS `insert_date`,`i`.`insert_user` AS `insert_user`,`i`.`update_date` AS `update_date`,`i`.`update_user` AS `update_user` from (`item` `i` left join `areas` `a` on(`i`.`area_id` = `a`.`id`))) */;

/*View structure for view view_rent */

/*!50001 DROP TABLE IF EXISTS `view_rent` */;
/*!50001 DROP VIEW IF EXISTS `view_rent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_rent` AS (select `r`.`id` AS `id`,`r`.`item_id` AS `item_id`,`r`.`status` AS `status`,`r`.`icondition` AS `icondition`,`r`.`request_date` AS `request_date`,`r`.`rent_date` AS `rent_date`,`r`.`return_date` AS `return_date`,`r`.`rent_user` AS `rent_user`,`r`.`quantity` AS `quantity`,`v`.`name` AS `item_name`,`v`.`size` AS `item_size`,`v`.`qrcode` AS `qrcode`,`v`.`filename` AS `filename`,`v`.`area_name` AS `area_name`,`u`.`name` AS `rent_user_name`,`u`.`phonenumber` AS `phonenumber` from ((`rent` `r` left join `view_item` `v` on(`r`.`item_id` = `v`.`id`)) left join `users` `u` on(`r`.`rent_user` = `u`.`id`))) */;
