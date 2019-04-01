<?php $title = 'Espace personnel'; ?>
<?php ob_start(); ?>

<?php $prep = $prepare->fetch(); ?>

<form action="index.php?action=accountUpdate&id_member=<?= $prep['id'] ?>" method="post">
    <div class="register">
        <label for="username">Nom d'utilisateur</label>
            <input type="text" value="<?= $prep['username'] ?>" id="username" name="username" />

        <label for="password">Mot de passe</label>
            <input type="password" value="<?= $prep['password'] ?>" id="password" name="password" />

        <label for="firstname">Prénom</label>
            <input type="text" value="<?= $prep['firstname'] ?>" id="firstname" name="firstname" />

        <label for="lastname">Nom</label>
            <input type="text" value="<?= $prep['lastname'] ?>" id="lastname" name="lastname" />

        <label for="mail">Adresse mail</label>
            <input type="text" value="<?= $prep['mail'] ?>" id="mail" name="mail" />
    </div>
    <div class="register">
        <input type="submit" value="Confirmer" id="send" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?> 