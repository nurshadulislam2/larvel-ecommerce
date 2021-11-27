<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PDFController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;

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

Route::get('/', [FrontController::class, 'index'])->name('/');
Route::get('/product/{id}', [FrontController::class, 'product'])->name('product');
Route::get('/category/{id}', [FrontController::class, 'category'])->name('category');
Route::get('/brand/{id}', [FrontController::class, 'brand'])->name('brand');
Route::get('/profile', [FrontController::class, 'profile'])->name('profile');
Route::put('/profile/update/{id}', [FrontController::class, 'profileUpdate'])->name('profile.update');
Route::get('/search', [FrontController::class, 'search'])->name('search');

//cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::patch('update-cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('remove-cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::post('order', [CartController::class, 'order'])->name('order');
Route::get('/customer/order', [CartController::class, 'customerOder'])->name('order.customer');
Route::get('/details/{id}', [CartController::class, 'orderDetails'])->name('order.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    //Brand
    Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('admin.brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/brand/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');

    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');

    //slider
    Route::get('/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::delete('/slider/delete/{id}', [SliderController::class, 'delete'])->name('admin.slider.delete');

    //user

    Route::get('/all-customer', [UserController::class, 'index'])->name('admin.customer');
    Route::get('/all-customer/active/{id}', [UserController::class, 'active'])->name('admin.customer.active');
    Route::get('/all-customer/inactive/{id}', [UserController::class, 'inactive'])->name('admin.customer.inactive');

    //order

    Route::get('/order', [OrderController::class, 'orderShow'])->name('admin.order');
    Route::patch('/order/status/{id}', [OrderController::class, 'orderStatus'])->name('admin.order.status');
    Route::get('/order-details/{id}', [OrderController::class, 'orderDetails'])->name('admin.orderDetails');

    Route::get('create-pdf-file/{id}', [PDFController::class, 'index'])->name('pdf');
});