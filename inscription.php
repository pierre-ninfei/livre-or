<?php include('phpspe/logs.php'); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="moduleconnexion.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
		<title> Inscrivez vous à Meto </title>
	</head>

	<!-- HEADER !-->

	<header>
		<?php include('elem/header.php'); ?>
	</header>

	<!-- BODY !-->

	<body>
		<section class="main_content">
			<h1> Créez un compte Meto pour profitez de l'expérience au maximum.</h1>
			<form class="p_c_form" action="inscription.php" method="post">
				<label for="username"> Nom d'utilisateur </br> </label>
				<input type="text" name="username" value=""/> </br> </input>

				<label for="nom"> Nom </br> </label>
				<input type="text" name="nom" value=""/> </br> </input>

				<label for="prenom"> Prénom </br> </label>
				<input type="text" name="prenom" value=""/> </br> </input>

				<label for ="passw"> Mot de passe </br> </label>
				<input type="password" name="passw1" value=""/> </br> </input>

				<label for="login"> Confirmez le mot de passe </br> </label>
				<input type="password" name="passw2" value=""/> </br> </input>
				
				<input type="submit" value="Valider" name="confirm"/>
				<div style="color: red;"> <?php include('phpspe/errors.php'); ?> </div>
			</form>
		</section>
	</body>

	<!-- FOOTER !-->

	<footer>
		<?php include('elem/footer.php'); ?>
	</footer>
</html>
