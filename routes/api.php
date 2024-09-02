<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogOutController;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::delete('/logout', [LogOutController::class, 'logout'])
    ->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user', function (Request $request) {

    return $request->user();
});


Route::middleware('auth:sanctum')
    ->group(function () {

    Route::resource('product', ProductController::class);
});
