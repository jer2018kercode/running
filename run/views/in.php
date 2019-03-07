<?php $title = 'Entrer';?>
<?php ob_start();?>

<p>blabla</p>
<?php // inscription ?>
    <a href="index.php?action=registerForm"><input type="button" class="go" value="S'inscrire"></a>
<?php // connexion ?>
    <a href="index.php?action=login"><input type="button" class="go" value="Se connnecter"></a>

<?php $content = ob_get_clean();?>
