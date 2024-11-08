<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class UpdateAccountForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes["username"])) {
            $this->errors['name'] = 'Please provide a valid name.';
        }

        if (!Validator::email($attributes["email"])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes["enteredPassword"], 7, 255)) {
            $this->errors['enteredPassword'] = 'Please provide a password of at least seven characters.';
        }

        if (!Validator::matchEnteredPasswords($attributes["enteredPassword"], $attributes["confirmPassword"])) {
            $this->errors['confirmPassword'] = 'Passwords are not the same.';
        }

        if (!Validator::matchStoredPassword(
            $attributes["enteredPassword"],
            $attributes["storedPassword"]
        )) {
            $this->errors["incorrectPassword"] = 'Incorrect password, please enter correct password for account.';
        }

        if (!Validator::string($attributes["year_program_block"])) {
            $this->errors["year-program-block"] = 'Please provide a valid year, program, and block.';
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
