<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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


Route::get('/', [HomeController::class, 'home']);

Route::get('/shop', [PageController::class, 'shop']);

Route::get('/account', [PageController::class, 'account']);

Route::get('/wishlist', [PageController::class, 'wishlist']);

Route::get('/product', [PageController::class, 'product']);

Route::get('/checkout', [PageController::class, 'checkout']);






// Authentication Routes

Route::get('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'register']);

