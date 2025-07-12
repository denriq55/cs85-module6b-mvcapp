<?php 
namespace App\Models;

class Event {
//connect to database 
    private $pdo;

    public function __construct() {
        $env = parse_ini_file(__DIR__ . '/../../.env'); //Load .env values
        

        $host = $env['DB_HOST'];
        $db = $env['DB_NAME'];
        $user = $env['DB_USER'];
        $pass = $env['DB_PASS'];

        try {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}

?> 