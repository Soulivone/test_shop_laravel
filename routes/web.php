<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Auth::routes();



// Web
Route::group([], function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // routes/web.php
});

Route::get('/', [App\Http\Controllers\HomeWithOutAuthController::class, 'getProduct'])->name('homeWithOut');

Route::get('/contact', [App\Http\Controllers\HomeWithOutAuthController::class, 'getProduct'])->name('contact');
Route::get('/des', [App\Http\Controllers\HomeWithOutAuthController::class, 'getProduct'])->name('des');
Route::get('/detail/{id}', [App\Http\Controllers\HomeWithOutAuthController::class, 'showProduct'])->name('detail');

Route::get('/view-category/{id}', [App\Http\Controllers\HomeWithOutAuthController::class, 'getCategoryById'])->name('view-category');
// Route::get('/cart', [App\Http\Controllers\HomeWithOutAuthController::class, 'cart'])->name('cart');

Route::post('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart');

Route::post('/remove-from-cart/{productId}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('removeFromCart');

Route::post('/create-order', [App\Http\Controllers\CheckoutController::class, 'store'])->name('createOrder');






// Admin
Route::group([], function () {
    Route::get('admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::post('admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    // Admin Mangament
    Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin.admin.index');
    Route::get('/admin/admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('/admin/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::put('/admin/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('/admin/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.admin.delete');

    // User Mangament
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

    // Category Mangament
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/admin/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    // Product Mangament
    Route::get('/admin/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    // Order Mangament
    Route::get('/admin/order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/admin/order/show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
});
