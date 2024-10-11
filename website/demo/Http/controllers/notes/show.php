<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Unauthorized access if the note user_id is not the current user

// Get the current id of our logged in user.
$currentUserId = $db->query("SELECT id FROM users WHERE email = :email", [
    'email' => $_SESSION["user"]["email"]
])->findOrFail();

$currentUserId = $currentUserId["id"];

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
