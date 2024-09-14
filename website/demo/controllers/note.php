<?php

$config = require 'config.php';

$db = new Database($config['database']);

$note = $db
    ->query(
        "SELECT * FROM notes WHERE id = :id",
        [':id' => $_GET["id"]]
    )
    ->fetch();

// Not found error if the note does not exist
if (!$note) {
    abort();
}

// Unauthorized access if the note user_id is not the current user
if ($note['user_id'] !== 1) {
    abort(403); // unauthorized status code
}

$heading = "Note #{$note['id']}";

require 'views/note.view.php';
