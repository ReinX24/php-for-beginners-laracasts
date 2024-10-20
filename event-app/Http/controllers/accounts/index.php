<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";