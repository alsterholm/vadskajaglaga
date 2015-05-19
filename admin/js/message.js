// @author Andreas Indal

$(document).ready(function() {
	$('#a-message').addClass('active');
});

$('.update-status').on('click', function() {
	var id = $('#id').val();
	var status = $('#status option:selected').val();
	var button = $(this);

	$.post('update-status.php', { id: id, status: status}, function(data) {
		if (data == 1) {
			button.switchClass('btn-primary', 'btn-success', 500);
			button.delay(2000).switchClass('btn-success', 'btn-primary', 500);
		} else {
			alert("Något gick fel...");
		}
	});
});

$('#send-message').on('click', function() {
	var id = $('#id').val();
	var email = $('#email').val();
	var fullname = $('#fullname').val();
	var message = $('textarea#message').val();

	if (message.length > 0) {
		$.post('send-message.php', {email: email, fullname: fullname, message: message, id: id}, function(data) {
			if (data == 1) {
				$('.response').slideUp(500);
				$('#contact-message-success').delay(500).slideDown(500);
			} else {
				alert('Något gick fel...');
			}
		});
	} else {
		$('#contact-message-error').slideDown(500);
		$('#contact-message-error').delay(2000).slideUp(500);
	}

})