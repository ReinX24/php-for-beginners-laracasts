<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../"; // points to demo folder

// TODO: continue @10:03:19
require BASE_PATH . "/vendor/autoload.php";

session_start();

require BASE_PATH . 'Core/functions.php';

/*
spl_autoload_register(function ($class) {
    // Replacing all back slashes to forward slashes (/ for Windows)
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$class}.php");
});
*/

// Requiring the container which contains singleton classes like our Database
require basePath('bootstrap.php');

$router = new \Core\Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash("old", $exception->old);
    Session::flash("errors", $exception->errors);

    return redirect($router->previousUrl());
}

// Clearing out any flash session data.
Session::unflash();
