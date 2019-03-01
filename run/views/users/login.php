<?php $title = 'Logged in';?>
<?php ob_start();?>

<?php // db table member used ?>

<?php // message to user when he is logged in ?>
    <p><?= 'Bonjour ' . htmlspecialchars( $_SESSION['username'] ) . ' !' . '<br />' . ' Comment allez vous aujourd\'hui ? ' .
    '<br /><br />' . ' Vous êtes bien connecté ! ' . '<br />' . ' Pour rappel, votre numéro d\utilisateur est ' .
    htmlspecialchars( $_SESSION['id'] ); ?><p>

<?php // --raceView ?>
<a href="index.php?action=racesDetails">Voir toutes les courses</a><br /><br />

<?php // --progressionView ?>
<a href="index.php?action=showProgessionRedirect&id=<?= $progression_['id'] ?>">Voir ma progression</a>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?> 