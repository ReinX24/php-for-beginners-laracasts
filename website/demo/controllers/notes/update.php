<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// TODO: continue @6:52:30
$currentUserId = 1;

// Find the corresponding note
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $_POST['id']
])->findOrFail();

// Authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// Validate the form
$errors = [];

if (!Validator::string($_POST['body'], 1, 10)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// If no validation errors, update the record in the notes database table
$db->query(
    "UPDATE notes SET body = :body WHERE id = :id",
    [
        'body' => $_POST['body'],
        'id' => $_POST['id']
    ]
);

// Redirect the user
header("Location: /notes");
exit;
