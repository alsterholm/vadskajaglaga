$('#btn-change').on('click', function(e) {
	e.preventDefault();

	var current = $('#pw_cur').val();
	var new 	= $('#pw_new').val();
	var repeat 	= $('#pw_new_r').val();

	var empty 	= (current == '' || new == '' || repeat == '');

	if (empty) {
		$('#error-empty').slideDown(500).delay(2000).slideUp(500);
	}
});