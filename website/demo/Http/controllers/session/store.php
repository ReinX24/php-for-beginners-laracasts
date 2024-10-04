<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// If the validation returns errors.
if ($form->validate($email, $password)) {
    // Authenticating the user.
    if ((new Authenticator)->attempt($email, $password)) {
        // If the user is authenticated, go the the index page.
        redirect("/");
    }

    // If the user is not authenticated, add error messages.
    $form->error("email", "No matching account found for that email address and password.");
}

// Password validation failed.
// Go back to the login page.
return view("session/create.view.php", [
    "email" => $email,
    "errors" => $form->errors()
]);
