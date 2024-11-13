<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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

$yearProgramBlockChoices = $db->query(
    "SELECT DISTINCT year_program_block 
    FROM attendances WHERE event_id = :event_id",
    [
        'event_id' => $_GET["id"]
    ]
)->get();

view('events/show.view.php', [
    'heading' => $event['event_name'],
    'event' => $event,
    'attendees' => $filteredAttendees,
    'yearProgramBlockChoices' => $yearProgramBlockChoices,
    'search_query' => $_GET["search_name"]
]);
