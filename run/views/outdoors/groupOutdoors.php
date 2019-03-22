<?php $title = 'Entrainements à plusieurs';?>
<?php ob_start();?>

<form action="index.php?action=showOutdoors" method="post">
    <div class="filter">
        <label for="filter"></label>
            <input type="text" id="filter" placeholder="Votre ville" name="filter">
            <input type="submit" id="search" value="Rechercher">
    </div>
</form>

<div id="outdoor">
<?php // proposer une sortie ?>
<div class="out">
<?php
    if( isset( $_SESSION['id'] ) )
    {
?>
        <a href="index.php?action=suggestOutdoor"><input type="button" id="out" value="Proposer une sortie"></a>
<?php
    }
    else
    {
?>
        <a href="index.php?action=loginForm"><input type="button" id="out" value="Proposer une sortie"></a>
<?php
    }
?>
    
</div>

<?php
while( $outdoors = $outdoorsView->fetch() ) 
{
?>
    <div class="outdoor">
        <p>
            <a href="index.php?action=showOutdoor&id_outdoor=<?= $outdoors['id'] ?>">
            <strong><?= htmlspecialchars( $outdoors['title'] ); ?></strong><br /></a>
            <?= '( ' . htmlspecialchars( $outdoors['city'] ) . ' )'; ?><br />
        </p>
    </div>
<?php
}
    $outdoorsView->closeCursor();
?>
</div>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
