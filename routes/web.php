<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoaController;
use App\Http\Controllers\QuranController;
use App\Http\Controllers\HadistController;

Route::get('/',function(){
    return view('welcome');
});
Route::get('/alquran',[QuranController::class,'index']);
Route::get('/alquran/{surat}/1/{jumlahAyat}', [QuranController::class, 'showSurat'])->name('surat.show');

Route::get('/doa',[DoaController::class,'index']);

Route::get('/hadist', [HadistController::class, 'index'])->name('hadist.index');
Route::get('/hadist/{slug}', [HadistController::class, 'show'])->name('hadist.show');