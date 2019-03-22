<?php $title = 'Santé'; ?>
<?php ob_start();?>

<?php
while( $article = $articleView->fetch() )
{
?>    
    <div class="health">
        <p>
            <strong><?= htmlspecialchars( $article['title'] ); ?></strong><br />

            <?= htmlspecialchars( $article['content'] ); ?><br /><br />

            <?= 'publié par ' . '<strong>' . htmlspecialchars( $article['username'] ) . '</strong>'; ?><br />
            <?= '( ' . htmlspecialchars( $article['date'] ) . ' )'; ?><br /><br />
        </p>
    </div>
        
<?php
}
    $articleView->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'views/template.php'; ?>
