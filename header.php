<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
</head>

<?php //connexion à la database
		session_start();
		$dsn = "mysql:host=localhost;dbname=livreor;charset=UTF8";
		try{
			$db = new PDO($dsn, 'root', '');
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}

		//définition d'$errors
		$errors = array();

		?> 
		<h1 class="site_title"> LE LIVRE D'OR TRÈS DORÉ DE LA COMPAGNIE METO</h1>
		<div class="button_header"> <?php
		//si l'utilisateur est connecté, affiche les boutons en accord avec ses besoins
		if(isset($_SESSION['login'])){
			//bouton de déco/profil
			echo"<form method='get'>
			<input type='submit' name='deco' value='Déconnexion'>
			<input type='submit' name='profil' value='Profil'>
			</form>";
		}
		else{
			//bouton de co/register
			echo"<form method='get'>
			<input type='submit' name='connexion' value='Connexion'>
			<input type='submit' name='inscription' value='Inscription'>
			</form>";
		}

		//bouton de retour à l'accueil : si l'user est sur index.php, aucun bouton
		$currentpage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
		if($currentpage != "index.php"){
			echo"<form method='get'>
			<input type='submit' name='home' value='Retour à la page principale'>
			</form>";
		}

		//action du bouton déconnexion
		if(isset($_GET['deco'])){
			session_destroy();
			unset($_SESSION['login']);
			header('Location:index.php');
		}

		//action du bouton profil
		if(isset($_GET['profil'])){
			header('Location:profil.php');
		}

		//action du bouton connexion
		if(isset($_GET['connexion'])){
			header('Location:connexion.php');
		}

		//action du bouton inscription
		if(isset($_GET['inscription'])){
			header('Location:inscription.php');
		}

		//action du bouton retour
		if(isset($_GET['home'])){
			header('Location:index.php');
		}
?> </div>

