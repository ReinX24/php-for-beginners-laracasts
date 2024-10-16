<?php

use Core\Authenticator;

// Log the user out.
$auth = new Authenticator();
$auth->logout();

// Redirect the user.
redirect("/");
