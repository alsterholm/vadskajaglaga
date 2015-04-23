<H1>Detaljer användare</H1>
<br>
<?php
	if (Input::exists('get')) {
    $id = Input::get('id');
    //$user = new User($id);
	}
?>


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
					//kollar ifall användaren prenumerar på nyhetsbrev
					switch ($user->data()->newsletter){
						case '0' : $newsletter = 'Nej';
						break;
						case '1' : $newsletter = 'Ja';
						break;
						default: $newsletter = 'Nej';
					}


							echo '
							<tr>
								<td>' . 'Användarid: ' .'</td>
								<td>' . $user->data()->id . '</td>
							</tr>
	            <tr>
								<td>' . 'E-mail: ' . '</td>
								<td>' . $user->data()->email . '</td>
							</tr>
	            <tr>
								<td>' . 'Namn: ' . '</td>
								<td>' . $user->data()->fullname . '</td>
							</tr>
	            <tr>
								<td>' . 'Registrerade sig: ' . '</td>
								<td>' . $user->data()->joined . '</td>
							</tr>
	            <tr>
	              <td>' . 'RegistreringsIP: ' . '</td>
	              <td>' . $user->data()->register_ip . '</td>
	            </tr>
	            <tr>
	              <td>' . 'Behörighet: ' . '</td>
	              <td>' . $user->data()->group . '</td>
	            </tr>
							<tr>
	              <td>' . 'Prenumererar på nyhetsbrev: ' . '</td>
	              <td>' . $newsletter . '</td>
	            </tr>
	            <tr>
	              <td>' . 'Inskickade recept: ' . '</td>
	              <td>' . $submitted . '</td>
	            </tr>
	            <tr>
	              <td>' . 'Betygsatta recept: ' . '</td>
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
					<td>IP</td>
					<td>Tid</td>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach (Log::getALL() as $log){
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
		$('#i-list').addClass('active');
	});
</script>
