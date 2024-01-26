#!/usr/bin/env php
<?php

require_once __DIR__ . '/common.php';

if(!IS_CLI) {
	echo 'This script can be run only in command line mode.';
	exit(1);
}

require_once SYSTEM . 'functions.php';
require_once SYSTEM . 'init.php';

use Symfony\Component\Console\Application;

$application = new Application();

$commandsGlob = glob(SYSTEM . 'src/Commands/*.php');
foreach ($commandsGlob as $item) {
	$name = pathinfo($item, PATHINFO_FILENAME);
	if ($name == 'Command') { // ignore base Command class
		continue;
	}

	$commandPre = '\\MyAAC\Commands\\';
	$application->add(new ($commandPre . $name));
}

$pluginCommands = glob(PLUGINS . '*/commands/*.php');
foreach ($pluginCommands as $item) {
	$application->add(require $item);
}

$application->setName('MyAAC');
$application->setVersion(MYAAC_VERSION);

$application->run();
