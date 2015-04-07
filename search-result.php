<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Vad ska jag laga?</title>

		<link rel="icon" type="image/png" href="img/icon.png">

		<!-- CSS-links -->
		<?php include 'includes/data/css-links.php'; ?>	
	</head>

	<body>
		
		<!-- Navbar -->
		<?php include 'includes/navbar.php'; ?>


		<!-- Main function -->
		<?php include 'includes/modules/search-results.php'; ?> 
		
	<div class="list-group">
		<h1> Sökresultat: </h1>
		<br>
			<a href="#" class="list-group-item">
  			 	 <h4 class="list-group-item-heading">Pastagratäng med kyckling</h4>
  			 	 <p class="list-group-item-text">Är du sugen på en härlig gratäng? Testa att laga till en riktigt krämig pastagratäng med kyckling. Servera pastagratängen varm tillsammans med en krispig och god sallad. Mättande, matigt och supergott!</p>
  			 	 <h6>Tid: Ca 45 min</h6>
  			 	 <a href="#" class="btn btn-success" >Läs mer..</a>
 			</a>
 			<br>
 			<br>
			<a href="#" class="list-group-item">
   				 <h4 class="list-group-item-heading">Lasagne med spenat och grädde</h4>
   				 <p class="list-group-item-text">Ett perfekt sätt att få kräsna barn att äta nyttig spenat. Och istället för en traditionell bechamelsås kan man använda grädde och olika sorters ost. Som variation kan man även varva tunna skivor skinka mellan plattor och sås.</p>
				<a href="#" class="btn btn-success" >Läs mer..</a>
			</a>
	</div>	
<div class="view view-first"> 
<div class="view">  
     <img src="img/lasagne1.jpg" />  
     <div class="mask">  
     <h2 class="rubrik">Pastagratäng med kyckling</h2>
     <br>  
     <p>Är du sugen på en härlig gratäng? Testa att laga till en riktigt krämig pastagratäng med kyckling. Servera pastagratängen varm tillsammans med en krispig och god sallad. Mättande, matigt och supergott!</p>  
         <a href="#" class="info" >Läs mer..</a>
     </div>  
</div>  

		<!-- Footer -->
		<?php include 'includes/footer.php'; ?>


		<!-- Modals -->
			<!-- Login-modal -->
			<?php include 'modals/login.php'; ?>

			<!-- Register-modal -->
			<?php include 'modals/register.php'; ?>


		<!-- JavaScript-links -->
		<?php include 'includes/data/js-links.php'; ?>

	</body>
</html>