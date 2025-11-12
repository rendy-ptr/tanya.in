<?php

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows public to access the register page', function () {
    $response = get('/register');

    $response->assertStatus(200);
});

it('allow public to submit registration form', function () {
    $response = post('/register', [
        'name' => 'John Doe',
        'email' => 'john@mail.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $response->assertStatus(302);
});
