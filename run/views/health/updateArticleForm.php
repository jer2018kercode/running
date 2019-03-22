<?php $title = 'Publication Santé'; ?>
<?php ob_start();?>

<h1>Modification d'article</h1>

<?php $initialize = $initializeArticle->fetch(); ?>

<form action="index.php?action=updateArticle&id_article= <?= $initialize['id'] ?>" method="post">
    <div class="update">
        <label for="title">Titre</label>
            <input type="text" id="title" value="<?= $initialize['title'] ?>" name="title">

        <label for="description">Description</label>
            <textarea rows="7" cols="50" name="description" id="description" placeholder="Description">
                <?= $initialize['content'] ?></textarea>
             
        <label for="date">Date</label>
            <input type="date" id="date" value="<?= $initialize['date'] ?>" name="date">
    </div>
    <div class="update">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>