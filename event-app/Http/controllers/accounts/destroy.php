<?php

use Core\App;
use Core\Database;
use Core\Authenticator;

$db = App::resolve(Database::class);

$db->query("DELETE FROM users WHERE id = :id", [
    'id' => $_SESSION["user"]["id"],
]);

// Log the user out.
$auth = new Authenticator();
$auth->logout();

// Redirect the user.
redirect("/");