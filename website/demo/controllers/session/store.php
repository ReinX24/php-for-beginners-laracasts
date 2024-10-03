<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

// If there are any errors, return to the login form
if (!empty($errors)) {
    return view("session/create.view.php", [
        "email" => $email,
        "errors" => $errors
    ]);
}

// Match the credentials
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    "email" => $email
])->find();

// If a user is not found (false)
if ($user) {
    // We have a user, but we don't know if the password provided matches what we have in the database.
    if (password_verify($password, $user["password"])) {
        // Log in the user if the credentials match.
        login([
            'email' => $email
        ]);

        header("Location: /");
        exit;
    }
}

// Password validation failed.
return view("session/create.view.php", [
    "email" => $email,
    "errors" => [
        "password" => "No matching account found for that email address and password.",
    ]
]);
