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
                    'email' => $user["email"],
                    'role' => $user["role"]
                ]);

                // If the password is verified, then the user is authenticated.
                return true;
            }
        }

        return false;
    }

    public function attemptRegister($username, $email, $password, $yearProgramBlock)
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
                "INSERT INTO users (username, email, password, year_program_block) VALUES (:username, :email, :password, :year_program_block)",
                [
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'year_program_block' => $yearProgramBlock
                ]
            );

            $user = $db->query("SELECT * FROM users WHERE email = :email", [
                "email" => $email
            ])->findOrFail();

            // Mark that the user has logged in.
            $this->login([
                'id' => $user["id"],
                'email' => $user["email"],
                'year_program_block' => $user["year_program_block"]
            ]);

            return true;
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
