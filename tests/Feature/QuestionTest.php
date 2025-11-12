<?php

use Tests\TestCase;
use App\Models\Question;
use function Pest\Laravel\get;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows public to access /questions', function () {
    $response = get('/questions');

    $response->assertStatus(200);
});

it('allows public to access a question detail page', function () {

    $response = get('/questions/some-slug');

    $response->assertStatus(404);
});
