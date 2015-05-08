<?php
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if (Input::exists()) {

	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'password_current' => array(
				'required' => true,
				'min' => 6),
			'password_new' => array(
				'required' => true,
				'min' => 6),
			'password_new_again' => array(
				'required' => true,
				'min' => 6,
				'matches' => 'password_new')
		));

		if ($validation->passed()) {
			if (Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
				echo 'Your current password is wrong';
			} else {
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('password_new'), $salt),
					'salt' =>$salt
				));

				Redirect::to('mina-uppgifter.php?change=password');
			}

		} else {
			foreach ($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}
?>	


	<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="well well-lg main-section">
								<h1>Byt lösenord</h1>
								<div class="row">
									<div class="col-md-12">
										<form action="" method="post" class="form-horizontal">
											<fieldset>
												<label for="pw_cur">Nuvarande lösenord:</label>
												<input type="password" name="password_current" id="pw_cur" class="form-control">
												<br>
												<label for="pw_new">Nytt lösenord:</label>
												<input type="password" name="password_new" id="pw_new" class="form-control">
												<div style="margin-top: 10px"></div>
												<label for="pw_new_r">Upprepa nytt lösenord:</label>
												<input type="password" name="password_new_again" id="pw_new_r" class="form-control">
												<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
												<br><br>
												<div class="col-xs-6 center">
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Spara</button>
												</div>
												<div class="col-xs-6 center">
													<a href="mina-uppgifter.php" class="btn btn-danger"><span class="fa fa-close"></span> Tillbaka</a>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>