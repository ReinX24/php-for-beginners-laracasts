<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\Validator;

class RegisterForm
{
    protected $errors = [];

    public function validate($email, $password): bool
    {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least seven characters.';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
