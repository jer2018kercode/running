<?php $title = 'Running';?>
<?php ob_start();?>

<p>Running</p>

<a href="index.php">Return to home</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>
