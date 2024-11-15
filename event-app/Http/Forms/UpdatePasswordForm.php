<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class UpdatePasswordForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // Checking if the entered passwords are the same.
        if (!Validator::matchEnteredPasswords(
            $attributes["password"],
            $attributes["reenter_password"]
        )) {
            $this->errors['passwords_mismatch_error'] = 'Entered passwords are not the same.';
        }

        // Checking if the entered password is the same as the stored password.
        // if (!Validator::matchStoredPassword($attributes["password"], )) {

        // }

        // Checking if the entered new passwords are the same.
        if (!Validator::matchEnteredPasswords(
            $attributes["new_password"],
            $attributes["reenter_new_password"]
        )) {
            $this->errors['new_passwords_mismatch_error'] = 'New passwords are not the same.';
        }

        // if (!Validator::string($attributes["enteredPassword"], 7, 255)) {
        //     $this->errors['enteredPassword'] = 'Please provide a password of at least seven characters.';
        // }

        // if (!Validator::matchEnteredPasswords($attributes["enteredPassword"], $attributes["confirmPassword"])) {
        //     $this->errors['confirmPassword'] = 'Passwords are not the same.';
        // }

        // if (!Validator::matchStoredPassword(
        //     $attributes["enteredPassword"],
        //     $attributes["storedPassword"]
        // )) {
        //     $this->errors["incorrectPassword"] = 'Incorrect password, please enter correct password for account.';
        // }

        // if (!Validator::string($attributes["year_program_block"])) {
        //     $this->errors["year-program-block"] = 'Please provide a valid year, program, and block.';
        // }
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
