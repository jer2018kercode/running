<?php
namespace J\models;
use \J\models\Manager;
use \PDO;

// declaration de la classe enfant
class ArticlesManager extends Manager
{
    // voir tous les articles
    public function showArticles()
    {
        $db = $this->dbConnect();
        $showArticles = $db->prepare( 'SELECT article.id, article.title, content, username, id_Member,
        DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM article INNER JOIN member ON
        article.id_Member = member.id' );
        $showArticles->execute();
        
        return $showArticles;
    }

    // voir un seul article
    public function showArticle( $id_article )
    {
        $db = $this->dbConnect();
        $showOneArticle = $db->prepare( 'SELECT article.id, article.title, content, username, id_Member,
        DATE_FORMAT( date, \' %d/%m/%Y \' ) AS date FROM article INNER JOIN member ON
        article.id_Member = member.id WHERE article.id = ?' );
        $showOneArticle->execute( array( $id_article ) );

        return $showOneArticle;
    }

    // publier un article (administrateur)
    public function newArticle( $title, $description, $date, $id_member )
    {
        $db = $this->dbConnect();
        $newArticle = $db->prepare( 'INSERT INTO article( title, content, date, id_Member ) VALUES
        ( ?, ?, ?, ? )' );
        $newArticle->execute( array( $title, $description, $date, $id_member ) );
        
        return $newArticle;
    }

    // modifier un article (administrateur)
    public function updateArticle( $title, $description, $date, $id_article )
    {
        $db = $this->dbConnect();
        $changeArticle = $db->prepare( 'UPDATE article SET title = ?, content = ?,
        date = ? WHERE id = ?' );
        $changeArticle->execute( array( $title, $description, $date, $id_article ) );
        
        return $changeArticle;
    }

    // supprimer un article (administrateur)
    public function cancelArticle( $id_article )
    {
        $db = $this->dbConnect();
        $deleteOneArticle = $db->prepare( 'DELETE FROM article WHERE id = ?' );
        $deleteOneArticle->execute( array( $id_article ) );
  
        return $deleteOneArticle;
    }
    
}
