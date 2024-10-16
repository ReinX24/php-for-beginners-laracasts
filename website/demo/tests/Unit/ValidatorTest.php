<?php

use Core\Validator;

it('validates a string', function () {
    expect(Validator::string("foobar"))->toBeTrue();
    expect(Validator::string(""))->toBeFalse();
});

it('validates a string with a minimum length', function () {
    expect(Validator::string("foobar", 20))->toBeFalse();
});

it('validates an email', function () {
    expect(Validator::email("foobar"))->toBeFalse();
    expect(Validator::email("foobar@example.com"))->toBeTrue();
});

it('it validates that a number is greater than a given amount', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10.1, 1.1))->toBeTrue();

    expect(Validator::greaterThan(1, 10))->toBeFalse();
    expect(Validator::greaterThan(1.1, 10.1))->toBeFalse();
})->only(); // only makes it so that this is the only test that runs
