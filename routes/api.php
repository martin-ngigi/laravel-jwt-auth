<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    //http://127.0.0.1:8000/api/auth/login
    Route::post('/login', [AuthController::class, 'login']);
    //http://127.0.0.1:8000/api/auth/register
    Route::post('/register', [AuthController::class, 'register']);
    //http://127.0.0.1:8000/api/auth/logout
    Route::post('/logout', [AuthController::class, 'logout']);
    //http://127.0.0.1:8000/api/auth/refresh
    Route::post('/refresh', [AuthController::class, 'refresh']);
    //http://127.0.0.1:8000/api/auth/user-profile
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
