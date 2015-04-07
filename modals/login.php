<div class="modal fade" id="login-modal" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
				<h4 class="modal-title" id="login-modal-label">Logga in</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-7">
						<form action="" method="post" class="form-horizontal">
							<fieldset>
								<div class="row">
									<div class="col-md-12">
										<label for="input_email">E-post</label>
										<input type="email" class="form-control" id="input_email" placeholder="sven.ekdahl@hemsida.se" required>
										<br>
									</div>
									<div class="col-md-12">
										<label for="input_password">Lösenord</label>
										<input type="password" class="form-control" id="input_password" placeholder="********" required>
										<br>
									</div>
								</div>
								<div class="remember">
									<input type="checkbox" id="remember" checked>
									<label for="remember"><abbr title="Om du kryssar i denna ruta kommer du loggas in automatiskt nästa gång du besöker sidan">Kom ihåg mig</abbr></label><br><br>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-success"><span class="fa fa-sign-in"></span> Logga in</button>
										<a class="btn btn-default" id="register"><span class="fa fa-pencil"></span> Registrera dig</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="col-md-5 soc-med">
						<label>Logga in med sociala medier</label>
						<a class="btn btn-block btn-social btn-lg btn-facebook"><i class="fa fa-facebook"></i> Logga in med Facebook</a>
						<a class="btn btn-block btn-social btn-lg btn-twitter"><i class="fa fa-twitter"></i> Logga in med Twitter</a>
						<a class="btn btn-block btn-social btn-lg btn-google-plus"><i class="fa fa-google"></i> Logga in med Google</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>