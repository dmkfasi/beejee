DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
	`id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`username` TEXT,
  `email` TEXT,
	`description`  TEXT,
	`isDone` BOOLEAN,
	`isEdited` BOOLEAN,
	UNIQUE KEY (`id`)
);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
	`id`    INTEGER NOT NULL AUTO_INCREMENT,
	`name`  TEXT,
	`password` TEXT,
	UNIQUE KEY (`id`)
);

INSERT INTO `user` (`name`, `password`) VALUES('admin', '123');
