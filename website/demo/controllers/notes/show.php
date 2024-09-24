<?php

use Core\Database;

$config = require basePath('config.php');

$db = new Database($config['database']);

// Unauthorized access if the note user_id is not the current user
$currentUserId = 1;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
} else {
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
}
