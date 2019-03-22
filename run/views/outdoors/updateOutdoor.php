<?php $title = 'Formulaire pour rejoindre une sortie'; ?>
<?php ob_start();?>

<h1>Modification de sortie</h1>

<form action="index.php?action=updateOutdoor&id_outdoor= <?= $prepareUpdate['id'] ?>" method="post">
    <div class="update">
        <label for="title">Titre</label>
            <input type="text" id="title" value="<?= $prepareUpdate['title'] ?>" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" value="<?= $prepareUpdate['description'] ?>" name="description">

        <label for="city">Ville</label>
            <input type="text" id="city" value="<?= $prepareUpdate['city'] ?>" name="city">

        <label for="date">Date</label>
            <input type="date" id="date" value="<?= $prepareUpdate['date'] ?>" name="date">
    </div>
    <div class="update">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>