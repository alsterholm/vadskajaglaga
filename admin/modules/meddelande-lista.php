<h1>Kontakta oss</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>ID</td>
					<td>Status</td>
					<td>Namn</td>
					<td>Email</td>
					<td>Meddelande</td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Message::all() as $message) {

						echo '
							<tr>
								<td>' . $message->id . '</td>
								<td>' . $message->status . '</td>
								<td><a href="?p=message&id=' . $message->id . '">' . $message->fullname . '</a></td>
								<td>' . $message->email . '</td>
								<td>' . $message->message . '</td>
							</tr>
						';
					}

				?>
			</tbody>
		</table>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sorttable.js"></script>

<script>
	$(document).ready(function() {
		$('#a-message').addClass('active');
	});
</script>
