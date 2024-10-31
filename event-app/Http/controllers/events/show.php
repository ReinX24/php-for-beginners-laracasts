<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$event = $db->query(
    "SELECT * FROM events WHERE id = :id",
    [
        'id' => $_GET["id"]
    ]
)->findOrFail();

$attendees = $db->query(
    "SELECT * FROM attendances 
    WHERE event_id = :event_id ORDER BY time_in DESC",
    [
        'event_id' => $_GET["id"]
    ]
)->get();

// echo "<pre>";
// var_dump($attendees);
// echo "</pre>";

view('events/show.view.php', [
    'heading' => $event['event_name'],
    'event' => $event,
    'attendees' => $attendees
]);
