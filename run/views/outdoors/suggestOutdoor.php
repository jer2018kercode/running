<?php $title = 'Sorties';?>
<?php ob_start();?>

<h1>Je propose ma sortie</h1>

<form action="index.php?action=outdoorConfirmed" method="post">
    <div class="propose">
        <label for="title">Titre</label>
            <input type="text" id="title" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" name="description">

        <label for="date">Date</label>
            <input type="text" id="date" name="date">
    </div>
    <div class="propose">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>