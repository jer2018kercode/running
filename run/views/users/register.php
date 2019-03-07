<?php $title = 'Inscrit';?>
<?php ob_start();?>

<?php // message au nouvel utilisateur ?>
    <p><?= 'Bienvenue ' . $_SESSION['username']  . ' !' . '<br />' . ' Comment allez vous aujourd\'hui ? ' .
    '<br /><br />' . ' Votre compte vient a bien été créé ! '; ?><p>


<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>