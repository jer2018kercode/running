<?php $title = 'Suivi personnalisé';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<h1>Ma progression</h1>

<?php
while( $prog = $progression->fetch() ) 
{
    ?>
    <div class="prog">
        <p>
            <?= 'Je cours à une vitesse de ' . htmlspecialchars( $prog['speed'] ); ?><br /><br />
        </p>
    </div>
<?php
}
$progression->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>