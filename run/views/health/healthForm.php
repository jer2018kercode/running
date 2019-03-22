<?php $title = 'Publication Santé'; ?>
<?php ob_start();?>

<form action="index.php?action=publishArticle" method="post">
    <div class="new">
        <label for="title">Titre</label>
            <input type="text" id="title" name="title">

        <label for="description"></label>
            <textarea rows="7" cols="50" name="description" id="description" placeholder="Description"></textarea>

        <label for="date">Date</label>
            <input type="date" id="date" name="date">
    </div>
    <div class="new">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>