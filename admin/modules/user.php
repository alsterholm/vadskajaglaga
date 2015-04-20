<H1>Detaljer användare</H1>
<br>
<?php
	if (Input::exists('get')) {
    $id = Input::get('id');
    $user = new User($id);
	}
?>


<div class="row">
	<div class="col-md-12">
		<table class="table table-striped sortable">
			<thead>
				<tr>
					<td>Allmän information</td>
					<td></td>
					<td>IP-logg</td>
					<td>Tidpunkt</td>
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

						echo '
						<tr>
							<td>' . 'Användarid: ' .'</td>
							<td>' . $user->data()->id . '</td>
							<td></td>
							<td></td>
						</tr>
            <tr>
							<td>' . 'E-mail: ' . '</td>
							<td>' . $user->data()->email . '</td>
							<td></td>
							<td></td>
						</tr>
            <tr>
							<td>' . 'Namn: ' . '</td>
							<td>' . $user->data()->fullname . '</td>
							<td></td>
							<td></td>
						</tr>
            <tr>
							<td>' . 'Registrerade sig: ' . '</td>
							<td>' . $user->data()->joined . '</td>
							<td></td>
							<td></td>
						</tr>
            <tr>
              <td>' . 'RegistreringsIP: ' . '</td>
              <td>' . $user->data()->register_ip . '</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>' . 'Behörighet: ' . '</td>
              <td>' . $user->data()->group . '</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>' . 'Inskickade recept: ' . '</td>
              <td>' . $submitted . '</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>' . 'Betygsatta recept: ' . '</td>
              <td>' . $rated . '</td>
              <td></td>
              <td></td>
            </tr>
						';

				?>
			</tbody>
		</table>
	</div>
</div>
