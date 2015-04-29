			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Visa meny</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php">Vad ska jag laga?</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
							<li role="presentation" id="findrecipe"><a href="index.php"><span class="fa fa-search"></span> Hitta recept</a></li>
						</ul>
<?php
				if ($user->isLoggedIn()) {
					$fullname = $user->data()->fullname;

?>
						<ul class="nav navbar-nav navbar-right">
							<li role="presentation" id="sendrecipe"><a href="skicka-in.php"><span class="fa fa-pencil"></span> Skicka in recept</a></li>
							<li role="presentation" id="favorites"><a href="favoriter.php"><span class="fa fa-heart"></span> Favoritrecept</a></li>
							<li role="presentation" id="settings"><a href="mina-uppgifter.php"><span class="fa fa-user"></span> <?php echo $fullname; ?></a></li>
<?php
				if ($user->data()->group > 0) {
					echo '<li role="presentation"><a href="admin.php"><span class="fa fa-cog"></span> Admin</a></li>';
				}
?>
							<li role="presentation"><a href="logout.php"><span class="fa fa-sign-out"></span> Logga ut</a></li>
						</ul>
<?php
				} else {
?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logga-in.php"><span class="glyphicon glyphicon-user"></span> Logga in</a></li>
							<li><a href="registrera.php"><span class="glyphicon glyphicon-pencil"></span> Registrera</a></li>
						</ul>
<?php
				}
?>					
						<ul class="nav navbar-nav navbar-right mob-only">
							<li role="presentation" class="divider"></li>
							<li role="presentation"><a href="om-oss.php"><span class="fa fa-users"></span> Om oss</a></li>
							<li role="presentation"><a href="regler-och-villkor.php"><span class="fa fa-book"></span> Regler och villkor</a></li>
							<li role="presentation"><a href="cookies.php"><span class="fa fa-info"></span> Cookiepolicy</a></li>
							<li role="presentation"><a href="kontakta-oss.php"><span class="fa fa-envelope"></span> Kontakta oss</a></li>
						</ul>
					</div>
				</div>
			</nav>