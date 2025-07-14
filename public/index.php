<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Models\Event;
use App\Controllers\EventController;

$event = new Event();

$genres = $event->getAllGenres();
$locations = $event->getAllLocations();
$types = $event->getAllTypes();

$matches = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new EventController();
    $matches = $controller->getFormData();
    
    
}
include __DIR__ . '/../views/form.php';