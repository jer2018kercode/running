<?php
// déclaration de la session
session_start();

require "vendor/autoload.php";
use \J\controllers\Router;

$router = new Router;
$router->app();