<?php

return [
	['name' => 'Dashboard', 'icon' => 'tachometer-alt', 'link' => 'dashboard'],
	['name' => 'News', 'icon' => 'newspaper', 'link' => 'news'],
	['name' => 'Mailer', 'icon' => 'envelope', 'link' => 'mailer', 'disabled' => !config('mail_enabled')],
	['name' => 'Pages', 'icon' => 'book', 'link' =>
		[
			['name' => 'All Pages', 'link' => 'pages'],
			['name' => 'Add new', 'link' => 'pages&action=new'],
		],
	],
	['name' => 'Menus', 'icon' => 'list', 'link' => 'menus'],
	['name' => 'Plugins', 'icon' => 'plug', 'link' => 'plugins'],
	['name' => 'Server Data', 'icon' => 'gavel', 'link' => 'data'],
	['name' => 'Editor', 'icon' => 'edit', 'link' =>
		[
			['name' => 'Accounts', 'link' => 'accounts'],
			['name' => 'Players', 'link' => 'players'],
		],
	],
	['name' => 'Tools', 'icon' => 'tools', 'link' =>
		[
			['name' => 'Notepad', 'link' => 'notepad'],
			['name' => 'phpinfo', 'link' => 'phpinfo'],
		],
	],
	['name' => 'Logs', 'icon' => 'bug', 'link' =>
		[
			['name' => 'Logs', 'link' => 'logs'],
			['name' => 'Reports', 'link' => 'reports'],
			['name' => 'Visitors', 'icon' => 'user', 'link' => 'visitors'],
		],
	],
];