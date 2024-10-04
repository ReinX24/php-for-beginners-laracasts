<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        // Match the credentials
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();

        // If a user is not found (false)
        if ($user) {
            // We have a user, but we don't know if the password provided matches what we have in the database.
            if (password_verify($password, $user["password"])) {
                // Log in the user if the credentials match.
                $this->login([
                    'email' => $email
                ]);

                // If the password is verified, then the user is authenticated.
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = []; // remove all session variables
        session_destroy(); // destroys the session

        $params = session_get_cookie_params();
        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $params["path"],
            $params["domain"],
            $params["secure"]
        );
    }
}
