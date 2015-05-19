<?php
// @author Andreas Indal

require_once 'core/init.php';
admin();

if (Input::exists()) {
	$db = DB::getInstance();
	$id = Input::get('id');

	$db->get('ip_bans', array('id', '=', $id));
	echo $db->first()->reason;
}