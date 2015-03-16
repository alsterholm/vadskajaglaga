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
								<form action="register.php" method="post" class="form-horizontal">
									<fieldset>
										<div class="row">
											<div class="col-md-12">
												<label for="fullname" class="col-md-2 control-label">Namn:</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Sven Ekdahl" required>
												</div>
												<br><br>
												<label for="email" class="col-md-2 control-label">E-post:</label>
												<div class="col-md-10">
													<input type="email" class="form-control" name="email" id="email" placeholder="sven.ekdahl@hemsida.se" required>
												</div>
												<br><br>
												<label for="password" class="col-md-2 control-label">Lösenord:</label>
												<div class="col-md-10">
													<input type="password" class="form-control" name="password" id="password" placeholder="********" required>
												</div>
												<br><br>
												<label for="password_again" class="col-md-2 control-label">Upprepa:</label>
												<div class="col-md-10">
													<input type="password" class="form-control" name="password_again" id="password_again" placeholder="********" required>
												</div>
												<br><br>
											</div>
											<div class="col-md-12 center">
												<input type="checkbox" name="newsletter" id="newsletter" checked>
												<label for="newsletter" class="control-label">Ja tack, jag vill gärna ta del av <a href="index.php">vadskajaglaga.se</a>s nyhetsbrev!</label>
												<br><br><br>
												<p>Genom att registrera dig godkänner du våra <a href="regler-och-villkor.php">regler och villkor</a>.</p>
												<input type="hidden" name="token" value="<?php echo $token; ?>">
												<button type="submit" class="btn btn-success">Registrera <span class="fa fa-check"></span></button>
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