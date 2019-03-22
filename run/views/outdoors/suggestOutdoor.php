<?php $title = 'Formulaire pour rejoindre une sortie';?>
<?php ob_start();?>

<h1>Je propose ma sortie</h1>

<form action="index.php?action=createOutdoor&id_member=?" method="post">
    <div class="propose">
        <label for="title">Titre</label>
            <input type="text" id="title" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" name="description">

        <label for="city">Ville</label>
            <input type="text" id="city" name="city">

        <label for="date">Date</label>
            <input type="date" id="date" name="date">
    </div>
    <div class="propose">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>