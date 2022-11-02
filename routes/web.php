<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts.site.index');
});


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard.index');
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile.index');
            Route::post('/profile/store', 'store')->name('profile.store');
        });
        
        Route::get('/post', [ArticleController::class, 'index'])->name('post.index');
        Route::post('/post/store', [ArticleController::class, 'store'])->name('post.store');
        Route::get('/post/slug/', [ArticleController::class, 'slug'])->name('post.slug');
    });
});
