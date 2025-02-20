<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApplicantController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\ApplyJobController;
use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\Auth\RegisterController;
use App\Http\Controllers\Website\HomeController as WebsiteHomeController;
use App\Http\Controllers\Website\JobDetailsController;
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


Route::group(['as' => 'website.'], function (){
    Route::get('/', [WebsiteHomeController::class, 'home'])->name('home');
    Route::get('/job-details/{id}',[JobDetailsController::class, 'jobDetails'])->name('job-details');
    Route::get('/apply-job/{id}',[JobDetailsController::class, 'applyForm'])->name('apply-job');

    Route::get('login', [LoginController::class, 'loginView'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('submitLogin')->middleware('guest');
//
    Route::get('register', [RegisterController::class, 'registerView'])->name('register')->middleware('guest');
    Route::post('register', [RegisterController::class, 'register'])->name('submitRegister')->middleware('guest');

});


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

//Route::group([],function () {
//    Route::get('/register', function () {
//        return view('website.auth.register');
//    });
//    Route::get('/login', function () {
//        return view('website.auth.login');
//    });
//});
