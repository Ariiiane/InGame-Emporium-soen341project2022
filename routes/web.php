<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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

Route::get('/browsing', [ProductController::class, 'get_products']);

Route::resource('products', ProductController::class);

// Chloe for Auth
//Route::get('user-list', [AuthController::class, 'index'])->name('user.list');
//Route::get('login', [AuthController::class, 'login'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::get('registration', [AuthController::class, 'registration'])->name('register');
//Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('dashboard', [AuthController::class, 'dashboard']);
//Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
