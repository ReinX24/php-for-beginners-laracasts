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
                    'username' => $user["username"],
                    'email' => $user["email"],
                    'role' => $user["role"],
                    'year_program_block' => $user["year_program_block"]
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
                'username' => $user["username"],
                'email' => $user["email"],
                'role' => $user["role"],
                'year_program_block' => $user["year_program_block"]
            ]);

            return true;
        }
    }

    public function attemptAttend(
        $name,
        $email,
        $role,
        $year_program_block,
        $eventId
    ) {
        $db = App::resolve(Database::class);

        $event = $db->query("SELECT * FROM events WHERE id = :id", [
            "id" => $eventId
        ])->find();

        // If no corresponding event is found
        if (!$event) {
            return false;
        }

        // TODO: change the way attendaces are recorded

        $newAttendance = [
            'event_id' => $event["id"],
            'event_name' => $event["event_name"],
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'year_program_block' => $year_program_block,
            // 'time_in' => date("h:i:sa")
        ];

        /*
        // Check if there are any existing attendees
        if (!empty($event["attendees"])) {
            // If there are already attendees, get data and add new attendee data
            // Data is returned as an associative array
            $existingAttendees = json_decode($event["attendees"], true);

            array_push($existingAttendees, $newAttendee);

            $existingAttendees = json_encode($existingAttendees);

            $db->query(
                "UPDATE events SET attendees = :attendees WHERE id = :id",
                [
                    'attendees' => $existingAttendees,
                    'id' => $eventId
                ]
            );
        } else {
            // Insert first array into attendees
            $firstAttendee = json_encode([
                $newAttendee
            ]);

            $db->query(
                "UPDATE events SET attendees = :attendees WHERE id = :id",
                [
                    'attendees' => $firstAttendee,
                    'id' => $eventId
                ]
            );
        }

        */

        return true;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user["id"],
            'username' => $user["username"],
            'email' => $user["email"],
            'role' => $user["role"],
            'year_program_block' => $user["year_program_block"]
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
