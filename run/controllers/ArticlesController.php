<?php
namespace J\controllers;

use \Exception;
use \J\models\ArticlesManager;

// gestion des articles santé
class ArticlesController
{
    // déclaration d'un paramètre privé
    private $articlesManager;

    // constructeur
    public function __construct()
    {
        // association du paramètre privé avec la classe du modèle
        $this->articlesManager = new ArticlesManager();
    }

    // pour voir tous les articles
    public function showArticles()
    {
        $articlesView = $this->articlesManager->showArticles();

        require 'views/health/health.php';
    }

    // pour voir un seul article
    public function showArticle( $id_article )
    {
        $articleView = $this->articlesManager->showArticle( $id_article );

        require 'views/health/oneArticle.php';
    }

    // pour créer un nouvel article (administrateur)
    public function newArticle( $title, $description, $date, $id_member )
    {
        $publishArticle = $this->articlesManager->newArticle( $title, $description, $date, $id_member );

        header( 'Location: index.php?action=showHealth' );
    }

    // pour accéder au formulaire d'update d'article (administrateur)
    public function changeArticleForm( $id_article )
    {
        $initializeArticle = $this->articlesManager->showArticle( $id_article );

        require 'views/health/updateArticleForm.php';
    }

    // pour modifier un article (administrateur)
    public function updateArticle( $title, $description, $date, $id_article )
    {
        $changeArticle = $this->articlesManager->updateArticle( $title, $description, $date, $id_article );

        header( 'Location: index.php?action=showArticle&id_article=' . $id_article );
    }

    // pour supprimer un article (administrateur)
    public function cancelArticle( $id_article )
    {
        $cancel = $this->articlesManager->cancelArticle( $id_article );

        header( 'Location: index.php?action=showHealth' );
    }
} 
