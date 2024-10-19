<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$event = $db->query("SELECT * FROM events WHERE id = :id", [
    "id" => $_GET["id"]
])->findOrFail();

$event["start_time"] = date("H:i", strtotime($event["start_time"]));
$event["end_time"] = date("H:i", strtotime($event["end_time"]));

view('events/edit.view.php', [
    'heading' => 'Edit Event',
    'event' => $event,
]);
