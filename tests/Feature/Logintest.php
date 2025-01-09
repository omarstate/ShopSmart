<?php

it('logs in the user', function () {
    $response = $this->postJson('/login', [
        'email' => 'omar@try.com',
        'password' => 'omar123',
    ]);
    $response->assertStatus(200)
        ->assertJsonStructure([
            'message',
            'token'
        ]);
});
