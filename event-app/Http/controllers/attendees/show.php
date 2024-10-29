<?php

// echo "<pre>";
// var_dump($_GET);
// echo "</pre>";

view('attendees/show.view.php', [
    'heading' => $_GET["username"],
]);