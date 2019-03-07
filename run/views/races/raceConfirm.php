<?php $title = 'Confirmation';?>
<?php ob_start();?>

<h1>Vous avez bien été inscrit à la course sélectionnée !</h1>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>