<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Models\Event;
use App\views\form;
use App\Controllers\EventController;

$event = new Event();

$genres = $event->getAllGenres();
$locations = $event->getAllLocations();
$types = $event->getAllTypes();

include __DIR__ . '/../views/form.php';