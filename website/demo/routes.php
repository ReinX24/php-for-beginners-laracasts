<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->get('/note/create', 'notes/create.php');
$router->get('/note/edit', 'notes/edit.php');

$router->post('/note', 'notes/store.php');

$router->patch('/note', 'notes/update.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/register', 'registration/create.php')->only('guest'); // goes to register page
$router->post('/register', 'registration/store.php')->only('guest'); // goes to registration controller

$router->get('/login', 'session/create.php')->only('guest'); // go to login page
$router->post('/session', 'session/store.php')->only('guest'); // checking login credentials
$router->delete('/session', 'session/destroy.php')->only('auth'); // logout account
