<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Unauthorized access if the note user_id is not the current user
$currentUserId = 1;

$note = $db
    ->query(
        "SELECT * FROM notes WHERE id = :id",
        [':id' => $_POST["id"]]
    )
    ->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query(
    "DELETE FROM notes WHERE id = :id",
    [":id" => $_POST["id"]]
);

header("Location: /notes");
exit;
