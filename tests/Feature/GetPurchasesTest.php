<?php

use App\Models\User;

it('returns the users purchases', function () {
    $user = App\Models\User::factory()->create();
    App\Models\Purchase::factory(5)->create([
        'user_id' => $user->id,
    ]);

    $token = $user->createToken('TestToken')->plainTextToken;

    $response = $this->withHeader('Authorization', "Bearer $token")
        ->getJson('purchases');


    $response->assertStatus(200)->assertJsonStructure([
        '*' => [
            'id',
            'amount',
            'purchase_date'
        ]
    ]);
});
