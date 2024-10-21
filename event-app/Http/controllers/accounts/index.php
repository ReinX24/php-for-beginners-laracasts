<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

view('accounts/index.view.php', [
    'heading' => 'Account',
]);