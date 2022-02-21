<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">	
	<title>Connectez-vous au livre d'or</title>
</head>

<header>
	<?php include('header.php');?>
</header>

<body>

	<?php
		//si l'utilisateur est connecté, redirige vers la modification de profil
		if(isset($_SESSION['login'])){
			header('location:profil.php');
		}

		//check de la conformité du formulaire
		if(isset($_POST['login']) && !empty($_POST['login'])){
			$login = $_POST['login'];
		}
		else{
			array_push($errors, "Veuillez saisir un login valide");
		}

		if(isset($_POST['password']) && !empty($_POST['password'])){
			$password = $_POST['password'];
		}
		else{
			array_push($errors, "Veuillez saisir un mot de passe valide");
		}

		if(count($errors) == 0 && isset($_POST['submit'])){
			//recherche de l'utilisateur dans la base de données si aucune erreur apparait
			$logquery = $db->prepare("SELECT password FROM utilisateurs WHERE login = '$login'");
			$logquery->execute();
			$logdata = $logquery->fetchAll();

			//check du password encrypté
			if($logdata){
				if(password_verify($password, $logdata[0][0])){
					$_SESSION['login'] = $login;
					header('location:index.php');
				}
				else{
					array_push($errors, "mot de passe ou login invalide");
				}
			}
		}

	?>

	<h1> Connectez votre compte.</h1>
	
	<form method="post" action="connexion.php">
		<label for="login"> Entrez votre login :</label>
		<input type="text" name="login" value="<?php if(isset($_POST['login'])){echo $_POST['login'];}?>"placeholder=""> <br/><br/>

		<label for="password"> Entrez votre mot de passe :</label>
		<input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>"placeholder=""> <br/><br/>

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