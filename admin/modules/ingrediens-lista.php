<h1>Lista ingredienser</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Ingredient::all() as $ingredient) {

						echo '
							<tr>
								<td>' . $ingredient->id . '</td>
								<td><a href="?p=ingredient&id=' . $ingredient->id . '">' . $ingredient->name . '</a></td>
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
