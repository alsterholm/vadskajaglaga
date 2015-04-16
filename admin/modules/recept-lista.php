<h1>Lista recept</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">  
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Recipe::all() as $recipe) {

						echo '
							<tr>
								<td>' . $recipe->id . '</td>
								<td>' . $recipe->name . '</td>
								<td style="text-align: right"><a href="#" id="delete' . $recipe->id . '">Mer info</a>
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
		$('#r-list').addClass('active');
	});
</script>