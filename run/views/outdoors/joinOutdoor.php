<?php $title = 'Rejoindre une sortie';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<h1>Vous avez rejoint la sortie</h1>


<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>