<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors; // readonly can only be initalized once
    public $old = [];

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

    public function errors() {
        return $this->errors();
    }
}
