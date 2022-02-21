<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="livre-or.css">
	<title>Modifiez votre profil</title>
</head>

<header>
	<?php include('header.php'); ?>
</header>

<body>
	<?php
	if(!isset($_SESSION['login'])){
   		header('location: connexion.php');
	}

	/*  ////////// définition des variables \\\\\\\\\ */
	$errors = array();
	$user = $_SESSION['login'];

	/*  ///////// connexion base de donées et requètes  \\\\\\\\  */

	$requete = $db->prepare("SELECT * FROM utilisateurs WHERE login = '$user'");
	$requete->execute();
	$reqdata = $requete->fetchAll();

	    /*  ///////// varriables   \\\\\\\\  */
	$login = $reqdata[0]['login'];  
	$password_old = $reqdata[0]['password'];

	    /*  ///////// conditions des changements des infos utilisateurs  \\\\\\\\  */
	if(isset($_POST['envoyer'])){
	    $newlogin = $_POST['login'];
	    $old_password = $_POST['password_old'];
	    $newpassword = $_POST['password'];
	    $newpassword2 = $_POST['password2'];

	    if (isset($_POST['password']) && isset($_POST['password2']) && isset($_POST['password_old'])){
	        if(password_verify($old_password, $password_old) == true){
	            if($newpassword == $newpassword2 ){
	                $npassword = password_hash($newpassword, PASSWORD_DEFAULT);
	                $req = $db->prepare("UPDATE `utilisateurs` SET password = '$npassword' WHERE login = '$user'");
	                $req->execute();
	            }
	            else{
	                array_push($errors, "Veuillez saisir un mot de passe identique");
	            }
	        }
	        else{
	            array_push($errors, "Veuillez saisir l'ancien mot de passe");
	        }
	    }

	    if (isset($_POST['login']) && $_POST['login'] != $result[0]['login']){   
	        $login = $_POST['login'];
	        $newlogin = $db->prepare("UPDATE `utilisateurs` SET login = '$login' WHERE login ='$user' ");
	        $newlogin->execute();
	        
	        
	    }

	    if(count($errors) == 0 && isset($_POST['envoyer'])){

	        $_SESSION['login'] = $login;
	        header('location: index.php');
	    }
	}
	?>

	<h1 class="p_title"><i>Votre Profil.  </i></h1> 
		<h3 class=""> Veuillez remplir les champs suivants pour modifier votre profil </h3>
	    <container class="p_i_container2">
	        <form class = "p_i_form" action="" method="post">
                <label for="login">Login :</label>
                <input type="text" placeholder="Login" value="<?php echo $user; ?>" name="login"/></br>
          <br>
            <div class="button">
                <input type="submit" value="Modifier le login" name= "envoyer">
            </div>
        </form>
        <form class = "p_i_form" action="" method="post">
                <label for="password">Ancien Password:</label>
                <input type="password" value="<?php if(isset($_POST['password_old'])){echo $_POST['password_old'];}; ?>" name="password_old"></br>
                <label for="password">Password:</label>
                <input type="password" placeholder="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}; ?>" name="password"></br>
                <label for="password2">Password confirmation :</label>
                <input  type ="password" placeholder="password confirmation" name="password2"/></br>
          <br>
            <div class="button">
                <input type="submit" value="Modifier le password" name="envoyer">
            </div>
        </form>
    </container>
    <?php if(count($errors) > 0) : ?>
        <div style="font-family : monospace;">
    <?php foreach($errors as $error) : ?>
        <p style="color:red;"> <?php echo $error; ?> </p>
    <?php endforeach ?>
        </div>
    <?php endif ?>
</body>

<footer>
	<?php include("footer.php"); ?>
</footer>
</html>