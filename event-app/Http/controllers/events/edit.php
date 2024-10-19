<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$event = $db->query("SELECT * FROM events WHERE id = :id", [
    "id" => $_GET["id"]
])->findOrFail();

view('events/edit.view.php', [
    'heading' => 'Edit Event',
    'event' => $event,
]);
