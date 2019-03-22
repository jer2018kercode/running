<?php $title = 'Confirmation de création de course'; ?>
<?php ob_start();?>

<h1>Vous avez bien créée votre course !</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>