var regEmail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

$('#register-btn').on('click', function(e) {
	e.preventDefault();

	var fullname = $('#fullname').val().trim();
	var email = $('#email').val();
	var password = $('#password').val();
	var repeat = $('#password_again').val();

	var empty = (fullname == '' || email == '' || password == '' || repeat == '');

	if (empty) {
		$('#empty-alert').slideDown(500);
		$('#empty-alert').delay(2000).slideUp(500);
	} else if (fullname.indexOf(' ') == -1) {
		$('#fullname-alert').slideDown(500);
		$('#fullname-group').addClass('has-error');
		$('#fullname-alert').delay(2000).slideUp(500);
	} else if (!regEmail.test(email))  {
		$('#email-alert').slideDown(500);
		$('#email-group').addClass('has-error');
		$('#email-alert').delay(2000).slideUp(500);
	} else if (password.length < 6) {
		$('#password-alert').slideDown(500);
		$('#password-group').addClass('has-error');
		$('#password-alert').delay(2000).slideUp(500);
	} else if (password != repeat) {
		$('#repeat-alert').slideDown(500);
		$('#password-group').addClass('has-error');
		$('#repeat-group').addClass('has-error');
		$('#repeat-alert').delay(2000).slideUp(500);
	} else {
		$.post('verify-email.php', {email: email}, function(data) {
			if (data == 1) {
				$('#taken-email').html(email);
				$('#exists-alert').slideDown(500);
				$('#email-group').addClass('has-error');
				$('#exists-alert').delay(2000).slideUp(500);
			} else {
				$('#register-form').submit();
			}
		});
	}

})

$('#fullname').keyup(function() {
	if ($('#fullname').val().trim().indexOf(' ') != -1) {
		$('#fullname-group').removeClass('has-error');
	}
});

$('#email').keyup(function() {
	if (regEmail.test($('#email').val())) {
		$('#email-group').removeClass('has-error');
	}
});

$('#password').keyup(function() {
	if ($('#password').val().length >= 6) {
		$('#password-group').removeClass('has-error');
	}
});

$('#password_again').keyup(function() {
	if ($('#password').val() == $('#password_again').val()) {
		$('#repeat-group').removeClass('has-error');
		$('#password-group').removeClass('has-error');
	}
});