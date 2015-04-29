<header>
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="well well-lg main-section">
						<h1>Återställ lösenord</h1>

<?php
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
			echo '<script>alert("Validation success")</script>';

			$db->update('users', $reset->user_id, array(
				'password' => Hash::make(Input::get('password'), $salt),
				'salt' => $salt
			));
			
			echo 'success';

		} else {
			echo '<script>alert("Validation fail")</script>';
?>
	
						<div class="row">
							<div class="col-md-10 col-md-offset-1 alert alert-danger">
								Något gick fel:<br><br>
								<ul>
									<li>Ditt lösenord måste bestå av <strong>minst 6 tecken</strong></li>
									<li>Lösenorden i båda fälten måste stämma överens</li>
								</ul>
							</div>
						</div>
<?php
		}
	}

	if (Input::exists('get')) {
		$hash = Input::get('h');
		$reset = $db->get('password_resets', array('hash', '=', $hash))->results();

		echo 'Reset-tid: ' . $reset->time . '<br>';
		echo 'Nuvarande tid: ' . time();

		//Kontrollera att hashen finns i databasen
		if ($db->count()) {
			//Kontrollera att det inte har gått mer än 15 minuter sedan mailet skickades.
			if (time() > ($reset->time + 900)) {
?>

						<form action="" method="post">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<input type="password" name="password" class="form-control" placeholder="Nytt lösenord">
								</div>
								<br><br>
								<div class="col-md-10 col-md-offset-1">
									<input type="password" name="password_again" class="form-control" placeholder="Upprepa lösenord">
								</div>
								<br><br><br>
								<div class="center">
									<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Byt lösenord</button>
								</div>
							</div>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</section>
</header>



<?php
			} else {
				$db->delete('password_resets', array('hash', '=', $hash));
				echo 'tid';
				// Redirect::to('index.php');
			}
		} else {
			echo 'finns inte';
			// Redirect::to('index.php');
		}
	} else {
		echo 'Ingen input';
		// Redirect::to('index.php');
	}
?>