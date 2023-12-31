<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\SettingController as settings;
use App\Http\Controllers\BookingController as booking;
use App\Http\Controllers\SeatDetailController as seat_detail;
use App\Http\Controllers\FrontendController as frontend;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\CommentController as comment;

/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isSalesmanager;
use App\Http\Middleware\isSalesman;

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


Route::get('/', [frontend::class,'home'])->name('home');
Route::get('/home', [frontend::class,'home'])->name('home');
Route::post('/booking-store', [frontend::class,'booking_store'])->name('booking.store');
Route::get('/about', [frontend::class,'about'])->name('about');
Route::get('/success/{id}', [frontend::class,'success'])->name('success');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');
Route::get('/language', [LocalizationController::class,'lang_change'])->name('LangChange');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);
        Route::resource('settings',settings::class,['as'=>'admin']);
        
        /* Booking */
        Route::resource('booking',booking::class,['as'=>'admin']);
        /* Seat_detail */
        Route::resource('seat_detail',seat_detail::class,['as'=>'admin']);
    });
});
