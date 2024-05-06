<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth.guest')->name('home');


Route::prefix('member')->group(function(){

    Route::get('/dashboard',[MemberController::class, 'index'])->name('member.dashboard');

});

Route::prefix('partner')->group(function () {

    Route::middleware('auth.guest')->group(function () {
        /* login */
        Route::get('/login', [PartnerController::class, 'login'])->name('partner.login');
        Route::post('/login', [PartnerController::class, 'login_store'])->name('partner.login.store');

        /* register */
        Route::get('/register', [PartnerController::class, 'register'])->name('partner.register');
        Route::post('/register', [PartnerController::class, 'register_store'])->name('partner.register.store');
    });

    Route::middleware('partner')->group(function () {
        /* dashboard */
        Route::get('/dashboard', [PartnerController::class, 'index'])->name('partner.dashboard')->middleware('partner');

        /* profile */
        Route::get('/profile', [PartnerController::class, 'edit'])->name('partner.profile.edit');
        Route::patch('/update/profile', [PartnerController::class, 'update'])->name('partner.profile.update');
        Route::put('/update/password', [PartnerController::class, 'update_password'])->name('partner.update.password');
        Route::delete('/profile', [PartnerController::class, 'destroy'])->name('partner.profile.destroy');

        /* logout */
        Route::post('/logout', [PartnerController::class, 'logout'])->name('partner.logout');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
