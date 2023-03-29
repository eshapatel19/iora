<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SalutationController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\ObjectController;
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


Route::get('salutation', 'App\Http\Controllers\API\SalutationController@index');
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/edit-profile', [AuthController::class, 'update']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'employee'
], function ($router) {
    Route::post('/add-employee', [EmployeeController::class, 'addEmployee']);
    Route::post('/edit-employee', [EmployeeController::class, 'editEmployee']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'objects'
], function ($router) {
    Route::post('/add-object', [ObjectController::class, 'addObject']);
    Route::post('/edit-object', [ObjectController::class, 'editObject']);
});

