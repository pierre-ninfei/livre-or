<?php 

session_start();

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="moduleconnexion.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
		<title> Découvrir Meto </title>
	</head>

<!-- HEADER !-->

	<header>
		<?php include('elem/header.php'); ?>
	</header>

 	<!-- BODY !-->

	<body>
		<div class="p_i_intro">
			<h2> Le futur du Métavers, </br> Pour notre futur.</h2>
		</div>

		<div class="p_i_discov">
			<img class="p_i_logo" src="images/Meto-logo" width="225" height="100"/>
			<p> Le métavers est la prochaine évolution des relations sociales. L’objectif de notre entreprise est de promouvoir le métavers.</p>
		</div>

		<div class="p_i_explo">
			<h3> Création du métavers </h3>
			<p> Nous sommes déjà en train de développer de nouvelles technologies prometteuses qui aideront à tisser des liens et à découvrir des choses dans le métavers. </p>

			<div class="p_i_subj_1">
				<a href="https://www.oculus.com/quest-2/"  target="_blank">
					<img src="images/oculus.jpg" width="500" height="400"/>
				</a>
				<div class="p_i_subj_txt">
					<p class="p_i_subj_tit"> Réalité virtuelle </p>
					<a href="https://www.oculus.com/quest-2/" target="_blank" style="text-decoration:none; color:black; border-radius: 50%; border: 1px solid gray;">&nbsp; + &nbsp;</a>
					<a href="https://www.oculus.com/quest-2/" target="_blank" style="text-decoration:none; color:black;"> explorer </a>
				</div>
			</div>
			<div class="p_i_subj_2">
				<a href="https://sparkar.facebook.com/ar-studio/" target="_blank"> 
					<img src="images/ar.jpg" width="500" height="475"/>
				</a>
				<div class="p_i_subj_txt">
					<p class="p_i_subj_tit"> Réalité augmentée </p>
					<a href="https://sparkar.facebook.com/ar-studio/" target="_blank" style="text-decoration:none; color:black; border-radius: 50%; border: 1px solid gray;">&nbsp; + &nbsp;</a>
					<a href="https://sparkar.facebook.com/ar-studio/" target="_blank" style="text-decoration:none; color:black;"> explorer </a>
				</div>
			</div>
			<div class="p_i_subj_3">
				<a href="https://www.ray-ban.com/usa/discover-ray-ban-stories/clp" target="_blank">
					<img class="p_i_subj" src="images/Lunettes.jpg" width="500" height="450"/>
				</a>
				<div class="p_i_subj_txt">
					<p class="p_i_subj_tit"> Lunettes intelligentes </p>
					<a href="https://www.ray-ban.com/usa/discover-ray-ban-stories/clp" target="_blank" style="text-decoration:none; color:black; border-radius: 50%; border: 1px solid gray;">&nbsp; + &nbsp;</a>
					<a target="_blank" href="https://www.ray-ban.com/usa/discover-ray-ban-stories/clp" style="text-decoration:none; color:black;"> explorer </a>
				</div>
			</div>
		</div>
	</body>

<!-- FOOTER !--> 

	<footer>
		<?php include('elem/footer.php'); ?>
	</footer>
</html>