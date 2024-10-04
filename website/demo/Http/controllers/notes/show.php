<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Unauthorized access if the note user_id is not the current user
$currentUserId = 1;

$note = $db
    ->query(
        "SELECT * FROM notes WHERE id = :id",
        [':id' => $_GET["id"]]
    )
    ->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => "Note #{$note['id']}",
    'note' => $note,
]);
