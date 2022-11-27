<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialAccountController;
use App\Http\Controllers\UserController;
use App\Models\SocialAccount;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
//     return view('layouts.site.index');
// });
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/blog/{slug}', [ArticleController::class, 'show'])->name('post.show');
Route::get('/blog', [SiteController::class, 'blog'])->name('blog.show');
Route::post('/contact/store', [SiteController::class, 'contactStore'])->name('site.contact');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [UserController::class, 'index'])->name('dashboard.index');
        Route::get('/message/show/{id}', [UserController::class, 'show'])->name('dashboard.show');
        Route::delete('/message/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.destroy');
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/profile', 'index')->name('profile.index');
            Route::post('/profile/store', 'store')->name('profile.store');
        });

        Route::controller(ArticleController::class)->group(function () {
            Route::get('/post', 'index')->name('post.index');
            Route::post('/post/store', 'store')->name('post.store');
            Route::get('/post/{slug}/edit', 'edit')->name('post.edit');
            
            Route::put('/post/update', 'update')->name('post.update');
            Route::delete('/post/delete/{slug}', 'destroy')->name('post.destroy');

            Route::get('/post/slug/', 'slug')->name('post.slug');
        });
        Route::controller(SkillController::class)->group(function () {
            Route::get('/skill', 'index')->name('skill.index');
            Route::post('/skill/store', 'store')->name('skill.store');
            Route::get('/skill/{id}/edit', 'edit')->name('skill.edit');
            Route::put('/skill/update/{id}', 'update')->name('skill.update');
            Route::delete('/skill/delete/{id}', 'destroy')->name('skill.destroy');
        });
        Route::controller(JobController::class)->group(function () {
            Route::get('/exp', 'index')->name('exp.index');
            Route::post('/exp/store', 'store')->name('exp.store');
            Route::get('/exp/{id}/edit', 'edit')->name('exp.edit');
            Route::put('/exp/update/{id}', 'update')->name('exp.update');
            Route::delete('/exp/delete/{id}', 'destroy')->name('exp.destroy');
        });

        Route::resource('project', ProjectController::class);
        Route::resource('sc', SocialAccountController::class);
        Route::delete('/sc/delete/{id}', [SocialAccountController::class, 'destroy'])->name('sc.destroyed');
    });
});
