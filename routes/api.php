<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', function(){
    return 'API Test route is working fine.';
});


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('/v1')->group(function () {
       
    });
});


Route::prefix('v1')->group(function (){
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('tenants')->group(function() {
            Route::get('/', [TenantController::class, 'index']);
            Route::post('/', [TenantController::class, 'store']);
            Route::get('/{tenant}', [TenantController::class, 'show']);
            Route::put('/{tenant}', [TenantController::class, 'update']);
            Route::delete('/{tenant}', [TenantController::class, 'destroy']);
        });

        Route::prefix('employees')->group(function() {
            Route::get('/', [EmployeeController::class, 'index']);
        });

        Route::prefix('users')->group(function() {
            Route::get('/', [UserController::class, 'index']);
        });
    });

    Route::post('login', [AuthController::class, 'login']);
});

