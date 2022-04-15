<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FileUploadController;

use Illuminate\Support\Facades\Log;




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

Route::get('/edit', function () {
    return view('edit');
});

Route::get('/sales', function () {
    return view('sales');
});

Route::get('/products_list', function () {
    return view('products_list');
});

//Hilary for managing profile
Route::post('edit', [UserController::class, 'editUser'])->name('edit');
Route::get('/orders', [UserController::class, 'showOrders']);
Route::get('/sellers_list', [UserController::class, 'showSellers']);
Route::get('/buyers_list', [UserController::class, 'showBuyers']);

Route::post('/seller/uploaded_file', [FileUploadController::class, 'fileUploadPost']);
Route::get('/seller/UploadAds', [ProductController::class, 'get_products_for_dropwdown']);
  
Route::get('/browsing/{department}', [ProductController::class, 'get_products_by_department']);
Route::get('/browsing/item/{product_id}', [ProductController::class, 'get_products_by_id']);
Route::get('/cart', [CartController::class, 'show']);
Route::post('/cart/{product}', [CartController::class, 'create'])->name('cart.create');
Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

//For seller posting to database
Route::post('/seller', [ProductController::class, 'store']) ->name('product.store');

Route::get('/browsing', [ProductController::class, 'get_products']);

Route::resource('products', ProductController::class);

Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/order_confirmation', [CheckoutController::class, 'success']);



// Chloe for Auth
//Route::get('user-list', [AuthController::class, 'index'])->name('user.list');
//Route::get('login', [AuthController::class, 'login'])->name('login');
//Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
//Route::get('registration', [AuthController::class, 'registration'])->name('register');
//Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
//Route::get('dashboard', [AuthController::class, 'dashboard']);
//Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/order_confirmation', [CheckoutController::class, 'success']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
