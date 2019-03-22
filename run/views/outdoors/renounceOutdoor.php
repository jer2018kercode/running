<?php $title = 'Renoncer'; ?>
<?php ob_start();?>

<a href="index.php?">Annuler votre participation ?</a>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
