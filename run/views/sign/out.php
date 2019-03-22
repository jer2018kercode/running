<?php $title = 'Sortir';?>
<?php ob_start();?>

<?php // déconnexion ?>
    <a href="index.php?action=signout"><input type="button" class="leave" value="Se déconnecter"></a>  

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
