<div class="modal fade" id="register-modal" role="dialog" aria-labelledby="register-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
				<h4 class="modal-title" id="register-modal-label">Registrera</h4>
			</div>
			<div class="modal-body">
				<form action="register.php" method="post" class="form-horizontal">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<label for="fullname">Namn</label><br>
								<input type="text" class="form-control" name="fullname" id="fullname" placeholder="Sven Ekdahl" required>
								<br>
								<label for="email">E-post</label><br>
								<input type="email" class="form-control" name="email" id="email" placeholder="sven.ekdahl@hemsida.se" required>
								<br>
								<label for="password">Lösenord</label><br>
								<input type="password" class="form-control" name="password" id="password" placeholder="********" required>
								<br>
								<label for="password_again">Upprepa lösenord</label><br>
								<input type="password" class="form-control" name="password_again" id="password_again" placeholder="********" required>
								<br>
							</div>
							<div class="col-md-12 center">
								<p>Genom att registrera dig godkänner du våra <a href="regler-och-villkor.php">regler och villkor</a>.</p>
								<br>
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