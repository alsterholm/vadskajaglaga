		<footer class="footer">
			<div class="container">
				<p class="copyright">&copy; <?php echo date('Y', time()); ?> vadskajaglaga.se<br>
					<a href="om-oss.php">Om Vad ska jag laga?</a> |
<?php 	
				if ($user->isLoggedIn()) {
					echo '<a href="regler-och-villkor.php">Regler och villkor</a> |';
				}
?>
					<a href="cookies.php">Cookiepolicy</a> |
					<a href="kontakta-oss.php">Kontakta oss</a>
				</p>
				<br>
				<p>
					<a href="#"><span class="fa fa-facebook-official"></span> Facebook</a> |
					<a href="#"><span class="fa fa-twitter"></span> Twitter</a> |
					<a href="#"><span class="fa fa-google-plus"></span> Google+</a><br>
				</p>
			</div>
		</footer>