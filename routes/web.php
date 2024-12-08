<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\paket\AdminPaketController;
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
    return view('landing.landing');
});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/action-register', [AuthController::class,'action_register'])->name('action.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// FORGOT PASSWORD
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::middleware(['auth'])->group(function () {
    
    
    // Route prefix untuk Produsen

    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard_admin'])->name('dashboard');
        Route::get('kelola-paket', [AdminPaketController::class, 'index'])->name('paket');
    });
    

    Route::prefix('client')->name('client.')->middleware('CekUserLogin:2')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard_client'])->name('dashboard');
    });

});