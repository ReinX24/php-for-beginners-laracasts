<?php

use Core\Authenticator;
use Http\Forms\DeleteAttendeeForm;

$attributes = [
    "event_id" => $_POST["event_id"],
    "user_id" => $_POST["user_id"],
    "attendance_id" => $_POST["attendance_id"]
];

$form = DeleteAttendeeForm::validate($attributes);

(new Authenticator)->attemptAttendeeDelete(
    $attributes["event_id"],
    $attributes["user_id"],
    $attributes["attendance_id"]
);

redirect("/event?id=" . $attributes["event_id"]);
