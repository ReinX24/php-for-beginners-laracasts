<?php

use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/../"; // points to demo folder

require BASE_PATH . "/vendor/autoload.php";

date_default_timezone_set("Asia/Manila"); // setting time zone

session_start();

require BASE_PATH . 'Core/functions.php';

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
