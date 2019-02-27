<?php $title = 'Races';?>
<?php ob_start();?>

<?php // db table race used ?>
<?php
while( $races = $race->fetch() ) 
{
    ?>
    <div class="race">
        <p>
            <strong><?= htmlspecialchars( $races['title'] ); ?></strong><br /><br />

            <?= 'This is the ' . htmlspecialchars( $races['id'] ) . ' race' . '!'; ?><br /><br />

            <?= htmlspecialchars( $races['description'] ) . 'in ' . htmlspecialchars( $races['city'] )
            . ' ' . htmlspecialchars( $races['postcode'] ); ?><br />

            <?= 'on the ' . htmlspecialchars( $races['date'] ); ?><br />

            <a href="index.php?action=racesInfos&id=<?=$races['id'];?>">More infos?</a>
        </p>
    </div>
<?php
}
?>

<a href="index.php">Return to home</a>

<?php $content = ob_get_clean();?>
<?php require 'view/template.php';?>