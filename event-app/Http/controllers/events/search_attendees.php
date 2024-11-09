<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

echo "<pre>";
var_dump($_GET);
echo "</pre>";

// $filteredAttendees = $db->query("SELECT * FROM ");