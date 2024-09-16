<?php

$config = require 'config.php';

$db = new Database($config['database']);

$heading = 'Create Note';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db->query("");
}

require 'views/note-create.view.php';
