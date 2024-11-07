<?php

use Core\Authenticator;
use Http\Forms\UpdateAccountForm;

$attributes = [
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "year_program_block" => $_POST["year_program_block"],
    "enteredPassword" => $_POST["password"],
    "storedPassword" => $_SESSION["user"]["password"]
];

$form = UpdateAccountForm::validate($attributes);

// TODO: create attempt edit function
echo "<pre>";
// var_dump($form);
var_dump($_POST);
// var_dump($_SESSION);
echo "</pre>";
exit;
