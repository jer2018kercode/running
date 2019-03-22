<?php $title = 'Contact';?>
<?php ob_start();?>

<div id="contact">
    <p>Vous rencontrez des difficultés sur notre site ? N'hésitez pas à nous contacter.<br />
    Nous ferons en sorte que vous puissiez utiliser ses fonctionnalités le plus simplement possible.</p>

    <p>Adresse mail : jerome@toto.gmail.com</p>
    <p>Téléphone : 06 43 38 39 ..</p>
</div>

<?php 
    if( isset( $_SESSION['username'] ) )
    {
?>
        <form action="index.php?action=contactUs" method="post">
            <fieldset class="coordonnees"> 
                <legend>Objet</legend>
                    <p><label for="subject"></label><input type="text" name="subject" id=
                    "prenom" placeholder="Sujet" /></p>
            </fieldset>

            <fieldset class="coordonnees">
                <legend>Message</legend>
                    <p><label for="message"></label>
                        <textarea rows="7" cols="50" name="message" id="message" placeholder="Votre message"></textarea>
                    </p>
            </fieldset>

            <a href="#"><p class="bouton"><input type="submit" value="Envoyer" /></a>
            <a href="#"><input type="reset" value="Annuler" /></p></a>
        </form>
<?php
    }
    else
    {
?>
        <form action="index.php?action=login" method="post">
            <fieldset class="coordonnees"> 
                <legend>Objet</legend>
                    <p><label for="subject"></label><input type="text" name="subject" id=
                    "prenom" placeholder="Sujet" /></p>
            </fieldset>

            <fieldset class="coordonnees">
                <legend>Message</legend>
                    <p><label for="message">Votre message</label>
                        <textarea rows="7" cols="50" name="message" id="message" placeholder="Votre message"></textarea>
                    </p>
            </fieldset>

            <a href="#"><p class="bouton"><input type="submit" value="Envoyer" /></a>
            <a href="#"><input type="reset" value="Annuler" /></p></a>
        </form>
<?php
    }
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
