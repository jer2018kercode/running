<?php $title = 'Commentaires'; ?>
<?php ob_start(); ?>

<?php
$comment = $comments->fetch();
?>

<?= htmlspecialchars( $comment['content'] ) ?>


<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
