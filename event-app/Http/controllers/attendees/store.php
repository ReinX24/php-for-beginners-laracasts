<?php

use Core\Authenticator;
use Http\Forms\AttendeeForm;

$attributes = [
    "event_id" => $_POST["event_id"],
    "user_id" => $_POST["user_id"],
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "role" => $_POST["role"],
    "year_program_block" => $_POST["year_program_block"]
];

$form = AttendeeForm::validate($attributes);

$attendanceTaken = (new Authenticator)->attemptAttend(
    $attributes["user_id"],
    $attributes["username"],
    $attributes["email"],
    $attributes["role"],
    $attributes["year_program_block"],
    $attributes["event_id"]
);

if ($attendanceTaken["user_not_found_error"]) {
    $form->error("user_not_found_error", $attendanceTaken["user_not_found_error"])->throw();
}

if ($attendanceTaken["user_already_attended_error"]) {
    $form->error("user_already_attended_error", $attendanceTaken["user_already_attended_error"])->throw();
}

if ($attendanceTaken["event_not_found_error"]) {
    // This error is thrown when the user edits the event id using inspect.
    $form->error("event_not_found_error", $attendanceTaken["event_not_found_error"])->throw();
}

redirect("/event?id=" . $attributes["event_id"]);

// echo "<pre>";
// var_dump($form);
// echo "</pre>";
// exit;

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
