<?php 

include('phpspe/logs.php');

//if admin is not logged in, redirect 

if(!isset($_SESSION['username']) || $_SESSION['username'] != "admin"){
	header('location: connexion.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="moduleconnexion.css">
		<title> La page du game master</title>
	</head>

	<header>
		<?php include('elem/header.php'); ?>
	</header>

	<body>
		<?php 
		// retrieve info from bdd

		$query = "SELECT login, nom, prenom, password FROM utilisateurs";
		$results = mysqli_query($bdd, $query);

		//display as table 

		echo "<table style='font-size: 25px; border-collapse: collapse; border: 2px solid black; margin: auto;'>";
		echo "<tr><th style='padding: 10px;'> Nom d'utilisateur </th><th style='padding: 10px;'> Mot de passe </th><th style='padding: 10px;'> Nom </th><th style='padding: 10px;'> Prénom </th></tr>";

		// loop results from bdd
		
		$i = 0;
		foreach($results as $result){
			echo "<tr><td style='border: 1px dashed red; background-color: #fffff1'>". $result['login']. "</td><br/><td style='border: 1px dashed red; background-color: #fffff1'>". $result['password']. "</td><br/><td style='border: 1px dashed red; background-color: #fffff1'>". $result['nom']. "</td><br/><td style='border: 1px dashed red; background-color: #fffff1'>". $result['prenom']. "</td><br/></tr>";
		}

		echo "</table>";
		?>

	</body>

	<footer>
		<?php include('elem/footer.php'); ?>
	</footer>
</html>