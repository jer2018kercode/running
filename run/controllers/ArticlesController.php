<?php
namespace J\controllers;

use \Exception;
use \J\models\ArticlesManager;

class ArticlesController
{
    // déclaration des paramètres privés
    private $articlesManager;

    // constructeur
    public function __construct()
    {
        // association des paramètres privés avec les classes
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

    // pour créer un nouvel article (admin)
    public function newArticle( $title, $description, $date, $id )
    {
        $publishArticle = $this->articlesManager->newArticle( $title, $description, $date, $id );

        require 'views/health/newHealth.php';
    }

    // pour accéder au formulaire d'update d'article (admin)
    public function changeArticleForm( $id_article )
    {
        $initializeArticle = $this->articlesManager->showArticle( $id_article );

        require 'views/health/updateArticleForm.php';
    }

    // pour modifier un article (admin)
    public function updateArticle( $title, $description, $date, $id_article )
    {
        $changeArticle = $this->articlesManager->updateArticle( $title, $description, $date, $id_article );

        header( 'Location: index.php?action=showArticle&id_article=' . $id_article );
    }

    // pour supprimer un article (admin)
    public function cancelArticle( $id_article )
    {
        $cancel = $this->articlesManager->cancelArticle( $id_article );

        header( 'Location: index.php?action=showArticle&id_article=' . $id_article );
    }
} 
