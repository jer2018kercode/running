<?php $title = 'Join outdoor';?>
<?php ob_start();?>

<p>Vous avez rejoint une sortie</p>

<?php
while( $join = $joinOutdoor->fetch() ) 
{
    ?>
    <div class="outdoor">
        <p>
            <strong><?= htmlspecialchars( $join['title'] ); ?></strong><br /><br />
            <?= htmlspecialchars( $join['description'] ); ?>
        </p>
    </div>
<?php
}
$joinOutdoor->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>