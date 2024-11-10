<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";

$event = $db->query(
    "SELECT * FROM events WHERE id = :event_id",
    [
        'event_id' => $_GET["id"]
    ]
)->findOrFail();

$filteredAttendees = $db->query(
    "SELECT * FROM 
        attendances 
    WHERE 
        event_id = :event_id
    AND
        name
    LIKE 
       :name
    ORDER BY 
        time_in 
    DESC",
    [
        "event_id" => $_GET["id"],
        "name" => "%" . $_GET["search_name"] . "%"
    ]
)->get();

view('events/show.view.php', [
    'heading' => $event['event_name'],
    'event' => $event,
    'attendees' => $filteredAttendees,
    'search_query' => $_GET["search_name"]
]);

// echo "<pre>";
// var_dump($filteredAttendances);
// echo "</pre>";

// $filteredAttendees = $db->query("SELECT * FROM ");