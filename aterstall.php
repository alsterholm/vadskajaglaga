<?php

	require_once 'core/init.php';
	$db = DB::getInstance();

	if (Input::exists()) {
		$hash = Input::get('h');
		$reset = $db->get('password_resets', array('hash', '=', $hash))->results();

		$validate = new Validate();
		$validation = $validate->check(array(
			'password' => array(
				'required' => true,
				'min' => 6
			),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
			)
		));

		if ($validation->passed()) {
			$salt = Hash::salt(32);

			$user->update(array(
				'password' => Hash::make(Input::get('password'), $salt),
				'salt' => $salt,
			), $reset->user_id);
			$db->delete('password_resets', array('hash', '=', $hash));

			/*
				Visa meddelande om att lösenordet återställts.
			*/
		} else {
			/*
				Visa meddelande om att lösenordet inte godkänns.
			*/
		}
	} else if (Input::exists('get')) {
		$hash = Input::get('reset');
		$reset = $db->get('password_resets', array('hash', '=', $hash))->result();

		//Kontrollera att hashen finns i databasen
		if ($db->count()) {
			//Kontrollera att det inte har gått mer än 15 minuter sedan mailet skickades.
			if (time() < ($reset->time + 900)) {
				/*
					Visa reset-sida
				*/
			} else {
				$db->delete('password_resets', array('hash', '=', $hash));
				Redirect::to('index.php');
			}
		} else {
			Redirect::to('index.php');
		}
	} else {
		Redirect::to('index.php');
	}