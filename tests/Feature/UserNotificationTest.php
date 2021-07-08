<?php

namespace Tests\FeatureG;

use Tests\TestCase;

class UserNotificationTest extends TestCase
{
    /**
     * Test the user send notification functionality.
     *
     * @return void
     */
    public function testTheUserSendNotificationFunctionality()
    {
        $response = $this->post('api/send/user/notification/1', [
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
        $response = $this->post('api/send/user/notification/11111111111111213223', [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(404);
    }
}
