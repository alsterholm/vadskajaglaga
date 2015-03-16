<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="refresh" content="5;index.php">

		<title>Utloggad - Vad ska jag laga?</title>

		<link rel="icon" type="image/png" href="img/icon.png">

		<!--  Init-file -->
		<?php require_once 'core/init.php'; ?>

		<!-- CSS-links -->
		<?php include 'includes/data/css-links.php'; ?>	
	</head>

	<?php

		$user = new User();
		if (!Input::exists('get')) {
			$token = Token::generate();
		}
	?>

	<body>
		
		<!-- Navbar -->
		<?php include 'includes/navbar.php'; ?>


		<!-- Main function -->
		<?php include 'includes/modules/utloggad.php'; ?> 

		
		<!-- Footer -->
		<?php include 'includes/footer.php'; ?>


		<!-- Modals -->
			<!-- Login-modal -->
			<?php include 'modals/login.php'; ?>

			<!-- Register-modal -->
			<?php include 'modals/register.php'; ?>


		<!-- JavaScript-links -->
		<?php include 'includes/data/js-links.php'; ?>


		<script>
			var count = 5;
			var counter = setInterval(countdown, 1000);

			function countdown() {
				count = count-1;
				
				if (count <= 0) {
					clearInterval(counter);
				} else if (count == 1) {
					document.getElementById("countdown").innerHTML = count + " sekund";
				} else {
					document.getElementById("countdown").innerHTML = count + " sekunder";
				}
			}
		</script>

	</body>
</html>