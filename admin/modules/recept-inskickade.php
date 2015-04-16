<h1>Inskickade recept</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">  
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
					<td>Portioner</td>
					<td>Beskrivning</td>
					<td>Instruktioner</td>
					<td>Ingredienser</td>
					<td>Användare</td>
					<td></td>	
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Recipe::getSuggestions() as $suggestion) {

						echo '
							<tr>
								<td>' . $suggestion->id . '</td>
								<td>' . $suggestion->name . '</td>
								<td>' . $suggestion->portions . '</td>
								<td>' . $suggestion->description . '</td>
								<td>' . $suggestion->instructions . '</td>
								<td>' . $suggestion->ingredients . '</td>
								<td>' . User::nameFromId($suggestion->user_id) . '</td>
								<td style="text-align: right"><a href="#" id="Lägg-till' . $suggestion->id . '">Lägg till</a>
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
<script src="js/sorttable.js"></script>

<script>
	$(document).ready(function() {
		$('#r-sent').addClass('active');
	});
</script>