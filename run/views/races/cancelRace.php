<?php $title = 'Suppression d\'une course'; ?>
<?php ob_start();?>

<h1>Vous avez bien supprimé une course</h1>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>