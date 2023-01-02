<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\PermissionController;

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


Route::post('login', [AuthController::class,'login']);

Route::group(['middleware' => 'auth:api'], function(){
	
	Route::get('logout', [AuthController::class,'logout']);

	Route::get('profile', [AuthController::class,'profile']);
	Route::post('change-password', [AuthController::class,'changePassword']);
	Route::post('update-profile', [AuthController::class,'updateProfile']);

	Route::get('/users', [UserController::class,'list']);
	Route::post('/user/create', [UserController::class,'store']);
	Route::get('/user/{id}', [UserController::class,'profile']);
	Route::get('/user/delete/{id}', [UserController::class,'delete']);
	Route::post('/user/change-role/{id}', [UserController::class,'changeRole']);
	
});
