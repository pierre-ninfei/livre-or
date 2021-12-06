<?php // Cette page permet le comptage d'erreurs sur chaque page afin d'empêcher une mauvaise utilisation du site

 if(count($errors) > 0 ) : ?>

<div> 
	<?php foreach($errors as $error) : ?>

		<p> <?php echo $error ?> </p>

	<?php endforeach ?>
</div>
<?php endif ?>