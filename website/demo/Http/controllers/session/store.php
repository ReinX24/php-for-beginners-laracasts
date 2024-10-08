<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

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

// Password validation failed.
// Go back to the login page.
Session::flash("old", [
    "email" => $_POST["email"]
]);
Session::flash("errors", $form->errors());

return redirect("/login");

// return view("session/create.view.php", [
//     "email" => $email,
//     "errors" => $form->errors()
// ]);
