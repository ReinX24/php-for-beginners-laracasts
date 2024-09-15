<?php

$config = require 'config.php';

$db = new Database($config['database']);

$note = $db
    ->query(
        "SELECT * FROM notes WHERE id = :id",
        [':id' => $_GET["id"]]
    )
    ->findOrFail();

// Unauthorized access if the note user_id is not the current user
$currentUserId = 1;
if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN); // unauthorized status code
}

$heading = "Note #{$note['id']}";

require 'views/note.view.php';
