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
        ])->find();

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
                    'year_program_block' => $user["year_program_block"],
                    'password' => $user["password"]
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
        $userId,
        $name,
        $email,
        $role,
        $year_program_block,
        $eventId
    ) {
        $db = App::resolve(Database::class);

        // Checking if the user in the qr code exists
        $existingUser = $db->query("SELECT * FROM users WHERE id = :id", [
            "id" => $userId
        ])->find();

        // If the user does not exist, return to the page with errors
        if (!$existingUser) {
            return ["user_not_found_error" => "User not found."];
        }

        // Getting existing attendee information, for avoiding duplicated
        $attendee = $db->query(
            "SELECT * FROM attendances WHERE user_id = :user_id AND event_id = :event_id",
            [
                "user_id" => $userId,
                "event_id" => $eventId
            ]
        )->find();

        // If the user has already been recorded to have attended the event
        if ($attendee) {
            return ["user_already_attended_error" => "User already attended event."];
        }

        // Getting the event by their id, for checking if the event exists
        // This is for checking if the user changes the event_id in the hidden
        // input element in the page
        $event = $db->query("SELECT * FROM events WHERE id = :id", [
            "id" => $eventId
        ])->find();

        // If no corresponding event is found
        if (!$event) {
            return ["event_not_found_error" => "Event not found."];
        }

        $newAttendance = [
            'event_id' => $event["id"],
            'event_name' => $event["event_name"],
            'user_id' => $userId,
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'year_program_block' => $year_program_block,
        ];

        $db->query(
            "INSERT INTO attendances 
                        (event_id, event_name, user_id, name, email, role, year_program_block, time_in)
                    VALUES
                        (:event_id, :event_name, :user_id, :name, :email, :role, :year_program_block, NOW())",
            [
                'event_id' => $newAttendance["event_id"],
                'event_name' => $newAttendance["event_name"],
                'user_id' => $newAttendance["user_id"],
                'name' => $newAttendance["name"],
                'email' => $newAttendance["email"],
                'role' => $newAttendance["role"],
                'year_program_block' => $newAttendance["year_program_block"],
            ]
        );

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

    public function attemptAccountUpdate(
        $userId,
        $username,
        $email,
        $year_program_block,
    ) {
        $db = App::resolve(Database::class);

        $db->query(
            "UPDATE 
                users 
            SET 
                username = :username, 
                email = :email, 
                year_program_block = :year_program_block 
            WHERE 
                id = :id",
            [
                "username" => $username,
                "email" => $email,
                "year_program_block" => $year_program_block,
                "id" => $userId
            ]
        );

        return true;
    }

    public function attemptAttendeeDelete($eventId, $userId, $attendanceId)
    {
        $db = App::resolve(Database::class);

        // Delete attendance from the database using event_id and user_id
        $db->query(
            "DELETE FROM 
                attendances 
            WHERE 
                event_id = :event_id
            AND 
                user_id = :user_id
            AND
                id = :attendance_id",
            [
                "user_id" => $userId,
                "event_id" => $eventId,
                "attendance_id" => $attendanceId
            ]
        );

        return true;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user["id"],
            'username' => $user["username"],
            'email' => $user["email"],
            'role' => $user["role"],
            'year_program_block' => $user["year_program_block"],
            'password' => $user["password"]
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}
