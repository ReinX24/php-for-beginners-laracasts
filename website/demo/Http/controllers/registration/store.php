<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate(
    $attributes = [
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ]
);

$registeredAccount = (new Authenticator)->attemptRegister(
    $attributes["email"],
    $attributes["password"]
);

if (!$registeredAccount) {
    // TODO: finish when an account is found
    // $form
    //     ->error(
    //         "no_matching_email_account",
    //         "No matching account found for that email address and password."
    //     )
    //     ->throw();
    // redirect("/login");
}

// Validate the form inputs.
// if ((new Authenticator)->attemptRegister($email, $password)) {
//     redirect("/");
// }

// If the email and password are valid but cannot register account.
// return view('registration/create.view.php', [
//     'email' => $email,
//     'errors' => $form->errors(),
// ]);
