<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
	<title>Bienvenue sur le livre d'or</title>
</head>

<header>
	<?php include('header.php'); ?>
</header>

<body>
	<h1> <?php if(isset($_SESSION['login'])){echo"Bon retour parmis nous, ".$_SESSION['login']." !";} else{ echo"Soyez les bienvenus sur notre livre d'or";} ?> </h1>
	<h3> utilisez les liens suivants afin d'accéder à nos différentes pages</h3>
	<div class="liens_index">
		<a class="i_link" href="livre-or.php">Accès au livre d'or </a>

		<a class="i_link" href="incription.php">Créez un compte </a>

		<a class="i_link" href="commentaire.php">Laissez un commentaire </a>
	</div>
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
</html>