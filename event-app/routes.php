<?php

use Pest\Plugins\Only;

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

$router->get('/events', 'events/index.php')->only('auth')->only('admin');
$router->get('/event', 'events/show.php')->only('auth')->only('admin');

$router->get('/event/create', 'events/create.php')->only('auth')->only('admin');
$router->post('/event/create', 'events/store.php')->only('auth')->only('admin');

$router->get('/event/edit', 'events/edit.php')->only('auth')->only('admin');
$router->patch('/event/edit', 'events/update.php')->only('auth')->only('admin');
$router->get('/event/delete', 'events/delete.php')->only('auth')->only('admin');
$router->post('/event/delete', 'events/destroy.php')->only('auth')->only('admin');

$router->get('/event/search_attendees', 'events/search_attendees.php')->only('auth')->only('admin');
$router->get('/event/sort_attendees_year_program_block', 'events/sort_attendees_year_program_block.php')->only('auth')->only('admin');
$router->get('/event/sort_attendees_time', 'events/sort_attendees_time.php')->only('auth')->only('admin');

$router->get('/attendee', 'attendees/show.php')->only('auth')->only('admin');
$router->get('/attendee/add', 'attendees/create.php')->only('auth')->only('admin');
$router->post('/attendee/add', 'attendees/store.php')->only('auth')->only('admin');

$router->delete('/attendee/destroy', 'attendees/destroy.php')->only('auth')->only('admin');

$router->get('/account', 'accounts/index.php')->only('auth');
$router->get('/account/edit', 'accounts/edit.php')->only('auth');
$router->patch('/account/update', 'accounts/update.php')->only('auth');

$router->get('/account/change_password', 'accounts/change_password.php')->only('auth');
$router->patch('/account/update_password', 'accounts/update_password.php')->only('auth');

$router->get('/account/delete', 'accounts/delete.php')->only('auth');
$router->post('/account/destroy', 'accounts/destroy.php')->only('auth');
$router->get('/account/downloadqr', 'accounts/downloadqr.php')->only('auth');

$router->get('/register', 'registration/create.php')->only('guest'); // goes to register page
$router->post('/register', 'registration/store.php')->only('guest'); // goes to registration controller

$router->get('/login', 'session/create.php')->only('guest'); // go to login page
$router->post('/session', 'session/store.php')->only('guest'); // checking login credentials
$router->delete('/session', 'session/destroy.php')->only('auth'); // logout account
