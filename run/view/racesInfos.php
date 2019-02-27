<?php $title = 'Races Infos';?>
<?php ob_start();?>

    <div class="race">
        <p>
            <h1>Here are some more infos...to come</h1>
        </p>
    </div>

    <?php
while( $ri = $racesInfos->fetch() ) 
{
    ?>
    <div class="race">
        <p>
            <?= htmlspecialchars( $ri['description'] ); ?>

            <a href="index.php?action=showRaces">Back to races</a>
        </p>
    </div>
<?php
}
?>

<a href="index.php">Return to home</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>