<?php

require_once 'core/init.php';

if (Input::exists()) {
	$email = Input::get('email');
	$db = DB::getInstance();

	$db->get('users', array('email', '=', $email));

	if ($db->count()) {
		echo 1;
		exit();
	}
}

echo 0;