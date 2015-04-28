 	<!-- Recipes -->
<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<title>Recept - Vad ska jag laga?</title>

    	<link rel="icon" type="img/png" href="img/icon.png">

    	<!-- Init-file -->
    	<?php require_once 'core/init.php'; ?>

    	<!-- CSS-links -->
    	<?php include 'includes/data/css-links.php'; ?>
    </head>

<?php 	
	$user = new User();
?>

	<body>

		<!-- Navbar -->
		<?php include 'includes/navbar.php'; ?>

		<!-- Main function -->
		<?php include 'includes/modules/recept.php'; ?>

		<!-- Footer -->
		<?php //include 'includes/footer.php'; ?>

		<!-- JavaScript-links -->
		<?php include 'includes/data/js-links.php'; ?>
		<script>
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			});

			$('#favorite-btn').on('click', function() {
				var recipe = $('#recipe-id').val();
				$.post('manage-favorite.php', { recipe: recipe })
					.done(function(data) {
						if (data == 1) {
							if ($('#favorite-btn').hasClass('btn-default')) {
								$('#favorite-btn').switchClass('btn-default', 'btn-danger', 500);
							} else {
								$('#favorite-btn').switchClass('btn-danger', 'btn-default', 500);
							}
						} else {
							console.log(data);
						}
					});
			})

		</script>
		
	</body>