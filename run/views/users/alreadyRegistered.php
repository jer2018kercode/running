<?php $title = 'Espace de connexion';?>
<?php ob_start();?>

<?php // formulaire de connexion pour l'utilisateur ?>

<h1>Votre espace de connexion</h1>

<form action="index.php?action=login" method="post">
    <div class="log_reg">
        <label for="user"></label>
            <input type="text" placeholder="Nom d'utilisateur" id="user" name="user">

        <label for="password" ></label>
            <input type="password" placeholder="Mot de passe" id="password" name="password">
    </div>
    <div class="log_reg">
        <input type="submit" class="confirm_reg" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>