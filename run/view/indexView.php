<?php $title = 'Running website';?>
<?php ob_start();?>

<div id="title">
    <h1>Au pas de course</h1>
</div>

<?php // <img src="public/images/logo.jpg" alt="logo" id="logo" /> ?>

<?php // --registerFormView ?>
<!-- <input type="text" value="S'inscrire" onclick="location.href='index.php?action=registerForm'">
<?php // --loginView ?>
<input type="text" value="Se connnecter" onclick="location.href='index.php?action=login'"> -->

<div id="menu">
    <?php // --runningView ?>
    <h1><a href="index.php?action=showRunning">Entrainements à plusieurs</a></h1>
    <?php // --progressionView ?>

    <h1><a href="index.php?action=showProgression">Suivi</a></h1>

    <?php // --racesView ?>
    <h1><a href="index.php?action=showRaces">Courses officielles</a></h1>
    
    <?php // --healthView ?>
    <h1><a href="index.php?action=showHealth">Santé</a></h1>

    <?php // --contactView ?>
    <h1><a href="index.php?action=showContact">Contactez-nous</a></h1>
</div>

<img src="public/images/chaussures.jpg" alt="screen" />

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>