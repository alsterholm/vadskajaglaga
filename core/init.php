<?php

error_reporting(0);
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'vsjl-176896.mysql.binero.se',
		'username' => '176896_eh34757',
		'password' => 'p#keR68861',
		'db' => '176896-vsjl'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

spl_autoload_register(function($class) {
	if (file_exists('classes/' . $class . '.php')) {
		require_once 'classes/' . $class . '.php';
	}
});

// Kontrollerar om IP-adressen användaren ansluter med är bannad.
if (IPBan::check($_SERVER['REMOTE_ADDR'])) {
	exit('Din IP-adress ' . $_SERVER['REMOTE_ADDR'] . ' är avstängd.');
}

require_once 'functions/general.php';

// Kontrollerar ifall användaren valt att bli ihågkommen, och loggar i så fall in denne.
if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if ($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}

?>
