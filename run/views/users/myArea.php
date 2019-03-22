<?php $title = 'Espace personnel'; ?>
<?php ob_start();?>

<h1>Mon espace personnel</h1>


<?php // bdd member utilisée
while( $private = $space->fetch() )
{
?>
    <div class="race">
        <p>
            <?= 'Pseudo : ' ?><a href="#"><?= htmlspecialchars( $private['username'] ); ?></a><br /><br />

            <?= 'Prénom : ' ?><a href="#"><?= htmlspecialchars( $private['firstname'] ); ?></a><br />
            <?= 'Nom : ' ?><a href="#"><?= htmlspecialchars( $private['lastname'] ); ?></a><br /><br />

            <?= 'Adresse mail : ' ?><a href="#"><?= htmlspecialchars( $private['mail'] ); ?></a><br /><br />

            <?php
                if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
                {
            ?>
                    <?= 'Administrateur' ?>
            <?php
                }
            ?>    
                <span id="update"><a href="index.php?action=accountPrepare&id_member=<?=
                $private['id'] ?>">Modif</a></span>

        </p>
    </div>
<?php
}
    $space->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?> 