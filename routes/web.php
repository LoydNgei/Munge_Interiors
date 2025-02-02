<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\EnsureLoggedIn;
use App\Http\Middleware\CheckAdmin;



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
    Route::resource('/products', ProductController::class, ['as' => 'admin']);
    Route::resource('/orders', OrderController::class, ['as' => 'admin']);
    Route::resource('/users', UserController::class, ['only' => ['index'], 'as' => 'admin']);
});


// Admin Products CRUD operations
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'viewproducts'])->name('products.view');
    Route::get('/form', [ProductController::class, 'productsform'])->name('products.viewform');
    Route::get('/product/{product}', [ProductController::class, 'editproduct'])->name('products.edit');
    Route::post('/form', [ProductController::class, 'createproduct'])->name('products.postform');
    Route::put('/product/{product}', [ProductController::class, ''])->name('products.editform');
    Route::delete('/delete/{product}', [ProductController::class, ''])->name('products.delete');
});