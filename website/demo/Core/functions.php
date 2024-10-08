<?php

use Core\Response;

function dd($value)
{
    // Dumps information about passed in value and terminates script.
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die(); // terminates the php script
}

function urlIs($value)
{
    // Checks if the current page URI is the same with the passed in value.
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require basePath("views/$code.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    // If the condition is false / unauthorized
    if (!$condition) {
        abort($status); // unauthorized access code
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    // Makes key values into variables and values
    extract($attributes);

    require basePath('views/' . $path);
}

function redirect($path)
{
    header("Location: {$path}");
    exit;
}

function old($key, $default = "")
{
    return Core\Session::get("old")[$key] ?? $default;
}
