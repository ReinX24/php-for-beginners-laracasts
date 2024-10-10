<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

// $email = $_POST['email'];
// $password = $_POST['password'];

// If the validation returns errors.
$form = LoginForm::validate($attributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

// Authenticating the user.
if ((new Authenticator)->attempt($attributes["email"], $attributes["password"])) {
    // If the user is authenticated, go the the index page.
    redirect("/");
}

// If the user is not authenticated, add error messages.
$form->error("no_matching_email_account", "No matching account found for that email address and password.");

return redirect("/login");

// return view("session/create.view.php", [
//     "email" => $email,
//     "errors" => $form->errors()
// ]);
