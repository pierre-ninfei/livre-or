<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
	<title>Inscrivez-vous dans le livre d'or</title>
</head>

<header>
	<?php include('header.php');?>
</header>

<body>
	<?php 

		//check de la conformité du formulaire 
		if(isset($_POST['login']) && !empty($_POST['login'])){
			$login = $_POST['login'];
		}
		else { 
			array_push($errors, "votre login est invalide") ;
		}

		if(isset($_POST['password']) && !empty($_POST['password'])){
			$password = $_POST['password'];
		}
		else {
			array_push($errors, "votre mot de passe est invalide") ;
		}

		if(isset($_POST['cpassword']) && !empty($_POST['cpassword'])){
			$cpassword = $_POST['cpassword'];
		}
		else {
			array_push($errors, "veuillez confirmer votre mot de passe") ;
		}

		if($password == $cpassword){
			$password = $cpassword;
		}
		else{
			array_push($errors, "veuillez saisir un mot de passe identique") ;
		}

		// check de la validité du login
		// récupération d'un potentiel login identique
		if(isset($_POST['submit']) && count($errors) == 0){
			$checkquery = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$login'");
			$checkquery->execute();
			$checkdata = $checkquery->fetchAll();

			if($checkdata){
				array_push($errors, "Ce login est déjà utilisé");
			}
			else{
				//si aucune erreur, on enregistre l'utilisateur et on le redirige vers connexion.php
				$password = password_hash($password, PASSWORD_DEFAULT);
				$registerquery = $db->prepare("INSERT INTO utilisateurs(login, password) VALUES ('$login','$password')");
				$registerquery->execute();

				header('location:connexion.php');
			}
		}
	?>

	<h1> Enregistrez votre compte afin de pouvoir laisser un commentaire. </h1>
	
	<form method="post" action="inscription.php">
		<label for="login"> Entrez votre login :</label>
		<input type="text" name="login" value="<?php if(isset($_POST['login'])){echo $_POST['login'];}?>"> <br/><br/>

		<label for="password"> Entrez votre mot de passe :</label>
		<input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>"> <br/><br/>

		<label for="cpassword"> Confirmez votre mot de passe :</label>
		<input type="password" name="cpassword" value="<?php if(isset($_POST['cpassword'])){echo $_POST['cpassword'];}?>"> <br/><br/>

		<input type="submit" name="submit" value="Confirmer">
	</form>

	<?php 
	//display des erreurs
	if(count($errors) > 0 && isset($_POST['submit'])){
		foreach($errors as $error){
			echo "<bold style='color:red;'><br/>". $error. "</bold>";
		}
	}

	?>
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
</html>
