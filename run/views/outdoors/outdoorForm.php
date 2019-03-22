<?php $title = 'Formulaire pour rejoindre une sortie'; ?>
<?php ob_start();?>

<h1>Inscription sortie</h1>

<form action="index.php?action=joinOutdoor" method="post">
    <div class="join">
        <label for="title">Titre</label>
            <input type="text" id="title" name="title">

        <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname">

        <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname">

        <label for="mail">Adresse mail</label>
            <input type="text" id="mail" name="mail">
    </div>
    <div class="join">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>