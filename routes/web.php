<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\EstimateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return auth()->check() ? redirect('/home') : redirect('/login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    Route::middleware('role:Admin')->group(function () {
        Route::resource('leads', LeadController::class);
        Route::resource('proposals', ProposalController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('estimates', EstimateController::class);
        Route::resource('clients', ClientController::class);
    });

    Route::middleware('role:Manager|Admin')->group(function () {
        Route::resource('leads', LeadController::class);
        Route::resource('proposals', ProposalController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('estimates', EstimateController::class);
    });


    Route::middleware('role:Employee|Manager|Admin')->group(function () {
        Route::resource('leads', LeadController::class);
        Route::resource('proposals', ProposalController::class);
        Route::resource('invoices', InvoiceController::class);
        Route::resource('estimates', EstimateController::class);
    });

});
