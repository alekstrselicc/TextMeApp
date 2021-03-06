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
use App\Http\Controllers\PlaygroundRequestController;
use App\Models\FriendRequest;
use App\Models\Message;
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
        route::apiResource('participants', ParticipantsController::class)->only(['index','show', 'update', 'store']);
        Route::get('/logout', [AuthController::class, 'logout']);
        route::apiResource('messages', MessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('towns', TownController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('private_messages', PrivateMessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('playground_members', PlaygroundMembersController::class)->only(['index','show','store','destroy']);
        route::apiResource('friend_request', FriendRequestController::class)->only(['index','store', 'show','destroy']);
        route::get('friend_request_approver/{approver}', [FriendRequestController::class, 'showApproverRequests']);
        route::get('search_by_email/{email}', [FriendRequestController::class, 'findByEmail']); 
        route::get('get_friends', [ParticipantsController::class, "sort"]); 
        route::get('playgrounds_by_user', [PlaygroundMembersController::class, 'sort']); //playground of auth user
        route::get('all_channels_by_playgrounds',[ChannelController::class, 'ChannelByPlayground'] ); //all playgrounds with all channels
        route::get('channel',[ChannelController::class, 'show'] ); //all channels of auth user
        route::get('user_playground_channels/{id}',[ChannelController::class, 'userPlaygroundChannels'] ); //all channels auth user where user is located on specific playground
        route::get('messages_by_channel/{id}',[MessageController::class, 'showMessagesOfChannel'] ); //show messages of particular channel
        route::get('messages_of_private_chat/{id}',[PrivateMessageController::class, 'show'] ); //show messages of particular private chat
        route::get('getPlaygroundsWithChannels', [PlaygroundController::class, 'getWithChannels']); //show channels of auth user whic are part of playground (2 arrays)
        route::apiResource('playground_request', PlaygroundRequestController::class)->only(['index','store', 'show', 'destroy']);
        route::get('findByName/{name}', [PlaygroundController::class, 'findByName']); 
        route::get('findByChannel/{id}', [PlaygroundController::class, 'findByChannel'] ); 
        route::post('getPlaygroundRequestsId', [PlaygroundRequestController::class, 'getPlaygroundRequestsId']); 
        route::get('GetAllUsersFromPlayground/{id}', [PlaygroundController::class, 'GetAllUsersFromPlayground']); 
        route::get('AllChannelsOfPlayground/{id}', [ChannelController::class, 'AllChannelsOfPlayground']);
        route::get('GetCountryByTown/{id}', [TownController::class, 'GetCountryByTown']); //id town and you get country
        route::get("showTown/{id}", [TownController::class, 'showTown']); 

        route::get("GetUserFromChannel/{id}", [PlaygroundController::class, 'GetUserFromChannel']); 
        route::post("sendMessages", [MessageController::class, 'sendMessage']); 
        route::get("fetchMessage/{id}", [MessageController::class, 'fetchMessage']); 

        route::get("GetUserFromChannel/{id}", [PlaygroundController::class, 'GetUserFromChannel']);
        route::get("GetPrivateMessages", [PrivateMessageController::class, 'GetPrivateMessages']); 

        route::get("getAll", [UserController::class, "getAll"]); 
        route::get("getPrivateMesagesChat/{id}", [PrivateMessageController::class, "getPrivateMesagesChat"]); 
        route::post("sendPrivateMessage", [PrivateMessageController::class, "sendPrivateMessage"]); 
        route::get("getPrivateChatId/{id}", [PrivateMessageController::class, "getPrivateChatId"]); 
        route::get("getMembersByPlayground/{id}", [PlaygroundMembersController::class, "getMembersByPlayground"]); 
    });
