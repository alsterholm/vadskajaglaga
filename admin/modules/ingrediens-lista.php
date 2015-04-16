<h1>Lista ingredienser</h1>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<?php
					$ingredients =array();
					$ingredients = Ingredient::all();
				?>
				<table> 
					<tr> 
					    <td>id</td> 
					    <td>namn</td> 
					</tr>
				</table> 
				
			</div>
		</div>
	</div>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="js/jquery.autocomplete.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$('#i-list').addClass('active');
	});
</script>