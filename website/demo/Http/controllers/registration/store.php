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
    // When an account is found, redirect back to the login page.
    redirect("/login");
}

// If the user successfully registers their account, 
redirect("/");

// Validate the form inputs.
// if ((new Authenticator)->attemptRegister($email, $password)) {
//     redirect("/");
// }

// If the email and password are valid but cannot register account.
// return view('registration/create.view.php', [
//     'email' => $email,
//     'errors' => $form->errors(),
// ]);
