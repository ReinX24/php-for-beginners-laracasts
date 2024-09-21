<?php

require basePath('Validator.php');

$config = require basePath('config.php');

$db = new Database($config['database']);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is required.';
    }

    // If there are no errors, enter data to our database
    if (empty($errors)) {
        $db->query(
            "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)",
            [
                'body' => $_POST['body'],
                'user_id' => 1,
            ]
        );
    }
}

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
]);
