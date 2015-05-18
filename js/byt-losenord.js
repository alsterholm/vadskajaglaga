$('#btn-change').on('click', function(e) {
	e.preventDefault();

	var current = $('#pw_cur').val();
	var new_pw 	= $('#pw_new').val();
	var repeat 	= $('#pw_new_r').val();

	var empty 	= (current == '' || new_pw == '' || repeat == '');

	if (empty) {
		$('#error-empty').slideDown(500).delay(2000).slideUp(500);
	} else if (new_pw.length < 6) {
		$('#error-length').slideDown(500).delay(2000).slideUp(500);
	} else if (new_pw != repeat) {
		$('#error-repeat').slideDown(500).delay(2000).slideUp(500);
	} else {
		$.post('verify-password.php', {password: current}, function(data) {
			if (data == 1) {
				$('#change-password-form').submit();
			} else {
				alert(data);
				// $('#error-current').slideDown(500).delay(2000).slideUp(500);
			}
		});
	}
});