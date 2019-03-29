<?php $title = 'Détails courses'; ?>
<?php ob_start(); ?>

<div class="race">
    <p>
        <strong><?= htmlspecialchars( $race['title'] ); ?></strong><br /><br />

        <?= htmlspecialchars( $race['description'] ) . ' ' . '<br />' . '<br />' . htmlspecialchars(
            $race['city'] ) . ' ' . '<br />' . htmlspecialchars( $race['date'] ); ?><br />
    </p>

<?php // les participantts
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 || isset( $_SESSION['id'] ) )
    {
        while( $can = $candidate->fetch() ) 
        {
?>
            <?= htmlspecialchars( $can['username'] ); ?><br />
<?php
        }
            $candidate->closeCursor();
    }

    // participer à une couse
    if( isset( $_SESSION['id'] ) )
    {
?>
        <?php  ?>
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

    // annuler sa participation 
    if( isset( $_SESSION['id'] ) )
    {
?>
        <span id="renounce"><a href="index.php?action=renounceRace&id_race=<?=
        $race['id'] ?>">Se désinscrire</a></span>
<?php
    } 

    // modifier une course (admin)
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <span id="update"><a href="index.php?action=initializeRaceUpdate&id_race=<?=
        $race['id'] ?>">Modifier</a></span>
<?php
    } 

    // supprimer une course (admin)
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <span id="delete"><a href="index.php?action=cancelRace&id_race=<?= $race['id'] ?>">Supprimer</a></span>
<?php
    }
?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>