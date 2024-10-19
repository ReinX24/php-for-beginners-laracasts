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
    // If there are errors, return to the edit page
    $event = $db->query("SELECT * FROM events WHERE id = :id", [
        "id" => $_GET["id"]
    ])->findOrFail();

    $event["start_time"] = date("H:i", strtotime($event["start_time"]));
    $event["end_time"] = date("H:i", strtotime($event["end_time"]));

    return view('events/edit.view.php', [
        'heading' => 'Edit Event',
        'event' => $event,
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db->query(
        "UPDATE 
        events 
    SET 
        event_name = :event_name, 
        start_time = :start_time, 
        end_time = :end_time, 
        date = :date, 
        place = :place
    WHERE
        id = :id",
        [
            "event_name" => $_POST["event-name"],
            "start_time" => $_POST["start-time"],
            "end_time" => $_POST["end-time"],
            "date" => $_POST["date"],
            "place" => $_POST["place"],
            "id" => $_POST["id"]
        ]
    );

    header("Location: /events");
    exit;
}
