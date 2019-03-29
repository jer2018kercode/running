<?php $title = 'Commentaires'; ?>
<?php ob_start(); ?>

<form action="index.php?action=addComment&id_outdoor=<?= $comment['id'] ?>" method="post">
    <div class="join">
        <label for="content">Content</label>
            <input type="text" id="content" name="content">
    </div>
    <div class="join">
        <input type="submit" value="Envoyer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
