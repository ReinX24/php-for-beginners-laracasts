<?php

namespace Core;

class Authenticator
{
    public function attemptLogin($email, $password)
    {
        // Match the credentials
        $db = App::resolve(Database::class);
        $user = $db->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->findOrFail();

        // If a user is not found (false)
        if ($user) {
            // We have a user, but we don't know if the password provided matches what we have in the database.
            if (password_verify($password, $user["password"])) {
                // Log in the user if the credentials match.
                $this->login([
                    'id' => $user["id"],
                    'email' => $user["email"]
                ]);

                // If the password is verified, then the user is authenticated.
                return true;
            }
        }

        return false;
    }

    public function attemptRegister($email, $password)
    {
        $db = App::resolve(Database::class);
        // Check if the account already exists
        $user = $db->query(
            "SELECT * FROM users WHERE email = :email",
            ["email" => $email]
        )->find();

        // If yes, redirect to login page.
        if ($user) {
            // Then someone with that email already exists and has an account.
            // Return false which will return to the register page with error.
            return false;
        } else {
            // If not, save one to the database, and then log the user in, and redirect.
            $db->query(
                "INSERT INTO users (email, password) VALUES (:email, :password)",
                [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]
            );

            $user = $db->query("SELECT * FROM users WHERE email = :email", [
                "email" => $email
            ])->findOrFail();

            // Mark that the user has logged in.
            $this->login([
                'id' => $user["id"],
                'email' => $email
            ]);

            return true;
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
