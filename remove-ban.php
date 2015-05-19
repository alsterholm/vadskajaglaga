<?php
// @author Andreas Indal

require_once 'core/init.php';
admin();

if (Input::exists()) {
	if (IPBan::remove(Input::get('id'))) {
		echo 1;
		exit();
	}
}
echo 0;