<?php $title = 'Courses officielles'; ?>
<?php ob_start();?>

<form action="index.php?action=showRaces" method="post">
    <div class="filter">
        <label for="filter"></label>
            <input type="text" id="filter" placeholder="Votre ville" name="filter">
            <input type="submit" id="search" value="Rechercher">
    </div>
</form>

<div id="race">
<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <div class="runOffi">
            <a href="index.php?action=newRaceForm"><input type="button" id="runOffi"
            value="Créer une course"></a>
        </div>
<?php
    }
?>

<?php
while( $races = $racesView->fetch() ) 
{
?>
    <div class="race">
        <p>
            <a href="index.php?action=showRace&id_race=<?= $races['id'] ?>">
            <strong><?= htmlspecialchars($races['title'] ); ?></strong><br /></a>
            <?= '( ' . htmlspecialchars( $races['city'] ) . ' )'; ?><br />
        </p>
    </div>
<?php
}
    $racesView->closeCursor();
?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>