<?php

view("session/create.view.php", [
    "email" => $_SESSION["_flash"]["email"] ?? "",
    "errors" => $_SESSION["_flash"]["errors"] ?? [],
]);
