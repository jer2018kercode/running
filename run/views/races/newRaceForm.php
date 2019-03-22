<?php $title = 'Formulaire pour créer une course'; ?>
<?php ob_start();?>

<h1>Je crée ma course (admin)</h1>

<form action="index.php?action=newRace" method="post">
    <div class="new">
        <label for="title">Titre</label>
            <input type="text" id="title" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" name="description">

        <label for="city">Ville</label>
            <input type="text" id="city" name="city">

        <label for="date">Date</label>
            <input type="date" id="date" name="date">
    </div>
    <div class="new">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>