<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$events = $db-> query("SELECT * FROM events ORDER BY date DESC")->get();

view('events/index.view.php', [
    'heading' => 'Events',
    'events' => $events
]);