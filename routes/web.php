<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

//Route::group(['as' => 'website.'], function (){
//    Route::get('/', [WebsiteHomeController::class, 'home'])->name('home');
//    Route::resource('posts', PostController::class)->except('index');
//});





Route::group(['prefix' => 'admin'], function (){
    Auth::routes();
    Route::group(['as' => 'admin.', 'middleware' => ['auth', 'is-admin']], function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('positions', PositionController::class);
        Route::resource('jobs', JobController::class);
        Route::resource('applicants', ApplicantController::class)->only('index', 'destroy');
        Route::resource('admins', AdminController::class);
    });

});
