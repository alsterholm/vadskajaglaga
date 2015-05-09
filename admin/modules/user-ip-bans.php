<h1>IP-bansystem</h1>
<div class="row">
	<div class="col-md-6">
		<button class="btn btn-primary btn-block" id="new-ban-btn">Lägg till ny IP-ban</button>
		<div class="row" id="new-ban">
			<div class="col-md-12">
				<h4>Lägg till ny IP-ban</h4>
				<input type="text" class="form-control" id="ip" name="ip" placeholder="IP-adress">
				<br>
				<textarea name="reason" class="form-control" rows="3" id="reason" placeholder="Anledning"></textarea>
				<br>
				<button type="button" id="add-ban-btn" class="btn btn-primary">Lägg till</button>
				<br><br>
			<div class="col-md-12 alert alert-success" id="new-ban-success">Ny IP-ban för <span id="new-ip"></span> tillagd!</div>
			</div>
		</div>
		<br><br>
		<div class="alert alert-success" id="remove-success">IP-ban borttagen.</div>
		<input type="search" id="input-filter" class="form-control" placeholder="Sök bland IP-bans"><br>
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>IP-adress</td>
					<td>Tidpunkt</td>
					<td>Bannad av</td>
					<td></td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach (IPBan::all() as $ban) {
						$admin = new User($ban->admin);
						echo '
							<tr>
								<td>' . $ban->ip . '</td>
								<td>' . $ban->time . '</td>
								<td>' . $admin->data()->fullname . '</td>
								<td><button id="reason-' . $ban->id . '" class="btn btn-primary btn-xs show-reason">Visa anledning</button></td>
								<td><button id="remove-' . $ban->id . '" class="btn btn-danger btn-xs remove-ban">Ta bort</button></td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<p id="reason-text"></p>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/sorttable.js"></script>
<script src="admin/js/filtertable.min.js"></script>
<script src="admin/js/ipban.js"></script>