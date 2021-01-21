<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Admin\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\OrderController;

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
    $products = Product::where('status', 1)->get();
    return view('index', compact('products'));
});
Route::get('/contact', function(){
    return view('contact');
});

// Cart Route
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/login', function(){
    return view('login');
});

// Order Route
Route::get('/orders', [OrderController::class, 'index'])->name('user.order.index');
Route::post('/placeOrder', [OrderController::class, 'placedOrder'])->name('checkout.place.order');
Route::get('/orderDetails/{id}', [OrderController::class, 'orderDetails'])->name('order.details');

// Payment Route
Route::post('/payment/{id}', [OrderController::class, 'payment'])->name('pay');
Route::post('/success', [OrderController::class, 'paymentSuccess'])->name('success');
Route::get('/placedOrder', [OrderController::class, 'placedOrderDetails'])->name('user.placedOrder');
Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::resource('/product', ProductController::class);
    Route::delete('/user/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});