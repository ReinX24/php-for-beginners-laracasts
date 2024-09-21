<?php

// TODO: continue @5:23:08 Namespacing
const BASE_PATH = __DIR__ . "/../"; // points to demo folder

require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    // dd($class);
    require basePath("Core/{$class}.php");
});

// require basePath('Database.php');
// require basePath('Response.php');
require basePath('router.php');
