<?php

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows public to access the category page', function () {
    $response = get('/categories');

    $response->assertStatus(200);
});


