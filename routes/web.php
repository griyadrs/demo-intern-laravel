<?php

use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\ProductController;
use App\Http\Middleware\LogRegMiddleware;

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {

        Route::get('/home', [ProductController::class, 'index'])
            ->name('products.index');
        Route::get('/show/{id}', [ProductController::class, 'show'])
            ->name('products.show');
        Route::get('/show_demo_data/{id}', [ProductController::class, 'show_demo_data'])
            ->name(name: 'products.show_demo_data');
        Route::get('/create', [ProductController::class, 'create'])
            ->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])
            ->name('products.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])
            ->name('products.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])
            ->name('products.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });

Route::get('/', [ProductController::class, 'home'])
    ->name('products.home');
Auth::routes();
