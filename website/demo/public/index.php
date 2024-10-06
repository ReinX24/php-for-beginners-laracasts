<?php

session_start();

const BASE_PATH = __DIR__ . "/../"; // points to demo folder

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    // Replacing all back slashes to forward slashes (/ for Windows)
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$class}.php");
});

// Requiring the container which contains singleton classes like our Database
require basePath('bootstrap.php');

$router = new \Core\Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);

// Clearing out any flash session data
unset($_SESSION["_flash"]);
