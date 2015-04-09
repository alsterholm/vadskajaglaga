<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedIn()){
	Redirect::to('index.php');
}

if(Input::exists()){

	if(Token::check(Input::get('token'))){
		
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

		if($validation->passed()){
			if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password){
				echo 'Your current password is wrong';
			}else{
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('password_new'), $salt),
					'salt' =>$salt
					));

				Session::flash('home', 'Your password has been changed!');
				Redirect::to('mina-uppgifter.php');
			}

		}else{
			foreach($validation->errors() as $error){
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
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Byta lösenord</h1>
								<div class="row">
									<div class="col-md-12">
										<form action="" method="post" class="form-horizontal">
											<fieldset>
												<div class="form-group">
													<label for="password_current" class="col-md-2 control-label">Nuvarande lösenord:</label>
													<div class="col-md-10">
														<input type="password" name="password_current" id="password_current" placeholder="**********" autocomplete="off" class="form-control">
													</div>
													<div class="form-group">
													<label for="password_new" class="col-md-2 control-label">Nytt lösenord:</label>
													<div class="col-md-10">
														<input type="password" name="password_new" id="password_new" placeholder="**********" autocomplete="off" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label for="password_new_again" class="col-md-2 control-label">Repetera nytt lösenord:</label>
													<div class="col-md-10">
														<input type="password" name="password_new_again" id="password_new_again" placeholder="**********" autocomplete="off" class="form-control">
													</div>
												</div>
												
												<br><br><br>
												<div class="center">
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Spara</button>
													<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
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