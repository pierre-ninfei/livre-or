<header class="p_i_h">
		<a href="index.php"> <img class="p_i_h_brand p_i_logo" src="images/Meto-logo.png" width="225" height="100"/> </a>
		<div class="p_i_btns">
			<?php if(isset($_SESSION['username'])) : ?>
				<a class=" p_i_h_button" href="profil.php"> Modifiez votre profil </a>
			<?php else : ?>
				<a class="p_i_h_login p_i_h_button" href="connexion.php"> Connectez vous </a>
			<?php endif ?>

			<?php if(isset($_SESSION['username'])) : ?>
				<a class="p_i_h_button" href="index.php?logout='1'"> Deconnexion </a>
			<?php else : ?>
				<a class="p_i_signup p_i_h_button" href="inscription.php"> Créez un compte </a>
			<?php endif ?>

			<?php if(isset($_SESSION['username']) && $_SESSION['username'] == "admin") : ?>
				<a class="p_i_h_button" href="admin.php"> Accès à la base de données </a>
			<?php endif ?>
		</div>
	</header>