<?php $title = 'Error'; ?>
<?php ob_start(); ?> 

<div>
    <p id="error_message"><?= 'Sorry, failure...' . $e->getMessage(); ?><br />
    <a href="index.php">Return</a></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>