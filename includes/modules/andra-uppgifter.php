		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Ändra uppgifter</h1>
<?php
require_once 'core/init.php';

$user = new User();
protect();

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		$validate = new Validate();

		if (Input::get('email') !=  $user->data()->email) {
			$validation = $validate->check($_POST, array(
				'fullname' => array(
					'required' => true,
					'min' => 2,
					'max' => 50,
					'fullname' => true,
					'alphabetical' => true
				),
				'email' => array(
					'required' => true,
					'unique' => 'users',
					'email' => true
				)
			));
		} else {
			$validation = $validate->check($_POST, array(
				'fullname' => array(
					'required' => true,
					'min' => 2,
					'max' => 50,
					'fullname' => true,
					'alphabetical' => true
				)
			));
		}
		
		if ($validation->passed()) {
			try {
				$user->update(array(
					'fullname' => Input::get('fullname'),
					'email' => Input::get('email')
				));
				Redirect::to('mina-uppgifter.php?change=settings');
			} catch (Exception $e) {
				Redirect::to(500);
			}
		} else {
?>
								<div class="row">
									<div class="col-md-12 alert alert-danger"><span class="glyphicon glyphicon glyphicon-exclamation-sign"></span> Något gick fel!</div>
								</div>
<?php
		}
	}
}

?>
								<div class="row">
									<div class="col-md-12">
										<form action="" method="post" class="form-horizontal">
											<fieldset>
												<div class="form-group">
													<label for="fullname" class="col-md-2 control-label">Namn:</label>
													<div class="col-md-10">
														<input type="text" name="fullname" id="fullname" value="<?php echo $user->data()->fullname; ?>" class="form-control">
													</div>
												</div>
												<div class="form-group">
													<label for="email" class="col-md-2 control-label">E-post:</label>
													<div class="col-md-10">
														<input type="email" name="email" id="email" value="<?php echo $user->data()->email; ?>" class="form-control">
													</div>
												</div>
												<div class="center">
													<div class="checkbox">
														<input type="checkbox" name="newsletter" id="newsletter" checked>
														<label for="newsletter" class="control-label">Ta emot nyhetsbrev från <a href="">Vad ska jag laga?</a></label>
													</div>
												</div>
												<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
												<br><br><br>
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