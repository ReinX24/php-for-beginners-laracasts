<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        // If there is no entered key, terminate script
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? null;

        // If no matching middleware is found, throw an exception
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}
