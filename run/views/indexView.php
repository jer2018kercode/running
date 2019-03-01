<?php $title = 'Running website';?>
<?php ob_start();?>

    <?php // sign up button ?>
        <input type="button" class="go" value="S'inscrire" onclick="location.href='index.php?action=registerForm'">
    <?php // sign in button ?>
        <input type="button" class="go" value="Se connnecter" onclick="location.href='index.php?action=login'">

<?php // suggest outdoor ?>
    <a href="index.php?action=suggestOutdoor"><input type="button" id="out" value="Proposez une sortie"></a>

<?php // go to form to join outdoor ?>
    <a href="index.php?action=outdoorForm"><input type="button" id="out" value="Rejoindre une sortie"></a>

<?php // picture ?>
    <img src="public/images/nike.jpg" alt="screen" />

<?php
while( $race = $index->fetch() ) 
{
    ?>
    <div class="race">
        <p>
            <a href="index.php?action=showRace&id=<?=$race['id']?>"><strong>
            <?= htmlspecialchars( $race['title'] ); ?></strong></a><br /><br />
        </p>
    </div>
<?php
}
$index->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>