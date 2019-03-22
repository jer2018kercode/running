<?php $title = 'Contact';?>
<?php ob_start();?>

<h1>Votre message est bien arrivé dans notre boîte mail, merci !</h1>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
