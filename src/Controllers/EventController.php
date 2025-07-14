<?php

namespace App\Controllers;

use App\Models\Event;

class EventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new Event();
    }

    //Get form data
    public function getFormData() {
        $genre = trim($_POST['genre'] ?? '');
        $type = trim($_POST['type'] ?? '');
        $location = trim($_POST['location'] ?? '');
    
    //Get matching events
    $matches = $this->eventModel->getMatchingEvents($genre, $type, $location);

    return $matches;

    }

}

