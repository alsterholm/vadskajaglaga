<h1>Inskickade recept</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped"> 
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
					<td>Portioner</td>
					<td>Bakgrundsfärg</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (suggestion::getSuggestions() as $suggestion) {


						echo '
							<tr>
								<td>' . $suggestion->id . '</td>
								<td>' . $suggestion->name . '</td>
								<td>' . $fgcolor . '</td>
								<td>' . strtoupper($suggestion->bgcolor) . '</td>
								<td style="text-align: right"><a href="#" id="delete' . $suggestion->id . '">Ta bort</a>
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

<script>
	$(document).ready(function() {
		$('#r-sent').addClass('active');
	});
</script>