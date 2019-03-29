<?php $title = 'Supprimer une sortie'; ?>
<?php ob_start(); ?>

<a href="index.php"><h1>Confirmer la supression de sortie ?</h1></a>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
