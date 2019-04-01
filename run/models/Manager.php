<?php
namespace J\models;
use \PDO;

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO( 'mysql:host=localhost;dbname=gretaxao_jeromevasseur;charset=utf8',
        'gretaxao_jeromevasseur', 'Jerome2019',
        array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );
        
        return $db;
    }
}
    