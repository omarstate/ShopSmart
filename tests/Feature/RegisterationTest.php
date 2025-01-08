<?php

it('can register a user', function () {
    $response = $this->postJson('/register', [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(201)
        ->assertJsonStructure([
            'message',
            'user' => [
                'id',
                'name',
                'email',
            ],
        ]);
});

