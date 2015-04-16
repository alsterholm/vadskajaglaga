<h1>Lista användare</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>ID</td>
					<td>E-post</td>
					<td>Namn</td>
					<td>Användargrupp</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach(User::all() as $user) {
						switch($user->group) {
							case '0': $group = 'Medlem';
							break;

							case '1': $group = 'Administratör';
							break;
						}		

						echo '
						<tr>
							<td>' . $user->id . '</td>
							<td>' . $user->email . '</td>
							<td>' . $user->fullname . '</td>
							<td>' . $group . '</td>
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
		$('#u-list').addClass('active');
	});
</script>