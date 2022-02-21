<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
	<title>Le livre d'or écrit par vous</title>
</head>

<header>
	<?php include('header.php'); ?>
</header>

<body>
	<?php
	//boutton pour laisser un commentaire
	if(isset($_SESSION['login'])){ echo'<form class="comred" method="post">
		<input type="submit" style="font-size:30px; margin-top:5%; padding:30px;" name="sent" value="Laissez votre trace">
		</form>';
		if(isset($_POST['sent'])){
			header("Location: commentaire.php");
		}
	}

	//retrieve comments datas
	$com_disp = $db->prepare("SELECT * FROM commentaires ORDER BY date DESC");
	$com_disp->execute();
	$coms = $com_disp->fetchAll();

	//id users inside commentaires table
	$user_disp = $db->prepare("SELECT utilisateurs.id, utilisateurs.login FROM utilisateurs INNER JOIN commentaires ON commentaires.id_utilisateur = utilisateurs.id");
	$user_disp->execute();
	$users = $user_disp-> fetchAll();

	//display comments
	foreach($coms as $com){
		echo "<article class='comment'>";
		foreach($users as $user){
			if($com[2] == $user[0]){
				$username = $user[1];
			}
		}
		  $date = date_create($com[3]);
		  $date = date_format($date, 'd/m/y');
		  echo "Posté le ".$date." par ".$username."</br>";
		  echo "<div class='com'>";
		  echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$com[1]. "<br><br>";
		  echo "</div>";
		  echo "</article>";
	}
	?>

</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
</html>