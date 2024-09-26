<?php

const BASE_PATH = __DIR__ . "/../"; // points to demo folder

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    // dd($class);
    // Replacing all back slashes to forward slashes (/ for Windows)
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require basePath("{$class}.php");
});

// require basePath('Database.php');
// require basePath('Response.php');
// require basePath('Core/Router.php');

$router = new \Core\Router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_URI"];

$router->route($uri, $method);
