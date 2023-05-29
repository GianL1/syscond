<?php

use App\Api\Apartment\Controllers\ApartmentController;
use App\Api\Bloco\Controllers\BlocoController;
use App\Api\User\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Api\Auth\Controllers\AuthController;

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


Route::namespace('\App\Api\Auth\Controllers')->group(function (){

    Route::get('/ping', function (){
        return ['pong' => true];
    });

    Route::post('/user',[AuthController::class, 'create']);
    Route::get('/401', 'AuthController@unauthorized')->name('login');
    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/logout', 'AuthController@logout');
    Route::post('/auth/refresh', 'AuthController@refresh');

    Route::put('/user',[UserController::class, 'update']);
    Route::delete('/user',[UserController::class, 'delete']);

    Route::get('/bloco/index', [BlocoController::class, 'index']);
    Route::post('/bloco', [BlocoController::class, 'create']);
    Route::put('/bloco', [BlocoController::class, 'update']);
    Route::delete('/bloco', [BlocoController::class, 'delete']);

    Route::post('/apartment', [ApartmentController::class, 'create']);
    Route::put('/apartment', [ApartmentController::class, 'update']);
    Route::delete('/apartment', [ApartmentController::class, 'delete']);
//
//    Route::get('/user','UserController@read');
//    Route::get('/user/{id}','UserController@read');

});
