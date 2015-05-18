		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Registrera konto</h1>
<?php
						if (Input::exists('get')) {
							if (Input::get('register') == 'false') {
?>
								<div class="row">
									<div class="col-md-12">
										<div class="alert alert-danger" role="alert">
											<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
											<span class="sr-only">Fel:</span>
											Registreringen misslyckades.
										</div>
									</div>
								</div>
<?php
							} else {
								Redirect::to(404);
							}
						}
?>
								<form id="register-form" action="register.php" method="post" class="form-horizontal">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<div id="fullname-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Du måste ange både för- och efternamn!</div>
												<div id="fullname-alpha-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Ditt namn får endast innehålla bokstäver!</div>
												<div id="empty-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Du måste fylla i alla fält!</div>
												<div id="email-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Du måste ange en gilitg e-post adress!</div>
												<div id="exists-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> E-postadressen <strong><span id="taken-email"></span></strong> är redan registrerad.</div>
												<div id="password-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Ditt lösnord måste bestå av <strong>minst 6</strong> tecken!</div>
												<div id="repeat-alert" class="register-alert alert alert-sm alert-danger"><span class="glyphicon glyphicon-exclamation-sign"></span> Lösenorden måste stämma överens</div>
											</div>
											<div class="col-md-12">
												<div id="fullname-group" class="form-group">
													<label for="fullname" class="col-md-2 control-label">Namn:</label>
													<div class="col-md-10">
														<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Sven Ekdahl" required>
													</div>
												</div>
												<div id="email-group" class="form-group">
													<label for="email" class="col-md-2 control-label">E-post:</label>
													<div class="col-md-10">
														<input type="email" class="form-control" name="email" id="email" placeholder="sven.ekdahl@hemsida.se" required>
													</div>
												</div>
												<div id="password-group" class="form-group">
													<label for="password" class="col-md-2 control-label">Lösenord:</label>
													<div class="col-md-10">
														<input type="password" class="form-control" name="password" id="password" placeholder="********" required>
													</div>
												</div>
												<div id="repeat-group" class="form-group">
													<label for="password_again" class="col-md-2 control-label">Upprepa:</label>
													<div class="col-md-10">
														<input type="password" class="form-control" name="password_again" id="password_again" placeholder="********" required>
													</div>
												</div>
											</div>
											<div class="col-md-12 center">
												<input type="checkbox" name="newsletter" id="newsletter" checked>
												<label for="newsletter" class="control-label">Ja tack, jag vill gärna ta del av <a href="index.php">vadskajaglaga.se</a>s nyhetsbrev!</label>
												<br><br><br>
												<p>Genom att registrera dig godkänner du våra <a href="regler-och-villkor.php">regler och villkor</a>.</p>
												<input type="hidden" name="token" value="<?php echo $token; ?>">
												<button type="submit" id="register-btn" class="btn btn-success">Registrera <span class="fa fa-check"></span></button>
												<br>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
		</header>