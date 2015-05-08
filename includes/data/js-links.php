		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		<script src="js/jquery.autocomplete.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.main-section').fadeIn(300);
			});

			$('a').click(function(e) {
				var url = $(this).attr('href');
				$('.main-section').fadeOut(300, function() {
					window.location.href = url;
				});
				e.preventDefault();
			});
		</script>
