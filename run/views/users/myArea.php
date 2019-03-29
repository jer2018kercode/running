<?php $title = 'Espace personnel'; ?>
<?php ob_start();?>

<h1>Mon espace personnel</h1>


<?php // bdd member utilisée
while( $private = $space->fetch() )
{
?>
    <div class="race">
        <p>
            <?= 'Pseudo : ' ?><?= htmlspecialchars( $private['username'] ); ?><br /><br />

            <?= 'Prénom : ' ?><?= htmlspecialchars( $private['firstname'] ); ?><br />
            <?= 'Nom : ' ?><?= htmlspecialchars( $private['lastname'] ); ?><br /><br />

            <?= 'Adresse mail : ' ?><?= htmlspecialchars( $private['mail'] ); ?><br /><br />

            <?php
                if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
                {
            ?>
                    <?= 'Administrateur' ?>
            <?php
                }
            ?>    
                <span id="update"><a href="index.php?action=accountPrepare&id_member=<?=
                $private['id'] ?>">Modifier</a></span>

        </p>
    </div>
<?php
}
    $space->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?> 