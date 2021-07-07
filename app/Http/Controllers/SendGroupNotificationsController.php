<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Validator;

class SendGroupNotificationsController extends Controller
{
    /**
     * Store a newly created admin in storage.
     *
     * @param  \Illuminate\Support\Facades\Request  $request
     * @param  int  $group
     *
     * @return \Illuminate\Http\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function store(Request $request, $group)
    {
        $group = Group::find($group);

        if (is_null($group)) {
            return response()->json([
                'error' => '404 not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'content' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        // This line of code to send the notification to the real users
        $group->users->each->notify(new UserNotification($request->content, config('app.send_notifications_via')));

        return response(['message' => 'The Notification was send successfully'], 201);
    }
}
