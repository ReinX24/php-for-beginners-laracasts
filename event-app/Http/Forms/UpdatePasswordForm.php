<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class UpdatePasswordForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // Checking if any of the passwords are not at least 7 characters.
        if (!Validator::string($attributes["password"], 7, 255)) {
            $this->errors['password_too_short_error'] = 'Please provide a password of at least sever characters, this applies to all passwords.';
        }

        if (!Validator::string($attributes["reenter_password"], 7, 255)) {
            $this->errors['password_too_short_error'] = 'Please provide a password of at least sever characters, this applies to all passwords.';
        }

        if (!Validator::string($attributes["new_password"], 7, 255)) {
            $this->errors['password_too_short_error'] = 'Please provide a password of at least sever characters, this applies to all passwords.';
        }

        if (!Validator::string($attributes["reenter_new_password"], 7, 255)) {
            $this->errors['password_too_short_error'] = 'Please provide a password of at least sever characters, this applies to all passwords.';
        }

        // Checking if the entered passwords are the same.
        if (!Validator::matchEnteredPasswords(
            $attributes["password"],
            $attributes["reenter_password"]
        )) {
            $this->errors['passwords_mismatch_error'] = 'Entered passwords are not the same.';
        }

        // Checking if the entered password is the same as the stored password.
        if (!Validator::matchStoredPassword(
            $attributes["password"],
            $attributes["stored_password"]
        )) {
            $this->errors['incorrect_password_error'] = 'Incorrect password.';
        }

        // Checking if the entered new passwords are the same.
        if (!Validator::matchEnteredPasswords(
            $attributes["new_password"],
            $attributes["reenter_new_password"]
        )) {
            $this->errors['new_passwords_mismatch_error'] = 'New passwords are not the same.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors());
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
