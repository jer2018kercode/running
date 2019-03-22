<?php $title = 'Détails sorties'; ?>
<?php ob_start();?>

<div class="outdoor">
    <p>
        <strong><?= htmlspecialchars( $outdoor['title'] ); ?></strong><br />
        <?= '( créée par ' . '<strong>' . htmlspecialchars( $outdoor['username'] ) . '</strong>' . ' )'; ?>
        <br /><br />
            
        <?= htmlspecialchars( $outdoor['description'] ) . ' ' . '<br />' . '<br />' . htmlspecialchars(
        $outdoor['city'] ) . ' ' . '<br />' . htmlspecialchars( $outdoor['date'] ); ?><br /><br /><br />

        <?= 'Ils y participent : ' ?><br />
        <?= htmlspecialchars( $outdoor['username'] ) ?><br />
            
<?php // les participants de la sortie
while( $candidate = $candidates->fetch() ) 
{
?>
    <?= htmlspecialchars( $candidate['username'] ); ?><br />
<?php
}
    $candidates->closeCursor();
?>
    </p>

<?php 
    if( isset( $_SESSION['id'] ) )
    {
?>
        <?php // participer à une sortie ?>
        <span id="join"><a href="index.php?action=joinOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Rejoindre</a></span>
<?php
    } 
    else 
    { ?>
        <span id="join"><a href="index.php?action=login">Rejoindre</a></span><?php 
    }
?>

<?php
    if( isset( $_SESSION['id'] ) )
    {
?>      
        <?php // annuler sa participation ?>
        <span id="renounce"><a href="index.php?action=renounceOutdoor&id=<?=
        $outdoor['id'] ?>">Se désinscrire</a></span>
<?php
    } 
?>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // modifier une sortie ?>
        <span id="update"><a href="index.php?action=prepareUpdateOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Modifier</a></span>
<?php
    }  
?>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // suppression pour admin ou membre créateur ?>
        <span id="delete"><a href="index.php?action=cancelOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Supprimer</a></span>
<?php
    }
?>

<span id="renounce"><a href="index.php?action=commentsForm&id_outdoor=<?=
$outdoor['id'] ?>">Commenter</a></span>

    </div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>