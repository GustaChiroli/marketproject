<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AccountController
};

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

Route::middleware('auth:sanctum')->get('/user/current', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AccountController::class, 'signup']);
    Route::get('renewPassword/{id}', [AccountController::class, 'renewPassword']);
    Route::put('update/{id}', [AccountController::class, 'update']);
    Route::get('signup/activate/{token}', [AuthController::class, 'signupActivate']);

    Route::group(['prefix' => 'password'], function () {
        Route::post('create', [PasswordResetController::class, 'create']);
        Route::get('find/{token}', [PasswordResetController::class, 'find']);
        Route::post('reset', [PasswordResetController::class, 'reset']);
    });
});
