<?php $title = 'Santé'; ?>
<?php ob_start(); ?>

<h1>Articles santé</h1>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <div class="healthArt">
            <a href="index.php?action=articleForm"><input type="button" id="health"
            value="Publier un article"></a>
        </div>    
<?php
    }
?>

<?php 
while( $articles = $articlesView->fetch() ) 
{
?>
    <div class="health">
        <p>
            <strong><a href="index.php?action=showArticle&id_article=<?= $articles['id'] ?>"><?= htmlspecialchars(
            $articles['title'] ); ?></strong></a><br /><br />

            <?= htmlspecialchars( $articles['content'] ); ?><br />

            <?= '( ' . htmlspecialchars( $articles['username'] ) . ' )'; ?><br />
        </p>

<?php   
}
    $articlesView->closeCursor(); ?>
    </div>

<img src="public/images/health.jpg" alt="sante" id="sante" />

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
