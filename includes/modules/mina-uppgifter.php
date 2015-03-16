		<header>
			<section class="header">
				<div class="container">
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="well well-lg main-section">
								<h1>Mina uppgifter</h1>
								
								<div class="row">
									<div class="col-md-12">
										<form action="" method="post" class="form-horizontal">
											<fieldset>
												<div class="form-group">
													<label for="fullname" class="col-md-2 control-label">Namn:</label>
													<div class="col-md-10">
														<input type="text" name="fullname" id="fullname" value="<?php echo $user->data()->fullname; ?>" class="form-control" disabled="">
													</div>
												</div>
												<div class="form-group">
													<label for="email" class="col-md-2 control-label">E-post:</label>
													<div class="col-md-10">
														<input type="email" name="email" id="email" value="<?php echo $user->data()->email; ?>" class="form-control" disabled="">
													</div>
												</div>
												<div class="center">
													<div class="checkbox">
														<input type="checkbox" name="newsletter" id="newsletter" disabled="" checked>
														<label for="newsletter" class="control-label">Ta emot nyhetsbrev från <a href="">Vad ska jag laga?</a></label>
													</div>
												</div>
												<br><br><br>
												<div class="col-md-6 center">
													<a href="andra-uppgifter.php" class="btn btn-success"><span class="fa fa-pencil"></span> Ändra uppgifter</a>
												</div>
												<div class="col-md-1"></div>
												<div class="col-md-5 center">
													<a href="byt-losenord.php" class="btn btn-danger"><span class="fa fa-lock"></span> Byt lösenord</a>
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