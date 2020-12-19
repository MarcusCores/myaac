<?php
defined('MYAAC') or die('Direct access not allowed!');

// configuration
$dirs_required = [
	'system/logs',
	'system/cache',
];
$dirs_optional = [
	'images/guilds' => $locale['step_requirements_warning_images_guilds'],
	'images/gallery' => $locale['step_requirements_warning_images_gallery'],
];

$extensions_required = [
	'pdo', 'pdo_mysql', 'xml', 'zip'
];
$extensions_optional = [
	'gd' => $locale['step_requirements_warning_player_signatures'],
];
/*
 *
 * @param string $name
 * @param boolean $ok
 * @param mixed $info
 */
function version_check($name, $ok, $info = '', $warning = false)
{
	global $failed;
	echo '<div class="alert alert-' . ($ok ? 'success' : ($warning ? 'warning' : 'danger')) . '">' . $name;
	if(!empty($info))
		echo ': <b>' . $info . '</b>';

	echo '</div>';
	if(!$ok && !$warning)
		$failed = true;
}

$failed = false;

// start validating
version_check($locale['step_requirements_php_version'], (PHP_VERSION_ID >= 50500), PHP_VERSION);

foreach ($dirs_required as $value)
{
	$is_writable = is_writable(BASE . $value) && (MYAAC_OS != 'WINDOWS' || win_is_writable(BASE . $value));
	version_check($locale['step_requirements_write_perms'] . ': ' . $value, $is_writable);
}

foreach ($dirs_optional as $dir => $errorMsg) {
	$is_writable = is_writable(BASE . $dir) && (MYAAC_OS != 'WINDOWS' || win_is_writable(BASE . $dir));
	version_check($locale['step_requirements_write_perms'] . ': ' . $dir, $is_writable, $is_writable ? '' : $errorMsg, true);
}

$ini_register_globals = ini_get_bool('register_globals');
version_check('register_long_arrays', !$ini_register_globals, $ini_register_globals ? $locale['on'] : $locale['off']);

$ini_safe_mode = ini_get_bool('safe_mode');
version_check('safe_mode', !$ini_safe_mode, $ini_safe_mode ? $locale['on'] : $locale['off'], true);

foreach ($extensions_required as $ext) {
	$loaded = extension_loaded($ext);
	version_check(str_replace('$EXTENSION$', strtoupper($ext), $locale['step_requirements_extension']) , $loaded, $loaded ? $locale['loaded'] : $locale['not_loaded']);
}

foreach ($extensions_optional as $ext => $errorMsg) {
	$loaded = extension_loaded($ext);
	version_check(str_replace('$EXTENSION$', strtoupper($ext), $locale['step_requirements_extension']) , $loaded, $loaded ? $locale['loaded'] : $locale['not_loaded'] . '. ' . $errorMsg, true);
}

echo '<div class="text-center m-3">';

if($failed) {
	echo '<div class="alert alert-warning"><span>' . $locale['step_requirements_failed'] . '</span></div>';
	echo next_form(true, false);
}else {
	echo next_form(true, true);
}

echo '</div>';
?>