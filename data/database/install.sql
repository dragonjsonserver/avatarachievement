CREATE TABLE `avatarachievements` (
	`avatarachievement_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`modified` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	`created` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`avatar_id` BIGINT(20) UNSIGNED NOT NULL,
	`gamedesign_identifier` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	`level` INTEGER(11) NOT NULL,
	PRIMARY KEY (`avatarachievement_id`),
	UNIQUE KEY `avatar_id` (`avatar_id`, `gamedesign_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
