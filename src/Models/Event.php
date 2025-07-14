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
         

        } catch(\PDOException $e) {
            die ("Database connection failed: " . $e->getMessage()); 
        }
    }

    //Get genre matches
    public function getMatchingEvents($genre, $type, $location) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM events 
            WHERE genre = :genre 
            AND type = :type 
            AND location = :location 
            ORDER BY event_date");

        $stmt->execute([
            'genre' => $genre,
            'type' => $type,
            'location' => $location
        ]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC); 
    }

    //Get all genres for dropdown
    public function getAllGenres() {
    $stmt = $this->pdo->query("SELECT DISTINCT genre FROM events ORDER BY genre");
    return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    //Get all types for dropdown
    public function getAllTypes() {
        $stmt = $this->pdo->query("SELECT DISTINCT type FROM events ORDER BY type");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    //Get all location for dropdown
    public function getAllLocations() {
        $stmt = $this->pdo->query("SELECT DISTINCT location FROM events ORDER BY location");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}


?> 