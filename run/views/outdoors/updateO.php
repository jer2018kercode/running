<?php $title = 'Sortie à mettre à jour';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<h1>Page de modification de sortie...</h1>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>