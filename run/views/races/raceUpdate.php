<?php $title = 'Formulaire pour modifier une course'; ?>
<?php ob_start();?>

<h1>Modification de course</h1>

<?php $initialize = $initializeRace->fetch(); ?>

<form action="index.php?action=updateRace&id_race=<?= $initialize['id'] ?>" method="post">
<div class="initialize">
    <label for="title">Titre</label>
        <input type="text" id="title" value="<?= $initialize['title'] ?>" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" value="<?= $initialize['description'] ?>" name="description">

        <label for="city">Ville</label>
            <input type="text" id="city" value="<?= $initialize['city'] ?>" name="city">

        <label for="date">Date</label>
            <input type="date" id="date" value="<?= $initialize['date'] ?>" name="date">
</div>
    <div class="initialize">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>