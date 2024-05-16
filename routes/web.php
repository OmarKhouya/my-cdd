<?php

use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OffersController;
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


Route::prefix('member')->group(function () {
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [MemberController::class, 'index'])->name('member.dashboard');

        Route::delete('/apply/drop/{offer}', [MemberController::class, 'drop'])->name('member.apply.drop');

        Route::get('/offers', [OffersController::class, 'index'])->name('member.offers');
        Route::get('/offers/{offer}', [OffersController::class, 'show'])->name('member.offers.show');
        Route::post('/offers/apply/{offer}', [OffersController::class, 'apply'])->name('member.offers.apply');
    });
});

Route::get('/profile/{id}', [MemberController::class, 'profile'])->name('profile.index');

Route::prefix('partner')->group(function () {

    Route::get('/profile/{id}', [PartnerController::class, 'profile'])->name('partner.profile.index');

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

        /* Offers */
        // Route::resource('offers', OffersController::class);
        Route::get('/offers', [OffersController::class, 'index'])->name('partner.offers');
        Route::get('/offers/create', [OffersController::class, 'create'])->name('partner.offers.create');
        Route::post('/offers', [OffersController::class, 'store'])->name('partner.offers.store');
        Route::get('/offers/{offer}', [OffersController::class, 'show'])->name('partner.offers.show');
        Route::get('/offers/{offer}/edit', [OffersController::class, 'edit'])->name('partner.offers.edit');
        Route::put('/offers/{offer}', [OffersController::class, 'update'])->name('partner.offers.update');
        Route::put('/offers/availability/{id}', [OffersController::class, 'availabilityToggle'])->name('partner.offers.availabilityToggle');
        Route::delete('/offers/{offer}', [OffersController::class, 'destroy'])->name('partner.offers.destroy');

        Route::get('/apply/grant/{id}', [OffersController::class, 'grant'])->name('partner.offers.grant');
        Route::get('/apply/decline/{id}', [OffersController::class, 'decline'])->name('partner.offers.decline');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
