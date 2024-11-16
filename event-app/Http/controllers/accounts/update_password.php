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

// TODO: attempt update password authenticator

// TODO: finish change password functionality
dd($attributes);
