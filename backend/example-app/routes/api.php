<?php

use App\Events\MessageSent;
use App\Events\WebsocketDemo;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\PlaygroundMembersController;
use App\Http\Controllers\PrivateChatController;
use App\Http\Controllers\PrivateMessageController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\TownController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendRequestController;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\playground;
use App\Models\Town;
use App\Models\userType;

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
//SAMPLES
// route::get('/playgrounds', [PlaygroundController::class, 'index']);
// route::post('/playgrounds', [PlaygroundController::class, 'store']);
// route::get('/playground/{id}', [PlaygroundController::class, 'show']);
//route::resource('playgrounds', PlaygroundController::class);

//public routes
route::post('/register', [AuthController::class, 'register']);
route::get('/somedata', function(){
    broadcast(new WebsocketDemo('hello world'));
    return response('ok',206);
});

//sending message 
Route::post('new-message', function (Request $request) {
    
    event(new MessageSent($request->user, $request->message));
    return response($request,206);
    });
    
//login
Route::post('/login', 'App\Http\Controllers\AuthController@login');

//in progress:

//protected routes
Route::group(['middleware' => ['auth:api']], function () {
        route::apiResource('playgrounds', PlaygroundController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('private_chats', PrivateChatController::class)->only(['index','store','destroy']);
        route::apiResource('user_type', UserTypeController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('channels', ChannelController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('status', StatusController::class)->only(['index','show','update']);
        route::apiResource('relationship', RelationshipController::class)->only(['index','show','store','update']);
        route::apiResource('language', LanguageController::class)->only(['index','show','store']);
        route::apiResource('theme', ThemeController::class)->only(['index','show']);
        route::apiResource('country', CountryController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('gender', GenderController::class)->only(['index','show','store','destroy']);
        route::apiResource('user', UserController::class)->only(['index','show','update','destroy']);
        route::apiResource('participants', ParticipantsController::class)->only(['index','show']);
        Route::get('/logout', [AuthController::class, 'logout']);
        route::apiResource('messages', MessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('towns', TownController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('private_messages', PrivateMessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('playground_members', PlaygroundMembersController::class)->only(['index','show','store','destroy']);
        route::apiResource('friend_request', FriendRequestController::class)->only(['index','store']);

    });
