<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $db->query("SELECT id FROM users WHERE email = :email", [
    'email' => $_SESSION["user"]["email"]
])->findOrFail();

$notes = $db
    ->query("SELECT * FROM notes WHERE user_id = :user_id", ['user_id' => $currentUserId["id"]])
    ->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
