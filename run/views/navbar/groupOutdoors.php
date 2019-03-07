<?php $title = 'Entrainements à plusieurs';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p>
<?php // inscription ?>
    <a href="index.php?action=registerForm"><input type="button" class="go" value="S'inscrire"></a>
<?php // connexion ?>
    <a href="index.php?action=login"><input type="button" class="go" value="Se connnecter"></a>
  
  <?php
  } ?>

<h1>Sorties en groupe</h1>

<?php // proposer une sortie ?>
<div class="out">
    <a href="index.php?action=suggestOutdoor"><input type="button" id="out" value="Proposez une sortie"></a>

<?php // aller vers le formulaire pour rejoindre une sortie ?>
    <a href="index.php?action=outdoorForm"><input type="button" id="out" value="Rejoindre une sortie"></a>
</div>

<?php
while( $outdoors = $outdoorsView->fetch() ) 
{
    ?>
    <div class="outdoor">
        <p>
            <strong><?= htmlspecialchars( $outdoors['title'] ); ?></strong><br /><br />
            <?= htmlspecialchars( $outdoors['description'] ); ?>
            <em><?= htmlspecialchars( $outdoors['city'] ); ?></em>
            <span id="delete"><a href="index.php?action=cancelOutdoor&id=<?= $outdoors['id'] ?>">Annuler</a></span>
            <span id="update"><a href="index.php?action=prepareUpdateOutdoor&id=<?= $outdoors['id'] ?>">Modifier</a></span>
            <span id="join"><a href="index.php?action=joinOutdoor&id=<?= $outdoors['id'] ?>">Rejoindre</a></span>
        </p>
    </div>
<?php
}
$outdoorsView->closeCursor();
?>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>
