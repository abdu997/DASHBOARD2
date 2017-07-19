CREATE TABLE `test`.`users` (
`idusers` INT NOT NULL AUTO_INCREMENT,
`username` VARCHAR(45) NOT NULL,
`email` VARCHAR(60) NOT NULL, 
`password` VARCHAR(150) NOT NULL,  
`first_name` VARCHAR(45) NULL,  
`last_name` VARCHAR(45) NULL, 
`team` VARCHAR(45) NULL DEFAULT NULL,
 
PRIMARY KEY (`idusers`),  
UNIQUE INDEX `idusers_UNIQUE` (`idusers` ASC));
CREATE TABLE `team` ( 
`team_id` int(11) NOT NULL AUTO_INCREMENT, 
`team_name` varchar(45) NOT NULL, 
PRIMARY KEY (`team_id`), 
UNIQUE KEY `team_id_UNIQUE` (`team_id`), 
UNIQUE KEY `team_name_UNIQUE` (`team_name`)
);


CREATE TABLE `confirmation_users` (
  
`idconfirmation_users` int(11) NOT NULL AUTO_INCREMENT,
  
`email` varchar(150) NOT NULL,
  
`confirmed` varchar(1) DEFAULT 'N',
    
`team_id` INT,
  
PRIMARY KEY (`idconfirmation_users`),
  
UNIQUE KEY `idconfirmation_users_UNIQUE` 
(`idconfirmation_users`)
);



CREATE TABLE `user_reset` (
  
`id` int(11) NOT NULL AUTO_INCREMENT,
  
`Time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  
`GUID` varchar(150) DEFAULT NULL,
  
`email` varchar(150) DEFAULT NULL,
  
PRIMARY KEY (`id`)
);

CREATE TABLE `team_user` (
  
`t_id` int(11) NOT NULL,
  
`u_id` int(11) NOT NULL,
  
`admin` varchar(1) DEFAULT 'N',
  
PRIMARY KEY (`t_id`,`u_id`)
);   

CREATE TABLE IF NOT EXISTS `transaction` (
	`id` int(10) NOT NULL auto_increment,
	`user_id` int(11),
	`team_id` int(11),
	`type` varchar(255),
	`place` varchar(255),
	`description` varchar(255),
	`date` varchar(255),
	`amount` varchar(255),
	`receipt` varchar(255),
	`timestamp` datetime,
	PRIMARY KEY( `id` )
);

CREATE TABLE IF NOT EXISTS `calendar` (
	`id` int(11) NOT NULL auto_increment,
	`user_id` int(11),
	`team_id` int(11),
	`event` varchar(255),
	`all_day` varchar(255),
	`start_date` varchar(30),
	`start_time` varchar(20),
	`end_date` varchar(30),
	`end_time` varchar(20),
	`colour` varchar(255),
	`url` varchar(255),
	PRIMARY KEY( `id` )
);

CREATE TABLE IF NOT EXISTS `map` (
	`id` int(11) NOT NULL auto_increment,
	`team_id` int(11),
	`user_id` int(11),
	`name` varchar(255),
	`address` varchar(255),
	`phone` varchar(255),
	`website` varchar(255),
	`description` varchar(255),
	`colour` varchar(20),
	`lat` varchar(50),
	`lng` varchar(50),
	PRIMARY KEY( `id` )
);

CREATE TABLE IF NOT EXISTS `chatrooms` (
	`chatroom_id` int(10) NOT NULL auto_increment,
    `team_id` numeric(11),
	`chatroom_name` varchar(255),
	PRIMARY KEY( `chatroom_id` )
);


CREATE TABLE `test`.`messages` (
  `messages_id` INT NOT NULL AUTO_INCREMENT,
  `chatroom_id` INT NULL,
  `class` VARCHAR(45) NULL,
  `sender` VARCHAR(45) NULL,
  `timestamp` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `message` TEXT NULL,
  PRIMARY KEY (`messages_id`));


CREATE TABLE `test`.`chatroom_user` (
  `chatconn_id` INT NOT NULL AUTO_INCREMENT,
  `chatroom_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`chatconn_id`, `user_id`, `chatroom_id`),
  INDEX `fk_1_idx` (`chatroom_id` ASC),
  CONSTRAINT `fk_1`
    FOREIGN KEY (`chatroom_id`)
    REFERENCES `test`.`chatrooms` (`chatroom_name`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
