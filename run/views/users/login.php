<?php $title = 'Log in';?>
<?php ob_start();?>

<?php // table member utilisée ?>

<div class="race">
    <?php // message à l'utilisateur lorsqu'il se connecte ?>
        <p><?= 'Bonjour ' . htmlspecialchars( $_SESSION['username'] ) . ' !' . '<br />' .
        ' Comment allez vous aujourd\'hui ? ' . '<br /><br />' . ' Vous êtes bien connecté ! '; ?><p>

    <?php // --race ?>
        <a href="index.php?action=showRaces">Les Courses</a><br /><br />

    <?php // --progression ?>
        <a href="index.php?action=showOutdoors">Les Sorties</a>
</div>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?> 