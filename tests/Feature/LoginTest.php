<?php

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows public to access the login page', function () {
    $response = get('/login');

    $response->assertStatus(200);
});

it('allow public to submit login form', function () {
    $response = post('/login', [
        'email' => 'john@mail.com',
        'password' => 'password',
    ]);
    $response->assertStatus(302);
});
