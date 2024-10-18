<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

// Check if any of the fields are empty.
if (!Validator::string($_POST['event-name'], 10, 50)) {
    $errors['event-name'] = "Event name should have a minimum of 10 characters and a maximum of 50 characters.";
}

if (!Validator::string($_POST['start-time'])) {
    $errors['start-time'] = "Start time should not be empty.";
}

if (!Validator::string($_POST['end-time'])) {
    $errors['end-time'] = "End time should not be empty.";
}

if (!Validator::string($_POST['date'])) {
    $errors['date'] = "Date should not be empty.";
}

if (!Validator::string($_POST['place'])) {
    $errors['place'] = "Place should not be empty.";
}

// If the time is invalid (start time is greater than end time)
if (!Validator::time($_POST['start-time'], $_POST['end-time'])) {
    $errors['invalid-time'] = "Start time should be earlier than end time.";
}

if (!empty($errors)) {
    view('events/create.view.php', [
        'heading' => 'Create Event',
        'errors' => $errors
    ]);
}

// TODO: if there are no errors, add the event to the database
if (empty($errors)) {
    var_dump($_POST);
    // var_dump($_SESSION);
}
