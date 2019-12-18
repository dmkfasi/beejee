DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
	`id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`userName` TEXT,
  `userEmail` TEXT,
	`description`  TEXT,
	`isDone` BOOLEAN,
	`isEdited` BOOLEAN
);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
	`id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`  TEXT,
	`password` TEXT
);

INSERT INTO `user` (`name`, `password`) VALUES('admin', '123');

