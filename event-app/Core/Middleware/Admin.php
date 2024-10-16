<?php

namespace Core\Middleware;

class Admin
{
    public function handle()
    {
        // Checks if the user is not an admin, if not, return to index page.
        if ($_SESSION["user"]["role"] !== "admin") {
            header("Location: /");
            exit;
        }
    }
}
