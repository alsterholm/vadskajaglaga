<h1>Lista ingredienser</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable"> 
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
					<td>Textfärg</td>
					<td>Bakgrundsfärg</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Ingredient::all() as $ingredient) {

						switch($ingredient->fgcolor) {
							case '#ffffff': $fgcolor = 'Vit';
							break;

							case '#000000': $fgcolor = 'Svart';
							break;
						}

						echo '
							<tr>
								<td>' . $ingredient->id . '</td>
								<td>' . $ingredient->name . '</td>
								<td>' . $fgcolor . '</td>
								<td>' . strtoupper($ingredient->bgcolor) . '</td>
								<td style="text-align: right"><a href="#" id="delete' . $ingredient->id . '">Ta bort</a>
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
		$('#i-list').addClass('active');
	});
</script>