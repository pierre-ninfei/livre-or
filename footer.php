<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
</head>

<div class="footer_button">
	<a href="index.php"> La page d'accueil </a><br><br>
	<a href="livre-or.php"> Le livre d'or </a><br><br>

	<?php if(isset($_SESSION['login'])){
			echo"<a href='profil.php'> Editez votre profil </a><br>";
		}
		else{
			echo"<a href='connexion.php'> Connectez-vous </a><br>";
		}
?>
</div>