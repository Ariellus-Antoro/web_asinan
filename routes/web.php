<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\Paket_wisataController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\UserBeritaController;
use App\Http\Controllers\UserRencanaController;
use App\Http\Controllers\UserWisataController;
use App\Http\Controllers\UserPaket_wisataController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;


//USER
Route::get('/', [IndexController::class, 'index'])->name('index');


//Route User
Route::prefix('user')->group(function () {
    Route::get('/berita', [UserBeritaController::class, 'index'])
        ->name('folder_user.berita');
    Route::get('/berita/{username}/{berita:slug}', [UserBeritaController::class, 'show'])
        ->name('folder_user.showberita');
    Route::get('/category/{category}', [UserBeritaController::class, 'category'])
        ->name('folder_user.berita.byCategory');
        
    Route::get('/rencana', [UserRencanaController::class, 'index'])
        ->name('folder_user.rencana');
    Route::get('/rencana/{username}/{rencana:slug}', [UserRencanaController::class, 'show'])
        ->name('folder_user.showRencana');

    Route::get('/wisata', [UserWisataController::class, 'index'])
        ->name('folder_user.wisata');
    Route::get('/wisata/{username}/{wisata:slug}', [UserWisataController::class, 'show'])
        ->name('folder_user.showWisata');

    Route::get('/paket_wisata', [UserPaket_wisataController::class, 'index'])
        ->name('folder_user.paket_wisata');
    Route::get('paket_wisata/{username}/{paket_wisata:slug}', [UserPaket_wisataController::class, 'show'])
        ->name('folder_user.showPaket_wisata');
});


//ADMIN
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin/setting/', [SettingController::class, 'index'])
        ->name('folder_setting.setting');
    // Route::post('/admin/setting', [SettingController::class, 'store']);
    Route::put('/admin/setting/update', [SettingController::class, 'update'])
        ->name('folder_setting.update');

    Route::put('/admin/setting/updateContact', [SettingController::class, 'updateContact']) 
    ->name('folder_setting.updateContact');

    Route::put('/admin/setting/updateVideo', [SettingController::class, 'updateVideo']) 
    ->name('folder_setting.updateVideo');

});




//Paket Wisata Admin
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/admin/paketWisata', [Paket_wisataController::class, 'index'])
        ->name('folder_paketWisata.paket_wisata');

    Route::get('/admin/paketWisata/create', [Paket_wisataController::class, 'create'])
        ->name('folder_paketWisata.create');

    Route::post('/admin/paketWisata/store', [Paket_wisataController::class, 'store'])
        ->name('folder_paketWisata.store');

    Route::get('/admin/paketWisata/{paket_wisata:slug}', [Paket_wisataController::class, 'edit'])
        ->name('folder_paketWisata.edit');

    Route::put('/admin/paketWisata/{paket_wisata}', [Paket_wisataController::class, 'update'])
        ->name('folder_paketWisata.update');

    Route::delete('/admin/paketWisata/{paket_wisata}', [Paket_wisataController::class, 'destroy'])
        ->name('folder_paketWisata.destroy');
});

//Tempat Wisata Admin
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/admin/wisata', [WisataController::class, 'index'])
        ->name('folder_wisata.wisata');

    Route::get('/admin/wisata/create', [WisataController::class, 'create'])
        ->name('folder_wisata.create');

    Route::post('/admin/wisata/store', [WisataController::class, 'store'])
        ->name('folder_wisata.store');

    Route::get('/admin/wisata/{wisata:slug}', [WisataController::class, 'edit'])
        ->name('folder_wisata.edit');

    Route::put('/admin/wisata/{wisata}', [WisataController::class, 'update'])
        ->name('folder_wisata.update');

    Route::delete('/admin/wisata/{wisata}', [WisataController::class, 'destroy'])
        ->name('folder_wisata.destroy');
});

//Rencana Admin
Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/admin/rencana', [RencanaController::class, 'index'])
        ->name('folder_rencana.rencana');

    Route::get('/admin/rencana/create', [RencanaController::class, 'create'])
        ->name('folder_rencana.create');

    Route::post('/admin/rencana/store', [RencanaController::class, 'store'])
        ->name('folder_rencana.store');

    Route::get('/admin/rencana/{rencana:slug}', [RencanaController::class, 'edit'])
        ->name('folder_rencana.edit');

    Route::put('/admin/rencana/{rencana}', [RencanaController::class, 'update'])
        ->name('folder_rencana.update');

    Route::delete('/admin/rencana/{rencana}', [RencanaController::class, 'destroy'])
        ->name('folder_rencana.destroy');
});

//Berita Admin
Route::middleware(['auth', 'verified'])->group(function() {

    Route::get('/admin/berita', [BeritaController::class, 'index'])
        ->name('berita');

    Route::get('/admin/category/{category}', [BeritaController::class, 'category'])
        ->name('berita.byCategory');

    Route::get('/admin/berita/create', [BeritaController::class, 'create'])
        ->name('folder_berita.create');

    Route::post('/admin/berita/store', [BeritaController::class, 'store'])
        ->name('folder_berita.store');

    Route::get('/admin/berita/{berita:slug}', [BeritaController::class, 'edit'])
        ->name('folder_berita.edit');

    Route::put('/admin/berita/{berita}', [BeritaController::class, 'update'])
        ->name('folder_berita.update');

    Route::delete('/admin/berita/{berita}', [BeritaController::class, 'destroy'])
        ->name('folder_berita.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/admin/paketWisata/{username}/{paket_wisata:slug}', [Paket_wisataController::class, 'show'])
        ->name('folder_paketWisata.show');

    Route::get('/admin/wisata/{username}/{wisata:slug}', [WisataController::class, 'show'])
        ->name('folder_wisata.show');

    Route::get('/admin/berita/{username}/{berita:slug}', [BeritaController::class, 'show'])
        ->name('folder_berita.show');

    Route::get('/admin/rencana/{username}/{rencana:slug}', [RencanaController::class, 'show'])
        ->name('folder_rencana.show');
});


// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
