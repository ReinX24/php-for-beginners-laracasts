<?php

declare(strict_types=1);

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        // This is a pure method because it does not use any other dependencies
        // outside this method. An example of this is the method not using the
        // $this keyword.
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
