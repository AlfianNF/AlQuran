<?php

use App\Http\Controllers\QuranController;
use Illuminate\Support\Facades\Route;

Route::get('/',[QuranController::class,'index']);
Route::get('/surat/{surat}/1/{jumlahAyat}', [QuranController::class, 'showSurat'])->name('surat.show');