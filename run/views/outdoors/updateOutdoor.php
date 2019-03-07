<?php $title = 'Formulaire pour rejoindre une sortie';?>
<?php ob_start();?>

<?php 
if( isset( $_SESSION['username'] ) )
{ ?><img src="public/images/panda.jpg" id="panda" alt="panda" />
    <?php
} else 
  { ?><p>( Je suis déconnecté )</p><?php
  } ?>

<h1>Modification de sortie</h1>

<?php $prepare = $prepareUpdate->fetch(); ?>

<form action="index.php?action=updateOutdoor&id= <?= $prepare['id'] ?>" method="post">
<div class="update">
    <label for="title">Titre</label>
        <input type="text" id="title" value="<?= $prepare['title'] ?>" name="title">

        <label for="description">Description</label>
            <input type="text" id="description" value="<?= $prepare['description'] ?>" name="description">

        <label for="city">Ville</label>
            <input type="text" id="city" value="<?= $prepare['city'] ?>" name="city">

        <label for="date">Date</label>
            <input type="text" id="date" value="<?= $prepare['date'] ?>" name="date">
</div>
    <div class="update">
        <input type="submit" value="Confirmer">
    </div>
</form>

<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>