<?php
// @author Andreas Indal

require_once 'core/init.php';	
admin();

if (Input::exists()) {
	$ip = Input::get('ip');
	$reason = Input::get('reason');

	if (IPBan::add($ip, $reason)) {
		echo 1;
		exit();
	}
}
echo 0;