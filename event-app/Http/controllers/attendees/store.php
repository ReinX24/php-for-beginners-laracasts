<?php

use Core\Authenticator;
use Http\Forms\AttendeeForm;

$attributes = [
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "role" => $_POST["role"],
    "year_program_block" => $_POST["year_program_block"]
];

$eventId = $_POST["id"];

$form = AttendeeForm::validate($attributes);

$attendanceTaken = (new Authenticator)->attemptAttend(
    $attributes["username"],
    $attributes["email"],
    $attributes["role"],
    $attributes["year_program_block"],
    $eventId
);

if (!$attendanceTaken) {
    // This error is thrown when the user edits the event id using inspect.
    $form->error("event_not_found", "No matching event found.")->throw();
}

redirect("/event?id=" . $eventId);

// echo "<pre>";
// var_dump($form);
// echo "</pre>";
// exit;

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
