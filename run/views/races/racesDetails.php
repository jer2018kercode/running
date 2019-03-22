<?php $title = 'Infos Courses'; ?>
<?php ob_start();?>
<?php session_destroy() ?>

    <div class="race">
        <p>
            <h1>Vous vouliez plus d'infos :</h1>
        </p>
    </div>

<?php
while( $ri = $racesDetails->fetch() ) 
{
?>
    <div class="race">
        <p>
            <?= htmlspecialchars( $ri['description'] ); ?>
        </p>
    </div>
<?php
}
    $racesDetails->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>