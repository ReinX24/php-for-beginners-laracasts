<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind(Database::class, function () {
    $config = require basePath('config.php');
    return new Database($config['database']);
});

// Adding our container to our App class
App::setContainer($container);

// Creating a Database object using our container
// $db = $container->resolve('Core\Database');
// $container->resolve('wjioajiodj'); // throws an Exception
