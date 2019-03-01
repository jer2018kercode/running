<?php
// session declaration
session_start();

require "vendor/autoload.php";
use \J\controller\Router;

$router = new Router;
$router->app();  