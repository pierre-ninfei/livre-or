<?php 

include('phpspe/logs.php');

//if user is not logged in, redirect 

if(!isset($_SESSION['username'])){
	header('location: connexion.php');
}

$userc = $_SESSION['username'];

$sql = "SELECT * FROM utilisateurs WHERE login = '$userc'";
$query = mysqli_query($bdd, $sql);
$utilisateur = mysqli_fetch_all($query);

//Retrieving user infos from database

$usernamem = $utilisateur[0][3];
$nomm = $utilisateur[0][1];
$prenomm = $utilisateur[0][2];
$passwordm = $utilisateur[0][4];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="moduleconnexion.css">
		<title> Modifiez votre profil si besoin</title>
	</head>

	<header>
		<?php include('elem/header.php'); ?>
	</header>

	<body>
		<h2 style="padding-bottom: 5%;"> Bienvenue <?php echo $_SESSION['username']; ?>, <br/> Effectuez les modifications souhaitées ci-dessous. </h2>
		<form method="post" action="profil.php">
			<label for="prenom"> Prénom </br> </label>
			<input type="text" name="prenomm" value="<?php echo $prenomm; ?>"/> <br/><br/>

			<label for="prenom"> Nom </br> </label>
			<input type="text" name="nomm" value="<?php echo $nomm; ?>"/> <br/><br/>

			<label for="prenom"> Nom d'utilisateur </br> </label>
			<input type="text" name="loginm" value="<?php echo $usernamem; ?>"/> <br/><br/>

			<label for="prenom"> Mot de passe </br> </label>
			<input type="password" name="passwordm" value="<?php echo $passwordm; ?>"/> <br/><br/>
			<div style="color: green; font-size: 40px;"> <?php if(isset($_SESSION['succes'])){ echo $_SESSION['succes'], "<br/>", "<br/>"; } ?> </div>
			<input type="submit" name="validerm" value="Confirmer"/>
		</form>

<?php 
//debug invalid index 

if(isset($_POST['validerm'])){
	$validerm = $_POST['validerm'];
}

//check for input errors

if(isset($_POST['loginm'])){
	if(empty($_POST['loginm'])){
		array_push($errors, "Veuillez saisir un nouveau nom d'utilisateur");
	}
	else{
		$usernamem = $_POST['loginm'];
	}
}

if(isset($_POST['nomm'])){
	if(empty($_POST['nomm'])){
		array_push($errors, "Veuillez saisir un nouveau nom de famille");
	}
	else{
		$nomm = $_POST['nomm'];
	}
}

if(isset($_POST['prenomm'])){
	if(empty($_POST['prenomm'])){
		array_push($errors, "Veuillez saisir un nouveau prénom");
	}
	else{
		$prenomm = $_POST['prenomm'];
	}
}

if(isset($_POST['passwordm'])){
	if(empty($_POST['passwordm'])){
		array_push($errors, "Veuillez saisir un nouveau mot de passe");
	}
	else{
		$passwordm = $_POST['passwordm'];
	}
}

// check if new username already exists in bdd 

$user_check = "SELECT * FROM utilisateurs WHERE login ='$usernamem' LIMIT 1";

$results = mysqli_query($bdd, $user_check);
$utilisateur = mysqli_fetch_assoc($results);

if($utilisateur) {
	if($utilisateur['login'] === $usernamem && $utilisateur['login'] != $userc) {
		array_push($errors, "Ce nom d'utilisateur est déjà utilisé");
	}
}

//if no errors, execute modifications

if(count($errors) == 0 && isset($_POST['validerm'])){
	$query = "UPDATE utilisateurs SET login = '$usernamem', nom = '$nomm', prenom = '$prenomm', password = '$passwordm' WHERE login = '$userc'";
	mysqli_query($bdd, $query);
	$_SESSION['username'] = $usernamem;
	$_SESSION['nom'] = $nomm;
	$_SESSION['prenom'] = $prenomm;
	$_SESSION['password'] = $passwordm;
	$_SESSION['succes'] = "Modifications validées";
	header('location: profil.php');
}
?>

		<div style="color: red;"> <?php include('phpspe/errors.php'); ?> </div>
	</body>

	<footer>
		<?php include('elem/footer.php'); ?>
	</footer>
</html>