<?php $title = 'Running website';?>
<?php ob_start();?>

<?php // picture ?>
    <img src="public/images/nike.jpg" alt="screen" />

<?php
while( $race = $index->fetch() ) 
{
    ?>
    <div class="race">
        <p>
            <a href="index.php?action=showRace&id=<?= $race['id'] ?>"><strong>
            <?= htmlspecialchars( $race['title'] ); ?></strong></a><br /><br />
        </p>
    </div>
<?php
}
$index->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>