<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
	<title>Ajoutez un commentaire au livre d'or</title>
</head>

<header>
	<?php include('header.php'); ?>
</header>

<body>
	<?php
		if(isset($_SESSION['login'])){
			$login = $_SESSION['login'];
		}
		else{
			header("Location:connexion.php");
		}

		if(isset($_POST['envoyer'])){
			if(empty($_POST['comment'])){
				echo"veuillez saisir un commentaire";
			}
			else{
				$id_req = $db->prepare("SELECT id from utilisateurs WHERE login ='$login'");
				$id_req->execute();
				$id_user= $id_req->fetchAll();
				$id_utilisateur = $id_user[0][0];
				
				$comment = $_POST['comment'];
				$date = date('Y/m/d H:i:s');
				date_default_timezone_set('Europe/Paris');

				$comment_req = $db->prepare("INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$comment', '$id_utilisateur', '$date')");
				$comment_req->execute();

				header("Location: livre-or.php");
			}
		}
	?>
	<form method="post" class="com_form">
		<label for="comment"> Entrez votre commentaire :</br></label>
		<textarea rows="10" cols="100" name="comment"> </textarea>
		<input type="submit" style="width:20%; outline: none; background-color: #facd5c" name="envoyer">
	</form>

</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
</html>