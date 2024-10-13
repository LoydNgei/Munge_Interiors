<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Home
Route::get('/', [HomeController::class, 'home']);

// Display pages - PageController
Route::controller(PageController::class)->group(function () {
    Route::get('/shop', 'shop')->name('page.shop');
    Route::get('/account', 'account')->name('page.account');
    Route::get('/wishlist', 'wishlist')->name('page.wishlist');
    Route::get('/checkout', 'checkout')->name('page.checkout');
});

// Product Controller
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'product');
});

// Billing Controller - Manage billing information
Route::controller(BillingController::class)->group(function () {
    Route::get('/billing', 'show')->name('billing.show');
    Route::post('/billing', 'store')->name('billing.store');
    Route::get('/billing/create', 'BillingController@create')->name('billing.create');
    Route::get('/billing/{billing}/edit', 'BillingController@edit')->name('billing.edit');
    Route::put('/billing/{billing}', 'update')->name('billing.update');
    Route::delete('/billing/{billing}', 'destroy')->name('billing.destroy');
});

// Shipping Controller - Manage Shipping Information
Route::controller(ShippingController::class)->group(function () {

});


// Authentication Routes - UserController
Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'postlogin')->name('login.post');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'postregister')->name('register.post');
});

