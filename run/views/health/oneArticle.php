<?php $title = 'Santé'; ?>
<?php ob_start(); ?>

<?php
while( $article = $articleView->fetch() )
{
?>    
    <div class="health">
        <p>
            <strong><?= htmlspecialchars( $article['title'] ); ?></strong><br /><br />

            <?= htmlspecialchars( $article['content'] ); ?><br /><br />

            <?= 'publié par ' . '<strong>' . htmlspecialchars( $article['username'] ) . '</strong>'; ?><br />
            <?= '( ' . htmlspecialchars( $article['date'] ) . ' )'; ?><br /><br />
        </p>

<?php
    if( isset( $_SESSION['level'] ) && $_SESSION['level'] == 1 )
    {
?>
        <?php // modifier une article ?>
        <span id="update"><a href="index.php?action=changeArticleForm&id_article=<?=
        $article['id'] ?>">Modifier</a></span>

        <?php // supprimer une article ?>
        <span id="delete"><a href="index.php?action=cancelArticle&id_article=<?=
        $article['id'] ?>">Supprimer</a></span>  
<?php
    }     
} 
    $articleView->closeCursor(); ?>
    </div>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
