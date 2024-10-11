<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    // Validation issue
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

// If there are no errors, enter data to our database
if (empty($errors)) {
    // Get the current id of our logged in user.
    $currentUserId = $db->query("SELECT id FROM users WHERE email = :email", [
        'email' => $_SESSION["user"]["email"]
    ])->findOrFail();

    $db->query(
        "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)",
        [
            'body' => $_POST['body'],
            'user_id' => $currentUserId['id'],
        ]
    );

    header("Location: /notes");
    exit;
}
