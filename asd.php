<?php

	require_once 'core/init.php';

	for ($i = 0; $i < 3000; $i++) {
		try {
			Recipe::create(array(
				'name' => $i,
				'ingredients' => '3,6'
			));
		} catch (Exception $e) {
			echo 'error';
		}
	}

?>