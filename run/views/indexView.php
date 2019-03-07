<?php $title = 'Page accueil';?>
<?php ob_start();?>

<?php // photo ?>
    <img src="public/images/nike.jpg" alt="screen" />


<?php // afficher les courses en page d'accueil
while( $race = $racesIndex->fetch() ) 
{
?>
    <div class="raceIndex">
        <p>
            <a href="index.php?action=showRace&id=<?= $race['id'] ?>"><strong>
            <?= htmlspecialchars( $race['title'] ); ?></strong></a><br /><br />
            <em><?= htmlspecialchars( $race['city'] ); ?></em></a>
        </p>
    </div>
<?php
}
$racesIndex->closeCursor();
?>

<?php // afficher les sorties en page d'accueil
while( $outdoor = $outdoorsIndex->fetch() ) 
{
    ?>
    <div class="outdoorIndex">
        <p>
            <a href="index.php?action=showOutdoor&id=<?= $outdoor['id'] ?>"><strong>
            <?= htmlspecialchars( $outdoor['title'] ); ?></strong></a><br /><br />
            <em><?= htmlspecialchars( $outdoor['city'] ); ?></em></a>
        </p>
    </div>
<?php
}
$outdoorsIndex->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>