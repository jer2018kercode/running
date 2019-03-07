<?php $title = 'Supprimer une sortie';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<a href="index.php?">Confirmer </a>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
