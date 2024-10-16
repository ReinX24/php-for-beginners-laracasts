<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['event-name'], 10, 50)) {
    $errors['event-name'] = "Event name should have a minimum of 10 characters and a maximum of 50 characters.";
}

if (!empty($errors)) {
    view('events/create.view.php', [
        'heading' => 'Create Event',
        'errors' => $errors
    ]);
}

// TODO: if there are no errors, add the event to the database