<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiketKonserController;

// Route halaman depan
Route::get('/', function () {
    return Redirect::route('pemesanan.index');
});

// Route untuk menampilkan daftar pemesanan
Route::get('/tiket', [TiketKonserController::class, 'index'])->name('pemesanan.index');

// Route untuk menampilkan form tambah pemesanan
Route::get('/tiket/create', [TiketKonserController::class, 'create'])->name('pemesanan.create');

// Route untuk menyimpan pemesanan baru (POST)
Route::post('/tiket/store', [TiketKonserController::class, 'store'])->name('pemesanan.store');

// Route untuk menampilkan form edit pemesanan
Route::get('/tiket/{id}/edit', [TiketKonserController::class, 'edit'])->name('pemesanan.edit');

// Route untuk update data pemesanan (PUT)
Route::put('/tiket/{id}/update', [TiketKonserController::class, 'update'])->name('pemesanan.update');

// Route untuk menghapus pemesanan (soft delete) (DELETE)
Route::delete('/tiket/{id}/destroy', [TiketKonserController::class, 'destroy'])->name('pemesanan.destroy');

// Route untuk menampilkan detail pemesanan
Route::get('/tiket/{id}/show', [TiketKonserController::class, 'show'])->name('pemesanan.show');

// Route untuk menampilkan daftar data yang di-soft delete
Route::get('/tiket/trashed', [TiketKonserController::class, 'trashed'])->name('pemesanan.trashed');

// Route untuk memulihkan data soft delete (restore)
Route::put('/tiket/restore/{id}', [TiketKonserController::class, 'restore'])->name('pemesanan.restore');

// Route untuk menghapus data secara permanen (force delete)
Route::delete('/tiket/force-delete/{id}', [TiketKonserController::class, 'forceDelete'])->name('pemesanan.forceDelete');
