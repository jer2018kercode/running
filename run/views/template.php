<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    
</head>

<body>
    <?php // logo Au pas de course ?>
    <a href="index.php"><img src="public/images/logo_test.png" alt="logo" id="logo" /></a>

    <div id="menu">
            <?php // --runningView ?>
        <nav id="top">
            <ul>
                <li><a href="index.php?action=showOutdoors">Entrainements à plusieurs</a></li>
    
            <?php // --progressionView ?>
                <li><a href="index.php?action=showProgression">Suivi personnalisé</a></li>

            <?php // --racesView ?>
                <li><a href="index.php?action=racesDetails">Courses officielles</a></li>
    
            <?php // --healthView ?>
                <li><a href="index.php?action=showHealth">Espace santé</a></li>

            <?php // --contactView ?>
                <li><a href="index.php?action=showContact">Contactez-nous</a></li>
            </ul>
        </nav>
    </div>
    <?= $content ?>
</body>
</html>