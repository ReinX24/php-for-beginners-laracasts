<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$events = $db-> query("SELECT * FROM events")->get();

view('events/index.view.php', [
    'heading' => 'Events',
    'events' => $events
]);