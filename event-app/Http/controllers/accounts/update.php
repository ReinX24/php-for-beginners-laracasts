<?php

use Core\Authenticator;
use Http\Forms\UpdateAccountForm;

$attributes = [
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "year_program_block" => $_POST["year_program_block"],
    "password" => $_POST["password"]
];

// TODO: validate the information from the form
$form = UpdateAccountForm::validate($attributes);

var_dump($form);
echo "<pre>";
var_dump($_POST);
echo "</pre>";