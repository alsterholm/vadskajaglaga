<?php

require_once 'core/init.php';

if (Input::exists()) {
	$password = Input::get('password');
	$user = new User();
	if ($user->data()->password === Hash::make($password, $user->data()->salt)) {
		echo 1;
		exit();
	}
}

echo 0;