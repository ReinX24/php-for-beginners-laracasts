<?php

$routes = require('routes.php');

function routeToController($uri, $routes)
{
    // Checks if the current uri exists within routes
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}
function abort($code = 404)
{
    http_response_code($code); // throws a 404 error status

    require "views/$code.php";

    die();
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path']; // Gets the path of the uri
routeToController($uri, $routes);
