<h1>Lista användare</h1>
<br>
<input type="search" id="input-filter" class="form-control" placeholder="Sök bland användare">
<br><br>
<div class="row">
	<div class="col-md-12">
		<table id="user-table" class="table table-striped sortable">
			<thead>
				<tr>
					<td>ID</td>
					<td>E-post</td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach(User::all() as $user) {
						echo '
						<tr>
							<td>' . $user->id . '</td>
							<td><a href="?p=u-list&id=' . $user->id . '">' . $user->email . '</a></td>
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
		$('#user-table').filterTable({
			inputSelector: '#input-filter'
		});
		$('#u-list').addClass('active');
	});
</script>
