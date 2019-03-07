<?php $title = 'Santé';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<h1>La santé</h1>

<p>Cette partie du site vous propose des articles sur le bien-être au quotidien</p>

<img id="health" src="public/images/apple.jpg" alt="health" />

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
