<?php $title = 'Logo';?>
<?php ob_start();?>

    <img src="public/images/logo_test.png" alt="logo" id="logo" />
    
<?php $content = ob_get_clean();?>

<?php require 'views/template.php';?>