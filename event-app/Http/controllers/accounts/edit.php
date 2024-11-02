<?php

// use Core\App;
// use Core\Database;

// $db = App::resolve(Database::class);

// $currentUser = $db->query("SELECT * FROM users WHERE id = :id", [
//     "id" => $_GET["id"]
// ])->findOrFail();

// var_dump($currentUser);

view('accounts/edit.view.php', [
    'heading' => 'Edit Account'
]);
