<?php

use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class,'index'])->name('/');

## contact us
Route::get('contact-us', [HomeController::class,'contactUs'])->name('contactUs');
Route::post('postContactUs', [HomeController::class,'postContactUs'])->name('postContactUs');
Route::post('postSubscribe', [HomeController::class,'postSubscribe'])->name('postSubscribe');

## Products
Route::get('products', [HomeController::class,'productPage'])->name('productPage');
Route::get('productDetails/{title}', [HomeController::class,'productDetails'])->name('productDetails');

## Blogs
Route::get('blogs', [HomeController::class,'blogs'])->name('blogs');
Route::get('blogDetails/{id}', [HomeController::class,'blogDetails'])->name('blogDetails');


// about page
Route::get('about', [HomeController::class,'about'])->name('about');


// account
Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('userRegister', [AuthController::class, 'userRegister'])->name('userRegister');
Route::post('postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

Route::group(['middleware' => 'auth:user'], function () {

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    // profile
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::POST('updateProfile', [UserController::class, 'updateProfile'])->name('updateProfile');

    // cart handle
    Route::POST('addToCart', [UserController::class, 'addToCart'])->name('addToCart');
    Route::get('getMyCart', [UserController::class, 'getMyCart'])->name('getMyCart');
    Route::POST('deleteFromMyCart', [UserController::class, 'deleteFromMyCart'])->name('deleteFromMyCart');

    // Wishlist handle
    Route::POST('addToWishlist', [UserController::class, 'addToWishlist'])->name('addToWishlist');
    Route::POST('removeFavourite', [UserController::class, 'removeFavourite'])->name('removeFavourite');
    Route::get('wishlist', [UserController::class, 'wishlistPage'])->name('wishlist');


    // order handle
    Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('makeOrder', [OrderController::class, 'makeOrder'])->name('makeOrder');
    Route::post('deleteOrder', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
    Route::GET('showProducts/{id}', [OrderController::class, 'showProducts'])->name('showProducts');


});

Route::get('/clear/route', function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Optimize Cleared Successfully';
});
