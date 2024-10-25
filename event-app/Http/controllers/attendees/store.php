<?php

// use Core\App;
// use Core\Database;
// use Core\Validator;

// $db = App::resolve(Database::class);

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
    // TODO: return error when event is not found
    // $form->error("event not ")
}   

echo "<pre>";
var_dump($form);
echo "</pre>";
exit;

echo "<pre>";
var_dump($_POST);
echo "</pre>";
