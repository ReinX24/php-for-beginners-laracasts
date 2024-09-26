<?php

namespace Core;

use RuntimeException;

class Router
{
    protected $routes = [];

    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }

    public function patch($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH'
        ];
    }

    public function put($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT'
        ];
    }

    public function route($uri, $method)
    {
        // TODO: resume @6:02:47
        var_dump($uri, $method);
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require basePath($route['controller']);
            }
        }

        // abort, no matching uri is found
        $this->abort();
    }

    protected function abort($code = 404)
    {
        // Show an error page and terminate the php script
        http_response_code($code);

        require basePath("views/$code.php");

        die();
    }
}

// function routeToController($uri, $routes)
// {
//     // Checks if the uri exists within the routes
//     if (array_key_exists($uri, $routes)) {
//         require basePath($routes[$uri]);
//     } else {
//         abort();
//     }
// }

// function abort($code = 404)
// {
//     // Show an error page and terminate the php script
//     http_response_code($code);

//     require basePath("views/$code.php");

//     die();
// }
