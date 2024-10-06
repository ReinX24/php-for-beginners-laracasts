<?php

namespace Core;

class Session
{
    public static function has($key) {
        // TODO: resume @9:00:53
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }
}
