<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/buyer', function () {
    return view('buyer');
});

Route::get('/seller', function () {
    return view('seller');
});

Route::get('/browsing/{department}', [ProductController::class, 'get_products_by_department']);

Route::resource('products', ProductController::class);

// Chloe for Auth
Route::get('user-list', [UserController::class, 'index'])->name('user.list');
Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('post-login', [UserController::class, 'postLogin'])->name('login.post');
Route::get('registration', [UserController::class, 'registration'])->name('register');
Route::post('post-registration', [UserController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');
