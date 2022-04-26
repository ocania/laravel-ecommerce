<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\Admin\CategoryController;


//shop
Route::get('/', [ProductController::class, 'index'])->name('shop.index');
Route::get('/search', [ProductController::class, 'search'])->name('shop.search');

//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('categories.show');


//orders
Route::get('/orders', [OrderController::class, 'index'])->middleware(['auth'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->middleware(['auth'])->name('orders.show');


//profile
Route::get('/profile', [ProfileController::class, 'show'])->middleware(['auth'])->name('profile.show');
Route::get('/profile/{user:id}', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.edit');


//cart
Route::get('/cart', [CartController::class, 'index'])->middleware(['auth'])->name('cart.index');
Route::post('/cart', [CartController::class, 'checkout'])->middleware(['auth'])->name('cart.checkout');
Route::get('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove', [CartController::class, 'removeCart']);
Route::get('/cart/delete/{product}', [CartController::class, 'deleteFromCart'])->name('cart.delete');


//stripe webhook
Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);

require __DIR__ . '/auth.php';
