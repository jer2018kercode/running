<?php $title = 'Confirmation';?>
<?php ob_start();?>

<h1>Your have been registered for you selected race!</h1>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>