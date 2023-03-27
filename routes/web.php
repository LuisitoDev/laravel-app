<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SignUpController;
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

Route::get('/', function () {
    return redirect(route("showHome"));
});

Route::middleware('guest')->group(function () {
 
    Route::get('/sign-up', [SignUpController::class, 'showSignUp'])->name('showSignUp');

    Route::get('/login', [LoginController::class, 'showLogin'])->name('showLogin');

    Route::post('/sign-up', [SignUpController::class, 'signUp'])->name('signUp');

    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'showHome'])->name('showHome');

    Route::get('/sign-out', [LoginController::class, 'logOut'])->name('logOut');

    Route::get('/profiles', [ProfilesController::class, 'showProfiles'])->name('showProfiles');

    Route::get('/profile', [ProfilesController::class, 'showCreateProfile'])->name('showCreateProfile');

    Route::get('/profile/{profile_id}', [ProfilesController::class, 'showUpdateProfile'])->name('showUpdateProfile');

    Route::get('/user', [UserController::class, 'showUpdateUser'])->name('showUpdateUser');

    Route::post('/profile', [ProfilesController::class, 'createProfile'])->name('createProfile');

    Route::put('/profile', [ProfilesController::class, 'updateProfile'])->name('updateProfile');

    Route::put('/user', [UserController::class, 'updateUser'])->name('updateUser');

    Route::delete('/profile', [ProfilesController::class, 'deleteProfile'])->name('deleteProfile');

    Route::delete('/user', [UserController::class, 'deleteUser'])->name('deleteUser');
});




