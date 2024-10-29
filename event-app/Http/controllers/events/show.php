<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$event = $db->query("SELECT * FROM events WHERE id = :id", [
    'id' => $_GET["id"]
])->findOrFail();

$attendees = json_decode($event["attendees"], true);

// echo "<pre>";
// var_dump($attendees);
// echo "</pre>";

view('events/show.view.php', [
    'heading' => $event['event_name'],
    'event' => $event,
    'attendees' => $attendees
]);
