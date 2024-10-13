<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// $email = $_POST['email'];
// $password = $_POST['password'];

// If the validation returns errors.
$form = LoginForm::validate(
    $attributes = [
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    ]
);

$signedIn = (new Authenticator)->attemptLogin(
    $attributes["email"],
    $attributes["password"]
);

// Authenticating the user.
if (!$signedIn) {
    // If the user is not authenticated, add error messages.
    $form
        ->error(
            "no_matching_email_account",
            "No matching account found for that email address and password."
        )
        ->throw();
}

// If the user is authenticated, go the the index page.
redirect("/");