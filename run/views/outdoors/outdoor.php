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

<?php // participer à une sortie
    if( isset( $_SESSION['id'] ) )
    {
?>
        <span id="join"><a href="index.php?action=joinOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Rejoindre</a></span>
<?php
    } 
    else 
    {
?>
        <span id="join"><a href="index.php?action=login">Rejoindre</a></span>
<?php 
    }

    // annuler sa participation
    if( isset( $_SESSION['id'] ) )
    {
?>      
        <span id="renounce"><a href="index.php?action=renounceOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Se désinscrire</a></span>
<?php
    } 

    // modifier une sortie (admin ou membre créateur)
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 ||
    isset( $_SESSION['id'] ) && $_SESSION['id'] == $id_Member ) 
    {
?>
        <span id="update"><a href="index.php?action=prepareUpdateOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Modifier</a></span>
<?php
    }  

    // supprimer une sortie (admin ou membre créateur)
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 ||
    isset( $_SESSION['id'] ) && $_SESSION['id'] == $id_Member )
    {
?>
        <span id="delete"><a href="index.php?action=cancelOutdoor&id_outdoor=<?=
        $outdoor['id'] ?>">Supprimer</a></span>
<?php
    }
?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>