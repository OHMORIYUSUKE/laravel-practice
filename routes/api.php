<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FireTestController;
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

//Route::get('v1/hello', [TestController::class, 'api']);

Route::pattern('apiVersion1', 'v1');
Route::group(['namespace' => 'Api\V1', 'prefix' => '{apiVersion1}'], function() {
    Route::get('post', [PostController::class, 'postsAll']);
    Route::post('post', [PostController::class, 'insertPost']);
    Route::post('user', [FireTestController::class, 'index']);
});