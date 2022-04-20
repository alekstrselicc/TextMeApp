<?php

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

//login
Route::post('/login', 'App\Http\Controllers\AuthController@login');

//in progress:

//protected routes
Route::group(['middleware' => ['auth:api']], function () {
        route::apiResource('playgrounds', PlaygroundController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('privatechats', PrivateChatController::class)->only(['index','store','destroy']);
        route::apiResource('usertype', UserTypeController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('channels', ChannelController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('status', StatusController::class)->only(['index','show','update']);
        route::apiResource('relationship', RelationshipController::class)->only(['index','show','update']);
        route::apiResource('language', LanguageController::class)->only(['index','show','store']);
        route::apiResource('theme', ThemeController::class)->only(['index','show']);
        route::apiResource('country', CountryController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('gender', GenderController::class)->only(['index','show','destroy']);
        route::apiResource('user', UserController::class)->only(['index','show','update','destroy']);
        route::apiResource('participants', ParticipantsController::class)->only(['index','show']);
        Route::post('/logout', 'AuthController@logout');
        route::apiResource('messages', MessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('towns', TownController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('privatemessages', PrivateMessageController::class)->only(['index','show','store','destroy']);
        route::apiResource('playgroundmembers', PlaygroundMembersController::class)->only(['index','show','store','destroy']);
    });
