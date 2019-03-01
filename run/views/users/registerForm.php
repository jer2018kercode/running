<?php $title = 'RegisterForm';?>
<?php ob_start();?>

<h2>Vous êtes nouveau sur notre site ?</h2>
<?php // register form for new users --registerView ?>
<form action="index.php?action=register" method="post">
    <div class="register">
        <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username">

        <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">

        <label for="password">Confirmation Mot de passe</label>
            <input type="password" id="confpassword" name="confpassword">

        <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname">

        <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname">

        <label for="mail">Adresse mail</label>
            <input type="text" id="mail" name="mail">
    </div>

    <div class="register">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php // --loginView ?>
<a href="index.php?action=login">Vous avez déjà un compte</a>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>