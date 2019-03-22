<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
<?php
    if( isset( $_SESSION['id'] ) ) 
    {
?>
<?php // espace accueil utilisateur ?>
    <div id="welcome">
        <strong><?= $_SESSION['username']; ?></strong>

        <a href="index.php?action=showArea&id_member=<?= $_SESSION['id'] ?>"> Mon Espace</a><br />
        
        <a href="index.php?action=signout"><input type="button" class="leave" value="Se déconnecter"></a>
    </div>
<?php
    }
    else
    { 
?>
        <?php // inscription ?>
        <a href="index.php?action=registerForm"><input type="button" id="up" value="S'inscrire"></a>
        <?php // connexion ?>
        <a href="index.php?action=loginForm"><input type="button" id="in" value="Se connnecter"></a>
<?php
    }
?> 

<?php // logo Au pas de course ?>
    <a href="index.php"><img src="public/images/logo_test.png" alt="logo" id="logo" /></a>

<div id="menu">
    <!-- bouton déroulant responsive -->
    <label for="menu-mobile" class="menu-mobile">Menu</label><input type="checkbox" id="menu-mobile" role="button">
    
    <nav class="nav justify-content-center"> <!-- alignement centre -->
        <a class="nav-link active" href="index.php?action=showRaces">Courses officielles</a>
        <a class="nav-link" href="index.php?action=showOutdoors">Entrainements à plusieurs</a>

    <?php
        if( isset( $_SESSION['id'] ) )
        {
    ?>      <a class="nav-link" href="index.php?action=showProgression&id_member=<?= $_SESSION['id'] ?>">
            Suivi personnalisé</a>
    <?php
        }
    ?>
        <a class="nav-link" href="index.php?action=showHealth">Espace santé</a>
        <a class="nav-link" href="index.php?action=showContact">Contactez-nous</a>
    </nav>
</div>
    <?= $content ?>
    <script src="bootstrap.min.js"></script>
</body> 
</html>