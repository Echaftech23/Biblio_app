<?php

namespace App\DataBase;

use PDO, PDOException, Exception;

require __DIR__ . '/../../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Connection
{
    public static function dbConnect()
    {
        try {
            $connexion = new PDO('mysql:host=' . $_ENV["DB_SERVERNAME"] . ';dbname=' . $_ENV["DB_NAME"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"]);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }

        return $connexion;
    }
}
