<?php

namespace App\Controllers;

use App\Models\Event;

$eventModel = new Event($pdo);


$genres = $eventModel->getGenres();
$locations = $eventModel->getLocations();
$types = $eventModel->getAllTypes();

include __DIR__ . '/../Views/form.php';