<?php

// TODO: resume @3:01:21

require 'functions.php';

require 'Database.php';

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4'
];

$db = new Database($config);
$posts = $db->query("SELECT * FROM posts")->fetchAll();
$post = $db->query("SELECT * FROM posts WHERE id = 1")->fetch();

// foreach ($posts as $post) {
//     echo "<li>{$post['title']}</li>";
// }

// dd($post["title"]);
dd($posts);

require 'router.php';
