<?php $title = 'Logged in';?>
<?php ob_start();?>

<?php // db table member used ?>

<?php // message to user when he is logged in ?>
    <p><?= 'Hello ' . $_SESSION['username'] . ' !' . '<br />' . ' How are you doing today? ' .
    '<br /><br />' . ' Your have successfully logged in. Welcome to our website! ' . '<br />' . ' For your information your
    user number is ' . $_SESSION['id']; ?><p>

<?php // --raceView ?>
<a href="index.php?action=showRaces">Show all the races</a><br /><br />

<?php // --indexView ?>
<a href="index.php">Return to index page</a><br /><br />

<?php // --progressionView ?>
<a href="index.php?action=showProgessionRedirect">See my progression</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>