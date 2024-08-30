<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Web\ProductController;

Route::prefix('/')
    ->group(function () {
        Route::get('/', [ProductController::class, 'home'])->name('products.home');
        Route::get('/home', [ProductController::class, 'index'])->name('products.index');
        Route::get('/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/showes/{id}', [ProductController::class, 'showes'])->name('products.showes');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/store', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

Route::get('/home', [ProductController::class, 'index'])->name('products.index');
Auth::routes();
