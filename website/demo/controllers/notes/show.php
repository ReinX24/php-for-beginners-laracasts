<?php

use Core\Database;

$config = require basePath('config.php');

$db = new Database($config['database']);

$note = $db
    ->query(
        "SELECT * FROM notes WHERE id = :id",
        [':id' => $_GET["id"]]
    )
    ->findOrFail();

// Unauthorized access if the note user_id is not the current user
$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => "Note #{$note['id']}",
    'note' => $note,
]);