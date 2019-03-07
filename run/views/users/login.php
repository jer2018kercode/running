<?php $title = 'Log in';?>
<?php ob_start();?>

<?php // table member utilisée ?>

<?php // message à l'utilisateur lorsqu'il se connecte ?>
    <p><?= 'Bonjour ' . htmlspecialchars( $_SESSION['username'] ) . ' !' . '<br />' . ' Comment allez vous aujourd\'hui ? ' .
    '<br /><br />' . ' Vous êtes bien connecté ! ' . '<br />' . ' Pour rappel, votre numéro d\'utilisateur est '; ?><p>

<?php // --race ?>
    <a href="index.php?action=racesDetails">Voir toutes les courses</a><br /><br />

<?php // --progression ?>
    <a href="index.php?action=showProgessionRedirect&id=<?= $prog['id'] ?>">Voir ma progression personnelle</a>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?> 