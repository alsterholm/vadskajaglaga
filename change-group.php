<?php

require_once 'core/init.php';
admin();

if (Input::exists()) {
	$id = Input::get('id');
	$user = new User($id);
	$db = DB::getInstance();
	$newGroup = 1;

	if ($user->data()->group == 1) {
		$newGroup = 0;
	}
	
	if ($db->query("UPDATE `users` SET `group` = ? WHERE id = ?", array($newGroup, $id))) {
		echo 1;
		exit();
	}
}
echo 0;