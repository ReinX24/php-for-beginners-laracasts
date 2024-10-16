<?php

use Core\Authenticator;
use Core\Session;

// Start session for testing
session_start();

it('user login data saved', function () {
    $user = [
        'id' => 1,
        'email' => 'foobar@example.com'
    ];

    (new Authenticator)->login($user);

    // Testing expected results
    expect($_SESSION['user']['id'])->toBe(1);
    expect($_SESSION['user']['email'])->toBe('foobar@example.com');
});

it('user login data destroyed', function () {
    // Logging out the user
    (new Authenticator)->logout();
    expect($_SESSION)->toBeEmpty();
});
