<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate(
    $attributes = [
        "username" => $_POST["username"],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "year_program_block" => $_POST["year-program-block"]
    ]
);

$registeredAccount = (new Authenticator)->attemptRegister(
    $attributes["username"],
    $attributes["email"],
    $attributes["password"],
    $attributes["year_program_block"]
);

if (!$registeredAccount) {
    // When an account is found, redirect back to the login page.
    redirect("/login");
}

// If the user successfully registers their account, 
redirect("/");
