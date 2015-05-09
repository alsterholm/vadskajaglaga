<?php

require_once 'core/init.php';

if (Input::exists()) {
	$email = Input::get('email');
	$fullname = Input::get('fullname');
	$message = Input::get('message');

	if (Mail::send($fullname, $email, $message, 'Vad ska jag laga? - Kontakta oss', 'kontakt')) {
		$db = DB::getInstance();
		$db->update('contact', Input::get('id'), array('status' => 2));
		
		echo 1;
		exit();
	}

}
echo 0;