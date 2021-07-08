<?php

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendUserNotificationsController;
use App\Http\Controllers\SendGroupNotificationsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    route::post('send/group/{group}/notification', [SendGroupNotificationsController::class, 'store'])->name('send.group.notification');
    route::post('send/user/{user}/notification', [SendUserNotificationsController::class, 'store'])->name('send.user.notification');
});
