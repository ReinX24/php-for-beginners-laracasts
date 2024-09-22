<?php

// TODO: resume @5:33:15
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
require basePath('Core/router.php');
