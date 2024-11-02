<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\EnsureLoggedIn;
use App\Http\Middleware\CheckAdmin;

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
Route::get('/', [HomeController::class, 'home'])->name('home');

// Display pages - PageController
Route::controller(PageController::class)->group(function () {
    Route::get('/shop', 'shop')->name('page.shop');
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
    Route::get('/logout', 'logout')->name('logout');
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
    // Route::get('auth/facebook', 'redirectToFacebook')->name('login.facebook');
    // Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

// Protected routes: Needs Authentication before accessing
Route::group(['middleware' => 'ensure.logged.in'], function() {
    route::get('/account', [PageController::class, 'account'])->name('page.account');
});

// Admin Registration
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'postRegister'])->name('admin_register.post');

// Admin Login
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin_login.post');

// Admin authentication
Route::prefix('admin')->middleware(['check.admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/products', 'ProductController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/users', 'UserController');
});
