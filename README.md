I chose to create an EDM event discovery app based on personal experience. Whenever I traveled to a new place and wanted to find EDM events, 
I'd search all over the internet, messaging different venues, artists, etc. I actually thought about starting a web app for it, 
because even though EDM is so huge, there isn’t really one place where you can go and easily look for events. Existing discovery apps are geared
towards more mainstream music.

The app connects to a database I created, and users can use the search filters to look for events based on location, genre, or type.
The hardest part was figuring out how to connect to the database using MVC, since the reading only gave basic examples. 
I also struggled a bit with understanding which code should go in the controller,the index.php file, and form.php. 
That took some trial and error, but I eventually figured it out. I also learned how to use an .env file for the first time.

 AI-GENERATED CRITIQUE
PROMPT 
I've created an EDM event discovery app that connects to a database I created. 
Users can use the filter to search for different events based on genre, location, or venue type. 
Create a method that grabs the row values from the database so that I can use them as the option values in my form.


Generated Code:  
PHP  <?php
// Connect to your database
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_db_user';
$pass = 'your_db_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Which column are we getting options for?
    $column = $_GET['column'];

    // Sanitize allowed columns
    $allowedColumns = ['genre', 'location', 'venue_type'];
    if (!in_array($column, $allowedColumns)) {
        throw new Exception("Invalid column");
    }

    // Get distinct values from the given column
    $stmt = $pdo->prepare("SELECT DISTINCT $column FROM events ORDER BY $column ASC");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($results);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>

 JavaScript:  
<?php
// Connect to your database
$host = 'localhost';
$db   = 'your_database_name';
$user = 'your_db_user';
$pass = 'your_db_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Which column are we getting options for?
    $column = $_GET['column'];

    // Sanitize allowed columns
    $allowedColumns = ['genre', 'location', 'venue_type'];
    if (!in_array($column, $allowedColumns)) {
        throw new Exception("Invalid column");
    }

    // Get distinct values from the given column
    $stmt = $pdo->prepare("SELECT DISTINCT $column FROM events ORDER BY $column ASC");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($results);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>  
Critique:  
While the idea makes sense, I would say it doesn’t fit my setup. 
It created a single method to get genres, locations, and venue types while I have 3 which I think is more organized. 
This example also assumes I'm using JavaScript, which I’m not, so I wouldn’t be able to use it.
