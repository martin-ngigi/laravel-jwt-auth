<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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



//POST/CREATE a Post
//'store' is a method defined in PostController
//http://127.0.0.1:8000/api/create
Route::post('/create', [PostController::class, 'store']);

/**
 * get all products
 * 'index' is a method defined in PostController
 */
//http://127.0.0.1:8000/api/all
Route::get('all', [PostController::class, 'index']);

/**
 * get one product by id
 * 'show' is a method defined in ProductController
 * 'update'  is a method defined in ProductController
 * 'destroy' is a method defined in ProductController
 */
//http://127.0.0.1:8000/api/posts/2
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);
//http://127.0.0.1:8000/api/posts/search/"name of post"
Route::get('/posts/search/{title}', [PostController::class,'search']);


