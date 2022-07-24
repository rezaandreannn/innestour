<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MouController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Frondend\HomeController;
use App\Http\Controllers\WisataController;

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

// Route::get('/', function () {
//     return view('frondend.index');
// });

// frondend
Route::get('/', [HomeController::class, 'index'])->name('home.index');
// frondend

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth', 'ceklogin:admin')->group(function () {
    Route::Resource('role', 'App\Http\Controllers\RoleController');
    Route::Resource('user', 'App\Http\Controllers\UserController');
    Route::Resource('paket', 'App\Http\Controllers\PaketController');
    Route::Resource('wisata', 'App\Http\Controllers\WisataController')->except(['show', 'edit', 'update', 'destroy']);
    Route::get('wisata/{wisata}', [WisataController::class, 'show'])->name('wisata.show');
    Route::get('wisata/{wisata}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::delete('wisata/{wisata}', [WisataController::class, 'destroy'])->name('wisata.destroy');
});

Route::middleware('auth', 'ceklogin:user')->group(function () {
    Route::get('mou/balasan', [MouController::class, 'balasan'])->name('mou.balasan');
});
route::get('mou/approve/{id}/edit', [MouController::class, 'accForm'])->name('mou.approve.form');
route::patch('mou/approve', [MouController::class, 'approve'])->name('mou.approve');
Route::resource('mou', 'App\Http\Controllers\MouController');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/update', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/ubah-password', [ProfileController::class, 'ubahPassword'])->name('profile.ubahpassword');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

require __DIR__ . '/auth.php';
