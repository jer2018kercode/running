<?php $title = 'Page accueil';?>
<?php ob_start();?>

<?php // bdd outdoor utilisée
while( $outdoor = $outdoorView->fetch() ) 
{
?>
    <a href="index.php?action=joinOutdoor&id=<?= $outdoor['id'] ?>">S'inscrire</a>
    <div class="outdoor">
        <p>
            <strong><?= htmlspecialchars( $outdoor['title'] ); ?></strong><br /><br />
            <?= 'Ceci est la ' . htmlspecialchars( $outdoor['id'] ) . 'e sortie !'; ?><br /><br />
   
            <?= htmlspecialchars( $outdoor['description'] ) . 'qui se déroule ' . htmlspecialchars( $outdoor['city'] )
               . ' ' . htmlspecialchars( $outdoor['postcode'] ); ?><br />
   
            <?= 'à la date du ' . htmlspecialchars( $outdoor['date'] ); ?><br />
        </p>
    </div>
<?php
}
$outdoorView->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>