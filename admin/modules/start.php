<h1>Översikt</h1>
<?php
	$db = DB::getInstance();

	$recipes = $db->getLatest('recipes')->results();
	$ingredients = $db->getLatest('ingredients')->results();
	$users = $db->getLatest('users')->results();

?>
<div class="row">
	<div class="col-md-4">
	<h4>Senast inlagda recepten</h4>
		<table class="table table-striped">
			<thead>
				<td>#</td>
				<td>Namn</td>
			</thead>
			<tbody>
				<?php
					foreach($recipes as $recipe) {
						echo '
							<tr>
								<td>' . $recipe->id . '</td>
								<td><a href="admin.php?p=r-list&id=' . $recipe->id . '">' . $recipe->name . '</a></td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
		<a href="admin.php?p=r-list">Se alla recept &raquo;</a>
		<br><br>
	</div>
	<div class="col-md-4">
	<h4>Senast inlagda ingredienserna</h4>
		<table class="table table-striped">
			<thead>
				<td>#</td>
				<td>Namn</td>
			</thead>
			<tbody>
				<?php
					foreach($ingredients as $ingredient) {
						echo '
							<tr>
								<td>' . $ingredient->id . '</td>
								<td><a href="admin.php?p=i-list&id=' . $ingredient->id . '">' . $ingredient->name . '</a></td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
		<a href="admin.php?p=i-list">Se alla ingredienser &raquo;</a>
		<br><br>
	</div>
	<div class="col-md-4">
	<h4>Senast registrerade användarna</h4>
		<table class="table table-striped">
			<thead>
				<td>#</td>
				<td>E-post</td>
			</thead>
			<tbody>
				<?php
					foreach($users as $user) {
						echo '
							<tr>
								<td>' . $user->id . '</td>
								<td><a href="admin.php?p=u-list&id=' . $user->id . '">' . $user->email . '</a></td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
		<a href="admin.php?p=u-list">Se alla användare &raquo;</a>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#a-start').addClass('active');
	});
</script>