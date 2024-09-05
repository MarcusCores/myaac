<?php

$up = function () use ($db) {
	// add settings table
	if (!$db->hasTable(TABLE_PREFIX . 'settings')) {
		$db->exec("CREATE TABLE `" . TABLE_PREFIX . "settings`
		(
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` VARCHAR(255) NOT NULL DEFAULT '',
			`key` VARCHAR(255) NOT NULL DEFAULT '',
			`value` TEXT NOT NULL,
			PRIMARY KEY (`id`),
			KEY `key` (`key`)
		) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;");
	}
};

$down = function () use ($db) {
	$db->exec("DROP TABLE IF EXISTS `" . TABLE_PREFIX . "settings`");
};
