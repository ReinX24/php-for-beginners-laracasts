<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class AttendeeForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::string($attributes["username"])) {
            $this->errors['username'] = 'Please provide a username.';
        }

        if (!Validator::email($attributes["email"])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes["role"])) {
            $this->errors['role'] = 'Please provide a role.';
        }

        if (!Validator::string($attributes["year_program_block"])) {
            $this->errors['year_program_block'] = 'Please provide a valid year, program, and block.';
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
