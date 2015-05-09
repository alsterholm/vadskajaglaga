<h1>Meddelanden</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>Email</td>
					<td>Status</td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Message::all() as $message) {

						$trclass = '';
						$link = 'href="?p=message&id=' . $message->id . '"';

						if ($message->status == 2) {
							$trclass = 'class="message-finished"';
							$link = '';
						} else if ($message->status == 3) {
							$trclass = 'class="message-flagged"';
						}

						echo '
							<tr ' . $trclass . '>
								<td><a ' . $link . '>' . $message->email . '</a></td>
								<td>' . Message::status($message->status) . '</td>
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
