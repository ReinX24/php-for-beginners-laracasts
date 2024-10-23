<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$event = $db->query("DELETE FROM events WHERE id = :id", [
    'id' => $_POST["id"]
]);

header("Location: /events");
exit;