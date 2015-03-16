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
<?php
				if ($user->isLoggedIn()) {
					$fullname = $user->data()->fullname;

?>
						<ul class="nav navbar-nav navbar-right">
							<li role="presentation" id="sendrecipe"><a href="#"><span class="fa fa-pencil"></span> Skicka in recept</a></li>
							<li role="presentation" id="favorites"><a href="#"><span class="fa fa-heart"></span> Favoritrecept</a></li>
							<li role="presentation" id="settings"><a href="mina-uppgifter.php"><span class="fa fa-user"></span> <?php echo $fullname; ?></a></li>
							<li role="presentation"><a href="logout.php"><span class="fa fa-sign-out"></span> Logga ut</a></li>
						</ul>
<?php
				} else {
?>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-user"></span> Logga in</a></li>
						</ul>
<?php
				}
?>
					</div>
				</div>
			</nav>