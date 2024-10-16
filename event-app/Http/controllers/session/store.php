<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// If the validation returns errors.
$form = LoginForm::validate(
    $attributes = [
        "email" => $_POST["email"],
        "password" => $_POST["password"]
    ]
);

// Authenticating the user.
$signedIn = (new Authenticator)->attemptLogin(
    $attributes["email"],
    $attributes["password"]
);

// Checking of the user is authenticated.
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