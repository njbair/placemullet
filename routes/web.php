<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceholderController;

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

Route::get('/', function () {
    return view('welcome', ['appName' => env('APP_NAME'), 'appUrl' => env('APP_URL')]);
});

Route::get('/random.{ext}', [PlaceholderController::class, 'getRandom']);
Route::get('/random', [PlaceholderController::class, 'getRandom']);
Route::get('/index', [PlaceholderController::class, 'getIndex']);
Route::get('/hash/{hash}', [PLaceholderController::class, 'getByHash']);

Route::get('/{size}.{ext}', [PlaceholderController::class, 'getBySize']);
Route::get('/{size}', [PlaceholderController::class, 'getBySize']);
//Route::get('/{width}/{height}', [PlaceholderController::class, 'getByWidthHeight']);
