<?php 
	$logged_in = false;
	$username = 'Andreas Indal';
?>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Visa meny</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="">Vad ska jag laga?</a>
					</div>
					<div class="collapse navbar-collapse">
<?php
				if ($logged_in) {
?>
						<ul class="nav navbar-nav navbar-right">
							<li role="presentation"><a href="#"><span class="fa fa-pencil"></span> Skicka in recept</a></li>
							<li role="presentation"><a href="#"><span class="fa fa-heart"></span> Favoritrecept</a></li>
							<li role="presentation"><a href="#"><span class="fa fa-user"></span> <?php echo $username; ?></a></li>
							<li role="presentation"><a href="#"><span class="fa fa-sign-out"></span> Logga ut</a></li>
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