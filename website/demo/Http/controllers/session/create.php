<?php

use Core\Session;

view("session/create.view.php", [
    "email" => Session::get("email") ?? "",
    "errors" => Session::get("errors") ?? "",
]);
