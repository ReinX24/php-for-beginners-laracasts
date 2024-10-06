<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

var_dump("I have been POSTED");

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
$_SESSION["_flash"]["email"] = $email;
$_SESSION["_flash"]["errors"] = $form->errors();

return redirect("/login");

// return view("session/create.view.php", [
//     "email" => $email,
//     "errors" => $form->errors()
// ]);
