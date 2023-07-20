<?php
/**
 * This is MyAAC's Main Configuration file
 *
 * All the default values are kept here, you should not modify it but use
 * a config.local.php file instead to override the settings from here.
 *
 * This is a piece of PHP code so PHP syntax applies!
 * For boolean values please use true/false.
 *
 * Minimally 'server_path' directive have to be filled, other options are optional.
 *
 * @package   MyAAC
 * @author    Slawkens <slawkens@gmail.com>
 * @copyright 2019 MyAAC
 * @link      https://my-aac.org
 */

$config = array(
	// directories & files
	'server_path' => '', // path to the server directory (same directory where config file is located)

	/**
	 * Environment Setting
	 *
	 * if you use this script on your live server - set to 'prod' (production)
	 * if you want to test and debug the script locally, or develop plugins, set to 'dev' (development)
	 * WARNING: on 'dev' cache is disabled, so site will be significantly slower !!!
	 * WARNING2: on 'dev' all PHP errors/warnings are displayed
	 * Recommended: 'prod' cause of speed (page load time is better)
	 */
	'env' => 'prod', // 'prod' for production and 'dev' for development

	'gzip_output' => false, // gzip page content before sending it to the browser, uses less bandwidth but more cpu cycles

	// cache system. by default file cache is used
	'cache_engine' => 'auto', // apc, apcu, eaccelerator, xcache, file, auto, or blank to disable.
	'cache_prefix' => 'myaac_', // have to be unique if running more MyAAC instances on the same server (except file system cache)

	// database details (leave blank for auto detect from config.lua)
	'database_host' => '',
	'database_port' => '', // leave blank to default 3306
	'database_user' => '',
	'database_password' => '',
	'database_name' => '',
	'database_log' => false, // should database queries be logged and saved into system/logs/database.log?
	'database_socket' => '', // set if you want to connect to database through socket (example: /var/run/mysqld/mysqld.sock)
	'database_persistent' => false, // use database permanent connection (like server), may speed up your site

	// multiworld system (only TFS 0.3)
	'multiworld' => false, // use multiworld system?
	'worlds' => array( // list of worlds
		//'1' => 'Your World Name',
		//'2' => 'Your Second World Name'
	),

	'account_mail_block_plus_sign' => true, // block email with '+' signs like test+box@gmail.com (help protect against spamming accounts)
	'account_change_character_name' => false, // can user change their character name for premium points?
	'account_change_character_name_points' => 30, // cost of name change
	'account_change_character_sex' => false, // can user change their character sex for premium points?
	'account_change_character_sex_points' => 30, // cost of sex change
	'characters_per_account' => 10,	// max. number of characters per account

	//
	'generate_new_reckey' => true,				// let player generate new recovery key, he will receive e-mail with new rec key (not display on page, hacker can't generate rec key)
	'generate_new_reckey_price' => 20,			// price for new recovery key
	'send_mail_when_change_password' => true,	// send e-mail with new password when change password to account
	'send_mail_when_generate_reckey' => true,	// send e-mail with rec key (key is displayed on page anyway when generate)

	// you may need to adjust this for older tfs versions
	// by removing Community Manager
	'account_types' => [
		'None',
		'Normal',
		'Tutor',
		'Senior Tutor',
		'Gamemaster',
		'Community Manager',
		'God',
	],

	// genders (aka sex)
	'genders' => array(
		0 => 'Female',
		1 => 'Male'
	),

	// new character config
	'character_samples' => array( // vocations, format: ID_of_vocation => 'Name of Character to copy'
		//0 => 'Rook Sample',
		1 => 'Sorcerer Sample',
		2 => 'Druid Sample',
		3 => 'Paladin Sample',
		4 => 'Knight Sample'
	),

	'use_character_sample_skills' => false,

	// it must show limited number of players after using search in character page
	'characters_search_limit' => 15,

	// town list used when creating character
	// won't be displayed if there is only one item (rookgaard for example)
	'character_towns' => array(1),

	// characters length
	// This is the minimum and the maximum length that a player can create a character. It is highly recommend the maximum length to be 21.
	'character_name_min_length' => 4,
	'character_name_max_length' => 21,
	'character_name_npc_check' => true,

	// list of towns
	// if you use TFS 1.3 with support for 'towns' table in database, then you can ignore this - it will be configured automatically (from MySQL database - Table - towns)
	// otherwise it will try to load from your .OTBM map file
	// if you don't see towns on website, then you need to fill this out
	'towns' => array(
		0 => 'No town',
		1 => 'Sample town'
	),

	// bans page
	'bans_per_page' => 20,

	// highscores page
	'highscores_vocation_box' => true, // show 'Choose a vocation' box on the highscores (allowing peoples to sort highscores by vocation)?
	'highscores_vocation' => true, // show player vocation under his nickname?
	'highscores_frags' => false, // show 'Frags' tab (best fraggers on the server)?
	'highscores_balance' => false, // show 'Balance' tab (richest players on the server)
	'highscores_outfit' => true, // show player outfit?
	'highscores_country_box' => false, // doesnt work yet! (not implemented)
	'highscores_groups_hidden' => 3, // this group id and higher won't be shown on the highscores
	'highscores_ids_hidden' => array(0), // this ids of players will be hidden on the highscores (should be ids of samples)
	'highscores_per_page' => 100, // how many records per page on highscores
	'highscores_cache_ttl' => 15, // how often to update highscores from database in minutes (default 15 minutes)

	// characters page
	'characters' => array( // what things to display on character view page (true/false in each option)
		'level' => true,
		'experience' => false,
		'magic_level' => false,
		'balance' => false,
		'marriage_info' => true, // only 0.3
		'outfit' => true,
		'creation_date' => true,
		'quests' => true,
		'skills' => true,
		'equipment' => true,
		'frags' => false,
		'deleted' => false, // should deleted characters from same account be still listed on the list of characters? When enabled it will show that character is "[DELETED]"
	),
	'quests' => array(
		//'Some Quest' => 123,
		//'Some Quest Two' => 456,
	), // quests list (displayed in character view), name => storage
	'signature_enabled' => true,
	'signature_type' => 'tibian', // signature engine to use: tibian, mango, gesior
	'signature_cache_time' => 5, // how long to store cached file (in minutes), default 5 minutes
	'signature_browser_cache' => 60, // how long to cache by browser (in minutes), default 1 hour

	// news page
	'news_limit' => 5, // limit of news on the latest news page
	'news_ticker_limit' => 5, // limit of news in tickers (mini news) (0 to disable)
	'news_date_format' => 'j.n.Y', // check php manual date() function for more info about this
	'news_author' => true, // show author of the news

	// gifts/shop system
	'gifts_system' => false,

	// last kills
	'last_kills_limit' => 50, // max. number of deaths shown on the last kills page

	// admin panel
	'admin_plugins_manage_enable' => 'yes', // you can disable possibility to upload and uninstall plugins, for security
	// enable support for plain php pages in admin panel, for security
	// existing pages still will be working, so you need to delete them manually
	'admin_pages_php_enable' => 'no',
	'admin_panel_modules' => 'statistics,web_status,server_status,lastlogin,created,points,coins,balance',    // default - statistics,web_status,server_status,lastlogin,created,points,coins,balance

	// other
	'email_lai_sec_interval' => 60, // time in seconds between e-mails to one account from lost account interface, block spam
	'google_analytics_id' => '', // e.g.: UA-XXXXXXX-X

	'npc' => array()
);
