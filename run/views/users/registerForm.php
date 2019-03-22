<?php $title = 'Formulaire d\'inscrption'; ?>
<?php ob_start(); ?>

<?php // en cas de compte existant ?>
<span id="update"><a href="index.php?action=login">Vous avez déjà un compte</a></span>

<?php // formulaire d'inscription ?>
<form action="index.php?action=register" method="post">
    <div class="register">
        <label for="username"></label>
            <input type="text" placeholder="Nom d'utilisateur" id="username" name="username" />
            <span id="missUsername"></span>

        <label for="password"></label>
            <input type="password" placeholder="Mot de passe" id="password" name="password" />

        <label for="password"></label>
            <input type="password" placeholder="Mot de passe (confirmation)" 
            id="confpassword" name="confpassword" />

        <label for="firstname"></label>
            <input type="text" placeholder="Prénom" id="firstname" name="firstname" />

        <label for="lastname"></label>
            <input type="text" placeholder="Nom" id="lastname" name="lastname" />

        <label for="mail"></label>
            <input type="email" placeholder="Mail" id="mail" name="mail" />
    </div>
    <div class="register">
        <input type="submit" value="Confirmer" id="send" />
    </div>
</form>

<span><?= $error ?></span>

<script src="public/js/verif.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>




