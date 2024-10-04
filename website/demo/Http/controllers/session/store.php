<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// If the validation returns errors.
if (!$form->validate($email, $password)) {
    return view("session/create.view.php", [
        "email" => $email,
        "errors" => $form->errors()
    ]);
}

$auth = new Authenticator();

// Authenticating the user.
if ($auth->attempt($email, $password)) {
    // If the user is authenticated, go the the index page.
    redirect("/");
}

// Password validation failed.
// Go back to the login page.
return view("session/create.view.php", [
    "email" => $email,
    "errors" => [
        "password" => "No matching account found for that email address and password.",
    ]
]);
