<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sign-up', [SignUpController::class, 'showSignUp'])->name('showSignUp')->middleware('guest');

Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin')->middleware('guest');

Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('signUp')->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::get('/home', [HomeController::class, 'showHome'])->name('showHome')->middleware('auth');

Route::get('/sign-out', [LoginController::class, 'logOut'])->name('logOut')->middleware('auth');
