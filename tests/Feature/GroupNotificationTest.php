<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Group;

class GroupNotificationTest extends TestCase
{
    /**
     * Test the group send notification functionality.
     *
     * @return void
     */
    public function testTheGroupSendNotificationFunctionality()
    {
        $group = Group::first();
        $response = $this->post("api/v1/send/group/{$group->id}/notification", [
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
        $response = $this->post('api/v1/send/group/11111111111111213223/notification', [
            'content' => 'Php new message',
        ]);

        $response->assertStatus(404);
    }
}
