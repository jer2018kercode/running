<?php $title = 'Outdoor';?>
<?php ob_start();?>
<?php // session_destroy() ?>

<?php if( isset( $_SESSION['username'] ) ) { ?>
    <p>Je suis connecté !</p>
<?php } ?>
<h1>Sorties en groupe</h1>

<?php // suggest outdoor ?>
<div class="out">
    <a href="index.php?action=suggestOutdoor"><input type="button" id="out" value="Proposez une sortie"></a>

<?php // go to form to join outdoor ?>
    <a href="index.php?action=outdoorForm"><input type="button" id="out" value="Rejoindre une sortie"></a>
</div>

<?php
while( $outdoors = $outdoorsView->fetch() ) 
{
    ?>
    <div class="outdoor">
        <p>
            <strong><?= htmlspecialchars( $outdoors['title'] ); ?></strong><br /><br />
            <?= htmlspecialchars( $outdoors['description'] ); ?>
        </p>
    </div>
<?php
}
$outdoorsView->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
