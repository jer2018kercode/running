<?php $title = 'Infos courses';?>
<?php ob_start();?>

<?php // db table race used ?>

<a href="index.php?action=raceConfirmed">S'inscrire</a>
   
<?php
while( $race = $raceView->fetch() ) 
{
    ?>
    <div class="race">
        <p>
            <strong><?= htmlspecialchars( $race['title'] ); ?></strong><br /><br />
            <?= 'Ceci est la ' . htmlspecialchars( $race['id'] ) . ' e course officielle' . '!'; ?><br /><br />

            <?= htmlspecialchars( $race['description'] ) . 'qui se déroule ' . htmlspecialchars( $race['city'] )
            . ' ' . htmlspecialchars( $race['postcode'] ); ?><br />

            <?= 'à la date du ' . htmlspecialchars( $race['date'] ); ?><br />
        </p>
    </div>
<?php
}
$raceView->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>