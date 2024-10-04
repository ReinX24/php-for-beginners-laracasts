<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\RegisterForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegisterForm();

// Validate the form inputs.
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attemptRegister($email, $password)) {
        redirect("/");
    }

    // If the email and password are valid but cannot register account.
    $form->error("email", "That email is already in use!");
}

return view('registration/create.view.php', [
    'email' => $email,
    'errors' => $form->errors(),
]);
