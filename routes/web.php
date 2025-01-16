<?php

use App\Http\Controllers\auth\AuthController;

//ADMIN
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\FotograferController;
use App\Http\Controllers\Admin\KategoriPaketController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\Admin\PaketTambahanController;
use App\Http\Controllers\Admin\HargaPaketController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PesananController;

//CLIENT
use App\Http\Controllers\Client\DashboardController as ClientDashboardController;

use App\Http\Controllers\ForgotPasswordController;
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

// Route::get('/', function () {
//     return view('landing.landing');
// });

Route::get('/', [AdminDashboardController::class, 'landing'])->name('landing');

Route::get('select', function () {
    return view('auth.selec2');
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

    //ADMIN
    Route::prefix('admin')->name('admin.')->middleware('CekUserLogin:1')->group(function () {
        //DASHBOARD
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        //ROLES
        Route::get('roles', [RolesController::class, 'index'])->name('roles');
        
        //USERS
        Route::get('users', [UsersController::class, 'index'])->name('users');
        Route::post('store/users', [UsersController::class, 'store'])->name('store.users');
        Route::put('update/users/{id}', [UsersController::class, 'update'])->name('update.users');
        Route::delete('delete/users/{id}', [UsersController::class, 'delete'])->name('delete.users');
        
        //FOTOGRAFER
        Route::get('fotografer', [FotograferController::class, 'index'])->name('fotografer');
        Route::post('store/fotografer', [FotograferController::class, 'store'])->name('store.fotografer');
        Route::put('update/fotografer/{id}', [FotograferController::class, 'update'])->name('update.fotografer');
        Route::delete('delete/fotografer/{id}', [FotograferController::class, 'delete'])->name('delete.fotografer');
        
        //WILAYAH
        Route::get('wilayah', [WilayahController::class, 'index'])->name('wilayah');
        Route::post('store/wilayah', [WilayahController::class, 'store'])->name('store.wilayah');
        Route::put('update/wilayah/{id}', [WilayahController::class, 'update'])->name('update.wilayah');
        Route::delete('delete/wilayah/{id}', [WilayahController::class, 'delete'])->name('delete.wilayah');
        
        //KATEGORI PAKET
        Route::get('kategori-paket', [KategoriPaketController::class, 'index'])->name('kategori-paket');
        Route::post('store/kategori-paket', [KategoriPaketController::class, 'store'])->name('store.kategori-paket');
        Route::put('update/kategori-paket/{id}', [KategoriPaketController::class, 'update'])->name('update.kategori-paket');
        Route::delete('delete/kategori-paket/{id}', [KategoriPaketController::class, 'delete'])->name('delete.kategori-paket');
        
        //PAKET
        Route::get('paket', [PaketController::class, 'index'])->name('paket');
        Route::post('store/paket', [PaketController::class, 'store'])->name('store.paket');
        Route::put('update/paket/{id}', [PaketController::class, 'update'])->name('update.paket');
        Route::delete('delete/paket/{id}', [PaketController::class, 'delete'])->name('delete.paket');
        
        //HARGA PAKET
        Route::get('harga-paket', [HargaPaketController::class, 'index'])->name('harga-paket');
        Route::post('store/harga-paket', [HargaPaketController::class, 'store'])->name('store.harga-paket');
        Route::put('update/harga-paket/{id}', [HargaPaketController::class, 'update'])->name('update.harga-paket');
        Route::delete('delete/harga-paket/{id}', [HargaPaketController::class, 'delete'])->name('delete.harga-paket');
        
        //PAKET TAMBAHAN
        Route::get('paket-tambahan', [PaketTambahanController::class, 'index'])->name('paket-tambahan');
        Route::post('store/paket-tambahan', [PaketTambahanController::class, 'store'])->name('store.paket-tambahan');
        Route::put('update/paket-tambahan/{id}', [PaketTambahanController::class, 'update'])->name('update.paket-tambahan');
        Route::delete('delete/paket-tambahan/{id}', [PaketTambahanController::class, 'delete'])->name('delete.paket-tambahan');
        
        //BOOKING
        Route::get('booking', [BookingController::class, 'index'])->name('booking');
        Route::post('store/booking', [BookingController::class, 'store'])->name('store.booking');
        Route::put('update/booking/{id}', [BookingController::class, 'update'])->name('update.booking');
        Route::delete('delete/booking/{id}', [BookingController::class, 'delete'])->name('delete.booking');
        
        //PESANAN
        Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan');
    });
    

    //CLIENT
    Route::prefix('client')->name('client.')->middleware('CekUserLogin:2')->group(function () {
        //DASHBOARD
        Route::get('dashboard', [ClientDashboardController::class, 'dashboard_client'])->name('dashboard');
    });

});