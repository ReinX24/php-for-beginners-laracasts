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

if (count($errors)) {
    view('events/create.view.php', [
        'heading' => 'Create Event',
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db->query("
            INSERT INTO 
                events (event_name, start_time, end_time, date, place)
            VALUES
                (:event_name, :start_time, :end_time, :date, :place)
            ", [
        "event_name" => $_POST["event-name"],
        "start_time" => $_POST["start-time"],
        "end_time" => $_POST["end-time"],
        "date" => $_POST["date"],
        "place" => $_POST["place"]
    ]);

    header("Location: /events");
    exit;
}
