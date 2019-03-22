<?php $title = 'Détails courses'; ?>
<?php ob_start();?>

<div class="race">
    <p>
        <strong><?= htmlspecialchars( $race['title'] ); ?></strong><br /><br />

        <?= htmlspecialchars( $race['description'] ) . ' ' . '<br />' . '<br />' . htmlspecialchars(
            $race['city'] ) . ' ' . '<br />' . htmlspecialchars( $race['date'] ); ?><br />
    </p>
<?php 
    if( isset( $_SESSION['username'] ) )
    {
?>
        <?php // participer à une couse ?>
        <span id="join"><a href="index.php?action=raceConfirm&id_race=<?=
        $race['id'] ?>">S'inscrire</a></span>
<?php
    } 
    else 
    {
?>
        <span id="join"><a href="index.php?action=login">S'inscrire</a></span>
<?php 
    }
?>

<?php // annuler sa participation 
    if( isset( $_SESSION['username'] ) )
    {
?>
        <span id="renounce"><a href="index.php?action=renounceOutdoor&id=<?=
        $race['id'] ?>">Se désinscrire</a></span>
<?php
    } 
?>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // modifier une course (admin) ?>
        <span id="update"><a href="index.php?action=initializeRaceUpdate&id_race=<?=
        $race['id'] ?>">Modifier</a></span>
<?php
    } 
?>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // supprimer une course (admin) ?>
        <span id="delete"><a href="index.php?action=cancelRace&id_race=<?= $race['id'] ?>">Supprimer</a></span>
<?php
    }
?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>