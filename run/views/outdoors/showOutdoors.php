<?php $title = 'Outdoor';?>
<?php ob_start();?>

<h1>Sorties en groupe</h1>

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
