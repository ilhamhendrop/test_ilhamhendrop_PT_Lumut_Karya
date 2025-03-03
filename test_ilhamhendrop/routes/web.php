<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index_login')->name('login.index');
    Route::post('/login/store', 'store_login')->name('login.store');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard.index');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard/user', 'index_user')->name('user.index');
        Route::post('/dashboard/user/store', 'store_user')->name('user.store');
        Route::get('/dashboard/user/{user}/detail', 'detail_user')->name('user.detail');
        Route::get('/dashoard/user/{user}/edit/data', 'edit_user')->name('user.edit.data');
        Route::patch('/dashboard/user/{user}/edit/data', 'update_user')->name('user.update.data');
        Route::get('/dashboard/user/{user}/edit/password', 'edit_password')->name('user.edit.password');
        Route::patch('/dashboard/user/{user}/edit/password', 'update_password')->name('user.update.password');
        Route::delete('/dashboard/user/{user}/delete', 'delete_user')->name('user.delete');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/dashboard/post', 'index_post')->name('post.index');
        Route::post('/dashboard/post/store', 'store_post')->name('post.store');
        Route::get('/dashboard/post/{post}/detail', 'detail_post')->name('post.detail');
        Route::get('/dashboard/post/{post}/edit', 'edit_post')->name('post.edit');
        Route::patch('/dashboard/post/{post}/edit', 'update_post')->name('post.update');
        Route::delete('/dashboard/post/{post}/delete', 'delete_post')->name('post.delete');
    });
});

Route::middleware(['auth', 'role:author'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/dashboard/post', 'index_post')->name('post.index');
        Route::get('/dashboard/post/{post}/detail', 'detail_post')->name('post.detail');
        Route::post('/dashboard/post/store', 'store_post')->name('post.store');
        Route::get('/dashboard/post/{post}/edit', 'edit_post')->name('post.edit');
        Route::patch('/dashboard/post/{post}/edit', 'update_post')->name('post.update');
        Route::delete('/dashboard/post/{post}/delete', 'delete_post')->name('post.delete');
    });
});
