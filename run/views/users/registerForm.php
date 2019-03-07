<?php $title = 'Formulaire d\'inscrption';?>
<?php ob_start();?>

<h2>Vous êtes nouveau sur notre site ?</h2>
<?php // formulaire d'inscription --registerView ?>
<form action="index.php?action=register" method="post">
    <div class="register">
        <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username">
            <span id='missUsername'></span><br>

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
        <input type="submit" value="Confirmer" id="send">
    </div>
</form>

<?php // --loginView ?>
<a href="index.php?action=login">Vous avez déjà un compte</a>

<script>
    var formValid = document.getElementById('send');
    var name = document.getElementById('username');
    var missUsername = document.getElementById('missUsername');
    var nameValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
            
    formValid.addEventListener('click', validation);
            
    function validation( event )
    {
        // Si le champ est vide
        if( name.validity.valueMissing )
        {
            event.preventDefault();
            missUsername.textContent = 'Prénom manquant';
            missUsername.style.color = 'red';
        // Si le format de données est incorrect
        } else if( nameValid.test( name.value ) == false )
          {
            event.preventDefault();
            missUsername.textContent = 'Format incorrect';
            missUsername.style.color = 'orange';
          } 
    }
</script>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>



