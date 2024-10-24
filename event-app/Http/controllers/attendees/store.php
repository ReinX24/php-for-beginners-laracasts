<?php

// use Core\App;
// use Core\Database;
// use Core\Validator;

// $db = App::resolve(Database::class);

use Core\Authenticator;
use Http\Forms\AttendeeForm;

// TODO: finish AttendeeForm valiation
$form = AttendeeForm::validate([

]);

echo "<pre>";
var_dump($_POST);
echo "</pre>";
