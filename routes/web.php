<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MouController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NegosiasiController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Frondend\HomeController;
use App\Http\Controllers\Frondend\AboutController;
use App\Http\Controllers\Frondend\ServiceController;

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

// Route::get('test', function () {
//     return view('frondend.invoices.berhasil_bayar');
// });

// frondend
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/tentang-kami', AboutController::class)->name('about.index');
Route::get('/kontak-kami', [ContactController::class, 'create'])->name('contact.create');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');
Route::get('/layanan-kami', ServiceController::class)->name('service.index');
// frondend




Route::middleware('auth', 'ceklogin:admin')->group(function () {

    Route::Resource('role', 'App\Http\Controllers\RoleController');
    Route::Resource('user', 'App\Http\Controllers\UserController');
    Route::Resource('paket', 'App\Http\Controllers\PaketController');
    Route::Resource('wisata', 'App\Http\Controllers\WisataController')->except(['show', 'edit', 'update', 'destroy']);
    Route::get('wisata/{wisata}', [WisataController::class, 'show'])->name('wisata.show');
    Route::get('wisata/{wisata}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::patch('wisata/{wisata}', [WisataController::class, 'update'])->name('wisata.update');
    Route::delete('wisata/{wisata}', [WisataController::class, 'destroy'])->name('wisata.destroy');
    Route::get('detail/paket/create', [PaketController::class, 'createDetail'])->name('detail.create');
    Route::post('detail/paket', [PaketController::class, 'storeDetailPaket'])->name('detail.store');
    Route::patch('negosiasi/update/{id}', [NegosiasiController::class, 'update'])->name('negosiasi.update');
});

Route::middleware('auth', 'ceklogin:user,admin')->group(function () {
    Route::Resource('contact', 'App\Http\Controllers\ContactController')->except(['create', 'store']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('mou/balasan', [MouController::class, 'balasan'])->name('mou.balasan');
    Route::get('invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('invoice/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::get('invoice/detail/{id}', [InvoiceController::class, 'detail'])->name('invoice.detail');
    Route::patch('invoice/{invoice}', [InvoiceController::class, 'update'])->name('invoice.update');
    Route::delete('invoice/{invoice}', [InvoiceController::class, 'destroy'])->name('invoice.destroy');
    Route::get('negosiasi/', [NegosiasiController::class, 'index'])->name('negosiasi.index');
    Route::get('negosiasi/paket/{id}', [NegosiasiController::class, 'create'])->name('negosiasi.create');
    Route::post('negosiasi/store', [NegosiasiController::class, 'store'])->name('negosiasi.store');
    Route::delete('negosiasi/{negosiasi}', [NegosiasiController::class, 'destroy'])->name('negosiasi.destroy');

    Route::post('invoice/store', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('generate/invoice/{id}', [InvoiceController::class, 'generatePDF'])->name('generate.invoice');
    // Route::Resource('invoice', 'App\Http\Controllers\InvoiceController')->except('invoice.index');
    route::get('mou/approve/{id}/edit', [MouController::class, 'accForm'])->name('mou.approve.form');
    route::patch('mou/approve', [MouController::class, 'approve'])->name('mou.approve');
    Route::resource('mou', 'App\Http\Controllers\MouController');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');


    Route::get('/profile/update', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/ubah-password', [ProfileController::class, 'ubahPassword'])->name('profile.ubahpassword');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});



require __DIR__ . '/auth.php';
