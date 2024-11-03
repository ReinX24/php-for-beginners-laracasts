<?php

use Core\Authenticator;
use Http\Forms\AttendeeForm;
use Core\Session;
use Hamcrest\Collection\IsEmptyTraversable;

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

var_dump(isset($attendanceTaken["error"]));
exit;

if ($attendanceTaken["error"]["event_not_found"]) {
    // This error is thrown when the user edits the event id using inspect.
    $form->error("event_not_found", "No matching event found.")->throw();
}

redirect("/event?id=" . $attributes["event_id"]);

// echo "<pre>";
// var_dump($form);
// echo "</pre>";
// exit;

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
