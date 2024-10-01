<?php

use Core\App;
use Core\Database;
use Core\Validator;

// Log in the user if the credentials match.
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

login([
    'email' => $email
]);
