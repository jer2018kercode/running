<?php $title = 'Infos Courses';?>
<?php ob_start();?>
<?php session_destroy() ?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

    <div class="race">
        <p>
            <h1>Vous vouliez plus d'infos :</h1>
        </p>
    </div>

<?php
while( $ri = $racesDetails->fetch() ) 
{
?>
    <div class="race">
        <p>
            <?= htmlspecialchars( $ri['description'] ); ?>
        </p>
    </div>
<?php
}
$racesDetails->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>