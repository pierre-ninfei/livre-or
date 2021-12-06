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
		<title> Connectez vous à Meto </title>
	</head>

	<!-- HEADER !-->

	<header>
		<?php include('elem/header.php'); ?>
	</header>

	<!-- BODY !-->

	<body>
		<h1> Connectez vous à Meto. </h1>
		<form class="p_c_form" action="connexion.php" method="post">
			<label for="login">Nom d'utilisateur </br> </label>
			<input type="text" name="usernamec" value=""/> </br> </input>

			<label for ="passw"> Mot de passe </br> </label>
			<input type="password" name="password" value=""> </br> </input>

			<div style="color: red;"> <?php include('phpspe/errors.php'); ?> </div>
			<input type="submit" value="Valider" name="confirm"/>
		</form>
	</body>

	<!-- FOOTER !-->

	<footer>
		<?php include('elem/footer.php'); ?>
	</footer>
</html>