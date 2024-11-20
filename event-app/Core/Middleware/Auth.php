<?php

namespace Core\Middleware;

use Core\Authenticator;

class Auth
{
    public function handle()
    {
        if (!$_SESSION["user"] ?? false) {
            header("Location: /");
            exit;
        }

        if (isset($_SESSION["user"]["session_creation_time"])) {
            echo "TEST";
        }
        // If the user session time is greater than 12 hours, log the user our
        // if ($_SESSION["user"]["session_creation_time"] > 43200) {
        //     echo "TEST";
        //     exit;
        // }

        // TODO: create middleware for when checking if the session is less than 12 hours
        // If the session has lasted more than 12 hours, log out the account.
        // if ($_SESSION["user"]["session_creation_time"] > 43200) {
        //     echo "TEST";
        //     exit;
        // Log the user out.
        // $auth = new Authenticator();
        // $auth->logout();

        // Redirect the user.
        // redirect("/");
        // exit;
        // }
    }
}
