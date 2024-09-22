<?php

function routeToController($uri, $routes)
{
    // Checks if the uri exists within the routes
    if (array_key_exists($uri, $routes)) {
        require basePath($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = 404)
{
    // Show an error page and terminate the php script
    http_response_code($code);

    require basePath("views/$code.php");

    die();
}

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);
