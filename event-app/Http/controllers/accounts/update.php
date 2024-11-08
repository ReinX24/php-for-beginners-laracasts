<?php

use Core\Authenticator;
use Http\Forms\UpdateAccountForm;

$attributes = [
    "userId" => $_SESSION["user"]["id"],
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "year_program_block" => $_POST["year_program_block"],
    "enteredPassword" => $_POST["password"],
    "confirmPassword" => $_POST["confirmPassword"],
    "storedPassword" => $_SESSION["user"]["password"]
];

$form = UpdateAccountForm::validate($attributes);

$accountUpdated = (new Authenticator)->attemptAccountUpdate(
    $attributes["userId"],
    $attributes["username"],
    $attributes["email"],
    $attributes["year_program_block"],
);

// If the user successfully updates or edits their account, log out account
$auth = new Authenticator();
$auth->logout();

// Redirect the user.
redirect("/");
