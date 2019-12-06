CREATE TABLE 'task' (
	`id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`username` TEXT,
  `email` TEXT,
	`description`  TEXT,
	`isDone` BOOLEAN,
	`isEdited` BOOLEAN
);

CREATE TABLE `user` (
	`id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`  TEXT,
	`password` TEXT
);
