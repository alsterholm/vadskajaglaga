<?php
	if (Input::exists('get')) {
	    $id = Input::get('id');
	    $user = new User($id);
	} else {
		Redirect::to('admin.php?p=u-list');
	}
?>
<h1>Detaljer för <?php echo $user->data()->fullname . '(id: ' . $user->data()->id . ')'; ?></h1>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">

			<table class="table table-striped">
				<thead>
					<tr>
						<td>Allmän information</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
				<?php
					// kollar hur många receptförslag användaren skickat in
					$submitted = 0;
					foreach (Recipe::getSuggestions() as $suggestion){
						if($suggestion->user_id == $id){
							$submitted++;
						}
					}

					//kollar hur många recept användaren betygsatt
					$rated = 0;
					foreach (Rating::getRatings() as $rating){
						if($rating->user_id == $id){
							$rated++;
						}
					}

					foreach($user->data() as $key => $value) {
						
						if ($key != 'salt' && $key != 'password') {
							switch ($key) {
								case 'id': $key = 'ID:';
								break;
								case 'email': $key = 'E-post:';
								break;
								case 'fullname': $key = 'Namn:';
								break;
								case 'joined': $key = 'Registreringsdatum:';
								break;
								case 'group': $key = 'Användargrupp:';
									switch ($value) {
										case 0: $value = 'Vanlig medlem';
										break;
										case 1: $value = 'Administratör';
										break;
									}
								break;
								case 'register_ip': $key = 'Registrerings-IP:';
								break;
								case 'newsletter': $key = 'Nyhetsbrev:';
									switch ($value) {
										case 0: $value = 'Nej';
										break;
										case 1: $value = 'Ja';
										break;
									}
								break;
							}

							echo '
								<tr>
									<td>' . $key . '</td>
									<td>' . $value . '</td>
								</tr>
							';
						}
					}

					echo '<tr><td></td><td></td></tr>';

					echo '
						<tr>
							<td>' . 'Antal inskickade recept: ' . '</td>
							<td>' . $submitted . '</td>
						</tr>
						<tr>
							<td>' . 'Antal betygsatta recept: ' . '</td>
							<td>' . $rated . '</td>
						</tr>
					';

				?>
				</tbody>
			</table>
		</div>
	<div class="col-md-6">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>IP-adress</td>
					<td>Tidpunkt</td>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach (Log::getAll() as $log){
					if ($log->user == $id){
						echo '
						<tr>
							<td><a href="?p=u-list&id=' . $log->id . '">' . $log->ip . '</a></td>
							<td>' . $log->time . '</td>
						</tr>
						';
					}
				}
			?>
			</tbody>
		</div>
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
