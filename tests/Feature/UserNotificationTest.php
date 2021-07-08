<?php

namespace Tests\FeatureG;

use Tests\TestCase;
use App\Models\User;

class UserNotificationTest extends TestCase
{
    /**
     * Test the user send notification functionality.
     *
     * @return void
     */
    public function testTheUserSendNotificationFunctionality()
    {
        $user = User::first();
        $response = $this->post("api/v1/send/user/{$user->id}/notification/", [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(201);
    }

    /**
     * Test the user send notification functionality.
     *
     * @return void
     */
    public function testTheWrongUserSendNotificationFunctionality()
    {
        $response = $this->post('api/v1/send/user/11111111111111213223/notification', [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(404);
    }
}
