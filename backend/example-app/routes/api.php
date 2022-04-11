<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\PrivateChatController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\playground;

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
// route::get('/playgrounds', [PlaygroundController::class, 'index']);
// route::post('/playgrounds', [PlaygroundController::class, 'store']);
// route::get('/playground/{id}', [PlaygroundController::class, 'show']);

//public routes
//route::resource('playgrounds', PlaygroundController::class);
route::post('/register', [AuthController::class, 'register']);
route::get('/channels', [ChannelController::class, 'index']);
route::get('/channels/{id}', [ChannelController::class, 'show']);

//protected routes
Route::group(['middleware' => ['auth:api']], function () {
//     route::get('/playgrounds', [PlaygroundController::class, 'index']);
//     route::get('/playground/{id}', [PlaygroundController::class, 'show']);
//     route::post('/playgrounds', [PlaygroundController::class, 'store']);
//     route::put('/playground/{id}', [PlaygroundController::class, 'update']);
//     route::delete('/playground/{id}', [PlaygroundController::class, 'destroy']);
// });
        route::apiResource('playgrounds', PlaygroundController::class)->only(['index','show','store','update','destroy']);
        route::apiResource('privatechats', PrivateChatController::class)->only(['index','store','destroy']);
    });
