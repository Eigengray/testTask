<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::get('employers', [\App\Http\Controllers\EmployerController::class, 'index']);
//Route::get('employers/{id}', [\App\Http\Controllers\EmployerController::class, 'show']);
//Route::post('employers/add', [\App\Http\Controllers\EmployerController::class, 'add']);
//Route::delete('employers/{id}', [\App\Http\Controllers\EmployerController::class, 'delete']);

Route::apiResources([
    'employers' => \App\Http\Controllers\Api\EmployerController::class
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
