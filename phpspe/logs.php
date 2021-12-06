<?php // Cette page contient le php pour l'inscription et la connexion de l'utilisateur

session_start();

$username = " ";
$nom = " ";
$prenom = " ";
$passw1 = " ";
$passw2 = " ";

$errors = array();

$bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion') or die("Impossible de se connecter à la BDD");

// gather infos from form

if(isset($_POST['username'])){
$username = mysqli_real_escape_string($bdd, $_POST['username']);
}
if(isset($_POST['nom'])){
$nom = mysqli_real_escape_string($bdd, $_POST['nom']);
}
if(isset($_POST['prenom'])){
$prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
}
if(isset($_POST['passw1'])){
$passw1 = mysqli_real_escape_string($bdd, $_POST['passw1']);
}
if(isset($_POST['passw2'])){
$passw2 = mysqli_real_escape_string($bdd, $_POST['passw2']);
}

// check for errors 

if(empty($username)) {
	array_push($errors, "Veuillez saisir un nom d'utilisateur");
}
if(empty($nom)) {
	array_push($errors, "Veuillez saisir un nom");
}
if(empty($prenom)) {
	array_push($errors, "Veuillez saisir un prénom");
}
if(empty($passw1)) {
	array_push($errors, "Veuillez saisir un mot de passe");
}
if($passw1 != $passw2) {
	array_push($errors, "Veuillez saisir un mot de passe identique");
}

// check if user already exists 

$user_check = "SELECT * FROM utilisateurs WHERE login ='$username' LIMIT 1";

$results = mysqli_query($bdd, $user_check);
$utilisateur = mysqli_fetch_assoc($results);

if($utilisateur) {
	if($utilisateur['username'] === $username) {
		array_push($errors, "Ce nom d'utilisateur est déjà utilisé");
	}
}

// Register when no errors 

if(count($errors) == 0 & $username != " ") {
	$password = $passw1;
	$query = "INSERT INTO utilisateurs(login, prenom, nom, password) VALUES ('$username', '$prenom', '$nom', '$password')";
	mysqli_query($bdd, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "Inscription valide" ;
	
	header('location: connexion.php');
}

										// Login users 

// input id infos

if(isset($_POST['confirm'])) {
		$username = mysqli_real_escape_string($bdd, $_POST['usernamec']);

		$password = mysqli_real_escape_string($bdd, $_POST['password']);

// check for errors 

		if(empty($username)) {
			array_push($errors, "Veuillez saisir un nom d'utilisateur");
		}
		if(empty($password)) {
			array_push($errors, "Veuillez saisir un mot de passe");
		}

// if no errors, log in user

		if(count($errors) == 0) {
			$query = "SELECT * FROM utilisateurs WHERE login='$username' AND password= '$password' ";
			$results  = mysqli_query($bdd, $query);

			if(mysqli_num_rows($results)) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] =  "Logged in successfully";
				
				header('location: index.php');
			}

			// if no account is found 

			else{
				array_push($errors, "Veuillez entrez un nom d'utilisateur et un mot de passe valide");
			}
		}
}
?>