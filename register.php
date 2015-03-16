<?php
require_once 'core/init.php';

if (Input::exists()) {
	$_POST['fullname'] = trim($_POST['fullname']);

	if (Token::check(Input::get('token'))) {
		$validate =new Validate();
		$validation = $validate->check($_POST, array(
			'email' => array(
				'required' => true,
				'unique' => 'users',
				'email' => true
			),
			'password' => array(
				'required' => true,
				'min' => 6
			),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
			),
			'fullname' => array(
				'required' => true,
				'min' => 2,
				'max' => 50,
				'fullname' => true
			)
		));

		if ($validation->passed()) {
			$user = new User();
			$salt = Hash::salt(32);

			try {
				$user->create(array(

					'email' => Input::get('email'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'fullname' => Input::get('fullname'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1,
					'register_ip' => $_SERVER['REMOTE_ADDR']

				));

				$user->login(Input::get('email'), Input::get('password'), false);
				Redirect::to('index.php');

			} catch (Exception $e) {
				Redirect::to(404);
			}
		} else {
			//fixa error-hantering på registrera.php
			Redirect::to('registrera.php?register=false');
		}
	}
}

?>