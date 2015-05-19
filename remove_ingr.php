<?php
// @author Andreas Indal

require_once 'core/init.php';
admin();

if (Input::exists()) {
	$db = DB::getInstance();
	try {
		$db->delete('recipe_ingredients', array('id', '=', Input::get('id')));
		echo 1;
	} catch (Exception $e) {
		echo 0;
	}
}
