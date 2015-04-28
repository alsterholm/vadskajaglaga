		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Glömt lösenord</h1>								
<?php
								if (Input::exists('get')) {
									if (Input::get('success') == 'true') {
										if (Input::exists()) {
											$db = DB::getInstance();
											$email = Input::get('email');
											$user = new User($email);

											if ($user->exists()) {
												$hash = hash('sha256', microtime());
												$user_id = $user->data()->id;

												$db->insert('password_resets', array(
													'hash' => $hash,
													'user_id' => $user_id,
													'time' => time();
												));
											}
										}

										echo '
											<p class="center">
												Tack! Om din e-postadress finns i vår databas så skickar vi ett meddelande med instruktioner för hur du återställer ditt lösenord.
												<br><br>
												<a href="index.php" class="btn btn-success"><span class="fa fa-home"></span> Tillbaka till startsidan</a>
											</p>
										';
									} else {
										Redirect::to(404);
									}
								} else {
?>
								<p class="center">
									Har du glömt av ditt lösenord? Ingen fara, det är inte lätt att hålla koll på allt! Fyll i din e-postadress nedan så ska vi hjälpa dig att återställa det!
									<br><br><br>
									<form action="reset-password.php" method="" class="form-horizontal">
										<fieldset>
											<label for="email" class="col-md-2 control-label">E-post:</label>
											<div class="col-md-10">
												<input type="email" name="email" id="email" class="form-control">
											</div>
											<br><br><br><br>
											<div class="col-xs-6 center">
												<button type="submit" class="btn btn-success"><span class="fa fa-paper-plane"></span> Skicka</button>
											</div>
											<div class="col-xs-6 center">
												<a href="logga-in.php" class="btn btn-danger"><span class="fa fa-close"></span> Tillbaka</a>
											</div>
										</fieldset>
									</form>
								</p>
<?php
								}
?>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>