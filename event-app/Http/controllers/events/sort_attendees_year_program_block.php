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

if ($_GET["year_program_block"] === "default") {
    $filteredAttendees = $db->query(
        "SELECT * FROM attendances 
        WHERE event_id = :event_id",
        [
            'event_id' => $_GET["id"],
        ]
    )->get();
} else {
    $filteredAttendees = $db->query(
        "SELECT * FROM attendances 
        WHERE event_id = :event_id 
        AND year_program_block = :year_program_block",
        [
            'event_id' => $_GET["id"],
            'year_program_block' => $_GET["year_program_block"]
        ]
    )->get();
}

// TODO: add this for each searc query
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
    'selectedYearProgramBlock' => $_GET["year_program_block"]
]);
