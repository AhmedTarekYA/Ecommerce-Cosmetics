<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'admin'], function () {
    #### Auth ####
    Route::get('login', [AuthController::class, 'index'])->name('admin.loginPage');
    Route::post('login', [AuthController::class, 'doLogin'])->name('admin.doLogin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    #### Auth ####
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    #### Home ####
    Route::view('/', 'Admin/index')->name('adminHome');

    #### Admins ####
    Route::resource('admins', AdminController::class);

    #### Contacts ####
    Route::resource('contacts', ContactUsController::class);

    #### Sliders ####
    Route::resource('sliders', SliderController::class);

    #### Blogs ####
    Route::resource('blogs', BlogController::class);

    #### categories ####
    Route::resource('categories', CategoryController::class);


    #### categories ####
    Route::resource('brands', BrandController::class);

    #### orders ####
    Route::resource('orders', OrderController::class);


    #### users ####
    Route::resource('users', UserController::class);


    #### Setting ####
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::POST('settingUpdate', [SettingController::class, 'update'])->name('settingUpdate');


    #### Products ####
    Route::resource('products', ProductController::class);
    Route::DELETE('products.deleteImage/{id}', [ProductController::class,'deleteImage'])->name('products.deleteImage');
    Route::POST('addComment', [ProductController::class,'addComment'])->name('addComment');
    Route::DELETE('products.deleteComment/{id}', [ProductController::class,'deleteComment'])->name('products.deleteComment');

});

