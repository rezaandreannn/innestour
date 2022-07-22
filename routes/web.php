<?php

use App\Http\Controllers\Auth\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::Resource('role', 'App\Http\Controllers\RoleController');
Route::Resource('user', 'App\Http\Controllers\UserController');
// Route::resource('ticket', 'App\Http\Controllers\TicketController');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/update', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/ubah-password', [ProfileController::class, 'ubahPassword'])->name('profile.ubahpassword');
Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

require __DIR__ . '/auth.php';
