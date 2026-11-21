<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;



Route::get('/', function () {
    return view('login');
});

//ini route login
Route::post('/login', [LoginController::class, 'login']);
Route::get('/admin', [AdminController::class, 'admin']);

// Route Admin
Route::get('/admin', [AdminController::class, 'admin']);

// Routing CRUD Barang
Route::get('/admin/barang', [AdminController::class, 'barang']);

Route::get('/admin/barang/tambah', [AdminController::class, 'tambah_barang']);

Route::get('/admin/barang/edit/{id}', [AdminController::class, 'edit_barang']);

Route::get('/admin/barang/delete/{id}', [AdminController::class, 'delete_barang']);

Route::post('/admin/barang/simpan', [AdminController::class, 'simpan_barang']);

Route::post('/admin/barang/update/{id}', [AdminController::class, 'update_barang']);

// Laporan Barang
Route::get('/admin/laporan', [LaporanController::class, 'index']);
Route::get('/admin/laporan/cetak', [LaporanController::class, 'cetak_barang']);
Route::get('/admin/laporan/excel', [LaporanController::class, 'export_excel']);
