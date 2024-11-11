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

if ($_GET["sort_select"] === "descending") {
    $filteredAttendees = $db->query(
        "SELECT * FROM attendances 
    WHERE event_id = :event_id ORDER BY time_in DESC",
        [
            'event_id' => $_GET["id"]
        ]
    )->get();
} else {
    $filteredAttendees = $db->query(
        "SELECT * FROM attendances 
    WHERE event_id = :event_id ORDER BY time_in ASC",
        [
            'event_id' => $_GET["id"]
        ]
    )->get();
}

view('events/show.view.php', [
    'heading' => $event['event_name'],
    'event' => $event,
    'attendees' => $filteredAttendees,
    'sort_select' => $_GET["sort_select"]
]);
