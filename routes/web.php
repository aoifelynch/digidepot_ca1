<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::resource('/user/category', CategoryController::class);
    Route::resource('/user/listing', ListingController::class);
    Route::get('/user/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/user/basket/add', [BasketController::class, 'addToBasket'])->name('basket.add');
    Route::delete('/user/basket/{basketId}/remove/{listingId}', [BasketController::class, 'destroy'])->name('basket.remove');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
