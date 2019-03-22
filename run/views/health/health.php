<?php $title = 'Santé'; ?>
<?php ob_start(); ?>

<img src="public/images/health.jpg" alt="sante" id="sante" />

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <div class="healthArt">
            <a href="index.php?action=articleForm"><input type="button" id="health"
            value="Publier un article Santé"></a>
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

            <?= '( ' . htmlspecialchars( $articles['username'] ) . ' )'; ?><br />
        </p>
    </div>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // modifier une article ?>
        <span id="update"><a href="index.php?action=changeArticleForm&id_article=<?=
        $articles['id'] ?>">Modifier</a></span>

        <?php // supprimer une article ?>
        <span id="delete"><a href="index.php?action=cancelArticle&id_article=<?=
        $articles['id'] ?>">Supprimer</a></span>  
<?php
    }     
}
?>
    </div>
<?php
    $articlesView->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
