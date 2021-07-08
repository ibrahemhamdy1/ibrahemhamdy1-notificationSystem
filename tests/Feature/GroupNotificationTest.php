<?php

namespace Tests\Feature;

use Tests\TestCase;

class GroupNotificationTest extends TestCase
{
    /**
     * Test the group send notification functionality.
     *
     * @return void
     */
    public function testTheGroupSendNotificationFunctionality()
    {
        $response = $this->post('api/send/group/notification/1', [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(201);
    }

    /**
     * Test the group send notification functionality.
     *
     * @return void
     */
    public function testTheWrongGroupSendNotificationFunctionality()
    {
        $response = $this->post('api/send/group/notification/11111111111111213223', [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(404);
    }
}
