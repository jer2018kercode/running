<?php $title = 'Progression';?>
<?php ob_start();?>

<h1>Ma progression</h1>

<p>Accédez à votre progression personnalisée</p>

<?php
while( $prog = $progression->fetch() ) 
{
    ?>
    <div class="prog">
        <p>
            <?= 'Je cours à une vitesse de ' . htmlspecialchars( $prog['speed'] ); ?><br /><br />
        </p>
    </div>
<?php
}
$progression->closeCursor();
?>


<?php $content = ob_get_clean();?>
<?php require 'views/template.php';?>