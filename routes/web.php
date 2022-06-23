<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);

Route::group(['middleware' => 'web'], function () {
    Route::post('api/employers', [\App\Http\Controllers\Api\EmployerController::class, 'store']);
});
