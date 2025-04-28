<?php

use App\Http\Controllers\AgentSaleController;
use App\Http\Controllers\AirlinesController;
use App\Http\Controllers\CreditTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GdsController;
use App\Http\Controllers\LimitController;
use App\Http\Controllers\PccController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisaTypesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Resource routes for all models
    Route::middleware('checkLimit')->group(function () {
        Route::resource('agent-sales', AgentSaleController::class);
    });
    Route::resource('refund', RefundController::class);
    Route::resource('airlines', AirlinesController::class);
    Route::middleware('admin')->group(function () {
        Route::resource('credit-types', CreditTypeController::class);
        Route::resource('gds', GdsController::class);
        Route::resource('pccs', PccController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('visa-types', VisaTypesController::class);
        Route::resource('limit', LimitController::class);
        Route::resource('users', UserController::class);
    });
});

require __DIR__ . '/auth.php';
