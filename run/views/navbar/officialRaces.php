<?php $title = 'Courses officielles';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<?php
while( $race = $racesDetails->fetch() ) 
{
?>
    <div class="race">
        <p>
            <strong><?= htmlspecialchars( $race['title'] ); ?></strong><br /><br />
            <?= 'Ceci est la ' . htmlspecialchars( $race['id'] ) . ' e course officielle' . '!'; ?><br /><br />

            <?= htmlspecialchars( $race['description'] ) . 'qui se déroule ' . htmlspecialchars( $race['city'] )
            . ' ' . htmlspecialchars( $race['postcode'] ); ?><br />

            <?= 'à la date du ' . htmlspecialchars( $race['date'] ); ?><br />
            <em><?= htmlspecialchars( $race['city'] ); ?></em>
        </p>
    </div>
    <a href="index.php?action=raceConfirm&id= <?= $race['id'] ?>">S'inscrire à cette course</a>
<?php
}
$racesDetails->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>