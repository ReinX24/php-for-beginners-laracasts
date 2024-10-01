<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, max: 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
        'email' => $email,
    ]);
}

$db = App::resolve(Database::class);
// Check if the account already exists
$user = $db->query(
    "SELECT * FROM users WHERE email = :email",
    ["email" => $email]
)->find();

// If yes, redirect to login page.
if ($user) {
    // Then someone with that email already exists and has an account.
    // If yes, redirect to a login page.
    header("Location: /");
    exit;
} else {
    // If not, save one to the database, and then log the user in, and redirect.
    $db->query(
        "INSERT INTO users (email, password) VALUES (:email, :password)",
        [
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]
    );

    // Mark that the user has logged in.
    login([
        'email' => $email
    ]);

    header("Location: /");
    exit;
}
