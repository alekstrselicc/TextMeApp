<?php

use Illuminate\Support\Facades\Route;
use App\Events\Hello; 
use App\Events\MessageSent; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//routes for views
Route::get('/', function () {
    return view('welcome');
});
