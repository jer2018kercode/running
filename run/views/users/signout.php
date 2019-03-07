<?php $title = 'Déconnecté';?>
<?php ob_start();?>

<?php session_destroy() ?>
<h1>Vous venez d'être déconnecté</h1>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>