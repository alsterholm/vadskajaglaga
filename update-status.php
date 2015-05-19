<?php
// @author Andreas Indal

require_once 'core/init.php';
admin();

if (Input::exists()) {
	try {
		$db = DB::getInstance();
		$db->update('contact', Input::get('id'), array(
			'status' => Input::get('status')
		));

		echo 1;
	} catch (Exception $e) {
		echo 0;
	}
}
