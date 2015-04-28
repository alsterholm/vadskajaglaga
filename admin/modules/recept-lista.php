<h1>Lista recept</h1>
<br>
<input type="search" id="input-filter" class="form-control" placeholder="Sök bland recept">
<br><br>
<div class="row">
	<div class="col-md-12">
		<table id="recipe-table" class="table table-striped sortable">
			<thead>
				<tr>
					<td>ID</td>
					<td>Namn</td>
				</tr>
			</thead>
			<tbody>
				<?php

					foreach (Recipe::all() as $recipe) {

						echo '
							<tr>
								<td>' . $recipe->id . '</td>
								<td><a href="?p=r-list&id=' . $recipe->id . '">' . $recipe->name . '</a></td>
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
<script src="admin/js/filtertable.min.js"></script>

<script>
	$(document).ready(function() {
		$('#recipe-table').filterTable({
			inputSelector: '#input-filter'
		});
		$('#r-list').addClass('active');
	});
</script>
