<?php

use Core\Authenticator;
use Http\Forms\UpdatePasswordForm;

$attributes = [
    'password' => $_POST["password"],
    'reenter_password' => $_POST["reenter_password"],
    'new_password' => $_POST['new_password'],
    'reenter_new_password' => $_POST['reenter_new_password'],
    'stored_password' => $_SESSION['user']['password']
];

$form = UpdatePasswordForm::validate($attributes);

$passwordUpdated = (new Authenticator)->attemptPasswordUpdate(
    $_POST["new_password"],
    $_SESSION["user"]["id"]
);

// If the user successfully updates or edits their account, log out account
$auth = new Authenticator();
$auth->logout();

// Redirect the user.
redirect("/");
